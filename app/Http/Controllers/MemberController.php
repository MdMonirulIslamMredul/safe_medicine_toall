<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberCategory;

class MemberController extends Controller
{
    /**
     * Display the public member directory with category tabs and search.
     */
    public function index(Request $request)
    {
        $categories = MemberCategory::where('status', true)
            ->withCount(['members' => function ($q) {
                $q->where('status', 'approved');
            }])
            ->orderBy('order_index', 'asc')
            ->get();

        $query = Member::approved()->with('category');

        $activeCategory = null;
        if ($request->filled('category')) {
            $catSlug = $request->category;
            $activeCategory = MemberCategory::where('slug', $catSlug)->first();
            if ($activeCategory) {
                $query->where('member_category_id', $activeCategory->id);
            }
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('name_bn', 'like', "%{$s}%")
                  ->orWhere('designation', 'like', "%{$s}%")
                  ->orWhere('designation_bn', 'like', "%{$s}%")
                  ->orWhere('organization', 'like', "%{$s}%")
                  ->orWhere('profession', 'like', "%{$s}%");
            });
        }

        $members = $query->orderBy('order_index', 'asc')
            ->latest('id')
            ->paginate(16)
            ->withQueryString();

        $pageTitle = session()->get('language') == 'bangla' ? 'সদস্যবৃন্দের তালিকা' : 'Member Directory';
        if ($activeCategory) {
            $pageTitle = $activeCategory->display_name;
        }

        return view('frontend.members.index', compact('members', 'categories', 'activeCategory', 'pageTitle'));
    }

    /**
     * Display Advisor Committee list (উপদেষ্টার তালিকা).
     */
    public function advisors(Request $request)
    {
        $advisorCategory = MemberCategory::where('slug', 'advisor-committee')
            ->orWhere('name', 'like', '%advisor%')
            ->orWhere('name_bn', 'like', '%উপদেষ্টা%')
            ->first();

        if ($advisorCategory) {
            return redirect()->route('members.index', ['category' => $advisorCategory->slug]);
        }

        return redirect()->route('members.index');
    }

    /**
     * Display Executive Committee list (কমিটির তালিকা).
     */
    public function committee(Request $request)
    {
        $committeeCategory = MemberCategory::where('slug', 'executive-committee')
            ->orWhere('name', 'like', '%executive%')
            ->orWhere('name_bn', 'like', '%কার্যনির্বাহী%')
            ->orWhere('name_bn', 'like', '%কমিটি%')
            ->first();

        if ($committeeCategory) {
            return redirect()->route('members.index', ['category' => $committeeCategory->slug]);
        }

        return redirect()->route('members.index');
    }

    /**
     * Show member online registration form (সদস্য হওয়ার অনলাইন ফরম).
     */
    public function registration()
    {
        $categories = MemberCategory::where('status', true)->orderBy('order_index', 'asc')->get();
        return view('frontend.members.registration', compact('categories'));
    }

    /**
     * Store online member registration application.
     */
    public function registerStore(Request $request)
    {
        $request->validate([
            'name'               => 'required|string|max:255',
            'name_bn'            => 'nullable|string|max:255',
            'member_category_id' => 'nullable|exists:member_categories,id',
            'father_name'        => 'nullable|string|max:255',
            'mother_name'        => 'nullable|string|max:255',
            'phone'              => 'required|string|max:30',
            'email'              => 'nullable|email|max:255',
            'profession'         => 'nullable|string|max:255',
            'organization'       => 'nullable|string|max:255',
            'designation'        => 'nullable|string|max:255',
            'designation_bn'     => 'nullable|string|max:255',
            'nid_passport'       => 'nullable|string|max:100',
            'blood_group'        => 'nullable|string|max:10',
            'gender'             => 'nullable|string|max:20',
            'present_address'    => 'nullable|string',
            'permanent_address'  => 'nullable|string',
            'bio'                => 'nullable|string',
            'photo'              => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ], [
            'name.required'  => session()->get('language') == 'bangla' ? 'আপনার নাম প্রদান করা আবশ্যক।' : 'Your name is required.',
            'phone.required' => session()->get('language') == 'bangla' ? 'মোবাইল নম্বর প্রদান করা আবশ্যক।' : 'Phone number is required.',
            'photo.image'    => session()->get('language') == 'bangla' ? 'ছবিটি একটি বৈধ ইমেজ ফাইল (jpg, png, webp) হতে হবে।' : 'The photo must be a valid image file.',
            'photo.max'      => session()->get('language') == 'bangla' ? 'ছবির সাইজ ৩MB এর বেশি হতে পারবে না।' : 'Photo size cannot exceed 3MB.',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $dir = public_path('upload/members');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }
            $file = $request->file('photo');
            $fileName = 'member_' . time() . '_' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $file->move($dir, $fileName);
            $photoPath = 'upload/members/' . $fileName;
        }

        Member::create([
            'member_category_id' => $request->member_category_id,
            'name'               => $request->name,
            'name_bn'            => $request->name_bn,
            'father_name'        => $request->father_name,
            'mother_name'        => $request->mother_name,
            'designation'        => $request->designation ?: 'General Member',
            'designation_bn'     => $request->designation_bn ?: 'সাধারণ সদস্য',
            'organization'       => $request->organization,
            'profession'         => $request->profession,
            'phone'              => $request->phone,
            'email'              => $request->email,
            'nid_passport'       => $request->nid_passport,
            'blood_group'        => $request->blood_group,
            'gender'             => $request->gender,
            'present_address'    => $request->present_address,
            'permanent_address'  => $request->permanent_address,
            'photo'              => $photoPath,
            'bio'                => $request->bio,
            'status'             => 'pending', // Awaits admin approval
            'order_index'        => 0,
        ]);

        $successMsg = session()->get('language') == 'bangla'
            ? 'আপনার সদস্য আবেদনটি সফলভাবে জমা হয়েছে। অ্যাডমিন পর্যালোচনার পর অনুমোদন দিলে এটি ওয়েবসাইটে প্রদর্শিত হবে।'
            : 'Your membership application has been submitted successfully! It will be displayed after admin review and approval.';

        return redirect()->back()->with('success_registration', $successMsg);
    }
}

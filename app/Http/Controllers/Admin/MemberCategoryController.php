<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberCategory;
use Illuminate\Support\Str;

class MemberCategoryController extends Controller
{
    /**
     * Display a listing of member categories.
     */
    public function index()
    {
        $categories = MemberCategory::withCount('members')
            ->orderBy('order_index', 'asc')
            ->latest('id')
            ->paginate(15);

        return view('admin.member_category.index', compact('categories'));
    }

    /**
     * Store a newly created member category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'name_bn'     => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order_index' => 'nullable|integer',
        ]);

        $slug = Str::slug($request->name);
        $counter = 1;
        while (MemberCategory::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->name) . '-' . $counter++;
        }

        MemberCategory::create([
            'name'        => $request->name,
            'name_bn'     => $request->name_bn,
            'slug'        => $slug,
            'description' => $request->description,
            'status'      => $request->has('status') ? (bool) $request->status : true,
            'order_index' => $request->order_index ?? 0,
        ]);

        return redirect()->route('admin.member_categories.index')
            ->with('message', 'Member category created successfully!');
    }

    /**
     * Show the form for editing the specified member category.
     */
    public function edit($id)
    {
        $category = MemberCategory::findOrFail($id);
        return view('admin.member_category.edit', compact('category'));
    }

    /**
     * Update the specified member category in storage.
     */
    public function update(Request $request, $id)
    {
        $category = MemberCategory::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'name_bn'     => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order_index' => 'nullable|integer',
        ]);

        $category->update([
            'name'        => $request->name,
            'name_bn'     => $request->name_bn,
            'description' => $request->description,
            'status'      => $request->has('status') ? (bool) $request->status : $category->status,
            'order_index' => $request->order_index ?? $category->order_index,
        ]);

        return redirect()->route('admin.member_categories.index')
            ->with('message', 'Member category updated successfully!');
    }

    /**
     * Remove the specified member category from storage.
     */
    public function destroy($id)
    {
        $category = MemberCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.member_categories.index')
            ->with('message', 'Member category deleted successfully!');
    }

    /**
     * Toggle category active status.
     */
    public function toggleStatus($id)
    {
        $category = MemberCategory::findOrFail($id);
        $category->status = !$category->status;
        $category->save();

        return redirect()->back()->with('message', 'Category status updated successfully!');
    }
}

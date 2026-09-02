<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\BannerAndTitle;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display public medicine verification catalog & search portal.
     */
    public function index(Request $request)
    {
        $query = Medicine::with(['images', 'safeImages', 'unsafeImages'])->latest();

        // Safety Status Filter
        if ($request->filled('status') && in_array($request->status, ['safe', 'unsafe', 'warning'])) {
            $query->where('status', $request->status);
        }

        // Keyword Search (Brand, Generic, DAR No, Manufacturer)
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Dosage Form Filter
        if ($request->filled('dosage_form')) {
            $query->where('dosage_form', $request->dosage_form);
        }

        // Therapeutic Class Filter
        if ($request->filled('category')) {
            $query->where('therapeutic_class', 'LIKE', "%{$request->category}%");
        }

        // Manufacturer Filter
        if ($request->filled('manufacturer')) {
            $query->where('manufacturer', 'LIKE', "%{$request->manufacturer}%");
        }

        $medicines = $query->paginate(12)->withQueryString();

        // Status Counts
        $counts = [
            'all'     => Medicine::count(),
            'safe'    => Medicine::where('status', 'safe')->count(),
            'unsafe'  => Medicine::where('status', 'unsafe')->count(),
            'warning' => Medicine::where('status', 'warning')->count(),
        ];

        // Featured medicines for top highlight banner
        $featuredMedicines = Medicine::where('is_featured', true)
            ->with(['safeImages', 'unsafeImages'])
            ->take(4)
            ->get();

        // Common dosage forms and top pharma companies for filter chips
        $dosageForms = Medicine::distinct()->pluck('dosage_form')->filter();
        $topCompanies = Medicine::distinct()->pluck('manufacturer')->filter()->take(6);

        return view('frontend.medicines.index', compact(
            'medicines',
            'counts',
            'featuredMedicines',
            'dosageForms',
            'topCompanies'
        ));
    }

    /**
     * Display single medicine detail & side-by-side Safe vs Unsafe comparison.
     */
    public function show($id)
    {
        $medicine = Medicine::with(['images', 'safeImages', 'unsafeImages'])->findOrFail($id);

        // Increment view count
        $medicine->increment('view_count');

        // Related medicines (same generic or therapeutic class)
        $relatedMedicines = Medicine::where('id', '!=', $medicine->id)
            ->where(function ($q) use ($medicine) {
                $q->where('generic_name', $medicine->generic_name)
                  ->orWhere('therapeutic_class', $medicine->therapeutic_class);
            })
            ->take(3)
            ->get();

        return view('frontend.medicines.show', compact('medicine', 'relatedMedicines'));
    }
}

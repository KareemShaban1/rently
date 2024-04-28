<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        //
        $productTypes = ProductType::all();
        return view('backend.dashboard.views.productType.index', compact('productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string',
            'active' => 'nullable|boolean'
        ]);

        $active = $request->boolean('active', false);

        ProductType::create([
            'name' => $validatedData['name'],
            'active' => $active
        ]);


        return redirect()->route('productType.index')->with('toast_success', 'تم أضافة شركة توزيع بنجاح');

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductType $productType)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'active' => 'nullable|boolean'
        ]);
        $active = $request->boolean('active', false);

        // Update the distribution company with the validated data
        $productType->update([
            'name' => $validatedData['name'],
            'active' => $active,
        ]);

        // Redirect back or return response
        return redirect()->route('productType.index')->with('toast_success', 'تم تحديث شركة توزيع بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType)
    {
        //
        $productType->delete();

        return redirect()->route('productType.index')->with('toast_success', 'تم حذف شركة توزيع بنجاح');

    }
}
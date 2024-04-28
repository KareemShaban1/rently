<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        //
        $productCategories = ProductCategory::all();
        return view('backend.dashboard.views.productCategory.index', compact('productCategories'));
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

        ProductCategory::create([
            'name' => $validatedData['name'],
            'active' => $active
        ]);


        return redirect()->route('productCategory.index')->with('toast_success', 'تم أضافة شركة توزيع بنجاح');

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'active' => 'nullable|boolean'
        ]);
        $active = $request->boolean('active', false);

        // Update the distribution company with the validated data
        $productCategory->update([
            'name' => $validatedData['name'],
            'active' => $active,
        ]);

        // Redirect back or return response
        return redirect()->route('productCategory.index')->with('toast_success', 'تم تحديث شركة توزيع بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
        $productCategory->delete();

        return redirect()->route('productCategory.index')->with('toast_success', 'تم حذف شركة توزيع بنجاح');

    }
}

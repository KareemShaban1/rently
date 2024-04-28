<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        //
        $cities = City::all();
        return view('backend.dashboard.views.City.index', compact('cities'));
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

        City::create([
            'name' => $validatedData['name'],
            'active' => $active
        ]);


        return redirect()->route('City.index')->with('toast_success', 'تم أضافة محافظة بنجاح');

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $City)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'active' => 'nullable|boolean'
        ]);
        $active = $request->boolean('active', false);

        // Update the distribution company with the validated data
        $City->update([
            'name' => $validatedData['name'],
            'active' => $active,
        ]);

        // Redirect back or return response
        return redirect()->route('City.index')->with('toast_success', 'تم تحديث محافظة بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $City)
    {
        //
        $City->delete();

        return redirect()->route('City.index')->with('toast_success', 'تم حذف محافظة بنجاح');

    }
}
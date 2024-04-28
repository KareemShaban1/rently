<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        //
        $locations = Location::all();
        return view('backend.dashboard.views.location.index', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:state,governorate,city',
            'active' => 'sometimes|boolean',
            'parent_id' => 'nullable|exists:locations,id'
        ]);


        $active = $request->boolean('active', false);

        Location::create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'parent_id' => $validatedData['parent_id'],
            'active' => $active
        ]);

        return redirect()->route('location.index')->with('toast_success', 'تم أضافة محافظة بنجاح');

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:state,governorate,city',
            'active' => 'sometimes|boolean',
            'parent_id' => 'nullable|exists:locations,id'
        ]);
        $active = $request->boolean('active', false);

        // Update the distribution company with the validated data
        $location->update([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'parent_id' => $validatedData['parent_id'],
            'active' => $active,
        ]);

        // Redirect back or return response
        return redirect()->route('location.index')->with('toast_success', 'تم تحديث محافظة بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
        $location->delete();
        return redirect()->route('location.index')->with('toast_success', 'تم حذف محافظة بنجاح');

    }
}

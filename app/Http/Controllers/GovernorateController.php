<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Http\Requests\StoreGovernorateRequest;
use App\Http\Requests\UpdateGovernorateRequest;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        //
        $governorates = Governorate::all();
        return view('backend.dashboard.views.governorate.index', compact('governorates'));
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

        Governorate::create([
            'name' => $validatedData['name'],
            'active' => $active
        ]);


        return redirect()->route('governorate.index')->with('toast_success', 'تم أضافة محافظة بنجاح');

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Governorate $governorate)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'active' => 'nullable|boolean'
        ]);
        $active = $request->boolean('active', false);

        // Update the distribution company with the validated data
        $governorate->update([
            'name' => $validatedData['name'],
            'active' => $active,
        ]);

        // Redirect back or return response
        return redirect()->route('governorate.index')->with('toast_success', 'تم تحديث محافظة بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Governorate $governorate)
    {
        //
        $governorate->delete();

        return redirect()->route('governorate.index')->with('toast_success', 'تم حذف محافظة بنجاح');

    }
}

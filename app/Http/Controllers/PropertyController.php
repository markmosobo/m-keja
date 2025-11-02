<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::with('product', 'client')->get();
        return response()->json($properties);        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $property = new Property();
        $property->landlord_id = $request->landlord_id;
        $property->agent_id = $request->agent_id;
        $property->title = $request->title;
        $property->description = $request->description;
        $property->type = $request->type;
        $property->location = $request->location;
        $property->coordinates = $request->coordinates;
        $property->rent_amount = $request->rent_amount;
        $property->status = $request->status;
        $property->save();
        return response()->json($property);        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = Property::find($id);
        return response()->json($property);        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $property = Property::find($id);
        $property->landlord_id = $request->landlord_id;
        $property->agent_id = $request->agent_id;
        $property->title = $request->title;
        $property->description = $request->description;
        $property->type = $request->type;
        $property->location = $request->location;
        $property->coordinates = $request->coordinates;
        $property->rent_amount = $request->rent_amount;
        $property->status = $request->status;
        $property->save();
        return response()->json($property);        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Property::destroy($id);
        return response()->json(['message' => 'Deleted']);        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;

class ListController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        $landlords = User::latest()->where('role','landlord')->get();
        $properties = Property::latest()->get();

        return response()->json([
            "lists" => [
                'users' => $users,
                'landlords' => $landlords,
                'properties' => $properties,
                
            ]
        ]);

    }      
}

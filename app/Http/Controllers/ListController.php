<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ListController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return response()->json([
            "lists" => [
                'users' => $users,
                
            ]
        ]);

    }      
}

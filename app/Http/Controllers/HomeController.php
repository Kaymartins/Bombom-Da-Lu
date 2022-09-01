<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all()->take(8);

        return view('dashboard')
            ->with('inventories',$inventories);
    }
}

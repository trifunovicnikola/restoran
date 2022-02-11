<?php

namespace App\Http\Controllers;

use App\Models\restoran;
use Illuminate\Http\Request;

class restoranController extends Controller
{
    public function show()
    {
        return restoran::all();
    }
}

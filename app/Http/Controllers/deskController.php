<?php

namespace App\Http\Controllers;

use App\Models\desk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class deskController extends Controller
{
    public function show()
    {
        return desk::all();
    }


    public function showId($id)
    {
        return desk::find($id);
    }

    public function addDesk(Request $request)
    {
        $desk = new desk();


        $desk->kapacitet = $request->kapacitet;
        $desk->save();
        return desk::all();
    }

    public function delDesk($id)
    {
        DB::select('delete from desks where id =' . $id);
        return desk::all();

    }


}

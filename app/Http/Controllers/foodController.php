<?php

namespace App\Http\Controllers;

use App\Models\food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class foodController extends Controller
{
    public  $timestamp = false;
    public function show()
    {
        return food::all();
    }
    public function showById($id)
    {
        return food::find($id);
    }
    public function delete($id){
        DB::select('delete from foods where id ='.$id );
        return food::all();
    }
    public function addFood(Request $request)
    {
        $food= new food();
        $food->naziv=$request->naziv;
        $food->opis = $request->opis;
        $food->slika = $request->slika;
        $food->cijena = $request->cijena;
        $food->save();
        return food::all();
    }
    public function editFood(Request $request, $id)
    {
        $food = food::find($id);
        $food->naziv=$request->naziv;
        $food->opis = $request->opis;
        $food->slika = $request->slika;
        $food->cijena = $request->cijena;

        $food->save();
        return $food;
    }


}

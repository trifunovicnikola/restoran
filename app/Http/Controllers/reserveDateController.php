<?php


namespace App\Http\Controllers;
use App\Models\reservation_date;
use Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class reserveDateController extends Controller
{



    public function setReservationAdmin(Request $request){
       $reservation= new reservation_date();



        $reservation->broj_gostiju =$request->broj_gostiju;
        $reservation->ime_gosta = $request->ime_gosta;
        $reservation->rezervisan =1;
       $reservation->desk_id=$request->desk_id;
        $reservation->korisnik=0;
        $reservation->datum_rezervacije=$request->datum;
        $reservation->broj_telefon=$request->broj_telefona;
        $reservation->email=$request->email;

        $reservation->save();
        return DB::select('select * from reservation_date where desk_id='.$request->desk_id);

    }
    public function setReservationUser(Request $request){

        $rezervacije= DB::select('select * from reservation_date  where desk_id='.$request->desk_id);
        $check=false;
        foreach ($rezervacije as $rez) {
            $a= $rez->datum_rezervacije;
            $b=$request->datum;
            $date1 =Carbon\Carbon::parse($a)->format('M d, Y');;
            $date2 = Carbon\Carbon::parse($b)->format('M d, Y');
            $ha='sh';
            if ($date1==$date2){
             return $ha ;
            }
        }


        $reservation= new reservation_date();
        $reservation->broj_gostiju =$request->broj_gostiju;
        $reservation->ime_gosta = $request->ime_gosta;
        $reservation->rezervisan =true;
        $reservation->desk_id=$request->desk_id;
        $reservation->korisnik=true;
        $reservation->datum_rezervacije=$request->datum;
        $reservation->broj_telefon=$request->broj_telefona;
        $reservation->email=$request->email;
        $reservation->save();
        return DB::select('select * from desks ');

    }
    public function delDesk(Request $request){
        DB::select('delete from reservation_date where id ='.$request->id );
        return DB::select('select * from reservation_date where desk_id='.$request->desk_id);

    }

}

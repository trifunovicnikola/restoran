<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Carbon;

class reservation_date extends Model
{
    use HasFactory;
    public  $timestamps = false;
    protected $table ='reservation_date';
}

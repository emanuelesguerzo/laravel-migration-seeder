<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index() {

        // Per demo dati attuali
        $todayAtTen = Carbon::today()->setHour(6)->setMinute(0)->setSecond(0);

        $trains = Train::where('departure_time', '>=', $todayAtTen)->orderBy('departure_time', 'asc')->get();
        return view("home", compact("trains"));
        
    }
}

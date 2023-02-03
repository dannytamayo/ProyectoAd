<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use App\Models\User;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    
    public function index()
    {

        $travels = Travel::all()->where('status',0);

        $drivers = User::where('rol','Taxista')
                            ->where('estado',1)
                            ->get();

        // dd($travels);

        return view('administrador', compact('travels', 'drivers'));
    }

    public function update(Request $request){
        $travel = Travel::find($request->id);
        $travel->status = 1;
        $travel->driver_id = $request->driver_id;
        $travel->save();
        
        // dd($travel);

        return redirect()->route('admin');
    }
}

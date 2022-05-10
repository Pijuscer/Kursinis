<?php

namespace App\Http\Controllers;

use App\Models\working_day;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class WorkingDayController extends Controller
{
    public function index(){
        $working_days = working_day::all();
        return view('working_days',  compact('working_days'));
        
    }
    public function index2(){
        $working_days = working_day::all();
        return view('order_care',  compact('working_days'));
        
    }
    public function viewForm(){
        //TODO: fentch countries from database
        $working_days = working_day::all();
        return view('working_days', ['working_days' => $working_days]);
    }
    public function store(Request $request){
        //dd($request);
        //Validacija
        $validated = $request -> validate([
            'metai' => 'required|max:225',
            'menesis' => 'required|max:225',
            'diena' => 'required|max:225',
            'laisvumas' => 'required|max:225',

        ]);

        working_day::create([
            'metai' => request('metai'),
            'menesis' => request('menesis'),
            'diena' => request('diena'),
            'laisvumas' => request('laisvumas'),
        ]);

        return redirect('/working_days');
    }
    public function search(){
        $working_days = working_day::where('metai', 'LIKE', '%' .$_GET['query'].'%')->
        orWhere('menesis', $_GET['query'])->
        orWhere('diena', $_GET['query'])->
        orWhere('laisvumas', $_GET['query'])->get();

        return view('working_days', compact('working_days'));
    }
}

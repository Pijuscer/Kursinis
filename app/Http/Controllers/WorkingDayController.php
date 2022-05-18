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
            'metai' => 'required|max:225|regex:/^[0-9]+$/',
            'menesis' => 'required|max:225',
            'diena' => 'required|max:225|regex:/^[0-9]+$/',
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
    public function editForm($id){
        $working_days = working_day::where('id', $id)->firstOrFail();

        return view('edit_working_days',compact("working_days"));
    }
    public function edit(Request $request, $id){
        
         //Validacija

         $validated = $request -> validate([
            'metai' => 'required|max:225|regex:/^[0-9]+$/ ',
            'menesis' => 'required|max:225',
            'diena' => 'required|max:225|regex:/^[0-9]+$/',
            'laisvumas' => 'required|max:225',
         ]);
         $working_days = working_day::where('id', $id)->firstOrFail();
        
       
        $working_days->metai = request('metai');
        $working_days->menesis = request('menesis');
        $working_days->diena = request('diena');
        $working_days->laisvumas = request('laisvumas');
        $working_days->save();

        return redirect('/working_days');
    }

    public function removeForm($id){
        $working_days = working_day::where('id', $id)->firstOrFail(); 

        return view('remove_working_days]',compact("working_days"));
    }
    
    public function remove($id){
        $Dog_care = working_day::where('id', $id)->firstOrFail();
        $Dog_care->delete();

        return redirect('/working_days');
    }
    public function search(){
        $working_days = working_day::where('metai', 'LIKE', '%' .$_GET['query'].'%')->
        orWhere('menesis', $_GET['query'])->
        orWhere('diena', $_GET['query'])->
        orWhere('laisvumas', $_GET['query'])->get();

        return view('working_days', compact('working_days'));
    }
    public function search2(){
        $working_days = working_day::where('metai', 'LIKE', '%' .$_GET['query'].'%')->
        orWhere('menesis', $_GET['query'])->
        orWhere('diena', $_GET['query'])->
        orWhere('laisvumas', $_GET['query'])->get();

        return view('order_care', compact('working_days'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\care;
use Illuminate\Http\Request;

class CareController extends Controller
{
    public function index(){
        $cares = care::all();
        return view('add_cares', compact('cares'));
        
    }
    public function viewForm(){
        //TODO: fentch countries from database
        $care = care::all();
        return view('cares', ['cares' => $care]);

    }
    public function store(Request $request){
        //dd($request);
        //Validacija
        $validated = $request -> validate([
            'uzsiemimas' => 'required|max:225',
            'priziurejimas' => 'required|max:225',

        ]);

        care::create([
            'uzsiemimas' => request('uzsiemimas'),
            'priziurejimas' => request('priziurejimas'),
        ]);

        return redirect('/cares');
    }
    public function editForm($id){
        $cares = care::where('id', $id)->firstOrFail();

        return view('edit_cares',compact("cares"));
    }
    public function edit(Request $request, $id){
         //Validacija

         $validated = $request -> validate([
            'uzsiemimas' => 'required|max:225',
            'priziurejimas' => 'required|max:225',
    
         ]);
         
        $cares = care::where('id', $id)->firstOrFail();

        $cares->uzsiemimas = request('uzsiemimas');
        $cares->priziurejimas = request('priziurejimas');
        $cares->save();

        return redirect('/cares');
    }
    public function removeForm($id){
        $cares = care::where('id', $id)->firstOrFail(); 

        return view('remove_cares]',compact("cares"));
    }
    public function remove($id){
        $cares = care::where('id', $id)->firstOrFail();
        $cares->delete();

        return redirect('/cares');
    }
    
}

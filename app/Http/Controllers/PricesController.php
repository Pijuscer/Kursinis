<?php

namespace App\Http\Controllers;

use App\Models\prices;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    public function index(){
        $prices = prices::all();
        return view('add_prices', compact('prices'));
    }
    public function viewForm1(){
        //TODO: fentch countries from database
        $prices = prices::all();
        return view('prices', ['prices' => $prices]);
    }
    public function store(Request $request){
        //dd($request);
        //Validacija
        $validated = $request -> validate([
            'tipas' => 'required|max:225',
            'nurodyta_kaina' => 'required|max:225',

        ]);

        prices::create([
            'tipas' => request('tipas'),
            'nurodyta_kaina' => request('nurodyta_kaina'),
        ]);

        return redirect('/prices');
    }
    public function editForm($id){
        $prices = prices::where('id', $id)->firstOrFail();

        return view('edit_prices',compact("prices"));
    }
    public function edit(Request $request, $id){
         //Validacija

         $validated = $request -> validate([
            'tipas' => 'required|max:225',
            'nurodyta_kaina' => 'required|max:225',
    
         ]);

        $prices = prices::where('id', $id)->firstOrFail();

        $prices->tipas = request('tipas');
        $prices->nurodyta_kaina = request('nurodyta_kaina');
        $prices->save();

        return redirect('/prices');
    }
    public function removeForm($id){
        $prices = prices::where('id', $id)->firstOrFail(); 

        return view('remove_prices]',compact("prices"));
    }
    public function remove($id){
        $prices = prices::where('id', $id)->firstOrFail();
        $prices->delete();

        return redirect('/prices');
    }
}

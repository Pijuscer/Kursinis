<?php

namespace App\Http\Controllers;

use App\Models\DogCare;
use Illuminate\Http\Request;

class DogCareController extends Controller
{
    public function index(){
        //TODO: fentch countries from database
        $DogCare = DogCare::all();
        return view('DogCare',compact('DogCare'));
    }

    public function viewForm(){
        //TODO: fentch countries from database
        return view('add_dog_cares');
    }

    public function store(Request $request){
        //Validacija
        $validated = $request -> validate([
            'user_id',
            'vardas' => 'required|max:225',
            'pavarde' => 'required|max:225',
            'telefono_numeris' => 'required|max:225',
            'adresas' => 'required|max:225',
            'suns_veisle' => 'required|max:225',
            'suns_amzius' => 'required|max:225',
            'suns_svoris' => 'required|max:225|regex:/^[0-9]+$/',
            'draugiskas' => 'required|max:225',
            'alergiskas' => 'required|max:225',
            

        ]);

        DogCare::create([
            'user_id'=> auth()->user()->id,
            'vardas' => request('vardas'),
            'pavarde' => request('pavarde'),
            'telefono_numeris' => request('telefono_numeris'),
            'adresas' => request('adresas'),
            'suns_veisle' => request('suns_veisle'),
            'suns_amzius' => request('suns_amzius'),
            'suns_svoris' => request('suns_svoris'),
            'draugiskas' => request('draugiskas'),
            'alergiskas' => request('alergiskas'),
            
        ]);

        return redirect('/add_dog_care');
    }
    public function editForm($id){
        $Dog_care = DogCare::where('id', $id)->firstOrFail();

        return view('edit_dog_cares',compact("Dog_care"));
    }
    public function edit(Request $request, $id){
        
         //Validacija

         $validated = $request -> validate([
            'user_id',
            'vardas' => 'required|max:225',
            'pavarde' => 'required|max:225',
            'telefono_numeris' => 'required|max:225',
            'adresas' => 'required|max:225',
            'suns_veisle' => 'required|max:225',
            'suns_amzius' => 'required|max:225',
            'suns_svoris' => 'required|max:225|regex:/^[0-9]+$/',
            'draugiskas' => 'required|max:225',
            'alergiskas' => 'required|max:225',
         ]);
        $Dog_care = DogCare::where('id', $id)->firstOrFail();
        
       
        $Dog_care->vardas = request('vardas');
        $Dog_care->pavarde = request('pavarde');
        $Dog_care->telefono_numeris = request('telefono_numeris');
        $Dog_care->adresas = request('adresas');
        $Dog_care->suns_veisle = request('suns_veisle');
        $Dog_care->suns_amzius = request('suns_amzius');
        $Dog_care->suns_svoris = request('suns_svoris');
        $Dog_care->draugiskas = request('draugiskas');
        $Dog_care->alergiskas = request('alergiskas');
        $Dog_care->save();

        return redirect('/add_dog_care');
    }
    public function removeForm($id){
        $Dog_care = DogCare::where('id', $id)->firstOrFail(); 

        return view('remove_dog_cares',compact("Dog_care"));
    }
    public function remove($id){
        $Dog_care = DogCare::where('id', $id)->firstOrFail();
        $Dog_care->delete();

        return redirect('/add_dog_care');
    }
    public function search(){
        $DogCare = DogCare::where('vardas', 'LIKE', '%' .$_GET['query'].'%')->
        orWhere('pavarde', $_GET['query'])->
        orWhere('telefono_numeris', $_GET['query'])->
        orWhere('adresas', $_GET['query'])->
        orWhere('suns_veisle', $_GET['query'])->
        orWhere('suns_amzius', $_GET['query'])->
        orWhere('suns_svoris', $_GET['query'])->
        orWhere('draugiskas', $_GET['query'])->
        orWhere('alergiskas', $_GET['query'])->get();

        return view('DogCare', compact('DogCare'));
    }

   }

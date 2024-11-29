<?php

namespace App\Http\Controllers;

use App\Models\Dragon;
use App\Models\trainer;
use Illuminate\Http\Request;

class DragonController extends Controller
{
    public function index()
    {
        $dragons = Dragon::all();
        return view('dragons.index', compact('dragons'));
    }

    public function create()
    {
        $trainers = Trainer::all();
        return view('dragons.create', compact('trainers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'element' => 'required',
            'image' => 'required|image|mimes:jpeg, png, jpg, gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName); 
        
        $dragons = new Dragon();
        $dragons->name = $request->name;
        $dragons->age = $request->age;
        $dragons->element = $request->element;
        $dragons->image = 'images/'.$imageName;
        $dragons->trainer_id = $request->trainer_id;
        $dragons->save();

        return redirect('dragons')->with('sucess', 'Dragao criado!');
    }

    public function edit($id)
    {
        $dragon = Dragon::findOrFail($id);
        $trainers = Trainer::all();
        return view('dragons.edit', compact('dragon', 'trainers'));
    }

    public function update(Request $request, $id)
    {
        $dragon = Dragon::findOrFail($id);
        
        $dragon->update($request->all());
        $dragon->name = $request->name;
        $dragon->age = $request->age;
        $dragon->element = $request->element;

        if(!is_null($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName); 

            $dragon->image = 'images/'.$imageName;
        }
        $dragon->save();

        return redirect('dragons')->with('success', 'Dragao atualizado!');
    }

    public function destroy($id)
    {
        $dragon = Dragon::findOrFail($id);
        $dragon->delete();
        return redirect('dragons')->with('success', 'Dragao deletado!');
    }
}

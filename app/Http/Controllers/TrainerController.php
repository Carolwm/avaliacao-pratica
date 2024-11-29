<?php

namespace App\Http\Controllers;

use App\Models\trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
    }

    public function create()
    {
        return view('trainers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rank' => 'required'
        ]);
        
        $trainers = new Trainer();
        $trainers->name = $request->name;
        $trainers->rank = $request->rank;
        $trainers->save();

        return redirect('trainers')->with('sucess', 'Treinador criado!');
    }

    public function edit($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('trainers.edit', compact('trainer'));
    }

    public function update(Request $request, $id)
    {
        $trainer = Trainer::findOrFail($id);
        
        $trainer->update($request->all());
        $trainer->name = $request->name;
        $trainer->rank = $request->rank;

        $trainer->save();

        return redirect('trainers')->with('success', 'Treinador atualizado!');
    }

    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();
        return redirect('trainers')->with('success', 'treinador deletado!');
    }
}

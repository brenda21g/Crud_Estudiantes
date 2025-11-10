<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;

class CareerController extends Controller
{
  
    public function index()
    {
        $careers = Career::latest()->get();
        return view('careers.index', compact('careers'));
    }

    public function create()
    {
        return view('careers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:careers,name',
        ]);

        Career::create([
            'name' => $request->name,
        ]);

        return redirect()->route('careers.index')->with('success', 'Carrera creada correctamente.');
    }

    public function edit($id)
    {
        $career = Career::findOrFail($id);
        return view('careers.edit', compact('career'));
    }

    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:careers,name,' . $career->id,
        ]);

        $career->update([
            'name' => $request->name,
        ]);

        return redirect()->route('careers.index')->with('success', 'Carrera actualizada correctamente.');
    }

    public function delete($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();

        return redirect()->route('careers.index')->with('success', 'Carrera eliminada correctamente.');
    }
}

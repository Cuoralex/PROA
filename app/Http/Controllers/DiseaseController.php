<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        $diseases = Disease::all();
        return view('diseases.index', compact('diseases'));
    }

    public function create()
    {
        return view('diseases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Disease::create($request->all());
        return redirect()->route('diseases.index');
    }

    public function edit(Disease $disease)
    {
        return view('diseases.edit', compact('disease'));
    }

    public function update(Request $request, Disease $disease)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $disease->update($request->all());
        return redirect()->route('diseases.index');
    }

    public function destroy(Disease $disease)
    {
        $disease->delete();
        return redirect()->route('diseases.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    public function index()
    {
        $medications = Medication::all();
        return view('medications.index', compact('medications'));
    }

    public function create()
    {
        return view('medications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dose' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Medication::create($request->all());
        return redirect()->route('medications.index');
    }

    public function edit(Medication $medication)
    {
        return view('medications.edit', compact('medication'));
    }

    public function update(Request $request, Medication $medication)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dose' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $medication->update($request->all());
        return redirect()->route('medications.index');
    }

    public function destroy(Medication $medication)
    {
        $medication->delete();
        return redirect()->route('medications.index');
    }
}

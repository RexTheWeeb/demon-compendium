<?php

namespace App\Http\Controllers;

use App\Models\Demon;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demon = Demon::all();
        return view('demons.index', compact('demon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $races = Race::all();
        return view('demons.create', compact('races'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'origin' => ['required', 'max:255'],
            'race_id' => ['required', 'exists:races,id'],
            'alignment' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'image_url' => ['required', 'url', 'max:255']
        ]);

        $race = Race::find($request->race_id);
        $demon = new Demon();
        $demon->name = $request->input('name');
        $demon->origin = $request->input('origin');
        $demon->race_id = $race->id;
        $demon->description = $request->input('description');
        $demon->image_url = $request->input('image_url');
        $demon->added_by = Auth::id();
        $demon->save();

        return redirect()->route('demons.index')->with('success', 'Demon created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Demon $demon)
    {
        return view('demons.show', compact('demon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Demon $demon)
    {
        return view('demons.edit', compact('demon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'origin' => ['required', 'max:255'],
            'race' => ['required', 'max:255'],
            'alignment' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'image_url' => ['required', 'url', 'max:255']
        ]);
        $demon = Demon::findOrFail($id);
        $demon->name = $request->input('name');
        $demon->origin = $request->input('origin');
        $demon->race = $request->input('race');
        $demon->alignment = $request->input('alignment');
        $demon->description = $request->input('description');
        $demon->image_url = $request->input('image_url');
        $demon->added_by = $request->input('added_by');
        $demon->save();
        return redirect()->route('demons.index')->with('success', 'Demon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Demon;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $term = $request->get('q');
        $demon = Demon::when($term, function ($query, $term) {
            $query->where('name', 'like', '%' . $term . '%');
        })->paginate(15);

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
            'image_url' => ['required', 'image', 'max:2048']
        ]);

        $race = Race::find($request->race_id);
        $demon = new Demon();
        $demon->name = $request->input('name');
        $demon->origin = $request->input('origin');
        $demon->race_id = $race->id;
        $demon->description = $request->input('description');

        $path = $request->file('image_url')->storePublicly('demons', 'public');
        $demon->image_url = $path;

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
        $races = Race::all();
        return view('demons.edit', compact('demon', 'races'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demon $demon)
    {
        $request->validate([
            'name' => 'required|max:255',
            'origin' => 'required|max:255',
            'race_id' => 'required|exists:races,id',
            'alignment' => 'required|max:255',
            'description' => 'required|max:1000',
            'image' => 'nullable|image|max:2048',
        ]);

        $demon->fill([
            'name' => $request->name,
            'origin' => $request->origin,
            'race_id' => $request->race_id,
            'alignment' => $request->alignment,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('demons', 'public');
            $demon->image = $path;
        }

        $demon->added_by = auth()->id();
        $demon->save();

        return redirect()->route('demons.show', $demon)->with('success', 'Demon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $demon = Demon::findOrFail($id);
        if ($demon->image_url) {
            Storage::disk('public')->delete($demon->image_url);
        }
        $demon->delete();
        return redirect()->route('demons.index')->with('success', 'Demon deleted successfully.');
    }
}

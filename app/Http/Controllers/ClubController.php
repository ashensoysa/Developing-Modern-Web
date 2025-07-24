<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;


class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
        {
        $clubs = Club::with('creator')->latest()->get();
        return view('clubs.index', compact('clubs'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
        {
        return view('clubs.create');
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string'
        ]);

            Club::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => auth()->id()
        ]);

        return redirect()->route('clubs.index')->with('success', 'Club created successfully!');
        }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        return view('clubs.show', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club)
    {
        return view('clubs.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|in:active,inactive',
    ]);

        $club->update($request->only('name', 'description', 'status'));

        return redirect()->route('clubs.index')->with('success', 'Club updated successfully!');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
        {
        $club->delete();

        return redirect()->route('clubs.index')->with('success', 'Club deleted successfully!');
        }
}

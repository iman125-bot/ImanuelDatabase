<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $musics = Music::all();
        return view('musics.index', compact('musics'));
    }

    public function create()
    {
        return view('musics.create');
    }

    public function store(Request $request)
    {
        $music = Music::create($request->all());
        return redirect()->route('musics.index')->with('success', 'Music added!');
    }

    public function show($id)
    {
        $music = Music::find($id);
        return view('musics.show', compact('music'));
    }

    public function edit($id)
    {
        $music = Music::find($id);
        return view('musics.edit', compact('music'));
    }

    public function update(Request $request, $id)
    {
        Music::update($id, $request->all());
        return redirect()->route('musics.index')->with('success', 'Music updated!');
    }

    public function destroy($id)
    {
        Music::delete($id);
        return redirect()->route('musics.index')->with('success', 'Music deleted!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use PDO;

class GenreController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('genre.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:genres|max:255',
            'description' => 'required',
        ]);
        $genre = new \App\Models\Genre;
        $genre->name = $request->name;
        $genre->description = $request->description;
        $genre->save();
        return redirect('/');
    }
    public function edit(Genre $genre)
    {
        return view('genre.edit', compact('genre'));
    }
    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        $genre->update($validated);
        return redirect('/');
    }
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect('/')
            ->with('success', 'Post deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Video;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Void_;

class VideoController extends Controller
{
    public function index($genre_id)
    {
        $genre = Genre::find($genre_id);
        $videos = Video::where('genre_id', $genre_id)->get();
        foreach ($videos as $video) {
            if ($video->active == True) {
                $video->active = 'Yes';
            } else {
                $video->acive = 'No';
            }
        }
        return view('video.video', compact('videos', 'genre'));
    }
    public function create($genre_id)
    {
        $genre = Genre::where('id', $genre_id)->first();
        return view('video.create', compact('genre'));
    }
    public function store($genre_id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:videos|max:255',
            'description' => 'required',
            'active' => 'required',
            'link' => 'url'
        ]);
        $video = new Video;
        $video->name = $request->name;
        $video->description = $request->description;
        if ($request->active == 'Yes') {
            $video->active = True;
        } else {
            $video->active = False;
        }
        $video->link = $request->link;
        $video->genre_id = $genre_id;
        $video->save();
        return redirect('/genre/' . $genre_id . '/videos');
    }
    public function edit(Video $video)
    {
        return view('video.edit', compact('video'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'active' => 'required',
            'link' => 'url'
        ]);
        $video = Video::find($request->id);
        $video->name = $request->name;
        $video->description = $request->description;
        if ($request->active == 'Yes') {
            $video->active = True;
        } else {
            $video->active = False;
        }
        $video->link = $request->link;
        $video->save();
        return redirect('/genre/' . $video->genre_id . '/videos');
    }
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect('/genre/' . $video->genre_id . '/videos');
    }
}

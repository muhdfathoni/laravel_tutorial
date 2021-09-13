<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
            'show_name' => 'required|max:255',
            'genre' => 'required|max:255',
            'imdb_rating' => 'required|numeric',
            'lead_actor' => 'required|max:255'
        ]);

        $data = array(
            'show_name' => $request->show_name,
            'genre' => $request->genre,
            'imdb_rating' => $request->imdb_rating,
            'lead_actor' => $request->lead_actor
        );

        Blog::create($data);

        return redirect()->route('blog.index')->withFlashSuccess(__('Show is succesfully saved!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'show_name' => 'required|max:255',
            'genre' => 'required|max:255',
            'imdb_rating' => 'required|numeric',
            'lead_actor' => 'required|max:255'
        ]);

        $data = array(
            'show_name' => $request->show_name,
            'genre' => $request->genre,
            'imdb_rating' => $request->imdb_rating,
            'lead_actor' => $request->lead_actor
        );

        $blog->update($data);

        return redirect()->route('blog.index')->withFlashSuccess(__('Show is succesfully updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Show deleted successfully');
    }
}

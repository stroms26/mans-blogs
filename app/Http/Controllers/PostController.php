<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display   
 a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publication_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image_path'] = $imagePath;
        }

        Post::create($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.   

     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, 
 Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',

            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publication_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::delete($post->image_path);
            }

            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image_path'] = $imagePath;
        }

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)

    {
        if ($post->image_path) {
            Storage::delete($post->image_path);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
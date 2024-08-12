<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $filter = $request->query('filter', 'all'); // Default to 'all' if no filter is provided

    if ($filter === 'active') {
        $posts = Post::where('status', 1)->get(); // Fetch only active posts
    } elseif ($filter === 'inactive') {
        $posts = Post::where('status', 0)->get(); // Fetch only inactive posts
    } else {
        $posts = Post::all(); // Fetch all posts
    }

    return view('posts.index', compact('posts', 'filter'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'publication_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image_path'] = str_replace('public/', '', $imagePath); 
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
public function update(Request $request, Post $post)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        'publication_date' => 'required|date',
        'status' => 'required|boolean',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($post->image_path && Storage::exists('public/' . $post->image_path)) {
            Storage::delete('public/' . $post->image_path);
        }

        // Store the new image and get the path
        $imagePath = $request->file('image')->store('public/images');
        $validated['image_path'] = str_replace('public/', '', $imagePath);
    }

    // Update the post with validated data
    $post->update($validated);

    return redirect()->route('posts.show', $post)->with('status', 'Post updated successfully!');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // ← IMPORT OBLIGATOIRE

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::all());
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        $post->update($request->all());
        return response()->json($post);
    }

    public function destroy($id)
    {
        $deleted = Post::destroy($id);
        if ($deleted) {
            return response()->json(['message' => 'Post deleted successfully']);
        }
        return response()->json(['message' => 'Post not found'], 404);
    }
}

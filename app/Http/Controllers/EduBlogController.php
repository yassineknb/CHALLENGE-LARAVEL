<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EdublogPost;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class EduBlogController extends Controller
{
    public function getUsers()
    {
        $users = User::with(['profile', 'posts.tags', 'posts.comments'])->get();
        return response()->json($users);
    }

    
    public function getPosts()
    {
        $posts = EdublogPost::with(['tags', 'comments'])->get();
        return response()->json($posts);
    }

    public function attachTag(Request $request, $id)
    {
        $request->validate([
            'tag_id' => 'required|exists:tags,id',
        ]);

        $post = EdublogPost::findOrFail($id);
        $post->tags()->attach($request->tag_id);

        return response()->json([
            'message' => 'Tag attached successfully',
            'post_id' => $post->id,
            'tag_id' => $request->tag_id
        ]);
    }

    
    public function addComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $post = EdublogPost::findOrFail($id);

        $comment = $post->comments()->create([
            'content' => $request->content
        ]);

        return response()->json([
            'message' => 'Comment added successfully',
            'comment' => $comment
        ]);
    }
}

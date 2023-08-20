<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function deletePost(Post $post) {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }
        return redirect('/');
    }

    
    public function showEditScreen(Post $post) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        return view('edit-post', ['post' => $post]);
    }
    
    public function createPost(Request $request) {
        $incomingFields = $request->validate([
            'dname' => 'required',
            'ddetail' => 'required',
            'dtime' => 'required'
        ]);

        $incomingFields['dname'] = strip_tags($incomingFields['dname']);
        $incomingFields['ddetail'] = strip_tags($incomingFields['ddetail']);
        $incomingFields['dtime'] = strip_tags($incomingFields['dtime']);
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/');
    }


    public function actuallyEdit(Post $post, Request $request) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'dname' => 'required',
            'ddetail' => 'required',
            'dtime' => 'required'
        ]);

        $incomingFields['dname'] = strip_tags($incomingFields['dname']);
        $incomingFields['ddetail'] = strip_tags($incomingFields['ddetail']);
        $incomingFields['dtime'] = strip_tags($incomingFields['dtime']);
        $post->update($incomingFields);
        return redirect('/');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class adminController extends Controller
{
    public function getIndex()
    {
         $posts = Post::orderBy('created_at', 'DESC')->take(3)->get();
         $postsCount = Post::all();
         // fetch and paginate
         return view('admin.index', compact('posts', 'postsCount'));
    }


}

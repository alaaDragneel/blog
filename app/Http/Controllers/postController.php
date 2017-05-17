<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Category;

class postController extends Controller
{
    public function getBlogIndex()
    {
         $posts = Post::orderBy('created_at', 'DESC')->paginate(3);
         foreach($posts as $post){
              $post->body = $this->shortenText($post->body, 20);
         }
         // fetch and paginate
         return view('frontend.blog.index', compact('posts'));
    }

    public function getSingleBlogIndex($post_id, $end = 'frontend')
    {
         $post = Post::find($post_id);
         if(!$post){
              return redirect()->route('blog.index')->with(['fail' => 'Post Doesn\'t Exist']);
         }

         return view($end . '.blog.single', compact('post'));
    }

    public function postAddPost(Request $request)
    {
         $this->validate($request, [
              'title' => 'required',
              'author' => 'required',
              'body' => 'required'
         ]);

         $post = new Post();
         $post->title = $request->title;
         $post->author = $request->author;
         $post->body = $request->body;
         $post->save();

         return redirect()->route('admin.index')->with(['success' => 'Post Successfully created']);

    }

    public function getPosts()
    {
         $posts = Post::orderBy('created_at', 'DESC')->paginate(3);
         $postsCount = Post::all();

         return view('admin.blog.index', compact('posts', 'postsCount'));
    }

    public function getUpdatePost($post_id)
    {
         $post = Post::find($post_id);
         $categories = Category::all();
         $post_categories = $post->categories;
         $post_categories_id = array();
         $i = 0;
         foreach($post_categories as $post_category){
              $post_categories_id[$i] = $post_category->id;
              $i++;
         }
         if(!$post){
              return redirect()->route('admin.index')->with(['fail' => 'Post Doesn\'t Exist']);
         }
         return view('admin.blog.edit', compact('post', 'categories', 'post_categories', 'post_categories_id'));
    }

    public function postUpdatePost(Request $request)
    {
         $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'body' => 'required'
        ]);
        $post = Post::find($request->post_id);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->body = $request->body;
        $post->update();

        return redirect()->back()->with(['success' => 'the post Successfully updated']);
    }

    public function getDeletePost($post_id)
    {
         $post = Post::find($post_id);
         if(!$post){
              return redirect()->route('admin.index')->with(['fail' => 'Post Doesn\'t Exist']);
         }
         $post->delete();
         return redirect()->route('admin.index')->with(['success' => 'Post Successfully deleted']);
    }

    private function shortenText($text, $word_count)
    {
         if (str_word_count($text, 0) > $word_count) {
              $words = str_word_count($text, 2);
              $pos = array_keys($words);
              $text = substr($text, 0, $pos[$word_count]) . '...';

              return $text;
         }
    }


}

<?php

namespace App\Http\Controllers;

 
use App\Tag;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        if($request->input('tags')){

            $tag = Tag::with('posts')->whereName($request->input('tags'))->firstOrFail();

            $posts = $tag->posts;

        }else{

            $posts = Post::with('tags')->published()->latest('published_at')->get();   
        }

        return view('blog.index')->with(compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return Response
     */
    public function show($slug)
    {
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();


        return view('blog.single')->with(compact('post'));
    }
}

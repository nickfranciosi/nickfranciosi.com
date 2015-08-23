<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;

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

            $posts = Post::with('tags')->latest('published_at')->published()->get();   
        }

        

        return view('blog.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $alltags = Tag::lists('name', 'id');

        return view('blog.create', compact('alltags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBlogPostRequest  $request
     * @return Response
     */
    public function store(StoreBlogPostRequest $request)
    {
        $post = Post::create($request->all());

        $tags = $request->input('tag_list')? $request->input('tag_list') : [];

        $post->tags()->sync($this->syncUpTags($tags));

        return redirect('/blog');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::with('tags')->findOrFail($id);
        $alltags = Tag::lists('name', 'id');

        return view('blog.edit')->with(compact('post', 'alltags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->update($request->all());

        $tags = $request->input('tag_list')? $request->input('tag_list') : [];

        $post->tags()->sync($this->syncUpTags($tags));
    

        return redirect('/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('/blog');

    }

    private function syncUpTags($tags)
    {
        $currentTags = array_filter($tags, 'is_numeric');
        $newTags = array_diff($tags, $currentTags);

        foreach ($newTags as $newTag) {
            if( $tag = Tag::create(['name' => $newTag]))
                $currentTags[] = $tag->id;
        }

        return $currentTags;
    }
}

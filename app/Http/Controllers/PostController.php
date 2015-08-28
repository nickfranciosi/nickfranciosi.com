<?php

namespace App\Http\Controllers;


use App\Tag;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPostRequest;


class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::with('tags')->published()->latest('published_at')->get();   
        return view('admin.post.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $alltags = Tag::lists('name', 'id');

        return view('admin.post.create', compact('alltags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
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
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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

        return view('admin.post.edit')->with(compact('post', 'alltags'));
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

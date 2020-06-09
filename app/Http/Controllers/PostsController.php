<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $request->image->store('images','public')
        ]);
        
        return redirect(Route('posts.index'))->with([
                                                        'success' => 'Post Created Successfuly'
                                                    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content
        ]);
        
        return redirect(Route('posts.index'))->with([
                                                        'success' => 'Post Updated Successfuly'
                                                    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id' , $id)->first();
        if($post->trashed())
        {
            Storage::disk('public')->delete($post->image);
            $post->forceDelete();
            return redirect(Route('posts.trashed'))->with([
                                                              'success' => 'Post Deleted Successfuly'
                                                          ]);

        }else{

            $post->delete();
            return redirect(Route('posts.index'))->with([
                                                            'success' => 'Post Trashed Successfuly'
                                                        ]);
        }
        
    }
    public function trashedpost()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.trashedpost' , compact('posts'));
    }
    public function postrestore($id)
    {
        Post::withTrashed()->where('id' , $id)->restore();
        return redirect(Route('posts.index'))->with([
                                                        'success' => 'Post Restored Successfuly'
                                                    ]);
    }
}

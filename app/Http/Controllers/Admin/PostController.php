<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostStoreRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create the controller instance.
     */
    // public function __construct()
    // {
    //     $this->authorizeResource(Post::class, 'post');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // gets data from database
        // associative array key = posts , value = data
        // $data['posts'] = Post::get();

        $posts = Post::query()
            ->where('status', 1)
            ->where('expires_at', '>', now())
            ->get();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // this was the simple way of defining some users
        // $users = ['roufeail', 'marina', 'micheal', 'andrew'];
        // to get a specific columns from the table
        $users = User::select(['id', 'name'])->get();

        // key users value = data from database
        return view('admin.post.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->validated());

        if ($request->file('image')) {
            $post->addMediaFromRequest('image')->toMediaCollection('image');
        }
        if ($request->file('attachment')) {
            $post->addMediaFromRequest('attachment')->toMediaCollection('attachment');
        }

        // $post = new Post();
        // $post->title = $request->title;
        // $post->body = $request->body;

        // $post->save();

        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('users')->find($id);
        $imageUrl = $post->getFirstMediaUrl('image');
        $attachment = $post->getFirstMediaUrl('attachment');
        return view('admin.post.show', compact('post', 'imageUrl', 'attachment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::with('users')->find($id);
        $imageUrl = $post->getFirstMediaUrl('image');
        $attachment = $post->getFirstMediaUrl('attachment');
        $users = User::select(['id', 'name'])->whereNot('id', $post->user_id)->get();
        return view('admin.post.edit', compact('post', 'imageUrl', 'attachment', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostStoreRequest $request, Post $post)
    {
        $post->update($request->validated());

        if ($request->file('image')) {
            $post->clearMediaCollection('image');
            $post->addMediaFromRequest('image')->toMediaCollection('image');
        }
        if ($request->file('attachment')) {
            $post->clearMediaCollection('attachment');
            $post->addMediaFromRequest('attachment')->toMediaCollection('attachment');
        }
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post) {
            $post->delete();
            $post->clearMediaCollection('image');
            $post->clearMediaCollection('attachment');
        }
        return redirect()->route('admin.post.index');
    }
}

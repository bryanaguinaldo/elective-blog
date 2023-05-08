<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $validated["user_id"] = Auth::user()->id;

        if ($request->photo != null) {
            $file = $validated["photo"];

            $filename = now()->timestamp . ".jpg";
            $path = $file->storeAs('public/static/uploaded', $filename);
            $validated["photo"] = $filename;
        }

        Post::create($validated);

        return response()->json([
            'title' => 'Posted successfully.',
            'message' => 'Posted successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('user')->where('id', $id)->first();
        return view('view-post')->with(['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $post = Post::with('user')->where('id', $request->post_id)->first();
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, string $id)
    {
        $post = Post::with('user')->where('id', $id)->first();
        $validated = $request->validated();
        $validated["user_id"] = Auth::user()->id;

        if ($request->photo != null) {
            $file = $validated["photo"];

            $filename = now()->timestamp . ".jpg";
            $path = $file->storeAs('public/static/uploaded', $filename);
            $validated["photo"] = $filename;
        } else {
            $validated["photo"] = $post->photo;
        }
        if (Auth::user()->id == $post->user->id) {

            $post->update($validated);

            return response()->json([
                'title' => 'Post updated successfully.',
                'message' => 'Post updated successfully.'
            ]);
        }
        return response()->json([
            'message' => "Did you really think you can edit some else's post? Lmao nice try"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $post = Post::with('user')->where('id', $request->post_id)->first();
        if (Auth::user()->id == $post->user->id) {
            $post->destroy($request->post_id);
        }
        return redirect('/u/' . Auth::user()->username);
    }
}

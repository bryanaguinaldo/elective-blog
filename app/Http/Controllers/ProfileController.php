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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::with('user')->where('id', $id)->first();
        if (Auth::user()->id == $post->user->id) {
            $post->destroy($id);
        }
        return redirect('/u/' . Auth::user()->username);
    }
}

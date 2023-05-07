<?php

namespace App\Http\Controllers;

use App\Models\Thumbnail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ThumbnailController extends Controller
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
    public function store(Request $request)
    {
        if (request()->ajax()) {
            $file = $request->file('image');

            $filename = now()->timestamp . ".jpg";
            $path = $file->storeAs('public/static/temp_thumbnails', $filename);

            Thumbnail::create([
                'user_id' => Auth::user()->id,
                'media' => $filename
            ]);

            $preview = Thumbnail::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();

            return response()->json([
                'status' => 1,
                'message' => 'Uploaded successfully.',
                'location' => asset('/storage/static/temp_thumbnails') . '/' . $preview->media,
            ]);
        }
        return abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(Thumbnail $thumbnail)
    {
        if (request()->ajax()) {
            $uploaded = Thumbnail::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
            return response()->json([
                'status' => 1,
                'message' => 'Image retrieved successfully.',
                'location' => asset('/storage/static/temp_thumbnails') . '/' . $uploaded->media
            ]);
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thumbnail $thumbnail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thumbnail $thumbnail)
    {
        if (request()->ajax()) {
            $file = $request->file('image');

            $filename = now()->timestamp . ".jpg";
            $path = $file->storeAs('public/static/temp_thumbnails', $filename);

            Thumbnail::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first()->update([
                'media' => $filename
            ]);

            $uploaded = Thumbnail::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();

            return response()->json([
                'status' => 1,
                'message' => 'Image retrieved successfully.',
                'location' => asset('/storage/static/temp_thumbnails') . '/' . $uploaded[0]->media
            ]);
        }
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thumbnail $thumbnail)
    {
        if (request()->ajax()) {
            $images = Thumbnail::where('user_id', Auth::user()->id)->get();
            if (!empty($images)) {
                foreach ($images as $image) {
                    Storage::delete(['/public/static/temp_thumbnails/' . $image->media]);
                }
            }
            Thumbnail::where('user_id', Auth::user()->id)->delete();

            return response()->json([
                'status' => 0,
                'message' => 'Operation cancelled.',
            ]);
        }
        return abort(404);
    }
}

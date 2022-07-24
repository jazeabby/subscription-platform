<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        try {
            $post = Post::create($request->validated());
            if( $post->id) {
                return response()->json(['status' => 'success', 'message'=> 'Post has been created successfully']);
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
        return response()->json(['status' => 'failure', 'message' => 'Some Error Occured. please try again later'], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        return $post->destroy();
    }
}

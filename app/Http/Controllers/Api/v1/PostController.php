<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // INDEX
    public function index()
    {
        // GET ALL
        $posts = Post::latest()->paginate(5);

        // RETURN COLLECTION AS A RESOURCE
        return new PostResource(true, 'List Data Posts', $posts);
    }

    // STORE / CREATE
    public function store(Request $request)
    {
        // DEFINE VALIDATION
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required',
            'content'   => 'required',
        ]);

        // CHECK IF VALIDATION FALSE
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // UPLOAD IMAGE
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        // CREATE POST
        $post = Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content,
        ]);

        // RETURN COLLECTION AS A RESOURCE
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $post);
    }

    // SHOW:id
    public function show($id)
    {
        // FIND BY ID
        $post = Post::find($id);

        // RETURN COLLECTION AS A RESOURCE
        return new PostResource(true, 'Detail Data Post!', $post);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        // DEFINE VALIDATION
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'content'   => 'required',
        ]);

        // CHECK IF VALIDATION FALSE
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // FIND BY ID
        $post = Post::find($id);

        // CHECK IF IMAGE
        if ($request->hasFile('image')) {

            // UPLOAD IMAGE
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            // DELETE OLD IMAGE
            Storage::delete('public/posts/' . basename($post->image));

            // UPDATE IMAGE IN DATABASE
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        } else {

            // UPDATE WITHOUT IMAGE
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        }

        // RETURN COLLECTION AS A RESOURCE
        return new PostResource(true, 'Data Post Berhasil Diubah!', $post);
    }

    // DELETE
    public function destroy($id)
    {
        // FIND BY ID
        $post = Post::find($id);

        // DELETE OLD IMAGE
        Storage::delete('public/posts/'.basename($post->image));

        // DELETE DATA
        $post->delete();

        // RETURN COLLECTION AS A RESOURCE
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }

}

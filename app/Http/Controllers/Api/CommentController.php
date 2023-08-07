<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\ApiFormater;

class CommentController extends Controller
{
    public function index()
    {
        //get all posts
        $comment = Comment::latest()->paginate(5);

        //return collection of posts as a resource
        return new ApiFormater(true, 'List Data Comment', $comment);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'names'             => 'required',
            'comment'           => 'required',
            'news_id'           => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $comment = Comment::create([
            'names'         => $request->names,
            'comment'       => $request->comment,
            'news_id'       => $request->news_id
        ]);

        //return response
        return new ApiFormater(true, 'Data Comment Berhasil Ditambahkan!', $comment);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\ApiFormater;

class NewsController extends Controller
{
    public function index()
    {
        //get all posts
        $news = News::latest()->paginate(5);

        //return collection of posts as a resource
        return new ApiFormater(true, 'List Data News', $news);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'category_id'       => 'required',
            'news_content'      => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $news = News::create([
            'category_id'     => $request->category_id,
            'news_content'    => $request->news_content,
        ]);

        //return response
        return new ApiFormater(true, 'Data News Berhasil Ditambahkan!', $news);
    }

    public function show($id)
    {
        //find post by ID
        $news = News::find($id);

        //return single post as a resource
        return new ApiFormater(true, 'Detail News Post!', $news);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'category_id'       => 'required',
            'news_content'      => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find post by ID
        $news = News::find($id);

        $news->update([
            'category_id'     => $request->category_id,
            'news_content'    => $request->news_content,
        ]);

        //return response
        return new ApiFormater(true, 'Data News Berhasil Diubah!', $news);
    }

    public function destroy($id)
    {

        //find post by ID
        $news = News::find($id);
        
        //delete post
        $news->delete();

        //return response
        return new ApiFormater(true, 'Data News Berhasil Dihapus!', null);
    }
}

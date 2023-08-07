<?php

namespace App\Http\Controllers\Api;

use App\Models\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\ApiFormater;

class CustomPageController extends Controller
{
    public function index()
    {
        //get all posts
        $pages = Pages::latest()->paginate(5);

        //return collection of posts as a resource
        return new ApiFormater(true, 'List Data Pages', $pages);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'custom_url'        => 'required',
            'page_content'      => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $pages = Pages::create([
            'custom_url'        => $request->custom_url,
            'page_content'      => $request->page_content,
        ]);

        //return response
        return new ApiFormater(true, 'Data Pages Berhasil Ditambahkan!', $pages);
    }

    public function show($id)
    {
        //find post by ID
        $pages = Pages::find($id);

        //return single post as a resource
        return new ApiFormater(true, 'Detail News Pages!', $pages);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'custom_url'        => 'required',
            'page_content'      => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find post by ID
        $pages = Pages::find($id);

        $pages->update([
            'custom_url'        => $request->custom_url,
            'page_content'      => $request->page_content,
        ]);

        //return response
        return new ApiFormater(true, 'Data Pages Berhasil Diubah!', $pages);
    }

    public function destroy($id)
    {

        //find post by ID
        $pages = Pages::find($id);
        
        //delete post
        $pages->delete();

        //return response
        return new ApiFormater(true, 'Data Pages Berhasil Dihapus!', null);
    }
}

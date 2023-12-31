<?php

namespace App\Http\Controllers\Api;

use App\Models\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\ApiFormater;

class CategoriesController extends Controller
{
    public function index()
    {
        //get all posts
        $cats = Categories::latest()->paginate(5);

        //return collection of posts as a resource
        return new ApiFormater(true, 'List Data Category', $cats);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'category_name'     => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $cats = Categories::create([
            'category_name'     => $request->category_name,
        ]);

        //return response
        return new ApiFormater(true, 'Data Category Berhasil Ditambahkan!', $cats);
    }

    public function show($id)
    {
        //find post by ID
        $cats = Categories::find($id);

        //return single post as a resource
        return new ApiFormater(true, 'Detail Data Category!', $cats);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'category_name'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find post by ID
        $cats = Categories::find($id);

        $cats->update([
            'category_name'     => $request->category_name,
        ]);

        //return response
        return new ApiFormater(true, 'Data Category Berhasil Diubah!', $cats);
    }

    public function destroy($id)
    {

        //find post by ID
        $cats = Categories::find($id);
        
        //delete post
        $cats->delete();

        //return response
        return new ApiFormater(true, 'Data Category Berhasil Dihapus!', null);
    }
}

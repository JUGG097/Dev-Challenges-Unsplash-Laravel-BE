<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function fetch(Request $req)
    {
        $images = Image::orderBy('created_at', 'desc')->get(['_id', 'img_url', 'label']);
        return response()->json(['success' => true, 'data' => $images]);
    }

    public function store(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'img_url' => 'required|url',
            'label' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 400);
        }

        $image = Image::create(['img_url' => $req->img_url, 'label' => $req->label]);

        return response()->json(['success' => true, 'data' => $image]);
    }

    public function destroy($imageId)
    {
        $flight = Image::findorFail($imageId);

        $flight->delete();

        return response()->json(['success' => true, 'data' => []]);
    }
}

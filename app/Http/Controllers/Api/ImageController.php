<?php

namespace App\Http\Controllers\Api;

use App\Models\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|numeric',
            'photo' => 'required|max:5000|image'
        ]);
       $image_url = Storage::disk('public_path')
           ->putFile('image', $request->photo);

       $image = new Images();
       $image->category_id = $request->category_id;
       $image->photo = $request->photo;
       $image->save();

       return redirect('image/index')->with('success', '提交成功！');

    }
}

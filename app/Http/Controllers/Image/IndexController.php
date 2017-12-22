<?php

namespace App\Http\Controllers\Image;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('image.index', compact('categories'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::all();
        return view('index', ['tags'->$tags]);
    }
}
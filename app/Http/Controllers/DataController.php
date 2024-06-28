<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){

        $post = new PostCollection(Post::all());
        return $post;
    }
}

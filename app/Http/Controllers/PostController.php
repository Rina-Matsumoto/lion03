<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */

class PostController extends Controller
{
   public function index(Post $post)
    {
    return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
}

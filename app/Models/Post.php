<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable = [
        'title',
        'body',
        'category_id'
    ];
    
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    } 

    public function getPaginateByLimit(int $limit_count = 3)
    {
       return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
?>
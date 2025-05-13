<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'image',
        'category',
        'content',
    ];
    public function blogComments(){
        return $this->hasMany(BlogComment::class, 'blog_id', "id");
    }
    public function getSlugAttribute()
    {
        // Generate a slug from the title if one doesn't already exist
        return Str::slug($this->title);
    }
}

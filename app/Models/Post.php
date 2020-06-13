<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title','description','content','image','category_id','tag_id','user_id'
    ];
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function user()
    {
        return $this->blongsTo('App\User');
    }

    public function hasTag($tagid)
    {

        return in_array($tagid , $this->tags->pluck('id')->toArray());
    }
}

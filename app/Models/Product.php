<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'genre_id',   
        'status',   
    ];
    public function setGenreIdAttribute($value){
        if($value == 0){
            $this->attributes['genre_id'] = null;
        }else {
            $this->attributes['genre_id'] = $value;
        }
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function sizes(){
        return $this->belongsToMany(Size::class);
    }
    public function picture(){
        return $this->hasOne(Picture::class);
    }
    //scope d'affichage pour gerer le status d'un article 
    public function scopePublished($query){
        return $query->where('status', 'published');
    }
}

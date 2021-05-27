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
        'category_id',   
        'status',   
    ];
    public function setCategoryIdAttribute($value){
        if($value == 0){
            $this->attributes['category_id'] = null;
        }else {
            $this->attributes['category_id'] = $value;
        }
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function sizes(){
        return $this->belongsToMany(Size::class)->select(['size_id']);
    }
    public function getSizesIdsAttribute()
    {
        return $this->sizes->pluck('pivot.size_id');
    }
    public function picture(){
        return $this->hasOne(Picture::class);
    }
    
    public function scopePublished($query){
        return $query->where('status', 'published');
    }
    
    public function scopeDiscounted($query){
        return $query->where('discounted', 1);
    }
}

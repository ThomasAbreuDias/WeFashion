<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "description",
        "price",
        "reference",
        "category_id",
        "status",
        'discounted',
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
        $id = $this->sizes->pluck('pivot.size_id')[0];
        return $id;
    }
    public function getSizesArray() {
        $sizes = collect(Size::find($this->getSizesIdsAttribute()))->toArray();
        return $sizes;
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

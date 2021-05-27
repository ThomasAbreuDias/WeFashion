<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function products(){
        return $this->belongsToMany(Product::class)->select(['product_id']);
    }
    public function getSizesArray() {
        $sizes_array = collect(\DB::select('select * from sizes where id = :id', ['id' => $this->id])[0]);
        return $sizes_array->makeVisible('attribute')->toArray();
    }
}

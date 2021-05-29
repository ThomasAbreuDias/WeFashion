<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products() {
        return $this->hasMany(Product::class);
    }
    /**
     * @return string 
     */
    public function getFrName() {
        return $this->$fr[$this->id];
    }
    /**
     * Simple Traduction function
     * @return string 
     */
    static function frName($id) {
        $fr = [
            1 => 'hommes',
            2 => 'femmes',
        ];
        return $fr[$id];
    }
}

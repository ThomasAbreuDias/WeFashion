<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Size extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'xs',
        's',
        'm',
        'l',
        'xl',
    ];
    public function products(){
        return $this->belongsToMany(Product::class)->select(['product_id']);
    }

    /**
     * Method to quickly get sizes as an array
     *
     * @return Array
     */
    public function getSizesArray() {
        $sizes = $this->find($this->size_id)->toArray();
        return $sizes;
    }

    /**
     * To string method
     *
     * @return String
     */
    public function __toString(){

        $sizes = [];
        foreach ($this->getSizesArray() as $size => $has) {
            if($size != 'id' && $has)
                $sizes[] = $size;
        }
        return collect($sizes)->implode(',');
    }

    /**
     * Static method to get the columns name of the size table
     *
     * @return Array
     */
    static public function getTableColumns($without_id = true) {
        $size_names = DB::getSchemaBuilder()->getColumnListing('sizes');
        if($without_id)
            array_shift($size_names);

        return $size_names;
    }

    /**
     * Static method to create an array which fit with the db structure
     *
     * @return Array
     */
    static public function fromFormToDb($sizes) {
        $db_sizes = [];
        $dbt = Size::getTableColumns();
        foreach ($dbt as $size) {
            $db_sizes[$size] = in_array($size, $sizes);
        }

        return $db_sizes;
    }
}

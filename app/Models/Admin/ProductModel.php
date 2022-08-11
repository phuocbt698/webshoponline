<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_product';
    protected $fillable = ['id', 'id_category', 'name', 'description',
                            'path_image', 'price', 'quantity'];
    protected $primaryKey = 'id';

    public function category(){
        return $this->belongsTo(CategoryModel::class, 'id_category', 'id');
    }
}

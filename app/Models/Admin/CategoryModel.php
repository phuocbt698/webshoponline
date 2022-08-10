<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_category';
    protected $fillable = ['id', 'name'];
    protected $primaryKey = 'id';
}

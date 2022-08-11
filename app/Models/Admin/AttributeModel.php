<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_attribute';
    protected $fillable = ['id', 'name'];
    protected $primaryKey = 'id';
}

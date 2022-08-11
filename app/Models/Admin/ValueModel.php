<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_value_attribute';
    protected $fillable = ['id', 'id_attribute', 'value'];
    protected $primaryKey = 'id';
    public function attribute(){
        return $this->belongsTo(AttributeModel::class, 'id_attribute', 'id');
    }
}

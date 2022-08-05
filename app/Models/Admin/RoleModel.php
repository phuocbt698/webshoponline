<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_role';
    protected $fillable = ['id', 'name'];
    protected $primaryKey = 'id';
}

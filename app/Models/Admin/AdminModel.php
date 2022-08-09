<?php

namespace App\Models\Admin;

use App\Models\AddressModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_admin';
    protected $fillable = ['id', 'id_role', 'name', 'email', 'password', 'phone',
                            'path_image', 'id_city', 'id_district', 'id_ward'];
    protected $primaryKey = 'id';

    public function role(){
        return $this->belongsTo(RoleModel::class, 'id_role', 'id');
    }

    public function city(){
        return $this->belongsTo(AddressModel::class, 'id_city', 'id');
    }
}

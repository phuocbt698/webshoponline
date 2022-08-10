<?php

namespace App\Models\Admin;

use App\Models\AddressModel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminModel extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'admin';
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

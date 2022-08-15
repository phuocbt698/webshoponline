<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_slide';
    protected $fillable = ['id', 'title', 'content', 'path_image', 'time_start', 'time_end'];
    protected $primaryKey = 'id';
}

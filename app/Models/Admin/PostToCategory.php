<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostToCategory extends Model
{
    use HasFactory;
    protected $table = 'post_to_category';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    //protected $dateFormat = 'U';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}

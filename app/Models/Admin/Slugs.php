<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slugs extends Model
{
    use HasFactory;
    protected $table = 'slugs';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    //protected $dateFormat = 'U';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}

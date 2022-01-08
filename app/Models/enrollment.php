<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class enrollment extends Model
{
    protected $table = 'enrollment';
    protected $primaryKey = 'id_enrollment';
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class work extends Model
{
    protected $table = 'works';
    protected $primaryKey = 'id_work';
    public $timestamps = false;
}

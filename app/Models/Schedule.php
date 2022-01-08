<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $primaryKey = 'id_schedule';
    protected $table = 'schedule';
    public $timestamps = false;
}

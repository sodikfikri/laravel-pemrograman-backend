<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    const NOT_DELETED = NULL;
    const DELETED = !NULL;

    protected $connection = 'mysql';
    protected $table = 'students';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    use HasFactory;
    protected $table = "ministry";

    public $timestemps = false;

    public $primaryKey = "idMinistry";
}

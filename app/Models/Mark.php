<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $table = 'mark';

    public $timestamps = false;

    public $primaryKey = ['idStudent', 'idSubject'];

    protected $fillable = ['idStudent', 'idSubject', 'final1', 'skill1'];

    // public function getFullName2Attribute()
    // {
    //     return $this->lastName . " " . $this->firstName;
    // }
}

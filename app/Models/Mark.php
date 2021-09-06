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

    protected $fillable = ['idStudent', 'idSubject', 'final1', 'skill1', 'final2', 'skill2'];

    public $incrementing = false;

    // public function getFullName2Attribute()
    // {
    //     return $this->lastName . " " . $this->firstName;
    // }
}

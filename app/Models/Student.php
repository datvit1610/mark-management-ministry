<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "student";

    protected $fillable =
    ['lastName', 'firstName', 'email', 'passWord', 'DoB', 'gender', 'phone', 'idGrade'];
    public $timestamps = false;

    public $primaryKey = "idStudent";

    //Tạo thuộc tính 
    public function getGenderNameAttribute()
    {
        if ($this->gender == 0) { #giới tính == 0
            return "Nữ";
        } else {
            return  "Nam";
        }
    }

    public function getFullNameAttribute()
    {
        return $this->lastName . " " . $this->firstName;
    }
}

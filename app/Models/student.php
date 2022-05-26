<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "students";
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'gender',
        'fav_sport',
        'country',
        'state',
        'address',
        'image',
        'hobby'

    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    // public function getDobAttribute($value)
    // {
    //     return date("d/m/Y", strtotime($value));
    // }
}

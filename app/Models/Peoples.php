<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peoples extends Model
{
    use HasFactory;
    protected $table = "peoples";
    protected $primaryKey = "p_id";
 
}   

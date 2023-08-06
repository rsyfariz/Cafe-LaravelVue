<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "users";
    protected $primaryKey = "id_user";
    protected $fillable = ['nama_user', 'username', 'role', 'password']; 
}



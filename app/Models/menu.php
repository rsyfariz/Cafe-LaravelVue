<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "menus";
    protected $primaryKey = "id_menu";
    protected $fillable = ['nama_menu', 'type', 'deskripsi', 'gambar', 'harga'];
}

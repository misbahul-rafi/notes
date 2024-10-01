<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
      'title', // Tambahkan properti 'title' ke array fillable
      'content',  // Properti lain yang juga dapat di-mass assign
  ];
}

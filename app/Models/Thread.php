<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model{
    use HasFactory;
    protected $fillable = ['thread_title', 'thread_device_id', 'note'];
    protected $table = 'threads';

}

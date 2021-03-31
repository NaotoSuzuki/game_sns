<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'releasedate', 'device', 'gametitle', 'note'
    ];

    static $device = [
        '機種'
    ];

    static $gametitle = [
        'ゲームタイトル'
    ];

}

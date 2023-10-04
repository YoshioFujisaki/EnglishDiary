<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    protected $table = 'diarys';

    protected $fillable = [
        'sentence',
        'sentence_en',
    ];

    protected $guarded = [
        'created_at',
    ];
}

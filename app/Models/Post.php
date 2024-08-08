<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'image_path', 'publication_date', 'status'
    ];

    protected $casts = [
    'publication_date' => 'date',
];
}
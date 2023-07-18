<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'directory_id',
        'video',
    ];

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}

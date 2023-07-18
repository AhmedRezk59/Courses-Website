<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'is_read','lesson_id', 'is_instructor', 'course_id', 'parent_id', 'body'];
    public function user()
    {
        return $this->is_instructor == true ? $this->belongsTo(instructor::class ,'user_id','id') : $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Comment::class);
    }
    public function getLikesAttribute()
    {
        return DB::table('comment_user')->where('comment_id', $this->id)->count();
    }
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

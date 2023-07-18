<?php

namespace App\Models;

use App\Notifications\SendUserResetLink;
use App\Notifications\SendUserVerificationEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'currency_id',
        'phone_number',
        'avatar',
        'password',
        'who_can_view',
        'inquiry_mailable',
        'comments_mailable',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $append = [
        'name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sendEmailVerificationNotification()
    {
        $this->notify(new SendUserVerificationEmail($this));
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SendUserResetLink($token));
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withPivot(['last_completed_lesson', 'is_complated', 'created_at', 'updated_at']);
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function own($id)
    {
        return DB::table('course_user')->where('user_id', $this->id)->where('course_id', $id)->count() > 0;
    }
}

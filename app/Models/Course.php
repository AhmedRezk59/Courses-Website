<?php

namespace App\Models;

use App\Enums\CourseStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $append = [
        'final_price',
        'date_from_to',
        'continous_status'
    ];
    protected $fillable = [
        'name',
        'department_id',
        'trailer',
        'thumbinal',
        'status',
        'description',
        'references',
        'is_paid',
        'price',
        'discount_price',
        'end_discount_date',
        'start_date',
        'end_date',
        'target_audience',
        'curriculum',
        'outputs',
        'instructor_id',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->instructor_id = auth()->guard('instructor')->user()->id;
        });
    }

    protected $casts = [
        'status' => CourseStatus::class,
    ];

    public function isRejected()
    {
        return $this->status->name === 'REJECTED';
    }

    public function isAccepted()
    {
        return $this->status->name === 'ACCEPTED';
    }

    public function isPending()
    {
        return $this->status->name === 'PENDING';
    }

    public function getStatusName()
    {

        return $this->status->name;
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function directories()
    {
        return $this->hasMany(Directory::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Directory::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function getFinalPriceAttribute()
    {
        $price = 0;
        if ($this->is_paid == false) {
            return $price;
        }

        if (isset($this->discount_price)) {
            $discount_date = Carbon::createFromFormat('Y-m-d', $this->end_discount_date);
            $now = Carbon::now();
            if ($discount_date->gte($now)) {
                $price =  $this->discount_price;
            } else {
                $price = $this->price;
            }
        } else {
            $price = $this->price;
        }
        $currency = auth()->user()->currency->code ?? config('services.payments.default-currency');
        $currency_rate = Currency::where('code', $currency)->first()->rate;
        return $price * $currency_rate;
    }
    public function getDateFromToAttribute()
    {
        $now = Carbon::now();
        $from = Carbon::createFromFormat('Y-m-d', $this->start_date);
        $to = Carbon::createFromFormat('Y-m-d', $this->end_date);
        $str = 'من ' . $from->toDateString();
        if ($now->lt($this->end_date)) {
            $str .= ' إلى ' .  $to->toDateString();
            $diff = $to->diffInDays($from);
            $str .= " ( $diff أيام )";
        }

        return $str;
    }
    public function getContinousStatusAttribute()
    {
        $str = '';
        $now = Carbon::now();
        if ($now->gt($this->end_date)) {
            $str = 'مادة مؤرشفة';
        } elseif ($now->lt($this->start_date)) {
            $str = 'مادة مرتقبة';
        } elseif ($now->gte($this->start_date)) {
            $str = 'مادة مستمرة';
        }
        return $str;
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

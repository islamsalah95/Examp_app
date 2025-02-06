<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ExamSession;
use App\Models\Subscription;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'last_seen',
        'mobile',
        'country',
        'address',
        'status',
        'last_login',

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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function examSessions()
    {
        return $this->hasMany(ExamSession::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }


    public function totalAmountPaid()
    {
        $arrPrices = [];
        foreach ($this->subscriptions as $key => $subscription) {
            $arrPrices[] = $subscription->UserTotalAfterDiscount();
        }
        return array_sum($arrPrices);
    }

    public function totalExamSessionsStatus()
    {
        $arrTotalExamSessionsStatus = [
            'completed' => 0,
            'ongoing' => 0
        ];
        foreach ($this->examSessions as $key => $examSession) {
            if ($examSession->status == 'completed') {
                $arrTotalExamSessionsStatus['completed']++;
            } else {
                $arrTotalExamSessionsStatus['ongoing']++;
            }
        }
        return $arrTotalExamSessionsStatus;
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Only return specific fields for indexing
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
        ];
    }
}

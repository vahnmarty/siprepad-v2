<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\MagisProgram;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function parents()
    {
        return $this->hasMany(Parents::class);
    }

    public function health()
    {
        return $this->hasOne(Health::class);
    }

    public function emergency_contact()
    {
        return $this->hasOne(EmergencyContact::class);
    }

    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }

    public function magisProgram()
    {
        return $this->hasOne(MagisProgram::class);
    }

    public function coursePlacements()
    {
        return $this->hasMany(CoursePlacement::class);
    }

    public function getAvatar()
    {
        return "https://ui-avatars.com/api/?name=" . $this->name;
    }
}

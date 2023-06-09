<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function accommodation()
    {
        return $this->hasOne(Accommodation::class);
    }

    public function magisProgramItem()
    {
        return $this->hasOne(MagisProgramItem::class);
    }

    public function coursePlacement()
    {
        return $this->hasOne(CoursePlacement::class);
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

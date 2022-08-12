<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}

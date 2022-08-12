<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function getCreatedAtAttribute($date)
    {
        $date = Carbon::parse($date)->toDateTimeString();
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i');
    }

    public function getUpdatedAtAttribute($date)
    {
        $date = Carbon::parse($date)->toDateTimeString();
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i');
    }
}

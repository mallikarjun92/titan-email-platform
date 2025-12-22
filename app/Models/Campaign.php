<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject',
        'body',
        'status',
    ];

    /**
     * A campaign has many email logs.
     */
    public function emailLogs()
    {
        return $this->hasMany(EmailLog::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'website',
        'email',
        'phone',
        'source_url',
    ];

    /**
     * A lead can receive many emails.
     */
    public function emailLogs()
    {
        return $this->hasMany(EmailLog::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'daily_limit',
        'sent_today',
    ];

    /**
     * Emails sent using this account.
     */
    public function emailLogs()
    {
        return $this->hasMany(EmailLog::class);
    }

    /**
     * Reset daily count (future cron job).
     */
    public function resetDailyCount(): void
    {
        $this->update(['sent_today' => 0]);
    }
}
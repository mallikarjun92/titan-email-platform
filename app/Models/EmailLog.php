<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'lead_id',
        'email_account_id',
        'status',
        'sent_at',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    /**
     * Email belongs to a campaign.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * Email belongs to a lead.
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    /**
     * Email sent via an account.
     */
    public function emailAccount()
    {
        return $this->belongsTo(EmailAccount::class);
    }
}
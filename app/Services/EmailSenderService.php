<?php

// namespace App\Services;

// use App\Models\EmailLog;
// use App\Models\EmailAccount;
// use App\Services\AccountRotationService;
// // use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Mail;

// class EmailSenderService {

//     public function send($lead, $campaign)
//     {
//         $account = app(AccountRotationService::class)->pickAccount();

//         Mail::raw($campaign->body, function ($msg) use ($lead, $campaign) {
//             $msg->to($lead->email)
//                 ->subject($campaign->subject);
//         });

//         $account->increment('sent_today');
//     }

    
// }



namespace App\Services;

use App\Models\EmailLog;
use App\Models\Campaign;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Services\AccountRotationService;
use Illuminate\Support\Facades\Log;

class EmailSenderService
{
    protected AccountRotationService $rotationService;

    public function __construct(AccountRotationService $rotationService)
    {
        $this->rotationService = $rotationService;
    }

    public function sendCampaign(Campaign $campaign, $leads): void
    {
        foreach ($leads as $lead) {

            // Pick Outlook account (mocked)
            $account = $this->rotationService->pickAccount();

            if (!$account || !$lead->email) {
                continue;
            }

            if (!$account) {
                Log::warning('No available email accounts for campaign '.$campaign->id);
                continue;
            }


            // Mock email send
            Mail::raw($campaign->body, function ($message) use ($lead, $campaign) {
                $message->to($lead->email)
                        ->subject($campaign->subject);
            });

            // Increment send count
            $account->increment('sent_today');

            // Log email
            EmailLog::create([
                'campaign_id' => $campaign->id,
                'lead_id' => $lead->id,
                'email_account_id' => $account->id,
                'status' => 'sent',
                'sent_at' => now(),
            ]);
        }
    }
}
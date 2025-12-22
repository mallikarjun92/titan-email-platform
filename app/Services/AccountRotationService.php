<?php

// namespace App\Services;

// use App\Models\EmailAccount;

// class AccountRotationService {
//     public function pickAccount(): ?EmailAccount {
//         return EmailAccount::whereColumn('sent_today', '<', 'daily_limit')
//             ->orderBy('sent_today')
//             ->first();
//     }
// }


namespace App\Services;

use App\Models\EmailAccount;

class AccountRotationService
{
    public function pickAccount(): ?EmailAccount
    {
        // Pick the least-used account under its daily limit
        return EmailAccount::whereColumn('sent_today', '<', 'daily_limit')
            ->orderBy('sent_today', 'asc')
            ->orderBy('updated_at', 'asc') // fairness
            ->first();
    }
}


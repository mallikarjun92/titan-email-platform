<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\EmailAccount::insert([
            [
                'email' => 'outlook1@demo.com',
                'daily_limit' => 50,
                'sent_today' => 0,
            ],
            [
                'email' => 'outlook2@demo.com',
                'daily_limit' => 50,
                'sent_today' => 0,
            ],
        ]);
    }
}

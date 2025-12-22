<?php

namespace App\Services;

use GuzzleHttp\Client;

class ScraperService {
    public function scrape($url): array {
        
        $client = new Client([
            'timeout' => 10,
            'verify' => false,
        ]);
        
        $html = $client->get($url)->getBody()->getContents();

        preg_match_all('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/i', $html, $emails);
        // preg_match_all('/\+?\d[\d\s\-]{8,}/', $html, $phones);

        // PHONE CANDIDATES (more strict)
        preg_match_all(
            '/\+?\d[\d\s().-]{8,}\d/',
            $html,
            $phoneMatches
        );

        $phones = [];

        foreach ($phoneMatches[0] as $phone) {
            // Remove non-digits
            $digitsOnly = preg_replace('/\D/', '', $phone);

            // remove whitespace, dots, dashes, parentheses
            $phone = preg_replace('/[\s().-]/', '', $phone);

            // Keep only realistic phone numbers (10–15 digits)
            if (strlen($digitsOnly) >= 10 && strlen($digitsOnly) <= 15) {
                $phones[] = $phone;
            }
        }

        return [
            'emails' => array_unique($emails[0]),
            'phones' => array_values(array_unique($phones))
        ];
    }
}

<?php

namespace App\Services;

use GuzzleHttp\Client;

class ScraperService {
    public function scrape($url): array {
        $client = new Client();
        $html = $client->get($url)->getBody()->getContents();

        preg_match_all('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/i', $html, $emails);
        preg_match_all('/\+?\d[\d\s\-]{8,}/', $html, $phones);

        return [
            'emails' => array_unique($emails[0]),
            'phones' => array_unique($phones[0])
        ];
    }
}

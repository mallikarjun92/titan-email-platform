## Setup
1. Clone the repository:
```
   git clone https://github.com/mallikarjun92/titan-email-platform.git
```
2. Navigate to the project directory:
```
   cd titan-email-mvp
```
3. Install dependencies and set up the environment:
```
composer install
cp .env.example .env
npm install && npm run build
php artisan migrate
php artisan serve
```
4. Database setup
- Ensure you have a database configured in your `.env` file.
5. Access the application
- Open your browser and navigate to `http://localhost:8000`.
## Features
- Lead Management: Add, view, and manage leads.
- Email Campaigns: Create and manage email campaigns.
- Analytics Dashboard: View email sending statistics and campaign performance.
- Web Scraping: Scrape websites for lead information.

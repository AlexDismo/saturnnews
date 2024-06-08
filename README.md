# Getting Started

To set up the project, follow these steps:

1. **Install Dependencies:**
   ```bash
   
   npm install
   composer install
   
2. Run Development Server:
   ```bash
   
   npm run dev
   php artisan serve
   
3. Run Migrations and Seed Database:
   ```bash
   
   php artisan migrate
   php artisan db:seed

Additional Information

If there are no images in the directory storage/app/public/users/avatars, Picsum will be used as the default value for stubs.
The Mailersend service is used to send emails.

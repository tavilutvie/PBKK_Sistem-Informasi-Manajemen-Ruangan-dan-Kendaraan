## HOW TO SETUP PROGRAM
Jalankan tiap command pada root
```
cp .env.example .env
composer update
composer install
php artisan key:generate
npm install
```

## HOW TO RUN PROGRAM
Buka XAMPP, aktifkan MySQL
Buka phpmyadmin, buat database baru namanya simrk
Balik ke terminal, tulis ```php artisan migrate:fresh --seed```
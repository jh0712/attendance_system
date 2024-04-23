# attendance_system
a system of attendance

### System

- required
  - node 12.14
  - php 8.2
  - postgresql

### Frontend
```bash
# node 12.14
apt-get update 
apt-get install nvm
nvm install 12.14.0
nvm use 12.14.0
npm install
npm run dev
```

### Backend
```bash
composer install

cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan module:seed Authenticate
```

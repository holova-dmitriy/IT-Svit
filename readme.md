IT-Svit web application
=======================

Test task

##Requirements:

1. PHP >= 7
2. Apache
3. Node.js 5.0+
4. MySQL >= 5.7
5. Redis 3+
6. Supervisor
7. Yarn package manager

##Installation
- Clone this repository
- Go to project directory
- Create **.env** from **.env.example** and fill it according to your environment
- Run these commands
```
composer install
php artisan app:install
```
- Run ```php artisan app:install --root``` with root privileges
- Reread, update your supervisor configurations and start it
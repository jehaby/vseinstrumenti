## Установка ##

1. `git clone github.com/jehaby/vseinstrumenti`

2. `composer install`

3. Настраиваем соединение с базой данных в файле `/.env`

        DB_HOST=...
        DB_DATABASE=...
        DB_USERNAME=...
        DB_PASSWORD=...
    
4. Заполняем БД.
   
        php artisan migrate:install
    
        php artisan migrate
    
        php artisan db:seed
    
5. `php artisan serve`
    
    
## Описание ##

Основной экшн в файлах `app/Http/Controllers/MainController.php` и `public/js/form.js`


    

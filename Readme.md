# Proje Avcısı

```
composer install
```

Puan türleri için seeder çalıştırılmalı.
```
php artisan db:seed
```

Jobların çalışabilmesi için
```
php artisan queue:work --tries=1
```
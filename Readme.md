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

php artisan elastic:create-index "App\ProjectIndexConfigurator"                                      
php artisan scout:import "App\Models\Project"                                                        




Fotoğraf yükleme çalışması için disk alanını linklememiz gereke:
```
php artisan storage:link
```
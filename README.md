# catatan belajar

## Endpoin Register

untuk membuat endpoin register caranya :

1. buatlah sebuah controller untuk register dengan perintah
    
    ```php artisan make:controller Api/Auth/RegisterController -i```

2. tambahkan kode route ini di file api.php

    ```Route::post('register', RegisterController::class);```

3. 

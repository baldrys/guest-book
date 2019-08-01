## Инструкции по разворачиванию проекта

1. Склонировать проект ```git clone https://github.com/baldrys/guest-book.git```
2. Установить зависимости проекта. Перейти в папку приложения и выполнить команду ```composer update```
3. Скопировать файл ```.env.example``` и переименовать в ```.env```
4. В ```.env``` прописать парамерты соединения с базой данных
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
5. По желанию можно изменить параметры, отвечающие за количество сообщений на странице и количество фикстур
```
DATA_PER_PAGE_NUM=5
FAKER_DATA_NUM=20
``` 
6. Выполнить команду генерации ключа приложения ```php artisan key:generate```
7. Выполнить ```php artisan migrate --seed```
8. Запустить локальный сервер (можно командой ```php artisan serve```)

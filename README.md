# Awesome Image Library

# Installation and use

**Dependency**
- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- NodeJS, npm, webpack
- Intervetion/image

**Step to follow**
```
$ git clone https://github.com/akther-hussain/image-library.git

```
```
$ cd image-library
```
**Run following commands**
```
$ composer install
```
```
$ cp .env.example .env
```
**Change configuration according to your need in ".env" file and make default db connection sqlite and comment out #DB_DATABASE=databasename**
```
DB_CONNECTION=sqlite
#DB_DATABASE=databasename
```
```
$ php artisan key:generate
```
***Exiting database use***
**Place imagelibrary.sqlite to project_folder/database with existing data and run the application**
```
$ php artisan serve
```

***To create a new db and check the application***
For fresh database: create a new db inside database directory named imagelibary.sqlite then run following migration
```
$ php artisan migrate
```
**Now Run the application**
```
$ php artisan serve
```
***Application will be run on http://localhost:8000 link***

**Optional: use laravel mix for generating scss to app.css**
```
$ npm install
```
```
$ npm run dev
```

**Thank you**

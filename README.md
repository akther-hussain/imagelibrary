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
```
$ cp .env.example .env
```
**Change configuration according to your need in ".env" file and make default db connection DB_CONNECTION=sqlite and comment out #DB_DATABASE=databasename**

```
DB_CONNECTION=sqlite
#DB_DATABASE=databasename
```
**Create a new db or place attached db named imagelibrary.sqlite inside projectfolder/database**

**Run following commands**
```
$ composer install
```

***Run migrate command if database created by you. otherwise attached db can be used to show the content***
```
$ php artisan migrate
```
```
$ php artisan key:generate
```
**Now Run the application**
```
$ php artisan serve
```
***Application will run on http://localhost:8000 url in browser***

***Optional to use mix for generating scss to app.css***
```
$ npm install
```
```
$ npm run dev
```

**Thank you**

# Laravel & Livewire Blog

Project ini merupakan bahan ajar untuk materi mini class dari [Veldeva](veldeva.id).

## Installation

Clone this repo using git

```bash
git clone https://github.com/junaidiar19/laravel-livewire-blog.git
```

Checkout to branch all-done

```bash
git checkout -b all-done
```

Pull branch all-done from remote repository

```bash
git pull origin all-done
```

Update Composer

```bash
composer update
```

Setup your .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_livewire_blog
DB_USERNAME=root
DB_PASSWORD=
```

migrate all table

```bash
php artisan migrate:fresh --seed
```

npm run dev for build the bootstrap assets

```bash
npm run dev
```

run the server

```bash
php artisan serve
```

Access your website

```bash
localhost:8000
```

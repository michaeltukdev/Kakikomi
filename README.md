<img src="https://i.imgur.com/2hhA7W3.png">

Kakikomi is a simplistic open-source note taking app built using NativePHP which compiles into Electron. NativePHP allows developers to build native desktop apps with the technologies that they have love.

As this is open-source, you are free to build this yourself and make any additions or changes as you please.

## Current functionality

- Basic note-taking 
- Note starring

## Prerequisites

 - [PHP](https://www.php.net/)
 - [Composer](https://getcomposer.org/)
 - [NPM](https://www.npmjs.com/)

## Setup guide

```
git clone https://github.com/michaeltukdev/Kakikomi.git

cd Kakikomi

composer install

rename .env.example to .env

php artisan key:generate

npm install & npm run build

php artisan native:install

php artisan native:serve 

To build run: php artisan native:build
```

## Preview

<a href="https://youtu.be/VXR78Tynhpk">YouTube demo</a>
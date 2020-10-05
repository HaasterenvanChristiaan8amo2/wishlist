# Wishlist

Dit is een project waarin we items toevoegen aan de database en die aan een persoon moesten linken. Andere personen behalve accounts met admin rechten kunnen niet de wishitems van andere mensen/accounts aanpassen, ook heb ik hier een middelware op gezet zodat je niet zonder in te loggen items kan toevoegen/aanpassen. Er zit ook een eigen gemaakte artisan command in die ervoor zorgt dat je via het laravel project een database kan aanmaken.

### Prerequisites

What things you need to install the software

* [Composer](https://getcomposer.org/download/) - nodig voor laravel installeren
* [XAMPP](https://www.apachefriends.org/index.html) - nodig voor het hosten van de database
* [NodeJS](https://nodejs.org/en/) - nodig voor npm, bootstrap 4
* [Github](https://github.com/) - nodig voor het clonen van het project 

### Installing

A step by step series of examples that tells you how to get a development env running

Project installeren:

1. In de project map, open een command line en run daarin het volgende:
```
composer install
```

2. Als dit process klaar is moet je de .env.example file naam veranderen naar .env en in de .env file moet je:
```
DB_DATABASE=laravel
```
Veranderen naar:
```
DB_DATABASE=wishlist
```

3. Als je dit hebt gedaan moet je een key generaten
```
php artisan key:generate
```

Als dit allemaal gedaan is gaan we de database gereed maken.

4. Dit doen we door de volgende commands te runnen:

```
php artisan db:create wishlist

php artisan migrate
```

Nadat we de database gereed hebben gemaakt moeten we nog 2 dingen gereed maken voordat we het project kunnen gebruiken en de website kunnen gebruiken.

5. Om Bootstrap te compileren moeten wij nog 2 commands in de command line runnen:
```
npm install && npm run watch
```

Om de website te kunnen gebruiken moeten we wel nog het volgende commando runnen:
```
php artisan serve
```

Nu is de website gereed om te gebruiken en kun je alles gebruiken wat de website heeft.

## Built With

* [Laravel](https://laravel.com/) - The PHP framework mostly for the backend
* [Bootstrap](https://getbootstrap.com/) - Used to style the website 

## Authors

* **Christiaan van Haasteren** - *All of the backend/frontend code.* - [VindicatorHQ](https://github.com/vindicatorhq)


# Klassen-indeler voor corona-regels

Op 21 april 2020 heeft de Nederlandse overheid 
[aangekondigd](https://www.rijksoverheid.nl/actueel/nieuws/2020/04/21/maatregelen-corona-verlengd) 
dat de scholen vanaf 11 mei 2020 weer open mogen, met daarbij de volgende voorwaarde:

> Basisscholen in het primair onderwijs halveren de groepsgrootte in de klas; kinderen gaan daarbij 
> ongeveer 50% van de tijd naar school. De dag dat de leerlingen niet op school verblijven, wordt op 
> een andere wijze ingevuld. Die invulling wordt bepaald door de school en de leraren.
> 
> De praktische invulling van dit principe ligt de komende tijd bij de scholen. Zij gaan dit verder 
> uitwerken; daarbij kunnen verschillen tussen scholen ontstaan. Scholen informeren ouders over wat 
> dit voor het onderwijs van hun kinderen precies betekent.

Het zou kunnen dat je als school de groepen in twee ongeveer even grote stukken wilt verdelen, 
en daarbij rekening wilt houden met kinderen uit hetzelfde gezin, zodat die in hetzelfde tijdslot zitten. 
Dat is prettig voor de ouders, maar scheelt ook vervoersbewegingen en verlaagt daarmee kans op besmetting.

# Hoe werkt het

Je maakt een spreadsheet met daarin alle klassen, de namen van de leerlingen en de adressen. Die spreadsheet 
geef je aan de tool, en die verzint een goed tijdslot.

De tool staat online op: https://lekkercryptisch.nl/corona/klas

De spreadsheet die je daar uploadt, wordt nergens opgeslagen of bewaard. Maar we kunnen ons voorstellen 
dat je toch liever zelf op je eigen computer de tool gebruikt. Dat kan als je iemand bent (of kent) die handig
is met php en git.


# Setup and execution

## Run locally

### Prerequisites
* Checkout this repo: `git clone git@github.com:bslagter/klas.git`
* Make sure you have PHP 7.2 or higher installed
* Make sure you have installed and [setup Composer](https://getcomposer.org/download/)
* Install the project on your computer: `composer install` or `php composer.phar install` (depending on Global or local composer installation)

### Execute
Run the project:

```bash
php run.php example/test.csv
```

## Run inside Docker container
If you don't want to install the correct PHP, Composer, etc. but you have Docker, it's easy:

### Prerequisite

* Checkout this repo and open the checkout: `git clone git@github.com:bslagter/klas.git && cd klas`
* Build the Container: `docker build -t klas .`

### Execute
Run the project:

```bash
docker run --rm -it -v ${PWD}/example:/app/example klas example/example.csv
```
## Pàgina web sobre additius alimentaris
Aquesta web és un exemple per l'assignatura de DAW M7.
Amb la idea de crear una pàgina web amb moltes urls que puguin indexar a Google, monetitzar i per difusió com si fos un projecte real.

## Base de dades
Hem utilitzat la base de dades oficial de l'Unió Europea
[API de la base de dades](https://developer.datalake.sante.service.ec.europa.eu/api-details#api=228d6fda-9092-4c25-af9a-d537666ed0e5&operation=ea5e05d1-f567-4ed2-a316-b9466fd2f6e6)

## Creació del model
Hem creat el model Additive com a classe per importar les dades. També hem fet el seeder que és l'encarregat d'importar les dades

## Vista
A resources > views > layouts > theme.blade.php tenim la plantilla que hem creat com a punt de partida. Utilitzarem plantilles Blade i el sistema d'herència per fer la resta de vistes.

## Routes
Cada cas d'ús anirà en un controlador diferent.

### HomeHome
Controllermostrarà la pàgina d'inici amb el llistat d'additius.

### AdditiveShow
AdditiveController@show mostrarà les dades d'un additiu.

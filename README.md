![Sinapsis Logo](sinapsis-logo.png)
[Sinapsis Agency](https://sinapsis.agency/)

# PokeApp

## Este proyecto es un prueba técnica para la empresa Sinapsis Agency.

El mismo consta de 6 pasos para su instalación

### Versiones de la aplicaciones

-   Composer - 2.6.5
-   Laravel - 11.7.0
-   PHP 8.2.12

## 1 - Instalación

Realizar un git clone, seguido de un cd en la terminal.

```bash
git clone https://github.com/rodrisaiz/SinapsisAgencyTechnicalAssessment.git
cd SinapsisAgencyTechnicalAssessment
```

## 2 - Instalación de dependencias

Instalación de las dependencias de composer

```bash
composer install
```

## 3 - BD

Duplicar el archivo .env.example y renombrar a .env . Elegir la conexión de la base de datos (en mi caso utilice mysql)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=assessment_rodrigo_saiz
DB_USERNAME=root
DB_PASSWORD=
```

## 4 - Generar Key

```bash
php artisan key:generate
```

## 5 - NPM

Instalación de las dependencias de npm

```bash
npm i
```

Ejecucion de npm

```bash
npm run dev
```

## 6 - Laravel server

Ejecución de Laravel server

```bash
php artisan serve
```

## Licencia

[MIT](https://choosealicense.com/licenses/mit/)

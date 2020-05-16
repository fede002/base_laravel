# base_laravel_58X
Proyecto base PHP de laravel 5.8.X con recursos comunes para nuevos desarrollos

## Instalación
Puede descargar el proyecto o clonarlo.
Una vez descargado en su ambiente de desarrollo ejecutar la instalación de dependencias por medio de composer

Ubicado en el directorio del proyecto, ejecutar:
```
composer install
```

Luego debe copiar y editar el archivo .env para el proyecto nuevo
```
cp .env.axample .env
```
En el mismo tiene las variables de configuración para acceso a db, servidor de mail, etc

## El proyecto base cuenta con (PENDIENTE DE COMPLETAR):

### Recursos para el cliente
#### Diseño
* [SB Admin 2](https://startbootstrap.com/themes/sb-admin-2/) - Template css para view free tipo dashboard
#### Script javascript
* [blockui](http://malsup.com/jquery/block/) - permite el block de pantalla para obligar a la espera de una solicitud
* [bootstrap](https://getbootstrap.com/) - 
* [chart.js](https://www.chartjs.org/) -
* [datatables](https://datatables.net/) - 


### Recursos de server
* [Larevel](https://laravel.com/) -	Base de laravel (actualmente laravel 5.8.x con PHP 7.1.x)		
* [html2pdf](https://github.com/spipu/html2pdf) - Generador de PDF en base a HTML
* [SS datatables.js](https://github.com/yajra/laravel-datatables) - Server side for DataTable.js controller 		
* [Script Jenkins](http://jenkins.grupobasa.com.ar/) - Script para deploy, se debe editar los mismos para que apunten al ambiente correspondiente

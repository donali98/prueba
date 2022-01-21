# Prueba Uber

 ## Como usar
### Aplicación de consola
1. Desactivar, si se tiene instalado, la extensión **Xdebug**, o configurar la siguiente opción y dejarla de la siguiente forma: `xdebug.start_with_request = trigger`
2. Posicionarse en la carpeta del proyecto, ejecutar el comando `php Main.php {millas} {arreglo de tarifas}`.  El arreglo debe de ir separado por comas sin espacio. Ejemplo:

![ejemplo-consola](https://i.ibb.co/c3tNSpX/Screenshot-select-area-20220120234108.png)
### Prueba directa en código
1. Comentar las líneas donde se mandan a llamar los métodos de consola y descomentar los valores directos en las líneas *71* y *72*

![ejemplo-directo](https://i.ibb.co/52Qs2sX/Screenshot-select-area-20220120234420.png)

2. Similar al paso 2 de la prueba en consola, ejecutar el comando `php Main.php`

![ejemplo-directo-imagen](https://i.ibb.co/tXL6Ljd/Screenshot-select-area-20220120234941.png)

# Coordinadora WordPress

# Tabla de contenido
- [Objetivo](#objetivo)
- [Especificaciones](#especificaciones)
- [Requisitos Técnicos](#requisitos-técnicos)
- [Entregables](#entregables)
- [Criterios de Evaluación](#criterios-de-evaluación)
- [Configuracion del ambiente de desarrollo local](#configuracion-del-ambiente-de-desarrollo-local)
    - [Requisitos](#requisitos)
    - [Docker](#docker)
    - [Release](#release)
- [Instalación](#instalación)

## Objetivo
Desarrollar un widget de carrito de compras que pueda ser integrado en WordPress.

## Especificaciones
- El widget debe mostrar los artículos agregados al carrito, el subtotal y botones para modificar cantidades o eliminar artículos.
- Debe ser responsivo y estilizado adecuadamente para adaptarse a diferentes temas de sitios web.
- El backend puede ser simulado con datos a partir de un json, no es necesario una base de datos real

## Requisitos Técnicos
- Escribe el código necesario para un plugin simple que pueda ser instalado en WordPress. Utiliza PHP para manejar la lógica del servidor.

## Entregables
- Código fuente del plugin.
- Instrucciones breves de instalación y configuración.
- Una breve explicación de cómo el código se adapta y funciona dentro de las plataformas WordPress.

## Criterios de Evaluación
- Calidad del Código: Claridad, mantenibilidad, uso de buenas prácticas.
- Funcionalidad: Cumplimiento de los requisitos y especificaciones dados.
- Creatividad y Solución de Problemas: Eficiencia en las soluciones implementadas y enfoque innovador en la resolución de problemas.
- Documentación y Explicaciones: Claridad en la documentación y en las explicaciones del código y de la integración.

# Configuracion del ambiente de desarrollo local

## Requisitos
- Docker [Descargar](https://www.docker.com/products/docker-desktop)
- Git Filter Repo (Opcional) para generar releases [Descargar](https://github.com/newren/git-filter-repo)

## Docker
ejecutar el siguiente comando para construir el ambiente local de wordpress
- En el puerto 80 se encuentra wordpress
- En el puerto 3306 se encuentra la base de datos
- En el puerto 8080 se encuentra phpmyadmin

Este comando construye el ambiente de desarrollo local
```shell
Make docker
```

## Release
Este comando crea un release del proyecto. Se debe especificar el numero de version ejem: 0.1.1
```shell
Make release 0.1.1
```

# Instalación

1. Puede [descargar](https://github.com/llulioscesar/coordinadora-wordpress/releases) la version mas reciente del plugin y subirla a su sitio web de wordpress
2. Acceder al panel de administracion de WordPress
 - Inicia sesion en tu sitio de WordPress
 - Ve al panel de administracion de WordPress
3. Navegar a la pagina de plugins
 - En el menu lateral izquierdo, selecciona la opcion de `Plugins`
 - Luego, haz clic en `Añadir nuevo` en la parte superior de la pagina
4. Subir el Plugin
 - En la parte superior de la pagina de `Añadir plugins`, haz clic en el boton `Subir plugin`
5. Seleccionar el Archivo `.zip` del plugin
 - Haz clic en el boton `Seleccionar archivo`
 - Navega hasta el lugar donde tienes guardado el archivo `.zip` del plugin en tu computadora.
 - Selecciona el archivo `.zip` y haz clic en `Abrir`
6. Instalar el Plugin
 - Una vez seleccionado el archivo haz clic en el botn `Instalar ahora`
7. Activar el Plugin
 - Despues de que WordPress haya subido e instalado el plugin, veras un mensaje que dice `Plugin instalado con exito`
 - Haz clic en el enlace `Activar plugin` para activar el plugin
8. Configurar el Plugin
 - En el panel lateral veras una nueva opcion llamada `Carrito de configuracion`
 - Haz clic en esta opcion para configurar el plugin
 - En esta pagina podras configurar el simbolo de moneda, items del carrito (JSON) para simular el backend

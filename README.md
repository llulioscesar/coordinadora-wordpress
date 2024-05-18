# Coordinadora WordPress

# Tabla de contenido
- [Objetivo](#objetivo)
- [Especificaciones](#especificaciones)
- [Requisitos Técnicos](#requisitos-técnicos)
- [Entregables](#entregables)
- [Criterios de Evaluación](#criterios-de-evaluación)
- [Configuracion del ambiente de desarrollo local](#configuracion-del-ambiente-de-desarrollo-local)
    - [Requisitos](#requisitos)
    - [Comandos](#comandos)

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

## Comandos
ejecutar el siguiente comando para construir el ambiente local de wordpress
- En el puerto 80 se encuentra wordpress
- En el puerto 3306 se encuentra la base de datos
- En el puerto 8080 se encuentra phpmyadmin
```shell
Make docker
```
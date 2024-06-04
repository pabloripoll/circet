<div style="width:100%;float:left;clear:both;margin-bottom:50px;">
    <a href="https://github.com/pabloripoll?tab=repositories">
        <img style="width:150px;float:left;" src="https://pabloripoll.com/files/logo-light-100x300.png"/>
    </a>
</div>

# Custom Form Example

**Los siguiente descripción de ejecución de comandos son para ejecurtalos desde la misma raíz del repositorio**

## Establecer Proyecto y Puertos para Contenedores

Crear fichero .env en la raíz de éste repositorio, modificando si es necesario, los valores de variables de .env.example y eliminando los comentarios que sirven de guía. Dichos valores serán necesarios para crear los "contenedores como servicio" para PHP y MariaDB.

Recuerde establecer los puertos disponibles en su ordenador local


Cada servicio posee su directorio particular
```
.
│
├── docker
│   │
│   ├── nginx-php
│   │   ├── docker
│   │   │   ├── config
│   │   │   ├── .env
│   │   │   ├── docker-compose.yml
│   │   │   └── Dockerfile
│   │   │
│   │   └── Makefile (dedicated to this container)
│   │
│   └── mariadb
│       ├── docker
│       │   ├── root
│       │   ├── .env
│       │   ├── docker-compose.yml
│       │   └── Dockerfile
│       │
│       └── Makefile (dedicated to this container)
│
├── resources
│   │
│   ├── database
│   │   ├── mariadb-init.sql
│   │   └── mariadb-backup.sql
│   │
│   ├── doc
│   │   └── (any documentary file...)
│   │
│   └── project
│       └── (any file or directory required for start-up or re-building the app...)
│
├── project
│   └── (application...)
│
├── .env
├── .env.example
└── Makefile (management)
```

Si se desea corroborar los parametros para cada contenedor antes de levantar los contenedores, ejecute:
```bash
$ make project-set
```

## Levantar Contenedores

```bash
$ make project-create
```

El projecto backend estará disponible en el puerto establecido.

## Cliente de Base de Datos

Para utilizar un cliente de base de datos, ejecute el siguiente comando para optener la ip de conexión

```bash
$ make hostname
```

Así pues, con los datos establecidos para la conexión  según el .env de ejemplo, serán:

```
Hostname / IP: ----- 192.168.1.41
Port: -------------- 8889
User: -------------- mariadb
Password: ---------- 123456
```

## Conectar Contenedores

Para conectar el servicio "backend" con la "base de datos" se deberá utilizar los mismos datos que para la conexión con el cliente de base de datos.


## Detener los Contenedores

```bash
$ make project-stop
```

Para eliminar las imágenes creadas para los contenedores, y así limpiar el espacio utilizado en ordenador local, ejecutar los siguientes comandos:

```bash
$ make project-destroy
```

```bash
$ sudo docker system prune
$ sudo docker volume prune
```

## Make helper

```bash
$ make help
usage: make [target]

targets:
Makefile  help                    shows this Makefile help message
Makefile  hostname                shows local machine ip
Makefile  fix-permission          sets project directory permission
Makefile  host-check              shows this project ports availability on local machine
Makefile  project-set             sets the project enviroment file to build the container
Makefile  project-create          creates the project container from Docker image
Makefile  project-start           starts the project container running
Makefile  project-stop            stops the project container but data won't be destroyed
Makefile  project-destroy         removes the project from Docker network destroying its data and Docker image
Makefile  backend-ssh             enters the backend container shell
Makefile  backend-install         installs set version of backend into container
Makefile  backend-update          updates set version of backend into container
Makefile  database-ssh            enters the database container shell
Makefile  database-install        installs set version of database into container
Makefile  database-update         updates set version of database into container
Makefile  repo-flush              clears local git repository cache specially to update .gitignore
Makefile  repo-commit             echoes commit helper commands
```

## Repositorios de referencia:

- https://github.com/pabloripoll/docker-mariadb-10.11
- https://github.com/pabloripoll/docker-php-8.3-service
<h1 align="center"># README - 🕹️GameRoom🕹️</h1>

__<p align="center">Proyecto 6 - Proyecto LFG Web App con Laravel - Semanas 11 y 12</p>__


<p align="center">Backend de una Gameroom, por Andrés Labat, Vincenzo Donnarumma y Bienvenida Ladrón.
<br>
Desarrollado como parte del Bootcamp de Full Stack Developer de Geekshubs Academy.</p>

<p>
   <div align="center">
      <img src="./img README/geekhubs.png" style="max-width: 100%;" width="200">
   </div>    
</p>
<p>
   <div align="center">
      <em><b>Bienvenido a nuestro proyecto</b></em>
   </div>   
<p align="center">_______________________________________________</p>

**Gameroom backend** es un proyecto que recrea el backend de una gameroom utilizando php, laravel, mySQL, GIT y GitHub. Este proyecto incluye una base de datos relacional, así como diversos endpoints que te permiten registrarte, hacer login, acceder a la información almacenada en las tablas, e incluso actualizarla y borrarla.
<p>


---

## Tabla de Contenidos

<details>

  <summary>📋 Apartados</summary>
<ol>
    <li>🚀 <a href="#introducción">Introducción</a></li>
    <li>🎯 <a href="#descripción-del-proyecto">Descripción del proyecto</a></li>
    <li>🏗️ <a href="#diseño-de-la-ddbb">Diseño de la DDBB</a></li>
    <li>🔚 <a href="#endpoints">Endpoints</a></li>
    <li>🔧 <a href="#tecnologías-utilizadas">Tecnologías utilizadas</a></li>
    <li>🚀 <a href="#deploy">Deploy</a></li>
    <li>🍃 <a href="#ramas-del-repositorio">Ramas del repositorio</a></li>
    <li>🚧 <a href="#problemas-y-soluciones">Problemas y soluciones</a></li>
    <li>📦 <a href="#instrucciones-dockerización">Instrucciones dockerización</a></li>
    <li>🌐 <a href="#enlaces-importantes">Enlaces importantes</a></li>
    <li>⚖️ <a href="#licencia">Licencia</a></li>
    <li>🤝 <a href="#cómo-contribuir">Como contribuir</a></li>
    <li>📧 <a href="#contacto">Contacto</a></li>
    <li>👏 <a href="#agradecimientos">Agradecimientos</a></li>
    
  </ol>

</details>


## Introducción

🚀 El planteamiento para desarrollar este proyecto consiste en desarrollar una estructura Backend completa (DDBB+PHP+Laravel) para una aplicación web LFG (Looking for Group), que permita a los empleados contactar entre ellos para formar grupos y jugar videojuegos como actividad de ocio afterwork.

## Descripción del Proyecto

🎯 Dada la situación sanitaria y el trabajo remoto, la empresa desea mejorar la interacción entre los empleados. La primera fase del proyecto es crear una aplicación web LFG que permita a los usuarios registrarse, autenticarse, crear y unirse a partidas de videojuegos, así como intercambiar mensajes en un chat común. El objetivo es fomentar la socialización y compartir momentos de ocio.

## Diseño de la DDBB

🏗️ Se establece que solo hay un rol por usuario, y que este es el que le da los privilegios para poder usar unos endpoints determinados u otros.

<p>
   <div align="center">
      <img src="./img README/DDBB.jpeg" style="max-width: 100%">
   </div>    
</p>

## Endpoints

🔚 Estos son los endpoints de los que consta el proyecto, clasificados en base a la tabla a la que hacen referencia.

<details>
<summary><h3>1.Register</h3></summary>

- **Descripción**: Registra un nuevo usuario.
- **Acceso**: Público.
- **Validaciones**: Verifica la validez del nombre, apodo, correo electrónico, contraseña y foto del usuario.
    - Registrar Usuario
        
        ```
        POST <http://localhost:8000/api/register>
        
        ```
        
        Payload:
        
        ```json
        {
            "name": "Nombre del Usuario",
            "nickname": "Apodo del Usuario",
            "email": "correo@ejemplo.com",
            "password": "contraseña",
            "photo": "url_de_la_foto"
        }
        
        ```
        

</details>

<details>
<summary><h3>2. Login</h3></summary>

- **Descripción**: Inicia sesión de un usuario existente.
- **Acceso**: Público.
- **Validaciones**: Verifica la validez del correo electrónico y la contraseña del usuario.
    - Iniciar Sesión
        
        ```
        POST <http://localhost:8000/api/login>
        
        ```
        
        Payload:
        
        ```json
        {
            "email": "correo@ejemplo.com",
            "password": "contraseña"
        }
        
        ```
        

</details>

<details>
<summary><h3>3. Profile</h3></summary>

- **Descripción**: Obtiene el perfil del usuario autenticado.
- **Acceso**: Solo para usuarios autenticados.
    - Obtener Perfil
        
        ```
        GET <http://localhost:8000/api/profile>
        
        ```
        

</details>

<details>
<summary><h3>4. Logout</h3></summary>

- **Descripción**: Cierra la sesión del usuario autenticado.
- **Acceso**: Solo para usuarios autenticados.
    - Cerrar Sesión
        
        ```
        POST <http://localhost:8000/api/logout>
        
        ```
        

</details>

### User:

<details>

<summary><h3>1. Update</h3></summary>

- **Descripción**: Actualiza el perfil del usuario autenticado.
- **Acceso**: Solo para usuarios autenticados.
    - Actualizar Perfil
        
        ```
        POST <http://localhost:8000/api/user>
        
        ```
        
        Payload:
        
        ```json
        {
            "name": "Nuevo Nombre",
            "nickname": "Nuevo Apodo",
            "email": "nuevo_correo@ejemplo.com",
            "password": "nueva_contraseña",
            "photo": "nueva_url_de_la_foto"
        }
        
        ```
        

</details>

<details>
<summary><h3>2. Delete User</h3></summary>

- **Descripción**: Elimina el usuario autenticado.
- **Acceso**: Solo para usuarios autenticados.
    - Eliminar Usuario
        
        ```
        DELETE <http://localhost:8000/api/user>
        
        ```
        

</details>


### Game:

<details>
<summary><h3>1. Get All Games</h3></summary>

- **Descripción**: Obtiene todos los juegos.
- **Acceso**: Público.
    - Obtener Todos los Juegos
        
        ```
        GET <http://localhost:8000/api/games>
        
        ```
        

</details>

<details>
<summary><h3>2. Get Game By ID</h3></summary>

- **Descripción**: Obtiene un juego específico por su ID.
- **Acceso**: Público.
    - Obtener Juego por ID
        
  ```
    GET <http://localhost:8000/api/game/{id}>
    
    ```
        

</details>


### Room:

<details>
<summary><h3>1. Get Room By ID</h3></summary>

- **Descripción**: Obtiene una sala por su ID.
- **Acceso**: Solo para usuarios autenticados.
    - Obtener Sala
        
        ```
        GET <http://localhost:8000/api/room/{id}>
        
        ```
        

</details>

<details>
<summary><h3>2. Create Room</h3></summary>

- **Descripción**: Crea una nueva sala.
- **Acceso**: Solo para usuarios autenticados.
    - Crear Sala
        
        ```
        POST <http://localhost:8000/api/room>
        
        ```
        
        Payload:
        
        ```json
        {
            "name": "Nombre de la Sala",
            "game_id": "ID del Juego"
        }
        
        ```
        

</details>

<details>
<summary><h3>3. Update Room</h3></summary>

- **Descripción**: Actualiza una sala existente.
- **Acceso**: Solo para usuarios autenticados y propietarios de la sala.
    - Actualizar Sala
        
        ```
        PUT <http://localhost:8000/api/room/{id}>
        ```
        
        Payload:
        
        ```json
        {
            "name": "Nuevo Nombre de la Sala",
            "game_id": "Nuevo ID del Juego"
        }
        ```
        

</details>

<details>
<summary><h3>4. Delete Room</h3></summary>

- **Descripción**: Elimina una sala existente.
- **Acceso**: Solo para usuarios autenticados y propietarios de la sala.

    ```
    DELETE <http://localhost:8000/api/room/{id}>
    ```
        

</details>


### Room_User:

<details>
<summary><h3>1. Rooms Member</h3></summary> 

- **Descripción**: Obtiene los miembros de una sala por su ID.
- **Acceso**: Solo para usuarios autenticados y miembros de la sala.
- Obtener Miembros de la Sala

```
GET <http://localhost:8000/api/members-room/{id}>
```

</summary>
</details>

<details>
<summary><h3>2. Get Rooms Member</h3></summary> 

- **Descripción**: Obtiene las salas del usuario autenticado.
- **Acceso**: Solo para usuarios autenticados.
- Obtener Salas del Usuario

```
GET <http://localhost:8000/api/rooms-user>
```

</summary>
</details>

<details>
<summary><h3>3.  Delete Member Room</h3></summary>

- **Descripción**: Eliminar un usuario a una sala existente.
- **Acceso**: Solo para usuarios autenticados y propietarios de la sala.
- Añadir usuario
    
    ```
    DELETE <http://localhost:8000/api/room-user>
    ```
    
    Payload:
    
    ```json
    {
      "user_id": "Número de user_id",
      "room_id": "Número de room_id"
    }
    ```  
    
</details>

<details>
<summary><h3>4. Add Member to room </h3></summary>

- **Descripción**: Añadir un usuario a una sala existente.
- **Acceso**: Solo para usuarios autenticados y propietarios de la sala.
- Añadir usuario
    
    ```
    POST <http://localhost:8000/api/room-user>
    ```
    
    Payload:
    
    ```json
    {
      "user_id": "Número de user_id",
      "room_id": "Número de room_id"
    }
    ```
  
</details>

### Message:

<details>
<summary><h3>1. Create Message </h3></summary>

- **Descripción**: Crear un nuevo mensaje a un chat existente.
- **Acceso**: Solo para usuarios autenticados e integrantes de la sala.
    
    ```
    POST <http://localhost:8000/api/message>
    ```
    
    Payload:
    
    ```json
    { 
      "room_id": 1,
      "message":"Mensaje que quieras introducir"
    }
    ```
  
</details>

<details>
<summary><h3>2.Room Chat </h3></summary>

- **Descripción**: Obtiene los mensajes de un chat existente.
- **Acceso**: Solo para usuarios autenticados e integrantes de la sala.
    
    ```
    GET <http://localhost:8000/api/messages>
    ```
    
    Payload:
    
    ```json
    { 
      "room_id": 1 
    }
    ```
  
</details>

<details>
<summary><h3>3.Delete Message </h3></summary>

- **Descripción**: Elimina un mensaje seleccionado.
- **Acceso**: Solo para usuarios autenticados e integrantes de la sala.
    
    ```
    DELETE <http://localhost:8000/api/messages>
    ```
    
    Payload:
    
    ```json
    { 
      "room_id": 1 ,
      "message": "Mensaje a eliminar"
    }
    ```
  
</details>

<details>
<summary><h3>4.Update Message </h3></summary>

- **Descripción**: Actualiza un mensaje seleccionado.
- **Acceso**: Solo para usuarios autenticados e integrantes de la sala.
    
    ```
    PUT <http://localhost:8000/api/message>
    ```
    
    Payload:
    
    ```json
    { 
      "room_id":11,
      "message": "Mensaje actual",
      "newMessage": "Nuevo mensaje"
    }
    ```
  
</details>

### Super Admin:

<details>
<summary><h3>1.Create Game </h3></summary>

- **Descripción**: Crea un nuevo juego en la tabla.
- **Acceso**: Solo para usuarios autenticados como super_admin.
    
    ```
    POST <http://localhost:8000/api/game>
    ```
    
    Payload:
    
    ```json
    { 
     "name":"Zelda",
     "category":"adventure" 
    }
    ```
  
</details>

<details>
<summary><h3>2.Update Game </h3></summary>

- **Descripción**: Actualiza un juego en la tabla.
- **Acceso**: Solo para usuarios autenticados como super_admin.
    
    ```
    PUT <http://localhost:8000/api/game/{id}>
    ```
    
    Payload:
    
    ```json
    { 
     "name":"Nombre del juego",
     "category":"adventure",
     "user_id":13
    }
    ```
  
</details>

<details>
<summary><h3>3.Delete Game </h3></summary>

- **Descripción**: Actualiza un juego en la tabla.
- **Acceso**: Solo para usuarios autenticados como super_admin.
    
    ```
    DELETE <http://localhost:8000/api/game/{id}>
    ```
       
</details>

<details>
<summary><h3>4.Get All Rooms </h3></summary>

- **Descripción**: Obtiene todas las salas existentes.
- **Acceso**: Solo para usuarios autenticados como super_admin.
    
    ```
    GET <http://localhost:8000/api/rooms>
    ``` 
  
</details>

<details>
<summary><h3>5.Get All Users </h3></summary>

- **Descripción**: Obtiene todos los ususarios de la aplicación.
- **Acceso**: Solo para usuarios autenticados como super_admin.
    
    ```
    GET <http://localhost:8000/api/rooms>
    ``` 
  
</details>


## Tecnologías Utilizadas

<details>

<summary>🔧 Tecnologías</summary>

- **Php**: es el lenguaje de programación sobre el que se han montado el servidor y los distintos endpoints.

  <code><img width="7%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRJd09nbs-FMm0CO_8S31bN5HswUV2Tc5wvA&usqp=CAU"></code>

- **Laravel**: Diseñado para facilitar y agilizar el desarrollo de aplicaciones web, Laravel sigue el patrón de arquitectura MVC (Modelo-Vista-Controlador) y ofrece numerosas características y herramientas que permiten a los desarrolladores crear aplicaciones robustas y escalables de manera eficiente..

<code><img width="11%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbHRR7WD7dsTO-WjMevpojc9ZQxn4TEdl5dA&usqp=CAU"></code>

- **MySQL**: Es el sistema de gestión de bases de datos sobre el que se han construido las tablas en SQL.

 <code><img width="10%" src="https://www.vectorlogo.zone/logos/mysql/mysql-ar21.svg"></code>

- **Git**: Sistema de control de versiones para el seguimiento de cambios en el proyecto.

  <code><img width="10%" src="https://www.vectorlogo.zone/logos/git-scm/git-scm-ar21.svg"></code>

- **GitHub**: Plataforma para alojar el repositorio en línea y colaborar en el desarrollo del proyecto.

    <code><img width="6%" src="https://www.svgrepo.com/show/35001/github.svg"></code>

</details>

## Deploy

🚀 Por el momento su único uso es en local, en el futuro se realizará el deploy.

**## Ramas del Repositorio**

🍃 Este proyecto se ha desarrollado en las siguientes ramas:

1.- **Master**: considerada como la rama principal, en ella únicamente se ha iniciado y finalizado el proyecto para poder hacer el deploy.

2.- **Dev**: es la rama sobre la que pivotan todas las features.

3.- **Middleware**: aquí procedimos a la creación de los middlewares necesarios para la aplicación, en este caso IsSuperAdmin y el Auth:Sanctum.

4.- **UserController**: contiene la creación y testeo de todos los endpoints del usuario.

5.- **GameController**: compuesta por los commits que hacen referencia a los endpoints de la tabla "games".

6.- **MessageController**: abarca la creación y comprobación de los controladores de la tabla intermedia "messages".

7.- **SuperAdminController**: únicamente se han realizado aquí los endpoints a los que pueden acceder los usuarios con role super admin.

8.- **Room_userController**: en esta rama se crearon los controladores de la tabla "room_user"

9.- **Readme**: es la última rama, se creó únicamente para crear este README.

## Problemas y Soluciones

### 1. Una gran cantidad de endpoints fallaban por un error 500 sin aparente conexión entre ellos.

- **🚧Problema**: Este error 500 nos decía que era un tipo de error de servidor y nos ocurría en practicamente todos los controladores de tablas intermedias.

   - **💡Solución**: Revisar los modelos y percatarnos de que no estabamos incluyendo las foreign keys en ellos, por lo que no reconocía las request como válidas, también fue importante en el caso de los endpoints de messages el revisar las importaciones de dichos modelos en el archivo api.php.

### 2. Imposibilidad de eliminar usuarios de la tabla una vez realizados los seeders que rellenan toda la base de datos.

- **🚧Problema**: Comprobando el correcto funcionamiento de los endpoints, una vez finalizados todos los controladores, nos encontramos ante un error de tipo 500 en el caso de querer eliminar un usuario de nuestra tabla principal "users".

   - **💡Solución**: Añadir en las migraciónes en la parte de código que hace referencia a todas las foreign keys que estas debían tener la propiedad constrained y además que pudieran realizarse los deletes en cascade.

   ```js

   ->constrained()->onDelete('cascade')

   ```

<p>

   <div align="center">

      <img src="img README/many-to-one.jpeg" style="max-width: 100%;" width="500">

   </div>

   <div align="center">

      <em><b>Descripción de la foto</b></em>

   </div>

</p>
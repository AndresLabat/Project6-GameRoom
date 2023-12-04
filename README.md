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
 
# Proyecto LFG Web App con Laravel

<div align="center">
<img src="ruta/a/tu/logo.png" width="50%"/>
</div>

Sexto **proyecto del Bootcamp Full Stack Developer en GeeksHubs Academy, Valencia.**

---

# Tabla de Contenidos

- 🚀 [Introducción](notion://www.notion.so/valkyriannx/Proyecto-php-laravel-71f9d7ece293402e904ba26e132bf612#introducci%C3%B3n)
- 🎯 [Descripción del Proyecto](notion://www.notion.so/valkyriannx/Proyecto-php-laravel-71f9d7ece293402e904ba26e132bf612#descripci%C3%B3n-del-proyecto)
- 📉 Diseño base de datos
- 🔚 Endpoints / Funcionalidades backend (A escoger)
- ⚙️ [Local Installation Instructions](notion://www.notion.so/valkyriannx/Proyecto-php-laravel-71f9d7ece293402e904ba26e132bf612#local-installation-instructions)
- 💻 [Tecnologías Utilizadas](notion://www.notion.so/valkyriannx/Proyecto-php-laravel-71f9d7ece293402e904ba26e132bf612#tecnolog%C3%ADas-utilizadas)
- 📦 Instrucciones [Dockerización](notion://www.notion.so/valkyriannx/Proyecto-php-laravel-71f9d7ece293402e904ba26e132bf612#extras-y-dockerizaci%C3%B3n)
- 🌐 [Enlaces Importantes](notion://www.notion.so/valkyriannx/Proyecto-php-laravel-71f9d7ece293402e904ba26e132bf612#enlaces-importantes)
- 📧 [Contact](notion://www.notion.so/valkyriannx/Proyecto-php-laravel-71f9d7ece293402e904ba26e132bf612#contact)

# 🚀 Introducción

El presente proyecto ha sido desarrollado con PHP LARAVEL y MySQL. Consiste en desarrollar una estructura Backend completa (DDBB+PHP+Laravel) para una aplicación web LFG (Looking for Group), que permita a los empleados contactar entre ellos para formar grupos y jugar videojuegos como actividad de ocio afterwork.

# 🎯 Descripción del Proyecto

Dada la situación sanitaria y el trabajo remoto, la empresa desea mejorar la interacción entre los empleados. La primera fase del proyecto es crear una aplicación web LFG que permita a los usuarios registrarse, autenticarse, crear y unirse a partidas de videojuegos, así como intercambiar mensajes en un chat común. El objetivo es fomentar la socialización y compartir momentos de ocio.

# 📉 Diseño del BBDD

# 🔚 Endpoints

### API Endpoints for User Authentication

<details>
<summary><h3>1. /auth/register</h3></summary>

- **Descripción**: Registra un nuevo usuario.
- **Acceso**: Público.
- **Validaciones**: Verifica la validez del nombre, apodo, correo electrónico, contraseña y foto del usuario.
    - Registrar Usuario
        
        ```
        POST <http://localhost:8000/auth/register>
        
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
<summary><h3>2. /auth/login</h3></summary>

- **Descripción**: Inicia sesión de un usuario existente.
- **Acceso**: Público.
- **Validaciones**: Verifica la validez del correo electrónico y la contraseña del usuario.
    - Iniciar Sesión
        
        ```
        POST <http://localhost:8000/auth/login>
        
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
<summary><h3>3. /auth/profile</h3></summary>

- **Descripción**: Obtiene el perfil del usuario autenticado.
- **Acceso**: Solo para usuarios autenticados.
    - Obtener Perfil
        
        ```
        GET <http://localhost:8000/auth/profile>
        
        ```
        

</details>

<details>
<summary><h3>4. /auth/logout</h3></summary>

- **Descripción**: Cierra la sesión del usuario autenticado.
- **Acceso**: Solo para usuarios autenticados.
    - Cerrar Sesión
        
        ```
        POST <http://localhost:8000/auth/logout>
        
        ```
        

</details>

<details>
<summary><h3>1. /user/update</h3></summary>

- **Descripción**: Actualiza el perfil del usuario autenticado.
- **Acceso**: Solo para usuarios autenticados.
    - Actualizar Perfil
        
        ```
        POST <http://localhost:8000/user/update>
        
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
<summary><h3>2. /user</h3></summary>

- **Descripción**: Elimina el usuario autenticado.
- **Acceso**: Solo para usuarios autenticados.
    - Eliminar Usuario
        
        ```
        DELETE <http://localhost:8000/user>
        
        ```
        

</details>

## API Endpoints for Game Management

<details>
<summary><h3>1. /games</h3></summary>

- **Descripción**: Obtiene todos los juegos.
- **Acceso**: Público.
    - Obtener Todos los Juegos
        
        ```
        GET <http://localhost:8000/games>
        
        ```
        

</details>

<details>
<summary><h3>2. /game/{id}</h3></summary>

- **Descripción**: Obtiene un juego específico por su ID.
- **Acceso**: Público.
    - Obtener Juego por ID
        
        ```
        GET <http://localhost:8000/game/{id}>
        
        ```
        

</details>

## API Endpoints for Room Management

<details>
<summary><h3>1. /room/{id}</h3></summary>

- **Descripción**: Obtiene una sala por su ID.
- **Acceso**: Solo para usuarios autenticados.
    - Obtener Sala
        
        ```
        GET <http://localhost:8000/room/{id}>
        
        ```
        

</details>

<details>
<summary><h3>2. /room/create</h3></summary>

- **Descripción**: Crea una nueva sala.
- **Acceso**: Solo para usuarios autenticados.
    - Crear Sala
        
        ```
        POST <http://localhost:8000/room>
        
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
<summary><h3>3. /room/update/{id}</h3></summary>

- **Descripción**: Actualiza una sala existente.
- **Acceso**: Solo para usuarios autenticados y propietarios de la sala.
    - Actualizar Sala
        
        ```
        PUT <http://localhost:8000/room/update/{id}>
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
<summary><h3>4. /room/delete/{id}</h3></summary>

- **Descripción**: Elimina una sala existente.
- **Acceso**: Solo para usuarios autenticados y propietarios de la sala.
    - Eliminar Sala
        
        ```
        DELETE <http://localhost:8000/room/delete/{id}>
        
        ```
        

</details>

## **API Endpoints for Room User Management**

<details>
<summary>
- **Descripción**: Obtiene los miembros de una sala por su ID.
- **Acceso**: Solo para usuarios autenticados y miembros de la sala.
- Obtener Miembros de la Sala

```bash
GET <http://localhost:8000/members-room/{id}>
```

</summary>
</details>

<details>
<summary>
- **Descripción**: Obtiene las salas del usuario autenticado.
- **Acceso**: Solo para usuarios autenticados.
- Obtener Salas del Usuario

```bash
GET <http://localhost:8000/room_user/rooms-user>
```

</summary>
</details>

<details>
<summary><h3>4. /room-user</h3></summary>

- **Descripción**: Eliminar un usuario a una sala existente.
- **Acceso**: Solo para usuarios autenticados y propietarios de la sala.
- Añadir usuario
    
    ```
    DELETE <http://localhost:8000/room-user>
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
<summary><h3>4. /room-user</h3></summary>

- **Descripción**: Añadir un usuario a una sala existente.
- **Acceso**: Solo para usuarios autenticados y propietarios de la sala.
- Añadir usuario
    
    ```
    POST <http://localhost:8000/room-user>
    ```
    
    Payload:
    
    ```json
    {
      "user_id": "Número de user_id",
      "room_id": "Número de room_id"
    }
    ```
    

</details>

## Rutas

### Usuarios

- **Registro de Usuario**
    - Método: `POST`
    - Ruta: `/register`
    - Controlador: `AuthController@register`
    - Descripción: Permite a los usuarios registrarse en la aplicación.
- **Inicio de Sesión**
    - Método: `POST`
    - Ruta: `/login`
    - Controlador: `AuthController@login`
    - Descripción: Inicia sesión de usuario y proporciona un token de autenticación.
- **Perfil de Usuario**
    - Método: `GET`
    - Ruta: `/profile`
    - Controlador: `AuthController@profile`
    - Descripción: Obtiene los detalles del perfil del usuario autenticado.
- **Cierre de Sesión**
    - Método: `POST`
    - Ruta: `/logout`
    - Controlador: `AuthController@logout`
    - Descripción: Cierra la sesión del usuario autenticado.
- **Actualización de Perfil de Usuario**
    - Método: `PUT`
    - Ruta: `/user`
    - Controlador: `UserController@updateProfile`
    - Descripción: Actualiza la información del perfil del usuario autenticado.
- **Eliminación de Usuario**
    - Método: `DELETE`
    - Ruta: `/user`
    - Controlador: `UserController@deleteUser`
    - Descripción: Elimina la cuenta del usuario autenticado.

### Juegos

- **Obtener Todos los Juegos**
    - Método: `GET`
    - Ruta: `/games`
    - Controlador: `GameController@getAllGames`
    - Descripción: Obtiene la lista de todos los juegos disponibles.
- **Obtener Detalles de un Juego**
    - Método: `GET`
    - Ruta: `/game/{id}`
    - Controlador: `GameController@getGameById`
    - Descripción: Obtiene detalles específicos de un juego según su ID.

### Salas

- **Obtener Detalles de una Sala**
    - Método: `GET`
    - Ruta: `/room/{id}`
    - Controlador: `RoomController@getRoomById`
    - Descripción: Obtiene detalles específicos de una sala según su ID.
- **Crear Nueva Sala**
    - Método: `POST`
    - Ruta: `/room`
    - Controlador: `RoomController@createRoom`
    - Descripción: Crea una nueva sala para que los usuarios se unan.
- **Actualizar Detalles de una Sala**
    - Método: `PUT`
    - Ruta: `/room/{id}`
    - Controlador: `RoomController@updateRoom`
    - Descripción: Actualiza la información de una sala específica.
- **Eliminar Sala**
    - Método: `DELETE`
    - Ruta: `/room/{id}`
    - Controlador: `RoomController@deleteRoom`
    - Descripción: Elimina una sala específica.

### Usuarios en Salas

- **Obtener Miembros de una Sala**
    - Método: `GET`
    - Ruta: `/members-room/{id}`
    - Controlador: `Room_userController@getMembersRoom`
    - Descripción: Obtiene la lista de miembros de una sala específica.
- **Obtener Salas de un Usuario**
    - Método: `GET`
    - Ruta: `/rooms-user`
    - Controlador: `Room_userController@getRoomsUser`
    - Descripción: Obtiene la lista de salas a las que pertenece un usuario.
- **Unirse a una Sala**
    - Método: `POST`
    - Ruta: `/room-user`
    - Controlador: `Room_userController@createRoomUser`
    - Descripción: Permite a un usuario unirse a una sala.
- **Salir de una Sala**
    - Método: `DELETE`
    - Ruta: `/room-user`
    - Controlador: `Room_userController@deleteRoomUser`
    - Descripción: Permite a un usuario salir de una sala.

### Mensajes

- **Obtener Mensajes de una Sala**
    - Método: `GET`
    - Ruta: `/messages`
    - Controlador: `MessageController@roomChat`
    - Descripción: Obtiene los mensajes de una sala específica.
- **Crear Mensaje**
    - Método: `POST`
    - Ruta: `/message`
    - Controlador: `MessageController@createMessage`
    - Descripción: Crea un nuevo mensaje en una sala.
- **Actualizar Mensaje**
    - Método: `PUT`
    - Ruta: `/message`
    - Controlador: `MessageController@updatedMessage`
    - Descripción: Actualiza un mensaje existente.
- **Eliminar Mensaje**
    - Método: `DELETE`
    - Ruta: `/message`
    - Controlador: `MessageController@deleteMessage`
    - Descripción: Elimina un mensaje existente.

### Super Admin

- **Crear Juego**
    - Método: `POST`
    - Ruta: `/game`
    - Controlador: `Super_adminController@createGame`
    - Descripción: Crea un nuevo juego (requiere permisos de super administrador).
- **Actualizar Juego**
    - Método: `PUT`
    - Ruta: `/game/{id}`
    - Controlador: `Super_adminController@updateGame`
    - Descripción: Actualiza la información de un juego específico (requiere permisos de super administrador).
- **Eliminar Juego**
    - Método: `DELETE`
    - Ruta: `/game/{id}`
    - Controlador: `Super_adminController@deleteGame`
    - Descripción: Elimina un juego específico (requiere permisos de super administrador).
- **Obtener Todas las Salas**
    - Método: `GET`
    - Ruta: `/rooms`
    - Controlador: `Super_adminController@getAllRooms`
    - Descripción: Obtiene la lista de todas las salas (requiere permisos de super administrador).
- **Obtener Todos los Usuarios**
    - Método: `GET`
    - Ruta: `/users`
    - Controlador: `Super_adminController@getAllUsers`
    - Descripción: Obtiene la lista de todos los usuarios (requiere permisos de super administrador).
- Todas las rutas bajo el middleware `auth:sanctum` requieren autenticación mediante el sistema Sanctum.
- Las rutas bajo el middleware `is_super_admin` requieren permisos de super administrador.

# 💻 Tecnologías Utilizadas (falta imágenes)

- **SQL**
- **PHP (Laravel)**
- **laravel/passport**.

# 📦 Instrucciones Dockerización

Para facilitar la implementación y ejecución del proyecto, se proporcionan instrucciones de Dockerización:

1. **Clonar el Repositorio:**
    
    ```bash
    git clone <https://github.com/AndresLabat/Project6-GameRoom.git>
    ```
    
2. **Acceder al Directorio del Proyecto:**
    
    ```bash
    cd Project6-GameRoom
    ```
    
3. **Configuración de Variables de Entorno:**
Crear un archivo `.env` basado en el ejemplo `.env.example` y configurar las variables de entorno necesarias.
4. **Construir y Levantar Contenedores:**
    
    ```bash
    docker-compose up -d --build
    ```
    
5. **Instalar Dependencias de Laravel:**
    
    ```bash
    docker-compose exec app composer install
    ```
    
6. **Generar Clave de Laravel:**
    
    ```bash
    docker-compose exec app php artisan key:generate
    ```
    
7. **Ejecutar Migraciones y Seeders:**
    
    ```bash
    docker-compose exec app php artisan migrate --seed
    ```
    
8. **Acceder a la Aplicación:**
La aplicación estará disponible en [http://localhost](http://localhost/).

# 🌐 Enlaces Importantes

- **[Documentación de Laravel](https://laravel.com/docs)**
- **[laravel/passport Documentation](https://laravel.com/docs/8.x/passport)**
- **[GeeksHubs Academy](https://www.geekshubsacademy.com/)**

# 📧 Contacto

Para cualquier pregunta o comentario, no dudes en ponerte en contacto:

- **Desarrolladores:** Vincenzo Donnarumma, Andrés Labat y Bienve Ladrón.

***Vincenzo Donnarumma***
<a href = "[mailto:](mailto:vincenzodonnarumma22@gmail.com)(mailto:vincenzodonnarumma22@gmail.com)"><img src="https://img.shields.io/badge/Gmail-C6362C?style=for-the-badge&logo=gmail&logoColor=white" target="_blank"></a>
<a href="https://github.com/vincenzo2202" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=green" target="_blank"></a>

***Andrés Labat***
<a href = "[mailto:andreslabat89@gmail.com](mailto:andreslabat89@gmail.com)"><img src="https://img.shields.io/badge/Gmail-C6362C?style=for-the-badge&logo=gmail&logoColor=white" target="_blank"></a>
<a href="https://github.com/AndresLabat" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=green" target="_blank"></a>

***Bienve Ladrón***
<a href = "[mailto:ladronbravovlc@gmail.com](mailto:ladronbravovlc@gmail.com)"><img src="https://img.shields.io/badge/Gmail-C6362C?style=for-the-badge&logo=gmail&logoColor=white" target="_blank"></a>
<a href="https://github.com/ladronbx" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=green" target="_blank"></a>
Bootstrap simple laravel/livewire application, consisting of:
1. [Tabler.IO](https://tabler.io/admin-template) Basic Admin panel
2. Simple Authentication
3. PostgreSQL database with some redis for session storage/caching
4. Basic Authorization System using [Spatie](https://spatie.be/docs/laravel-permission/v6/introduction)
5. Translations

## Installation

1. Clone the repository on your file system. E.g: `/my/project/dir`

2. Run:
```sh
docker-compose up -d
```
> If using on windows make sure the start script located in nginx-php/scripts/start.sh have an LF file endings before running the docker-compose up command

3. Install dependencies

```sh
cd /my/project/dir
docker-compose exec -i nginx-php bash -c "composer install"
docker-compose exec -i nginx-php bash -c "artisan key:generate"
```
4. Run the initial migrations
```sh
docker-compose exec -i nginx-php bash -c "php artisan migrate"
```
5. Install Vite and build css/js assets. Best option is to have node/npm on your host system and do this outside of the container.
```sh
cd /my/project/dir/src
npm install
vite build
```
## Database Data and Seeders
There are few seeders we need to run in order to have some initial data setup.

### Roles, Permissions and Authorization
The application roles are located at: `src\app\Models\Enums\Roles.php`.        
The application permissions are located at: `src\app\Models\Enums\Permissions.php`.            
Currently the permissions are not attached to any role, since this is a starter template.

When adding/removing new role or permission, modify the above enums respectively and run the seeder.
```sh
docker-compose exec -i nginx-php bash -c "php artisan db:seed --class=RoleSeeder"
```
### Admin User
Create initial admin user
```sh
docker-compose exec -i nginx-php bash -c "php artisan db:seed --class=AdminUserSeeder"
```
### Create Dummy Users
```sh
docker-compose exec -i nginx-php bash -c "php artisan db:seed --class=UserSeeder"
```

## Visibility

You can view the project from `http://localhost:5500` or `https://localhost:5543`.              
To change the ports edit docker-compose file. 
Your postgreSQL is available at `127.0.0.1:54320`.

### Refresh Self Signed SSL

To regenerate the certificates run:
```sh
openssl req -x509 -nodes -days 3650 -newkey rsa:2048 -keyout cert/mycert.key -out cert/mycert.crt
```

# Ticketing System

This is a simple ticketing system application built with Laravel and Vue.js.

## Features

- Users can create tickets with a subject, priority, content, and optional attachments.
- Users can view a list of tickets and their details.
- Users can reply to tickets, adding additional information or updates.
- Authentication system for user management.
- Integration with Laravel pagination for better performance.

## Technologies

List of technologies used in the project:

- **Laravel**: The PHP framework for building the application backend.
- **Vue.js**: JavaScript framework used for building interactive user interfaces.
- **Tailwind CSS**: Utility-first CSS framework for styling the frontend components.
- **Inertia.js**: Library for building single-page applications with Laravel and Vue.js.
- **MySQL**: Relational database management system used for storing application data.
- **Ziggy**: Package for generating JavaScript routes in Laravel applications.
- **Git**: Version control system for managing and tracking changes in the project codebase.
- **Composer**: Dependency manager for PHP used to install and manage project dependencies.
- **NPM**: Package manager for Node.js used to manage frontend dependencies and scripts.
- **Webpack**: Module bundler used to bundle JavaScript, CSS, and other assets for the frontend.
- **Docker**: Containerization platform used for deploying and running applications in isolated environments.
- **Laravel Sail**: Docker development environment for Laravel projects.
- **Visual Studio Code DevContainer**: Development container configuration for Visual Studio Code.

## Installation

#### Prerequisites

- PHP >= 7.4
- Composer
- Node.js >= 12.x
- NPM or Yarn
- MySQL or SQLite
- Git

1. Clone the repository:

```
git clone <repository_url>
```

2. Install PHP dependencies:

```

composer install

```

3. Install JavaScript dependencies:

```

npm install
```

4. Create a .env file by copying the .env.example file:

```

cp .env.example .env
```

5. Generate an application key:

```

php artisan key:generate
```

6. Configure your database connection in the .env file.

7. Migrate the database:

```

php artisan migrate
```

8. Seed the database (optional):

```

php artisan db:seed
```

9. Compile assets:

```
npm run dev
```

10. Serve the application:

```
php artisan serve
```
11. Access the application in your browser at http://localhost.

## Installation using Docker (Laravel Sail)

1. Clone the repository:

```
git clone <repository_url>
```

2. Navigate to the project directory:
```
cd <project-directory>
```

3. Create a .env file by copying the .env.example file:

```
cp .env.example .env
```

4. Generate an application key:

```
php artisan key:generate
```

5. Install PHP dependencies using Laravel Sail:
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

6. Start the Docker containers using Laravel Sail:
```
./vendor/bin/sail up -d
```

7. Access the application in your browser at http://localhost.

## Usage

- Register an account or log in if you already have one.
- Create a ticket by clicking on the "Create Ticket" button.
- View your tickets on the dashboard.
- Click on a ticket to view its details and reply to it.

## DevContainer

This project includes a development container configuration for Visual Studio Code, which allows you to develop the application in a consistent and isolated environment. The devcontainer configuration includes all the necessary tools and dependencies required to run the application locally.
# Slim PHP Project

This project is built using the Slim PHP framework. Follow the instructions below to set up and run the server.

## Prerequisites

- PHP >= 7.2
- Composer
- XAMPP or any other local server environment

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/Rakinzi/slim-backend-with-auth.git
    ```
2. Navigate to the project directory:
    ```sh
    cd slim-project
    ```
3. Install dependencies using Composer:
    ```sh
    composer install
    ```

## Running the Server

1. Start your XAMPP (or any other local server environment).
2. Ensure Apache and MySQL services are running.
3. Navigate to the project directory in your terminal:
    ```sh
    cd /C:/xampp/htdocs/slim
    ```
4. Start the PHP built-in server:
    ```sh
    php -S localhost:8080 -t public
    ```

Your Slim PHP project should now be running at `http://localhost:8080`.

## Project Structure

- `public/` - The public directory for the project.
- `bootstrap/` - Contains the application bootstrap files.
- `src/` - Contains the source code for the application.
- `config/` - The configurations directory for the project.
- `vendor/` - Contains Composer dependencies.
- `templates/` - Contains the Twig templates for the project.

## Templating Engine

This project uses the Twig templating engine. Twig is a flexible, fast, and secure template engine for PHP. You can find more information about Twig in the [Twig Documentation](https://twig.symfony.com/doc/).


## Additional Resources

- [Slim Documentation](https://www.slimframework.com/docs/)

Feel free to contribute to the project by submitting issues or pull requests.

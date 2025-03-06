# Dynamic Website

This project is a dynamic website built using Laravel, featuring both frontend and backend functionality.

## Setup Instructions

1.  **Clone the Repository:**

    ```bash
    git clone [https://github.com/joslinselva/dynamic-website.git](https://github.com/joslinselva/dynamic-website.git)
    cd dynamic-website
    ```

2.  **Install PHP Dependencies:**

    ```bash
    composer install
    ```

3.  **Install JavaScript Dependencies:**

    ```bash
    npm install
    ```

4.  **Copy Environment File:**

    ```bash
    cp .env.example .env
    ```

5.  **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

6.  **Configure Database if necessary:**

    * Open the `.env` file and update the database credentials (DB\_HOST, DB\_DATABASE, DB\_USERNAME, DB\_PASSWORD).

7.  **Run Database Migrations and Seeders:**

    ```bash
    php artisan migrate --seed
    ```
    * This command will run the migrations and also seed the database with the admin user using the `AdminUserSeeder`.

8.  **Compile Assets:**

    ```bash
    npm run dev  # or npm run build for production
    ```

9.  **Start the Development Server:**

    ```bash
    php artisan serve
    ```

    * The application will be accessible at `http://localhost:8000`.

## Admin Login

* To access the admin panel, use the credentials created by the `AdminUserSeeder`.

    ```bash
    php artisan db:seed --class=AdminUserSeeder
    ```

## Video Walkthrough

* [Video Walkthrough](https://www.awesomescreenshot.com/video/37316654?key=58d5390869c590e78e28cae174ee47fa)

## Additional Notes

* Ensure you have PHP, Composer, and Node.js installed on your system.
* After cloning the repository, it's recommended to run `composer update` to ensure all dependencies are up to date.

## Contributing

[If you want to allow contributions, add instructions on how to contribute to your project.]

## License

[Add your project's license information.]
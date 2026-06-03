# Module 6

## Simple College Experience Portfolio

Module 6 done by:  
Name : Achmad Reihan Alfaiz  
NIM  : 2410817210019

### How to Run

1. Install PHP dependencies with `composer install`.
2. Install frontend dependencies with `npm install`.
3. Create a MySQL database named `prak601_portfolio` using Laragon's HeidiSQL.
4. Copy `.env.example` to `.env` if needed, then configure your database connection with Laragon defaults: `DB_HOST=127.0.0.1`, `DB_PORT=3306`, `DB_USERNAME=root`, and `DB_PASSWORD=`.
   - Make sure Laragon is running so MySQL is available.
5. Run the migrations and seed the sample data:

	`php artisan migrate:fresh --seed`

6. Start the application:

	`composer run dev`

	This will run the Laravel server, queue listener, log viewer, and Vite together.

7. Open the app in your browser at `http://127.0.0.1:8000`.
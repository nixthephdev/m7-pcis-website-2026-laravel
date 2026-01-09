# M7 Philippine Cambridge International School - Official Website

![Project Status](https://img.shields.io/badge/Status-In%20Development-yellow)
![Framework](https://img.shields.io/badge/Laravel-v10-red)
![Styling](https://img.shields.io/badge/Tailwind-CSS-blue)

A premium, international-standard school website designed to boost enrollment and provide a seamless digital experience for parents and students. This project features a modern UI, a 4-color branding system, and a functional online admission system.

## 🚀 Key Features

*   **Premium UI/UX:** Built with a "High-End" aesthetic using *Cinzel* (Header) and *Playfair Display* fonts.
*   **Online Enrollment System:** Functional application form that saves student data to a MySQL database.
*   **Responsive Design:** Fully mobile-responsive with a custom hamburger menu and stacked layouts.
*   **4-Color Brand System:** Dynamic theming using the school's shield colors (Blue, Red, Yellow, Green).
*   **Comprehensive Pages:**
    *   Home (High-converting Hero section)
    *   Academics (Curriculum breakdown)
    *   Admissions (Process & Requirements)
    *   Academic Team (Leadership & Faculty)
    *   International Families Hub (Support for foreign students)
    *   Life at PCIS (Clubs & Activities)
    *   Contact (Google Maps & Department Directory)

## 🛠️ Tech Stack

*   **Backend:** Laravel (PHP Framework)
*   **Frontend:** Blade Templates, HTML5
*   **Styling:** Tailwind CSS (via CDN for rapid development)
*   **Database:** MySQL (via phpMyAdmin/XAMPP)
*   **Icons:** Heroicons (SVG)

## ⚙️ Installation & Setup

Follow these steps to run the project on your local machine (using XAMPP).

### 1. Clone the Repository
```bash
git clone https://github.com/nixthephdev/m7-pcis-website-2026-laravel.git
cd m7-pcis-website-2026-laravel

### 2. Install Dependencies
```bash
Copy code
composer install

###3. Environment Configuration
Duplicate the example environment file and rename it to .env.

```bash
Copy code
cp .env.example .env
Open .env and configure your database settings:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pcis_database
DB_USERNAME=root
DB_PASSWORD=

###4. Generate Application Key
```bash
Copy code
php artisan key:generate

###5. Database Setup
```Open XAMPP and start Apache & MySQL.
Go to http://localhost/phpmyadmin.
Create a new database named pcis_database.
Run the migrations to create the tables:
bash
Copy code
php artisan migrate


###6. Run the Application
```bash
Copy code
php artisan serve
Access the site at: http://127.0.0.1:8000

📂 Project Structure
resources/views/layouts/app.blade.php - The Master Layout (Navbar, Footer, Fonts).
resources/views/welcome.blade.php - The Home Page.
resources/views/enrollment.blade.php - The Application Form.
routes/web.php - All page routes and naming conventions.
app/Http/Controllers/EnrollmentController.php - Logic for handling admissions.
🤝 Contributing
Fork the repository.
Create a feature branch (git checkout -b feature/NewFeature).
Commit your changes.
Push to the branch.
Open a Pull Request.
Developer: nixthephdev
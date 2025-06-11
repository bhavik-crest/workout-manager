# Workout Manager

A modern workout management application built with Laravel, Livewire, and Tailwind CSS.

## Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL
- Git

## Installation Steps

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd workout-manager
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Install Node Dependencies**
   ```bash
   npm install
   ```

4. **Environment Setup**
   ```bash
   # Copy the example env file
   cp .env.example .env

   # Generate application key
   php artisan key:generate
   ```

5. **Configure Database**
   - Open `.env` file and update database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=workout_manager
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run Migrations**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Build Assets**
   ```bash
   # For development
   npm run dev

   # For production
   npm run build
   ```

8. **Start the Development Server**
   ```bash
   php artisan serve
   ```

9. **Access the Application**
   - Visit `http://localhost:8000/admin` in your browser (For Admin)
   - Visit `http://localhost:8000` in your browser (For User)

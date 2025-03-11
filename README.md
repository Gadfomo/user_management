# Laravel User Authentication & Profile Management System

## Project Overview
This Laravel-based web application provides user registration, authentication, profile management, and password/email update functionalities. Users can register, log in, update their profile (including uploading a profile image), and manage their credentials securely.

## Features
- **User Registration**: Users can register with a name and email. A randomly generated password is emailed to them.
- **User Login**: Users log in using their email and the generated password.
- **Profile Management**:
  - Update name
  - Upload and update profile images
  - Change password with confirmation
  - Change email
- **Email Notifications**: Emails are sent upon registration and profile updates.

## Technologies Used
- Laravel (PHP Framework)
- MySQL (Database)
- Tailwind CSS (Frontend Styling)
- XAMPP (Local Development Environment)
- Laravel Storage System (For profile image uploads)
- Laravel Mail (For email notifications)

## Installation
### Prerequisites
Ensure you have the following installed:
- PHP 8+
- Composer
- XAMPP or any local server with MySQL
- Laravel 10+

### Step 1: Clone the Repository
```bash
git clone https://github.com/your-repo-url.git
cd your-project-folder
```

### Step 2: Install Dependencies
```bash
composer install
npm install
```

### Step 3: Configure Environment
Copy the `.env.example` file to `.env`:
```bash
cp .env.example .env
```
Update `.env` with your database and mail configurations.

### Step 4: Generate App Key
```bash
php artisan key:generate
```

### Step 5: Run Migrations
```bash
php artisan migrate
```

### Step 6: Create Storage Link
```bash
php artisan storage:link
```

### Step 7: Start the Development Server
```bash
php artisan serve
```
Access the application at `http://127.0.0.1:8000`.

## Usage
### User Registration
1. Open the registration page.
2. Enter name and email.
3. Submit the form.
4. Check email for login credentials.

### Profile Management
1. Log in to the system.
2. Go to the profile page.
3. Update name, upload profile image, or change credentials.

## Troubleshooting
### Migration Issues
If you encounter migration errors, run:
```bash
php artisan migrate:fresh --seed
```
### File Upload Issues
Ensure the `storage` and `public` directories have correct permissions:
```bash
chmod -R 775 storage/
chmod -R 775 public/
```

## License
This project is open-source and available under the MIT License.

## Contact
For inquiries, contact [fomogad@gmail.com].


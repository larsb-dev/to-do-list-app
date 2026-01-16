# Laravel Task Management Tool

A modern, full-featured todo list application built with Laravel 12, demonstrating best practices in web development including authentication, authorization, CRUD operations, and pagination with filtering.

![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=flat&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-4.0-38B2AC?style=flat&logo=tailwind-css&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3.15-8BC0D0?style=flat&logo=alpine.js&logoColor=white)

## 📋 Features

### Core Functionality
- ✅ **CRUD Operations** - Create, Read, Update, and Delete todos
- 🎯 **Status Management** - Track todos with three states: Not Started, In Progress, and Completed
- 🔍 **Filtering** - Filter todos by status with query string preservation
- 📄 **Pagination** - Simple pagination with 9 items per page
- ⚡ **Quick Complete** - Mark todos as completed with a single click

### Authentication & Authorization
- 🔐 **User Authentication** - Secure login and registration system
- 👤 **Role-Based Access Control (RBAC)** - Custom middleware for role authorization
- 🛡️ **Custom Authentication Middleware** - `EnsureUserIsAuthenticated` and `EnsureUserHasRole`
- 🚪 **Protected Routes** - Guest and authenticated route groups

### Technical Highlights
- 🚀 **Optimized Queries** - Eager loading to prevent N+1 problems
- 🎨 **Modern UI** - Built with TailwindCSS 4.0 and Alpine.js
- 🧩 **Blade Components** - Reusable UI components
- ✅ **Form Validation** - Server-side validation with Laravel's validation system
- 🧪 **Testing Ready** - Configured with Pest PHP for testing
- 🐛 **Debug Toolbar** - Laravel Debugbar for development

## 🛠️ Tech Stack

### Backend
- **Laravel 12** - PHP framework
- **PHP 8.2+** - Programming language
- **SQLite** - Database (easily switchable to MySQL/PostgreSQL)
- **Eloquent ORM** - Database abstraction

### Frontend
- **TailwindCSS 4.0** - Utility-first CSS framework
- **Alpine.js 3.15** - Lightweight JavaScript framework
- **Vite 7.0** - Frontend build tool
- **Blade Templates** - Laravel's templating engine

### Development Tools
- **Pest PHP 4.3** - Testing framework
- **Laravel Pint** - Code style fixer
- **Laravel Debugbar** - Debugging tool
- **Laravel Pail** - Log viewer
- **Concurrently** - Run multiple dev processes

## 📦 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js 18+ and npm
- SQLite (or MySQL/PostgreSQL if you prefer)

### Quick Setup

```bash
# Clone the repository
git clone <your-repository-url>
cd to-do-list-app

# Install dependencies and setup
composer setup

# This runs:
# - composer install
# - Copies .env.example to .env
# - Generates application key
# - Runs migrations
# - npm install
# - npm run build
```

### Manual Setup

If you prefer to set up manually:

```bash
# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Create SQLite database file
touch database/database.sqlite

# Run migrations
php artisan migrate

# Seed the database (optional)
php artisan db:seed

# Install Node dependencies
npm install

# Build frontend assets
npm run build
```

## 🚀 Running the Application

### Development Mode (Recommended)

Run all development services with a single command:

```bash
composer run dev
```

This runs concurrently:
- **Laravel development server** (http://localhost:8000)
- **Queue listener**
- **Log viewer (Pail)**
- **Vite dev server** (Hot Module Replacement)

## 📖 Usage

### Default User
After running the seeder, you can log in with:
- **Email:** test@example.com
- **Password:** password

### Managing Todos

1. **Create a Todo**
   - Click "Add New Todo" button
   - Fill in the title, description, and select a status
   - Submit the form

2. **Filter Todos**
   - Use the status filter buttons to view todos by status
   - URL will reflect the current filter (e.g., `?status=not_started`)

3. **Edit a Todo**
   - Click the "Edit" button on any todo card
   - Modify the details and save

4. **Complete a Todo**
   - Click the "Mark Complete" button to instantly set status to Completed

5. **Delete a Todo**
   - Click the "Delete" button and confirm

### Status Types
- **Not Started** - Todo hasn't been started yet
- **In Progress** - Currently working on the todo
- **Completed** - Todo is finished

## 🏗️ Project Structure

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/           # Authentication controllers
│   │   │   └── TodoController.php
│   │   └── Middleware/
│   │       ├── EnsureUserHasRole.php
│   │       └── EnsureUserIsAuthenticated.php
│   └── Models/
│       ├── Status.php          # Status model with constants
│       ├── Todo.php            # Todo model
│       └── User.php            # User model with role support
├── database/
│   ├── factories/              # Model factories
│   ├── migrations/             # Database migrations
│   └── seeders/                # Database seeders
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── auth/               # Authentication views
│       ├── components/         # Blade components
│       ├── layouts/            # Layout templates
│       └── todos/              # Todo views
└── routes/
    ├── auth.php                # Authentication routes
    └── web.php                 # Web routes
```

## 🔑 Key Features Explained

### Authentication System
Custom authentication implementation with:
- Registration with name, email, and password
- Login/logout functionality
- Protected routes using middleware
- Session-based authentication

### Authorization
Role-based access control with:
- `hasRole()` method on User model
- `EnsureUserHasRole` middleware with role parameter
- Example: `middleware('role:admin')` in routes

### Optimized Database Queries
```php
// Eager loading to prevent N+1 problems
Todo::with('status')->select(['id', 'title', 'description', 'status_id']);
```

### Query String Preservation
Pagination maintains filter parameters:
```php
$todos->simplePaginate(9)->withQueryString();
```

## 🎨 Customization

### Changing Database
Edit `.env` to use MySQL or PostgreSQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Adjusting Pagination
Edit `TodoController.php`:
```php
// Change from 9 to your preferred number
$todos = $todos->simplePaginate(9)->withQueryString();
```

### Adding More Statuses
Add constants to `app/Models/Status.php` and create a migration to add the new status to the database.

## 🐛 Known Issues & Future Improvements

### Current Known Issues
- ~~Pagination doesn't preserve filter query strings~~ ✅ **FIXED** with `withQueryString()`

### Future Enhancements
- [ ] Deployment with Docker Compose
- [ ] User-specific todos (multi-tenancy)
- [ ] Due dates and reminders
- [ ] Search functionality
- [ ] Email notifications
- [ ] Export todos (PDF/CSV)

## 📝 Code Style

This project follows Laravel conventions and uses:
- **PSR-12** coding standard
- **Laravel Pint** for automatic code formatting

Format code with:
```bash
./vendor/bin/pint
```

## 🤝 Contributing

This is a learning/portfolio project. Feel free to fork and experiment!

### Development Workflow
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Make your changes
4. Run tests (`composer test`)
5. Format code (`./vendor/bin/pint`)
6. Commit changes (`git commit -m 'Add amazing feature'`)
7. Push to branch (`git push origin feature/amazing-feature`)
8. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

Built as a learning project to demonstrate:
- Laravel 12 framework capabilities
- Modern PHP development practices
- Authentication and Authorization (AuthN/AuthZ)
- RESTful resource controllers
- Database optimization techniques
- Frontend integration with TailwindCSS and Alpine.js

---

**Note:** This project is designed to be junior developer friendly, showcasing fundamental concepts in web development including authentication (AuthN) and authorization (AuthZ), CRUD operations, and best practices in Laravel development.


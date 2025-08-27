# Laravel 12 Admin Starter

A modern, pre-configured **Admin Portal** template built on the latest Laravel stack. This project delivers robust authentication, a responsive admin dashboard, and seamless UI integration—making it the perfect foundation for your next admin project.

---

## ✨ Features

- **Laravel 12** – Modern PHP framework for scalable web applications  
- **PHP 8.3+** – Latest PHP version support  
- **SQLite/MySQL** – Flexible database options for development and production  
- **Laravel Breeze (Blade)** – Lightweight, customizable authentication scaffolding  
- **AdminLTE 3.0** – Responsive, feature-rich admin dashboard template  
- **FontAwesome 7.0.0** – Clean, modern icon set  
- **Pre-built Auth Pages** – Login, Register, and Dashboard styled with AdminLTE  
- **Mobile-First Design** – Fully responsive layouts  
- **Easy Customization** – Modular Blade templates for rapid development
- **Tailwind CSS** – Utility-first CSS framework for custom styling
- **Vite** – Modern frontend build tool for fast development

---

## 🎯 Purpose

The goal of this project is to provide a **ready-to-use admin starter kit** for quickly building secure, scalable, and modern admin portals with Laravel.

---

## 🚀 Quick Start

### Prerequisites

- **PHP 8.3+** with extensions: `bcmath`, `ctype`, `fileinfo`, `json`, `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`
- **Composer** 2.0+
- **Node.js** 18+ and **npm** 9+
- **Web Server** (Apache/Nginx) or use Laravel's built-in server

### 1. Clone the repository
```bash
git clone <your-repository-url>
cd laravel12_admin
```

### 2. Install PHP dependencies
```bash
composer install
```

### 3. Install Node.js dependencies
```bash
npm install
```

### 4. Environment setup
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Database configuration
```bash
# For SQLite (default)
touch database/database.sqlite

# For MySQL (update .env file first)
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel_admin
# DB_USERNAME=root
# DB_PASSWORD=
```

### 6. Run migrations and seeders
```bash
php artisan migrate
php artisan db:seed
```

### 7. Build frontend assets
```bash
npm run build
# or for development: npm run dev
```

### 8. Start the development server
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser!

---

## 🏗️ Project Structure

```
laravel12_admin/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   ├── Models/               # Eloquent models
│   ├── Providers/            # Service providers
│   └── View/Components/      # Blade components
├── config/                   # Configuration files
├── database/
│   ├── migrations/           # Database migrations
│   ├── seeders/             # Database seeders
│   └── factories/            # Model factories
├── public/                   # Public assets (CSS, JS, images)
├── resources/
│   ├── views/                # Blade templates
│   ├── css/                  # Source CSS files
│   └── js/                   # Source JavaScript files
├── routes/                   # Application routes
└── storage/                  # Application storage
```

---

## 🔧 Configuration

### Environment Variables

Key environment variables in `.env`:

```env
APP_NAME="Laravel Admin"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database.sqlite

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
```

### Database Configuration

The project comes with SQLite by default for easy development. For production, consider using MySQL or PostgreSQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_admin
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

---

## 🎨 Customization

### Adding New Admin Pages

1. **Create Controller:**
```bash
php artisan make:controller Admin/UserController
```

2. **Add Route** in `routes/web.php`:
```php
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
});
```

3. **Create View** in `resources/views/admin/users/index.blade.php`

### Customizing AdminLTE Theme

Modify the AdminLTE variables in `resources/css/app.css`:

```css
:root {
    --adminlte-primary: #007bff;
    --adminlte-secondary: #6c757d;
    --adminlte-success: #28a745;
    --adminlte-info: #17a2b8;
    --adminlte-warning: #ffc107;
    --adminlte-danger: #dc3545;
}
```

---

## 🧪 Testing

Run the test suite:

```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/Auth/LoginTest.php

# Run tests with coverage
php artisan test --coverage
```

---

## 📦 Available Commands

```bash
# Development
php artisan serve          # Start development server
php artisan migrate        # Run database migrations
php artisan db:seed        # Seed database with sample data
php artisan make:model     # Create new model
php artisan make:controller # Create new controller

# Frontend
npm run dev               # Start Vite dev server
npm run build            # Build for production
npm run preview          # Preview production build

# Maintenance
php artisan cache:clear   # Clear application cache
php artisan config:clear  # Clear config cache
php artisan route:clear   # Clear route cache
php artisan view:clear    # Clear view cache
```

---

## 🔒 Security Features

- **CSRF Protection** - Built-in Laravel CSRF token validation
- **SQL Injection Prevention** - Eloquent ORM with parameter binding
- **XSS Protection** - Blade template escaping
- **Authentication** - Laravel Breeze with secure session management
- **Authorization** - Middleware-based access control

---

## 🌐 Deployment

### Production Checklist

- [ ] Set `APP_ENV=production` and `APP_DEBUG=false`
- [ ] Configure production database
- [ ] Set up proper mail configuration
- [ ] Configure web server (Apache/Nginx)
- [ ] Set up SSL certificate
- [ ] Configure caching (Redis/Memcached)
- [ ] Set up queue workers for background jobs

### Deployment Commands

```bash
# On production server
composer install --optimize-autoloader --no-dev
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
```

---

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

---

## 📚 Additional Resources

- [Laravel Documentation](https://laravel.com/docs)
- [AdminLTE Documentation](https://adminlte.io/docs)
- [Laravel Breeze Documentation](https://laravel.com/docs/starter-kits#laravel-breeze)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Vite Documentation](https://vitejs.dev/guide/)

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 🆘 Support

If you encounter any issues or have questions:

1. Check the [Laravel documentation](https://laravel.com/docs)
2. Search existing [GitHub issues](https://github.com/your-repo/issues)
3. Create a new issue with detailed information

---

**Happy coding! 🚀**

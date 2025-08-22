# TALL Stack Tutorial

A comprehensive tutorial project demonstrating the **TALL Stack** - a modern web development stack that combines:

- **[Tailwind CSS](https://tailwindcss.com)** - Utility-first CSS framework
- **[Alpine.js](https://alpinejs.dev/)** - Lightweight JavaScript framework
- **[Laravel](https://laravel.com)** - PHP web application framework
- **[Livewire](https://livewire.laravel.com)** - Full-stack framework for Laravel

## 🚀 Features

This tutorial project includes:

- **Complete Authentication System** with Livewire components
  - User registration and login
  - Password reset functionality
  - Email verification
  - Password confirmation
- **Modern UI/UX** with Tailwind CSS
  - Responsive design
  - Loading states and animations
  - Form validation styling
  - Professional authentication forms
- **Interactive Components** with Alpine.js
  - Real-time form interactions
  - Loading indicators
  - Dynamic content updates
- **Full-Stack Development** with Laravel & Livewire
  - Server-side rendering
  - Real-time updates without page refreshes
  - Clean, maintainable code

## 📋 Prerequisites

Before you begin, ensure you have the following installed:

- **PHP** >= 8.1
- **Composer** >= 2.0
- **Node.js** >= 16.0
- **npm** >= 8.0
- **Laravel** >= 10.0

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd tall-stack-tutorial
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

## 🎨 Development

### Running in Development Mode

```bash
# Terminal 1: Start Laravel development server
php artisan serve

# Terminal 2: Start Vite development server
npm run dev
```

### Building for Production

```bash
npm run build
```

## 📁 Project Structure

```
tall-stack-tutorial/
├── app/
│   ├── Http/
│   │   └── Livewire/          # Livewire components
│   └── Models/
├── resources/
│   ├── css/
│   │   └── app.css           # Tailwind CSS imports
│   ├── js/
│   │   ├── app.js            # Main JavaScript file
│   │   └── bootstrap.js      # Alpine.js setup
│   └── views/
│       ├── layouts/          # Blade layouts
│       └── livewire/         # Livewire component views
│           └── auth/         # Authentication components
├── routes/
│   └── web.php              # Web routes
└── database/
    └── migrations/          # Database migrations
```

## 🔧 Key Technologies

### Frontend
- **Tailwind CSS v4.0** - Utility-first CSS framework
- **Alpine.js v3.13** - Lightweight JavaScript framework
- **Vite** - Fast build tool and dev server

### Backend
- **Laravel v10** - PHP web framework
- **Livewire v3** - Full-stack framework for Laravel
- **MySQL/PostgreSQL** - Database

## 🎯 Learning Objectives

By following this tutorial, you'll learn:

1. **TALL Stack Fundamentals**
   - How to integrate Tailwind CSS, Alpine.js, Laravel, and Livewire
   - Best practices for modern web development

2. **Authentication System**
   - Building complete user authentication with Livewire
   - Form validation and error handling
   - Security best practices

3. **Modern UI/UX**
   - Creating responsive designs with Tailwind CSS
   - Implementing loading states and animations
   - Building professional-looking forms

4. **Interactive Components**
   - Using Alpine.js for client-side interactions
   - Real-time form updates
   - Dynamic content loading

## 🐛 Troubleshooting

### Common Issues

1. **Assets not loading**
   - Run `npm run dev` or `npm run build`
   - Check if Vite is running

2. **Alpine.js not working**
   - Ensure Alpine.js is imported in `resources/js/bootstrap.js`
   - Check browser console for errors

3. **Tailwind styles not applying**
   - Verify Tailwind CSS is imported in `resources/css/app.css`
   - Check if classes are properly configured

## 📚 Additional Resources

- [TALL Stack Documentation](https://tallstack.dev)
- [Laravel Documentation](https://laravel.com/docs)
- [Livewire Documentation](https://livewire.laravel.com/docs)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Alpine.js Documentation](https://alpinejs.dev/docs)

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

**Happy coding with the TALL Stack! 🎉**

# Course Academy

**Course Academy** is a Laravel-based platform for managing courses and students. It allows you to add, edit, and delete courses, and enroll students in different courses through a simple and robust admin dashboard.

---

## 🚀 Main Features

- Add, update, or delete courses (with title, description, level, and price).
- Manage students and assign them to courses (enroll/unenroll).
- Course classification by level (beginner, intermediate, advanced).
- Modern user interface using [AdminLTE](https://adminlte.io/) and Bootstrap.
- Error and success messages for main operations.
- Clean code structure leveraging Laravel MVC.
- Many-to-many relationship between courses and students.

---

## 🛠 Requirements

- PHP 8 or later
- Composer
- MySQL Database
- Node.js and npm (for frontend assets if needed)
- Laravel 10 or later

---

## ⚡ Getting Started

1. **Clone the repository**
   ```bash
   git clone https://github.com/Osama-Abd-El-Mohsen/Course-Academy.git
   cd Course-Academy
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Copy and configure environment file**
   ```bash
   cp .env.example .env
   ```
   - Edit your `.env` file for database and other settings.

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Serve the application**
   ```bash
   php artisan serve
   ```

7. **Access the dashboard**
   - Visit the URL shown in your terminal (usually: http://127.0.0.1:8000)

---

## 🌟 Future Improvements

- Add authentication and user roles (Admin/Users).
- Course image upload.
- Public course listing page.
- Advanced reports and analytics.
- Multilingual support (EN/AR).

---

## 🤝 Contributing

Contributions are welcome! Please open an issue or a pull request for suggestions, bug reports, or enhancements.

---

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

---

**Made with ❤️ by [Osama Abd El Mohsen](https://github.com/Osama-Abd-El-Mohsen)**

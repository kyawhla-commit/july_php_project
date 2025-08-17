# User Management System

A simple PHP-based user management system with authentication, registration, and admin panel functionality.

## Features

- User registration and login
- Session-based authentication
- Admin panel for user management
- Role-based access control
- User profile management with photo upload
- Bootstrap-styled responsive UI
- MySQL database integration
- Data seeding with Faker

## Requirements

- PHP 8.0+
- MySQL/MariaDB
- Composer
- Web server (Apache/Nginx)

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd <project-directory>
```

2. Install dependencies:
```bash
composer install
```

3. Create a MySQL database named `project`

4. Set up the database tables:
```sql
-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    password VARCHAR(255) NOT NULL,
    role_id INT DEFAULT 1,
    photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Roles table
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

-- Insert default roles
INSERT INTO roles (id, name) VALUES 
(1, 'User'),
(2, 'Moderator'), 
(3, 'Admin');
```

5. Configure database connection in `_classes/Libs/Database/MySQL.php` if needed:
```php
private $dbhost = "localhost",
private $dbuser = "root", 
private $dbpass = "", 
private $dbname = "project",
```

6. Seed the database with sample data (optional):
```bash
php seed.php
```

## Usage

### User Registration
- Navigate to `register.php` to create a new account
- Fill in name, email, phone, address, and password

### User Login
- Access the main page (`index.php`) to log in
- Use registered email and password

### Admin Panel
- Access `admin.php` after logging in
- View all users with their roles
- Delete users (admin functionality)

### User Profile
- Access `profile.php` to view and update profile
- Upload profile photo

## File Structure

```
├── _actions/           # Action handlers
│   ├── create.php     # User registration handler
│   ├── delete.php     # User deletion handler
│   ├── login.php      # Login handler
│   ├── logout.php     # Logout handler
│   └── upload.php     # Photo upload handler
├── _classes/          # PHP classes
│   ├── Helpers/       # Helper classes
│   │   ├── Auth.php   # Authentication helper
│   │   └── HTTP.php   # HTTP utilities
│   └── Libs/          # Core libraries
│       └── Database/  # Database classes
│           ├── MySQL.php      # MySQL connection
│           └── UsersTables.php # User operations
├── css/               # Stylesheets
├── tests/             # Test files
├── vendor/            # Composer dependencies
├── admin.php          # Admin panel
├── index.php          # Login page
├── profile.php        # User profile page
├── register.php       # Registration page
└── seed.php           # Database seeder
```

## Security Notes

- Passwords are stored in plain text (⚠️ **Not recommended for production**)
- Consider implementing password hashing (bcrypt/Argon2)
- Add CSRF protection for forms
- Implement input validation and sanitization
- Use prepared statements (already implemented)

## Development

### Running Tests
```bash
php tests/auth.php
php tests/mysql.php
# ... other test files
```

### Adding New Features
1. Create action handlers in `_actions/`
2. Add database methods in `UsersTables.php`
3. Create corresponding UI pages
4. Update routing as needed

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This project is open source and available under the [MIT License](LICENSE).
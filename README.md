# Posong Web - Tourism Reservation System

A comprehensive web-based reservation system for Posong Tourism, featuring camping reservations, accommodation booking, and tourist facility management.

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Configuration](#configuration)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Admin Panel](#admin-panel)
- [Contributing](#contributing)
- [License](#license)

## Overview

Posong Web is a tourism reservation system designed for camping and outdoor recreation facilities. The system allows visitors to:

- Browse available accommodations and facilities
- Make reservations for camping spots and cabins
- Upload payment proofs and manage bookings
- Leave reviews with photos
- View location information and documentation

Administrators can manage reservations, confirm payments, handle reviews, and oversee the entire booking system.

## Features

### For Visitors:
- **Accommodation Booking**: Reserve wood cabins and tent camping spots
- **Real-time Availability**: Check capacity and available dates
- **Payment Management**: Upload payment proofs and track payment status
- **Review System**: Leave ratings and upload photos of experiences
- **Location Information**: View facility details and location guides
- **User Dashboard**: Manage personal reservations and profile

### For Administrators:
- **Admin Dashboard**: Overview of reservations and system statistics
- **Reservation Management**: Confirm, cancel, or modify bookings
- **Payment Verification**: Review and approve payment submissions
- **Review Moderation**: Manage visitor reviews and feedback
- **Voucher Management**: Create and manage discount vouchers

### Technical Features:
- **Responsive Design**: Mobile-friendly interface
- **Secure Authentication**: User and admin login systems
- **File Upload**: Support for payment proofs and review photos
- **Database Integration**: MySQL database with proper relationships
- **Modern UI**: Bootstrap-based responsive design

## Prerequisites

Before setting up the project, ensure you have:

- **PHP 7.4+** (recommended PHP 8.1)
- **MySQL 5.7+** or **MariaDB 10.3+**
- **Apache** or **Nginx** web server
- **phpMyAdmin** (optional, for database management)

### Development Environment Options:
- **XAMPP** (recommended for Windows)
- **WAMP** (Windows)
- **MAMP** (macOS)
- **LAMP** (Linux)

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/CapDMarshal/posong-web.git
cd posong-web
```

### 2. Set up Web Server

#### Using XAMPP:
1. Copy the project folder to `htdocs` directory
2. Start Apache and MySQL services
3. Access via `http://localhost/posong-web`

#### Using PHP Built-in Server (Development):
```bash
php -S localhost:8000
```

## Database Setup

### 1. Create Database

Open phpMyAdmin or your MySQL client and create a new database:

```sql
CREATE DATABASE posong_web;
```

### 2. Import Database Schema

Import the provided SQL file:

```bash
mysql -u root -p posong_web < assets/backup_db/posong_web.sql
```

Or use phpMyAdmin:
1. Select `posong_web` database
2. Go to "Import" tab
3. Choose `assets/backup_db/posong_web.sql`
4. Click "Go"

### 3. Database Structure

The database includes the following tables:
- `admin` - Administrator accounts
- `reservations` - Booking information
- `users` - Visitor accounts
- `Review` - Customer reviews and ratings
- `vouchers` - Discount vouchers

## Configuration

### Database Configuration

Edit `config.php` to match your database settings:

```php
$servername = "localhost";
$username = "root";        // Your MySQL username
$password = "";            // Your MySQL password
$dbname = "posong_web";    // Database name
```

### File Permissions

Ensure the uploads directory is writable:

```bash
chmod 755 assets/uploads/
```

## Usage

### For Visitors:

1. **Registration**: Create an account via the registration page
2. **Browse Facilities**: View available accommodations and amenities
3. **Make Reservation**: 
   - Select dates and accommodation type
   - Fill in guest details
   - Choose package options
4. **Payment**: Upload payment proof via the payment page
5. **Review**: Leave feedback after your visit

### For Administrators:

1. **Login**: Access admin panel with administrator credentials
2. **Dashboard**: Monitor reservations and system overview
3. **Manage Reservations**: 
   - View pending bookings
   - Confirm or cancel reservations
   - Update booking status
4. **Payment Verification**: Review and approve payment proofs
5. **Content Management**: Moderate reviews and manage vouchers

## Project Structure

```
posong-web/
├── admin/                      # Admin panel pages
│   ├── admin_dashboard.php     # Admin overview
│   ├── confirm_reservation.php # Reservation management
│   ├── dashboard.php          # Admin dashboard
│   ├── manage_review.php      # Review moderation
│   └── manage_voucher.php     # Voucher management
├── assets/                    # Static assets
│   ├── backup_db/            # Database backup
│   │   └── posong_web.sql    # Database schema and data
│   ├── img/                  # Images and graphics
│   ├── layout/               # Layout components
│   │   ├── footer.php        # Footer component
│   │   ├── head.php          # HTML head section
│   │   └── navbar.php        # Navigation bar
│   ├── style.css             # Main stylesheet
│   └── uploads/              # User uploaded files
├── booking.php               # Reservation booking page
├── calculate_price.php       # Price calculation logic
├── check_capacity.php        # Availability checker
├── config.php                # Database configuration
├── documentation.php         # Documentation and info
├── index.php                 # Homepage
├── location.php              # Location information
├── login.php                 # User login
├── logout.php                # Logout handler
├── payment.php               # Payment upload
├── register.php              # User registration
├── reservation.php           # Reservation processing
├── review.php                # Review submission
├── session.php               # Session management
├── update_payment.php        # Payment update handler
└── user_dashboard.php        # User dashboard
```

## Admin Panel

### Default Admin Credentials:
- **Username**: `AdminTest`
- **Email**: `admintest@gmail.com`
- **Password**: Check the hashed password in the database

### Admin Features:
- **Reservation Management**: View, confirm, and manage all bookings
- **Payment Verification**: Review uploaded payment proofs
- **Review Moderation**: Approve or hide customer reviews
- **Voucher System**: Create and manage discount codes
- **Dashboard Analytics**: View booking statistics and trends

## Customization

### Styling
- Main styles are in `assets/style.css`
- Bootstrap 5 is used for responsive design
- Custom components in `assets/layout/`

### Images
- Replace images in `assets/img/` with your facility photos
- Update carousel images in the homepage
- Ensure proper image optimization for web

### Content
- Edit facility descriptions in `index.php`
- Update location information in `location.php`
- Modify documentation content in `documentation.php`

## Development

### Local Development Setup:

```bash
# Start PHP development server
php -S localhost:8000

# Or use XAMPP/WAMP and access via
# http://localhost/posong-web
```

### Adding New Features:

1. Follow the existing code structure
2. Update database schema if needed
3. Maintain responsive design principles
4. Test on multiple browsers and devices

## Security Considerations

- **Password Hashing**: Uses `password_hash()` and `password_verify()`
- **SQL Injection Protection**: Prepared statements used where applicable
- **File Upload Security**: Validate file types and sizes
- **Session Management**: Secure session handling
- **Input Validation**: Sanitize user inputs

## Troubleshooting

### Common Issues:

1. **Database Connection Error**:
   - Check `config.php` settings
   - Ensure MySQL service is running
   - Verify database credentials

2. **File Upload Issues**:
   - Check directory permissions (755 or 777)
   - Verify PHP upload limits
   - Ensure sufficient disk space

3. **Session Problems**:
   - Check PHP session configuration
   - Verify session directory permissions
   - Clear browser cookies

## Future Enhancements

- [ ] Online payment integration
- [ ] Email notifications
- [ ] SMS booking confirmations
- [ ] Multi-language support
- [ ] Advanced reporting dashboard
- [ ] Mobile app integration
- [ ] API development

---
# Hospital Management System

A web-based hospital management system built with PHP and MySQL, designed to manage hospital and patient data efficiently.

## Features

- Admin Dashboard
  - View and manage hospitals
  - Access system-wide statistics
  - Monitor patient data across all hospitals

- Hospital Dashboard
  - Manage patient records
  - View patient statistics
  - Add new patients

- Patient Management
  - Track patient details including name, age, and disease
  - Record date of entry
  - Associate patients with specific hospitals

## Database Structure

### Tables

1. **admin**
   - id (INT, Primary Key, Auto Increment)
   - username (VARCHAR(255), Unique)
   - password (VARCHAR(255))

2. **hospitals**
   - id (INT, Primary Key, Auto Increment)
   - name (VARCHAR(255))
   - username (VARCHAR(255), Unique)
   - password (VARCHAR(255))

3. **patients**
   - id (INT, Primary Key, Auto Increment)
   - hospital_id (INT, Foreign Key)
   - name (VARCHAR(255))
   - age (INT)
   - disease (VARCHAR(255))
   - date_of_entry (TIMESTAMP)

## Setup Instructions

1. **Prerequisites**
   - XAMPP (Apache, MySQL, PHP)
   - Web browser

2. **Installation**
   - Clone or download this repository to your XAMPP's htdocs folder
   - Start Apache and MySQL services in XAMPP
   - Import the database schema (if not already created)
   - Access the application through your web browser at `http://localhost/wt_proj2`

3. **Configuration**
   - Update database credentials in `db.php` if needed
   - Default database name: `db1`

## Usage

1. **Login**
   - Access the login page at `login.html`
   - Use admin or hospital credentials to log in

2. **Admin Access**
   - View and manage all hospitals
   - Access system-wide statistics
   - Monitor patient data

3. **Hospital Access**
   - Manage patient records
   - View patient statistics
   - Add new patients

## Security Features

- Password protection for both admin and hospital accounts
- Session management
- Secure logout functionality

## File Structure

- `login.html` - Login page
- `login.php` - Login authentication
- `admin_dashboard.php` - Admin interface
- `hospital_dashboard.php` - Hospital interface
- `fetch_chart_data.php` - Data visualization support
- `db.php` - Database connection
- `logout.php` - Session termination
- `assets/` - Contains CSS, JavaScript, and other static files

## Support

For any issues or questions, please contact the system administrator. 
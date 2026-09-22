# Adey - Wedding Store & Equipment Rental Platform

Adey is a multi-vendor wedding equipment and services rental marketplace web application built with PHP and MySQL using a lightweight custom MVC architecture.

## Features

- **Multi-Role System**:
  - **Customers**: Browse equipment (attire, cars, makeup, decor), request rentals by date range, manage orders, and upload bank transfer receipts.
  - **Vendors**: Manage equipment listings, upload item photos, monitor rental transactions, verify customer payment slips, and generate rental reports.
  - **Admin**: Manage all users (customers and vendors), manage equipment categories, and oversee system operations.
- **Catalogue & Categories**:
  - Suits & Dresses
  - Vehicles & Luxury Wedding Cars
  - Decorations & Floral Setups
  - Makeup Packages
  - Tables & Chairs
- **Manual / Bank Transfer Flow**:
  - Supports offline/bank deposits with transaction proof upload and vendor confirmation workflow.

## Tech Stack

- **Backend**: PHP (MVC structure, PDO database abstraction)
- **Database**: MySQL / MariaDB (adeydb)
- **Frontend**: Bootstrap 4, Argon Dashboard (Admin/Vendor), jQuery, Owl Carousel, Select2, FontAwesome

## Getting Started

### Prerequisites

- XAMPP, WampServer, or LAMP stack (PHP 7.4+ or 8.x and MySQL 5.7+)
- Apache mod_rewrite enabled

### Installation

1. **Clone the repository**:
   git clone <repository-url> wedding

2. **Move to web server root**:
   Place the project folder inside your htdocs (or www) directory:
   htdocs/wedding/

3. **Import Database**:
   - Open PHPMyAdmin or MySQL CLI.
   - Create a database named adeydb.
   - Import the SQL schema and seed data from Database/adeydb.sql.

4. **Configuration**:
   - Check app/config/config.php and verify your BASEURL and database credentials.

5. **Run the Application**:
   - Start Apache and MySQL in your server control panel.
   - Navigate to http://localhost/wedding or http://localhost/wedding/public in your browser.

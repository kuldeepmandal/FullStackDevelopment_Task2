# Inventory & Stock Tracking System

## Module
5CS045 – Full Stack Development  
Task 2: Database-Driven Web Application

## Student Details
Name: Kuldeep Mandal  
Student ID: np02cs4a240051  
Academic Year: 2025–2026  

## Login Credentials
Username: admin  
Password: cool123  

(Password is stored securely using PHP password hashing.)

---

## Setup Instructions
1. Install XAMPP and start Apache & MySQL
2. Create database `np02cs4a240051` in phpMyAdmin
3. Import the `products` table
4. Place the project folder inside `htdocs`
5. Open:
   http://localhost/inventory_management/public/index.php

---

### Public User Features
- View product inventory
- View stock levels
- Low-stock indicator
- Search products by:
- Product name
- Maximum price
- Ajax-based autocomplete search suggestions
- Add to Cart and Place Order (reduces stock)

### Admin Features
- Secure admin login
- Admin dashboard
- Add new products
- Edit existing products
- Delete products
- Ajax-based stock refresh (no page reload)
- Logout functionality

---

## Ajax Functionality

The system uses Ajax for:
- **Live stock refresh** in the admin dashboard without reloading the page
- **Autocomplete product search**, providing suggestions as the user types

These features improve usability and demonstrate asynchronous client–server interaction.

---

## Security Implementation

- **Prepared statements (PDO)** used to prevent SQL injection
- **Password hashing** using `password_hash()` and `password_verify()`
- **Session-based authentication** to restrict admin access
- **Output escaping** using `htmlspecialchars()` to prevent XSS attacks
- Admin routes protected using `auth.php`

---
---

## Known Issues
- Single admin account only
- No pagination for large datasets
- No order history storage

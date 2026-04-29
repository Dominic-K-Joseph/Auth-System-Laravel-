# Auth System (Laravel)

A simple and secure authentication system built using Laravel. This project demonstrates user registration, login, session-based authentication, validation, and secure logout functionality with a clean UI.

---

## Features

- User Registration with validation  
- Email validation using regex  
- Strong password validation (min length, uppercase, lowercase, number, symbol)  
- Secure password hashing using Laravel (`Hash::make`)  
- User Login using Laravel authentication (`Auth::attempt`)  
- Session-based authentication  
- Secure Logout using POST method with CSRF protection  
- Session invalidation and token regeneration  
- Error messages displayed under each input field  
- Clean and responsive UI using Tailwind CSS  

---

## Technologies Used

- PHP  
- Laravel  
- MySQL  
- Blade Template Engine  
- Tailwind CSS  

---

## Database

**Database Name:** `db_auth_system`

### Users Table Structure:

| Column | Type |
|------|------|
| id | INT (Primary Key) |
| name | VARCHAR |
| email | VARCHAR (Unique) |
| password | VARCHAR |
| created_at | TIMESTAMP |
| updated_at | TIMESTAMP |

---
##  Database Setup

The database file is included in the repository:

-> `db_auth_system.sql`

### Steps to Import:

1. Create a database in MySQL:
```sql
CREATE DATABASE db_auth_system;
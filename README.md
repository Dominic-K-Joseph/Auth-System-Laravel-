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

## Test Cases

1. Register with valid data → Success  
2. Register with invalid email → Error shown  
3. Register with weak password → Validation error  
4. Login with correct credentials → Redirect to welcome page  
5. Login with incorrect credentials → Error message displayed  
6. Access welcome without login → Redirect to login page  
7. Logout → Session cleared and redirect to login  
8. Reset password with valid email → Success message  
9. Reset password with invalid email → Error shown  

---

## Business Rules

1. Email must be unique  
2. Password must be minimum 8 characters  
3. Password must include uppercase, lowercase, number, and symbol  
4. Only authenticated users can access welcome page  
5. Logout must be secure (POST + CSRF)  
6. Input validation is required for all forms  
7. Passwords are stored in hashed format  

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
|--------|------|
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
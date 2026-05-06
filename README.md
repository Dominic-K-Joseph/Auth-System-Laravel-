# Auth System (Laravel)

A secure authentication system built using Laravel.  
This project demonstrates registration, login, logout, session handling, secure password reset flow, validation architecture using Laravel Form Requests, and secure password hashing with a clean responsive UI.

---

# Features

- User Registration with validation
- User Login with authentication
- Session-based authentication handling
- Secure Logout with session invalidation
- Forgot Password & Reset Password flow
- Reset token verification using session token
- Strong password validation:
  - Minimum 8 characters
  - Uppercase letter
  - Lowercase letter
  - Number
  - Special character
- Email validation using regex
- Password hashing using Laravel `Hash::make`
- Validation error messages under each input
- Success/error toast notifications
- Protected routes using authentication middleware
- Clean UI using Tailwind CSS
- Laravel Form Request Validation architecture

---

#  Documentation

Detailed project documentation is included separately:

- `TEST_CASES.md`
- `BUSINESS_RULES.md`

These documents contain:
- Detailed test scenarios
- Expected/actual results
- Business logic explanations
- Validation and security rules

---

#  Technologies Used

- PHP
- Laravel
- MySQL
- Blade Template Engine
- Tailwind CSS

---

# Database

### Database Name

```text
db_auth_system
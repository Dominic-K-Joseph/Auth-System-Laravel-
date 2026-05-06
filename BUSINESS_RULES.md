# Business Rules – Auth System

## 1. User Registration Rules

- Name field is mandatory.
- Email address must be unique.
- Email must follow valid email format.
- Password must contain:
  - Minimum 8 characters
  - At least one uppercase letter
  - At least one lowercase letter
  - At least one number
  - At least one special character

---

## 2. Authentication Rules

- Only registered users can login.
- Invalid email addresses should display:
  “Email not found in our records”.
- Incorrect passwords should display:
  “Incorrect password”.
- Authenticated users only can access protected pages.

---

## 3. Session Management Rules

- Laravel session-based authentication is used.
- Session must be invalidated during logout.
- CSRF token regeneration occurs during logout for security.

---

## 4. Password Security Rules

- Passwords are stored using Laravel password hashing (`Hash::make`).
- Plain text passwords are never stored in the database.
- Password reset requires token verification before allowing password change.

---

## 5. Password Reset Rules

- User must enter registered email to initiate reset process.
- Temporary reset token is generated and stored in session.
- Reset page access is denied for invalid or expired token.
- Password confirmation field must match new password.

---

## 6. Validation Architecture

- Validation logic is separated using Laravel Form Request classes.
- This improves:
  - Maintainability
  - Scalability
  - Code readability
  - Reusability
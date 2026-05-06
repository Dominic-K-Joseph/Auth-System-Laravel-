# Test Cases – Auth System

| Test Case ID | Scenario | Test Steps | Expected Result | Actual Result | Status |
|--------------|----------|------------|-----------------|--------------|--------|
| TC_001 | User Registration | Enter valid name, email, and password | User should register successfully and redirect to login page | User registered successfully | Pass |
| TC_002 | Empty Registration Fields | Submit registration form without data | Validation errors should display under fields | Validation messages displayed | Pass |
| TC_003 | Invalid Email Registration | Enter invalid email format | Email validation error should appear | Validation error displayed | Pass |
| TC_004 | Weak Password Registration | Enter weak password | Password validation error should appear | Validation error displayed | Pass |
| TC_005 | Duplicate Email Registration | Register using existing email | Unique email validation error should appear | Validation error displayed | Pass |
| TC_006 | Login with Valid Credentials | Enter correct email and password | User should login successfully | Redirected to welcome page | Pass |
| TC_007 | Login with Unregistered Email | Enter email not موجود in database | “Email not found in our records” message should appear | Correct message displayed | Pass |
| TC_008 | Login with Incorrect Password | Enter wrong password | “Incorrect password” message should appear | Correct message displayed | Pass |
| TC_009 | Unauthorized Welcome Access | Access /welcome without login | User should redirect to login page | Redirect successful | Pass |
| TC_010 | Logout Functionality | Click logout button | Session should clear and redirect to login page | Logout successful | Pass |
| TC_011 | Forgot Password Request | Enter registered email in forgot password form | Reset token/session should generate | Redirected to reset page | Pass |
| TC_012 | Invalid Reset Token | Access reset page with invalid token | Access should be denied | 403/redirect displayed | Pass |
| TC_013 | Password Reset Success | Enter valid new password and confirmation | Password should update successfully | Password updated | Pass |
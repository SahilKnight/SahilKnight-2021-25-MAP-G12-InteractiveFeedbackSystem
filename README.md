# Student Feedback System

**Student Feedback System** is a web-based application designed to collect and manage feedback from students effectively. 

## Features

- **Feedback Collection**: Students can submit feedback for courses or faculty members.
- **Admin Panel**: Administrators can view and analyze feedback reports.
- **User Management**: Secure login system for both students and admins.
- **Responsive Design**: Optimized for desktop and mobile devices.

## Technologies Used

- **Frontend**:  
  - HTML  
  - CSS  
  - JavaScript  
  - Bootstrap (for responsive and aesthetic design)
  
- **Backend**:  
  - PHP (server-side scripting)
  
- **Database**:  
  - MySQL (to store feedback data securely)

## Installation

1. Set up a local server using tools like **XAMPP** or **WAMP**.
2. Place the project folder in the server's `htdocs` directory.
3. Import the database:
   - Open `phpMyAdmin` on your local server.
   - Create a new database (e.g., `student_feedback`).
   - Import the provided SQL file (`database.sql`) into the database.
4. Update the database configuration:
   - Navigate to the project files.
   - Locate the configuration file (e.g., `config.php`).
   - Update the database credentials (host, username, password, database name).
5. Start the local server and access the application via:
   ```
   http://localhost/student-feedback-system/
   ```

## Future Enhancements

- Implement advanced analytics for feedback data.
- Add user roles for more granular control.
- Integrate email notifications for feedback confirmation.



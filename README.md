# Employee Record Management System

[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-00758F?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://en.wikipedia.org/wiki/HTML5)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://en.wikipedia.org/wiki/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

A web-based employee management application engineered to streamline employee profile records, secure logins, and automate online leave request submission and administrative approval workflows.

---

## 🌟 Key Features

### 👤 Employee Portal
- **User Registration & Secure Authentication**: Employees can create accounts, securely log in, and manage their departmental profiles.
- **Online Leave Submission**: Digital leave application interface capturing leave category, date ranges, and justification details (`leaverequest.php`, `leave_submit.php`).
- **Real-Time Status Tracking**: Employees can track their pending, approved, or rejected leave applications (`userdashboard.php`).

### 🛠️ Administrative Control Center
- **Employee Directory Management**: Complete administrative control to search, inspect, and update employee records (`records.php`, `viewedit.php`).
- **Leave Request Processing**: Dedicated administrative dashboard to review incoming employee leave applications and approve or reject them with real-time status updates (`leaveview.php`, `leave_action.php`).
- **Protected Admin Console**: Secure admin authentication interface (`adminlogin.php`).

---

## 💻 Tech Stack

- **Backend**: PHP
- **Database**: MySQL (MariaDB, UTF8MB4)
- **Frontend**: HTML5, CSS3, JavaScript (DOM Manipulation, Form Validation)
- **Web Server**: Apache / XAMPP

---

## 🗄️ Database Schema

The database schema (`schema.sql`) consists of the following core tables:

| Table | Description |
| :--- | :--- |
| `users` | Employee account registration records, full names, emails, and credentials. |
| `login` | Authentication credentials for user access. |
| `leave_requests` | Detailed leave logs tracking employee IDs, leave categories, date intervals, justifications, and approval statuses. |

---

## ⚙️ Local Setup & Installation

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) (Apache and MySQL)
- Modern Web Browser

### 1. Clone the Repository
```bash
git clone https://github.com/deepika-v2005/Employee-Record-Management-System.git
cd Employee-Record-Management-System
```

### 2. Configure Database
1. Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
2. Create a database named `employee`:
   ```sql
   CREATE DATABASE employee CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
3. Import the `schema.sql` file into the `employee` database.

### 3. Launch the Application
Place the project folder inside your web server directory (`C:/xampp/htdocs/employee1/`) and access:
- **Employee Portal**: `http://localhost/employee1/home.php`
- **Admin Console**: `http://localhost/employee1/adminlogin.php`

---

## 👤 Author

**Deepika V**  
- GitHub: [@deepika-v2005](https://github.com/deepika-v2005)  
- LinkedIn: [Deepika V](https://linkedin.com/in/deepika-v-a00974316)

# 🧾 TodoList REST API (Laravel + Sanctum)

This project is a **RESTful API** for a **TodoList** application built using **Laravel 11** with **Laravel Sanctum** for token-based authentication via Bearer Tokens.  
The API provides full CRUD functionality to manage user-specific tasks with secure access control.

---

## 🚀 Features
- 🔐 User Registration, Login, and Logout using Laravel Sanctum  
- ✅ CRUD (Create, Read, Update, Delete) for Tasks  
- 👤 Each user can only access their own tasks  
- 📄 Request validation using FormRequest  
- 🧱 Clean and structured REST API architecture  

---

## 🧭 Tech Stack
- **Framework:** Laravel 11  
- **Authentication:** Laravel Sanctum  
- **Database:** MySQL  
- **Documentation:** Postman Public Documentation  
- **Version Control:** Git + GitHub  

---

## 🧱 Entity Relationship Diagram (ERD)
Below is the database structure used in this project.

📊 **ERD File:** [`app/ERD/ER-DIAGRAM_TODOS.drawio`](./app/ERD/ER-DIAGRAM_TODOS.drawio)

---

## 🔧 Installation Guide

1. Clone this repository:
   ```bash
   https://github.com/sheiza31/TODOLIST-REST-API.git
   ```

2. Navigate to the project directory:
   ```bash
   cd TODOLIST-REST-API
   ```

3. Install dependencies:
   ```bash
   composer install
   ```

4. Create the `.env` file and configure the database:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Run database migrations:
   ```bash
   php artisan migrate
   ```

6. Start the development server:
   ```bash
   php artisan serve
   ```

---

## 🧪 Example Endpoints

| Method | Endpoint          | Description                        |
| ------ | ----------------- | ---------------------------------- |
| POST   | `/api/register`   | Register a new user                |
| POST   | `/api/login`      | Log in and obtain a token          |
| POST   | `/api/logout`     | Log out and revoke active token    |
| GET    | `/api/tasks`      | Retrieve all tasks for the user    |
| POST   | `/api/tasks`      | Create a new task                  |
| GET    | `/api/tasks/{id}` | Retrieve details of a specific task|
| PUT    | `/api/tasks/{id}` | Update a task’s status             |
| DELETE | `/api/tasks/{id}` | Delete a task                      |

---

## 🧑‍💻 Author

**Name:** Sheiza Fakhru Rasyid  
**GitHub:** [sheiza31](https://github.com/sheiza31)  
**Email:** [seizzafr@example.com](mailto:seizzafr@example.com)

---






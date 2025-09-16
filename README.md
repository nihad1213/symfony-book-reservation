# 📚 Book Reservation System

A **Symfony MVC project** with **Twig + Tailwind** for frontend, focusing on role-based access, entity relations, and a reservation approval workflow with email notifications.

---

## 🚀 Features

- **Authentication & Roles**
  - Users can register and log in
  - Two roles: `ROLE_USER` and `ROLE_ADMIN`
  - Users see the **book catalog** and their reservations
  - Admins see the **admin dashboard** for managing users, books, and reservations

- **Book Management**
  - Admins can create, edit, delete books
  - Books belong to categories
  - Books have status: `available`, `reserved`

- **Reservation Workflow**
  - Users can request to borrow books
  - An **email notification** is sent to admin for approval
  - Admin can **approve or reject** requests
  - If approved → Book status becomes `reserved`
  - If rejected → Book remains `available`
  - On return → Reservation status set to `returned` and book becomes `available` again

- **Profile Management**
  - Each user has a profile (name, phone, address, etc.)
  - Profile is created at registration
  - Admin can also create users with profiles

---

## 🏗 Entities & Relationships

### **User**
- `id`, `email`, `password`, `roles`
- Relations:
  - One User → One Profile
  - One User → Many Reservations

### **Profile**
- `id`, `firstName`, `lastName`, `phone`, `address`
- Relations:
  - One Profile → One User

### **Book**
- `id`, `title`, `author`, `publishedYear`, `status` (available/reserved)
- Relations:
  - One Book → Many Reservations
  - Many Books → One Category

### **Category**
- `id`, `name`, `description`
- Relations:
  - One Category → Many Books

### **Reservation**
- `id`, `reservationDate`, `returnDate`, `status` (pending, approved, rejected, returned)
- Relations:
  - Many Reservations → One User
  - Many Reservations → One Book

---

## 🗂 Project Roadmap

### **1. Setup**
- [ ] Create Symfony project  
- [ ] Configure database in `.env.local`  
- [ ] Install dependencies: `twig`, `maker`, `orm`, `security`, `mailer`  

### **2. Entities & Migrations**
- [ ] Create `User` entity (with roles)  
- [ ] Create `Profile` entity  
- [ ] Create `Book` entity  
- [ ] Create `Category` entity  
- [ ] Create `Reservation` entity  
- [ ] Define relations in Doctrine  
- [ ] Run migrations  

### **3. Authentication & Roles**
- [ ] Implement login, logout, register  
- [ ] Protect routes based on roles  
- [ ] Redirect users:
  - `ROLE_USER` → Books & Reservations area  
  - `ROLE_ADMIN` → Admin dashboard  

### **4. User & Profile Management**
- [ ] User self-registration creates Profile  
- [ ] Admin can create users with Profile  
- [ ] Users can edit their own Profile  

### **5. Book & Category Management (Admin)**
- [ ] Book CRUD  
- [ ] Category CRUD  
- [ ] Assign books to categories  

### **6. Reservation Workflow**
- [ ] User requests reservation (status = pending)  
- [ ] Email notification sent to Admin  
- [ ] Admin approves or rejects request  
- [ ] On approval → Book status = reserved  
- [ ] On rejection → Book remains available  
- [ ] On return → Reservation status = returned, Book = available  

### **7. Frontend (Twig + Tailwind)**
- [ ] Homepage: list books with category filters  
- [ ] Book detail page with "Reserve" button (for users)  
- [ ] Reservation list for users  
- [ ] Admin dashboard with sections:
  - Manage Users
  - Manage Books
  - Manage Reservations  

### **8. Extras (Optional)**
- [ ] Pagination & search for books  
- [ ] Admin statistics dashboard (e.g., most borrowed books)  
- [ ] Email notifications to users when reservation is approved/rejected  
- [ ] API endpoints for future frontend/mobile app  

---

## 🛠 Tech Stack

- **Backend**: Symfony (PHP 8+)  
- **Database**: MySQL/MariaDB (Doctrine ORM)  
- **Frontend**: Twig + Tailwind  
- **Authentication**: Symfony Security (roles & password hashing)  
- **Email**: Symfony Mailer  

---

## 📌 Installation

```bash
# Clone repository
git clone https://github.com/your-username/book-reservation-system.git
cd book-reservation-system

# Install dependencies
composer install

# Setup environment
cp .env .env.local
# Update DATABASE_URL and MAILER_DSN in .env.local

# Run migrations
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

# Start local server
symfony server:start

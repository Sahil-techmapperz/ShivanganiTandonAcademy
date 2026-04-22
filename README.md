# Shivangani Tandon Academy - Premium LMS Portal

A comprehensive, high-performance Learning Management System (LMS) built for **Shivangani Tandon Academy**, specializing in US CMA, Enrolled Agent (EA), and AI in Taxation courses.

![Academy Banner](public/images/commonImages/fcabd6f88b0c3e59d8b5c7fea57132f417ff1545.png)

## 🚀 Key Features

### 👨‍🎓 Student Experience
- **Interactive Dashboard**: Modern, glassmorphic UI for tracking course progress and assessment results.
- **Academy Portal**: Browse and enroll in professional certification courses.
- **Assessment System**: Seamless interface for taking quizzes and uploading exam solution papers.
- **Resource Center**: Access course materials, downloadable assets, and recorded sessions.
- **Support System**: Direct messaging with instructors for academic assistance.

### 🔐 Administrative Control
- **Content Management**: Full control over course curricula, lessons, and resources.
- **Dynamic Assessment Engine**: Create complex MCQ quizzes or file-upload based exams with custom point valuations.
- **Grading Portal**: Efficient interface for reviewing student submissions and awarding certifications.
- **Blog Management**: Built-in blogging system with rich-text editing and SEO optimization.
- **Testimonial Manager**: Control student success stories and video gallery directly from the dashboard.
- **Global Settings**: Real-time control over site metadata, SEO tags, social links, and contact information.

## 🛠 Tech Stack
- **Framework**: [CodeIgniter 4](https://codeigniter.com/) (PHP 8.1+)
- **Database**: MySQL 8.0
- **Frontend**: Tailwind CSS, Bootstrap 5, FontAwesome 7
- **Architecture**: Model-View-Controller (MVC)

## 📋 Installation & Setup

### Prerequisites
- PHP 8.1 or higher
- MySQL 8.0+
- Apache/Nginx Web Server
- Composer

### Step-by-Step Guide
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/Sahil-techmapperz/ShivanganiTandonAcademy.git
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   ```

3. **Environment Configuration**:
   - Rename `env` to `.env`.
   - Update database credentials and base URL:
     ```env
     database.default.hostname = localhost
     database.default.database = shivanganitandonacademy
     database.default.username = root
     database.default.password = your_password
     app.baseURL = 'http://localhost/ShivanganiTandonAcademy/'
     ```

4. **Database Setup**:
   - Import the `shivanganitandonacademy.sql` file into your MySQL database.

5. **Permissions**:
   - Ensure the `writable/` and `public/uploads/` directories have proper write permissions.

## 📁 Project Structure
- `app/Controllers/`: Application logic and request handling.
- `app/Models/`: Database interactions and business rules.
- `app/Views/`: Responsive UI templates (Admin & Student portals).
- `public/uploads/`: Dynamic user-uploaded assets (Signatures, Thumbnails, Blogs).
- `writable/`: Internal cache, logs, and temporary session data.

## 📄 License
This project is proprietary and confidential. Unauthorized copying or distribution is prohibited.

---
*Developed with ❤️ for Shivangani Tandon Academy.*

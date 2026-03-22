# 🏥 MediQ — Smart Medical Companion

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB-4479A1?style=flat-square&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-CSS3-E34F26?style=flat-square&logo=html5&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=flat-square&logo=javascript&logoColor=black)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

> **MediQ** is a web-based medical companion platform that allows patients to find and channel doctors, calculate their BMI, test lung health, and access reliable medical information — all in one place.

---

## 📋 Table of Contents

- [Features](#-features)
- [Screenshots](#-screenshots)
- [Tech Stack](#-tech-stack)
- [Database Structure](#-database-structure)
- [Getting Started](#-getting-started)
- [Usage](#-usage)
- [Project Structure](#-project-structure)
- [Contributing](#-contributing)
- [License](#-license)

---

## ✨ Features

### 🩺 Doctor Channeling
Search and book appointments with specialist doctors by filtering by **specialization**, **hospital**, and **location**. Patient details are recorded together with the selected doctor's schedule, ensuring every booking is fully trackable.

### ⚖️ BMI Calculator
Enter your height and weight to instantly calculate your **Body Mass Index (BMI)** and receive feedback on your health category — Underweight, Normal, Overweight, or Obese.

### 🫁 Lung Health Tester
An interactive tool to assess basic lung health indicators, helping users monitor respiratory wellness from home.

### 📚 Medical Information Hub
Browse a curated library of **disease information** and **health tips** to stay informed about common conditions, symptoms, prevention, and healthy lifestyle practices.

---

## 🛠 Tech Stack

| Layer | Technology |
|-------|-----------|
| Frontend | HTML5, CSS3, JavaScript (ES6) |
| Backend | PHP 8.2 |
| Database | MySQL / MariaDB (via phpMyAdmin) |
| Server | Apache (XAMPP / WAMP) |

---

## 🗄 Database Structure

The system uses three main tables inside the `mediq` database:

**`doctors`** — Stores doctor profiles including specialisation, schedule, hospital, and location.

**`patient`** — Records basic patient information submitted during registration.

**`channeling_appointments`** — The core appointments table. Links every patient registration to the exact doctor they selected, along with the full appointment details (date, time, hospital, location). This table is the single source of truth for all bookings.

---

## 🚀 Getting Started

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) or any Apache + PHP + MySQL stack
- PHP 8.0 or higher
- A modern web browser

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/mediq.git
   ```

2. **Move to your server root**
   ```bash
   # For XAMPP on Windows
   mv mediq/ C:/xampp/htdocs/mediq

   # For XAMPP on Linux/Mac
   mv mediq/ /opt/lampp/htdocs/mediq
   ```

3. **Import the database**
   - Open [phpMyAdmin](http://localhost/phpmyadmin)
   - Create a new database named `mediq`
   - Click **Import** and select `mediq_updated.sql`
   - Click **Go**

4. **Configure the database connection** *(if needed)*

   Open any `.php` file and update these values if your setup is different:
   ```php
   $servername = "localhost";
   $username   = "root";
   $password   = "";      // Add your password here if set
   $dbname     = "mediq";
   ```

5. **Start Apache & MySQL** in XAMPP Control Panel

6. **Open the app**
   ```
   http://localhost/mediq/home.html
   ```

---

## 📖 Usage

1. **Find a Doctor** — Go to the Channeling page, select a specialization, hospital, and location, then click **Check Now** to view available doctors.
2. **Book an Appointment** — Click **Channel Now** on any doctor. You will be taken to the registration page which shows the selected doctor's details at the top.
3. **Register** — Fill in your name, age, gender, phone number, and NIC number, then click **Confirm Booking**. Your appointment is saved to the database with the full doctor information attached.
4. **BMI Calculator** — Navigate to the BMI section and enter your details to get your health category instantly.
5. **Lung Tester** — Use the lung health tool to check basic respiratory indicators.
6. **Medical Information** — Browse the health tips and disease information library for trusted health knowledge.

---

## 📁 Project Structure

```
mediq/
├── home.html                  # Landing / home page
├── channeling.php             # Doctor search & booking page
├── login.php                  # Patient registration page
├── bmi.html                   # BMI calculator page
├── lung.html                  # Lung health tester page
├── medi_information.html      # Medical information & health tips
├── channeling.css             # Styles for channeling page
├── login.css                  # Styles for registration page
├── about.css                  # Footer / about section styles
├── mediq_updated.sql          # Full database dump (import this)
└── logo/                      # Icons and image assets
```

---

## 🤝 Contributing

Contributions, bug reports, and feature requests are welcome!

1. Fork the project
2. Create your feature branch: `git checkout -b feature/your-feature-name`
3. Commit your changes: `git commit -m 'Add some feature'`
4. Push to the branch: `git push origin feature/your-feature-name`
5. Open a Pull Request

---

## 👨‍💻 Author

**VgTharindu**
- GitHub: [@VgTharindu](https://github.com/VgTharindu)

---

## 📄 License

This project is licensed under the **MIT License** — feel free to use, modify, and distribute it.

---

> *MediQ — The Best Medical Partner* 💙

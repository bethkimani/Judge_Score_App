# Judge Score App

A web application built on the LAMP stack to manage judges, score participants, and display a public scoreboard. This project fulfills the requirements for the Technical Screening - Software Engineering task.

## Table of Contents
- [Project Overview](#project-overview)
- [Setup Instructions](#setup-instructions)
- [Database Schema](#database-schema)
- [Assumptions](#assumptions)
- [Design Choices](#design-choices)
- [Future Features](#future-features)

## Project Overview
The Judge Score App allows:
- Admins to manage judges (add and view judges).
- Judges to assign scores (1–100) to participants.
- Public viewing of a dynamic scoreboard, sorted by total points with highlighted top scorers.

The application is built using a LAMP stack (Linux, Apache, MySQL, PHP) and includes basic HTML/CSS/JavaScript for the frontend.

## Setup Instructions
Follow these steps to run the project on localhost using XAMPP on Ubuntu Linux.

### Prerequisites
- **XAMPP**: Installed on Ubuntu (e.g., `/opt/lampp`).
- **Visual Studio Code**: Optional, for editing.
- **Web Browser**: For testing.

### Steps
1. **Clone or Copy the Project**:
   - Copy the `Judge_Score_App` folder to XAMPP’s `htdocs` directory:
     ```bash
     sudo cp -r Judge_Score_App /opt/lampp/htdocs/
     sudo chmod -R 755 /opt/lampp/htdocs/Judge_Score_App
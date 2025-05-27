### Judge Score App
A LAMP stack web app for managing judges, scoring participants, and displaying a public scoreboard.
Overview

### Admins add/view judges.
Judges assign scores (1–100).
Scoreboard auto-refreshes, highlighting top scorers (>90 points).

### Setup
Local (Ubuntu with XAMPP)

Clone Repo:git clone git@github.com:bethkimani/Judge_Score_App.git
sudo cp -r Judge_Score_App /opt/lampp/htdocs/
sudo chmod -R 755 /opt/lampp/htdocs/Judge_Score_App


## 3Start XAMPP:sudo /opt/lampp/lampp start


## 3Set Up Database:

### Open http://localhost/phpmyadmin, create judge_app database.
Run:CREATE TABLE judges (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(50) NOT NULL UNIQUE, display_name VARCHAR(100) NOT NULL);
CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, display_name VARCHAR(100) NOT NULL);
CREATE TABLE scores (id INT AUTO_INCREMENT PRIMARY KEY, judge_id INT NOT NULL, user_id INT NOT NULL, points INT NOT NULL CHECK (points >= 1 AND points <= 100), FOREIGN KEY (judge_id) REFERENCES judges(id), FOREIGN KEY (user_id) REFERENCES users(id));
INSERT INTO judges VALUES (1, 'judge1', 'Judge One'), (2, 'judge2', 'Judge Two');
INSERT INTO users VALUES (1, 'Participant One'), (2, 'Participant Two'), (3, 'Participant Three');
INSERT INTO scores VALUES (1, 1, 1, 85), (2, 1, 2, 90), (3, 2, 1, 88), (4, 2, 3, 92), (5, 2, 2, 1), (6, 2, 2, 1);




### Configure Database:
Edit config/db_connect.php:$host = "localhost"; $dbname = "judge_app"; $username = "root"; $password = "";




## Run:
## Open:
http://localhost/Judge_Score_App/index.php (Judge Portal)
http://localhost/Judge_Score_App/admin/index.php (Admin Panel)
http://localhost/Judge_Score_App/public/scoreboard.php (Scoreboard)





Live (InfinityFree)

Update Config:
Edit config/db_connect.php:$host = "sql304.infinityfree.com"; $dbname = "if0_39087053_judge_app"; $username = "if0_39087053"; $password = "cxYSRCjuNNh2U";




Upload:
Upload Judge_Score_App to htdocs via FileZilla or InfinityFree File Manager.


Database:
Create if0_39087053_judge_app in InfinityFree MySQL, run the same SQL.


Test:
Access:
http://judgescoreapp.wuaze.com/Judge_Score_App/index.php
http://judgescoreapp.wuaze.com/Judge_Score_App/admin/index.php
http://judgescoreapp.wuaze.com/Judge_Score_App/public/scoreboard.php






### Database Schema

judges: id, username, display_name
users: id, display_name
scores: id, judge_id, user_id, points (1–100)

#### Assumptions

Pre-registered users/judges with sample data.
No authentication or login system implemented.
Hosted at /Judge_Score_App/.

#### Future Features
Add user authentication for admins and judges using PHP sessions.
Implement real-time scoreboard updates with WebSockets.
Enhance security with input sanitization and CSRF protection.
Add pagination for large score datasets.
Improve UI with modern frameworks like Bootstrap or Tailwind CSS.



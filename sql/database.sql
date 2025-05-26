CREATE DATABASE judge_score_app;
USE judge_score_app;

CREATE TABLE judges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    display_name VARCHAR(100) NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    display_name VARCHAR(100) NOT NULL
);

CREATE TABLE scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judge_id INT NOT NULL,
    user_id INT NOT NULL,
    points INT NOT NULL CHECK (points >= 1 AND points <= 100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (judge_id) REFERENCES judges(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO judges (username, display_name) VALUES
('judge1', 'Judge One'),
('judge2', 'Judge Two');

INSERT INTO users (username, display_name) VALUES
('user1', 'Participant One'),
('user2', 'Participant Two'),
('user3', 'Participant Three');

INSERT INTO scores (judge_id, user_id, points) VALUES
(1, 1, 85),
(1, 2, 90),
(2, 1, 88),
(2, 3, 92);
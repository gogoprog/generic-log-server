-- Tables setup
-- ---------------------

CREATE TABLE application (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(1024),
    version VARCHAR(64)
    );

CREATE TABLE session (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    app_id INT NOT NULL,
    start_date date,
    user VARCHAR(128)
    );

CREATE TABLE log (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    session_id INT NOT NULL,
    content VARCHAR(1024),
    level INT
    );

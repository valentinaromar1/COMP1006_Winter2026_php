CREATE TABLE resume1 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    
    first_name VARCHAR(100) NOT NULL,
    last_name  VARCHAR(100) NOT NULL,
    email      VARCHAR(150) NOT NULL,
    phone      VARCHAR(20)  NOT NULL,
    currentPos    VARCHAR(20) NOT NULL,
    skills TEXT,
    bio TEXT
);

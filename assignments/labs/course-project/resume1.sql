CREATE TABLE resume (

    first_name VARCHAR(100) NOT NULL,
    last_name  VARCHAR(100) NOT NULL,
    email      VARCHAR(150) NOT NULL,
    phone      VARCHAR(20)  NOT NULL,
    currentPos    VARCHAR(20) NOT NULL,
    skills   VARCHAR(150) NOT NULL,
    bio  VARCHAR(150) NOT NULL,

    skills TEXT,
    bio TEXT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

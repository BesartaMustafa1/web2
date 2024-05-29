Use library_db;

-- Table for authors
CREATE TABLE authors (
    author_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Table for books
CREATE TABLE books (
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author_id INT,
    published_date DATE,
    isbn VARCHAR(13),
    pages INT,
    FOREIGN KEY (author_id) REFERENCES authors(author_id)
);

-- Table for members
CREATE TABLE members (
    member_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15),
    join_date DATE
);

CREATE TABLE users (
    id INT auto_increment PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT NOT NULL,
    rating INT NOT NULL
);
CREATE TABLE spaces (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    detail_page VARCHAR(255) NOT NULL
);
INSERT INTO spaces (name, price, image_url, detail_page) VALUES
('TL\'s Botanic', 15.00, 'pictures/study1.jpg', 'TLBotanic.html'),
('TL\'s Lounge', 10.00, 'pictures/study2.jpg', 'TLLounge.html'),
('TL\'s Corner', 99.00, 'pictures/study3.jpg', 'TLCorner.html'),
('TL\'s Boho', 59.00, 'pictures/coworking1.jpg', 'tlboho.html'),
('TL\'s Industrial', 75.00, 'pictures/conf2.jpg', 'tlindustrial.html'),
('TL\'s Lux', 90.00, 'pictures/coworking2.jpg', 'tllux.html'),
('TL\'s Workshop', 39.00, 'pictures/event3.jpg', 'TLWorkshop.html'),
('TL\'s Cinema', 69.00, 'pictures/event2.jpg', 'TLCinema.html'),
('TL\'s Terrace', 99.00, 'pictures/event5.jpg', 'TLTerrace.html');
CREATE DATABASE movie_theater;
USE movie_theater;

-- Table: movies
CREATE TABLE movies (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  release_date DATE,
  runtime INT,
  rating VARCHAR(10),
  poster_url VARCHAR(255)
);

-- Table: auditoriums
CREATE TABLE auditoriums (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  capacity INT NOT NULL
);

-- Table: showtimes
CREATE TABLE showtimes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  movie_id INT NOT NULL,
  showtime DATETIME NOT NULL,
  auditorium_id INT NOT NULL,
  FOREIGN KEY (movie_id) REFERENCES movies(id),
  FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id)
);

-- Table: tickets
CREATE TABLE tickets (
  id INT PRIMARY KEY AUTO_INCREMENT,
  showtime_id INT NOT NULL,
  seat_number INT NOT NULL,
  ticket_type VARCHAR(20) NOT NULL,  -- e.g. "adult", "child", "senior"
  price DECIMAL(10, 2) NOT NULL,
  purchased_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (showtime_id) REFERENCES showtimes(id)
);

-- Table: orders
CREATE TABLE orders (
  id INT PRIMARY KEY AUTO_INCREMENT,
  customer_name VARCHAR(100) NOT NULL,
  customer_email VARCHAR(100) NOT NULL,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  total_cost DECIMAL(10, 2) NOT NULL
);

-- Table: order_items
CREATE TABLE order_items (
  id INT PRIMARY KEY AUTO_INCREMENT,
  order_id INT NOT NULL,
  ticket_id INT NOT NULL,
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (ticket_id) REFERENCES tickets(id)
);

-- Indexes
CREATE INDEX idx_movies_title ON movies (title);
CREATE INDEX idx_showtimes_movie_id ON showtimes (movie_id);
CREATE INDEX idx_showtimes_auditorium_id ON showtimes (auditorium_id);
CREATE INDEX idx_tickets_showtime_id ON tickets (showtime_id);
CREATE INDEX idx_orders_customer_email ON orders (customer_email);
CREATE INDEX idx_order_items_order_id ON order_items (order_id);
CREATE INDEX idx_order_items_ticket_id ON order_items (ticket_id);
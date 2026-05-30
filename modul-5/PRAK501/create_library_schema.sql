DROP DATABASE IF EXISTS prak501_library;
CREATE DATABASE prak501_library;
USE prak501_library;

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(500) NOT NULL,
    author VARCHAR(500) NOT NULL,
    publisher VARCHAR(250) NOT NULL,
    publish_year INT NOT NULL
);

CREATE TABLE members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL,
    member_number VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    register_date DATETIME NOT NULL,
    last_payment_date DATE NOT NULL
);

CREATE TABLE borrowings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT NOT NULL,
    book_id INT NOT NULL,
    borrow_date DATE NOT NULL,
    return_date DATE NOT NULL,
    FOREIGN KEY (member_id) REFERENCES members(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO books (title, author, publisher, publish_year) VALUES
('Commentarii de Bello Gallico', 'Julius Caesar', 'Roman Senate Publishing', 2005),
('The Art of War', 'Sun Tzu', 'Chambers Classics', 2010),
('The Prince', 'Niccolo Machiavelli', 'Oxford World\'s Classics', 2008),
('Meditations', 'Marcus Aurelius', 'Penguin Books', 2006),
('The Republic', 'Plato', 'Harvard University Press', 2012);

INSERT INTO members (name, member_number, address, register_date, last_payment_date) VALUES
('Julius Caesar', 'MBR-001', 'Forum Romanum, Rome', '2026-01-01 08:00:00', '2026-05-15'),
('Alexander the Great', 'MBR-002', 'Royal Palace, Pella, Macedon', '2026-02-10 10:30:00', '2026-05-20'),
('Napoleon Bonaparte', 'MBR-003', 'Rue Saint-Nicaise, Paris, France', '2026-03-05 14:15:00', '2026-04-30'),
('Cleopatra VII', 'MBR-004', 'Royal Quarter, Alexandria, Egypt', '2026-04-12 09:00:00', '2026-05-01'),
('George Washington', 'MBR-005', 'Mount Vernon, Virginia, USA', '2026-05-01 11:00:00', '2026-05-28');

INSERT INTO borrowings (member_id, book_id, borrow_date, return_date) VALUES
(1, 3, '2026-05-10', '2026-05-24'), -- Julius Caesar borrows 'The Prince'
(2, 2, '2026-05-15', '2026-05-29'), -- Alexander the Great borrows 'The Art of War'
(3, 4, '2026-05-20', '2026-06-03'), -- Napoleon Bonaparte borrows 'Meditations'
(4, 1, '2026-05-22', '2026-06-05'); -- Cleopatra VII borrows 'Commentarii de Bello Gallico'
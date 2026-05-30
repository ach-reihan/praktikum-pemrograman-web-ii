<?php
require_once 'Koneksi.php';

// ==========================================
// 1. BOOK CRUD FUNCTIONS
// ==========================================

function getAllBooks() {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("SELECT * FROM books ORDER BY id DESC");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getBookById($id) {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function insertBook($title, $author, $publisher, $publishYear) {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("INSERT INTO books (title, author, publisher, publish_year) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$title, $author, $publisher, $publishYear]);
}

function updateBook($id, $title, $author, $publisher, $publishYear) {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("UPDATE books SET title = ?, author = ?, publisher = ?, publish_year = ? WHERE id = ?");
    return $stmt->execute([$title, $author, $publisher, $publishYear, $id]);
}

function deleteBook($id) {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("DELETE FROM books WHERE id = ?");
    return $stmt->execute([$id]);
}

// ==========================================
// 2. MEMBER CRUD FUNCTIONS
// ==========================================

function getAllMembers() {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("SELECT * FROM members ORDER BY id DESC");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getMemberById($id) {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("SELECT * FROM members WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function insertMember($name, $memberNumber, $address, $registerDate, $lastPaymentDate) {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("INSERT INTO members (name, member_number, address, register_date, last_payment_date) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$name, $memberNumber, $address, $registerDate, $lastPaymentDate]);
}

function updateMember($id, $name, $memberNumber, $address, $registerDate, $lastPaymentDate) {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("UPDATE members SET name = ?, member_number = ?, address = ?, register_date = ?, last_payment_date = ? WHERE id = ?");
    return $stmt->execute([$name, $memberNumber, $address, $registerDate, $lastPaymentDate, $id]);
}

function deleteMember($id) {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("DELETE FROM members WHERE id = ?");
    return $stmt->execute([$id]);
}

// ==========================================
// 3. BORROWINGS CRUD FUNCTIONS
// ==========================================

function getAllBorrowings() {
    $db = getDatabaseConnection();
    $query = "SELECT b.id, b.borrow_date, b.return_date, m.name AS member_name, bk.title AS book_title 
              FROM borrowings b
              JOIN members m ON b.member_id = m.id
              JOIN books bk ON b.book_id = bk.id
              ORDER BY b.id DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getBorrowingById($id) {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("SELECT * FROM borrowings WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function insertBorrowing($memberId, $bookId, $borrowDate, $returnDate) {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("INSERT INTO borrowings (member_id, book_id, borrow_date, return_date) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$memberId, $bookId, $borrowDate, $returnDate]);
}

function updateBorrowing($id, $memberId, $bookId, $borrowDate, $returnDate) {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("UPDATE borrowings SET member_id = ?, book_id = ?, borrow_date = ?, return_date = ? WHERE id = ?");
    return $stmt->execute([$memberId, $bookId, $borrowDate, $returnDate, $id]);
}

function deleteBorrowing($id) {
    $db = getDatabaseConnection();
    $stmt = $db->prepare("DELETE FROM borrowings WHERE id = ?");
    return $stmt->execute([$id]);
}
?>
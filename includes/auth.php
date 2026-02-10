<?php
// Authentication helper functions
require_once __DIR__ . '/config.php';

function registerUser($name, $email, $password) {
    global $conn;
    $name = trim($name);
    $email = trim($email);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Invalid email address.'];
    }

    // Check if email exists
    $stmt = $conn->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->close();
        return ['success' => false, 'message' => 'Email already registered.'];
    }
    $stmt->close();

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $name, $email, $hash);
    $ok = $stmt->execute();
    $stmt->close();

    if ($ok) return ['success' => true, 'message' => 'Registration successful.'];
    return ['success' => false, 'message' => 'Registration failed.'];
}

function loginUser($email, $password) {
    global $conn;
    $email = trim($email);

    $stmt = $conn->prepare('SELECT id, name, password FROM users WHERE email = ? LIMIT 1');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($id, $name, $hash);
    if ($stmt->fetch()) {
        $stmt->close();
        if (password_verify($password, $hash)) {
            // set session
            $_SESSION['user'] = ['id' => $id, 'name' => $name, 'email' => $email];
            return ['success' => true, 'message' => 'Login successful.'];
        }
        return ['success' => false, 'message' => 'Incorrect password.'];
    }
    $stmt->close();
    return ['success' => false, 'message' => 'User not found.'];
}

function logoutUser() {
    unset($_SESSION['user']);
    session_regenerate_id(true);
}

function currentUser() {
    return $_SESSION['user'] ?? null;
}

function isAdmin() {
    if (empty($_SESSION['user'])) return false;
    global $conn;
    $userId = intval($_SESSION['user']['id']);

    // If users table has is_admin column, use it. Otherwise treat user id 1 as admin.
    $res = $conn->query("SHOW COLUMNS FROM users LIKE 'is_admin'");
    if ($res && $res->num_rows > 0) {
        $stmt = $conn->prepare('SELECT is_admin FROM users WHERE id = ? LIMIT 1');
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $stmt->bind_result($is_admin);
        if ($stmt->fetch()) {
            $stmt->close();
            return (bool)$is_admin;
        }
        $stmt->close();
        return false;
    }

    return $userId === 1;
}
?>
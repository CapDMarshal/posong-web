<?php
include 'config.php';

if (!function_exists('isLoggedIn')) {
    function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
}

if (!function_exists('requireLogin')) {
    function requireLogin() {
        if (!isLoggedIn()) {
            header("Location: login.php");
            exit;
        }
    }
}

if (!function_exists('requireAdmin')) {
    function requireAdmin() {
        if (!isAdmin()) {
            header("Location: user_dashboard.php");
            exit;
        }
    }
}
?>

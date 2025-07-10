<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$accion = $_GET['accion'] ?? '';

if (!isset($_SESSION['usuario']) && $accion !== 'login') {
    header('Location: index.php?accion=login');
    exit;
}
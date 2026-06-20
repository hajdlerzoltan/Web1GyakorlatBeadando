<?php
function e(string $value): string { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }
function redirect(string $route): never { header('Location: index.php?route=' . $route); exit; }
function isLoggedIn(): bool { return isset($_SESSION['user']); }
function currentUserName(): string {
    if (!isLoggedIn()) return '';
    $u = $_SESSION['user'];
    return $u['last_name'] . ' ' . $u['first_name'] . ' (' . $u['login'] . ')';
}
function requireLogin(): void { if (!isLoggedIn()) redirect('login'); }
function flash(?string $msg = null): ?string {
    if ($msg !== null) { $_SESSION['flash'] = $msg; return null; }
    $old = $_SESSION['flash'] ?? null; unset($_SESSION['flash']); return $old;
}

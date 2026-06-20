<?php
require_once __DIR__ . '/BaseController.php';
class AuthController extends BaseController {
    public function login(): void { $this->view('auth/login'); }
    public function register(): void { $this->view('auth/register'); }
    public function doLogin(): void {
        $login = trim($_POST['login'] ?? ''); $password = $_POST['password'] ?? '';
        $stmt = db()->prepare('SELECT * FROM users WHERE login = ?'); $stmt->execute([$login]); $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user'] = ['id'=>$user['id'], 'login'=>$user['login'], 'first_name'=>$user['first_name'], 'last_name'=>$user['last_name']];
            redirect('home');
        }
        flash('Hibás login név vagy jelszó.'); redirect('login');
    }
    public function doRegister(): void {
        $ln = trim($_POST['last_name'] ?? ''); $fn = trim($_POST['first_name'] ?? ''); $login = trim($_POST['login'] ?? ''); $pw = $_POST['password'] ?? '';
        if ($ln === '' || $fn === '' || strlen($login) < 3 || strlen($pw) < 6) { flash('Minden mező kötelező, a login min. 3, a jelszó min. 6 karakter.'); redirect('register'); }
        try {
            $stmt = db()->prepare('INSERT INTO users(last_name, first_name, login, password_hash) VALUES(?,?,?,?)');
            $stmt->execute([$ln, $fn, $login, password_hash($pw, PASSWORD_DEFAULT)]);
            flash('Sikeres regisztráció. Most már bejelentkezhetsz.'); redirect('login');
        } catch (PDOException $e) { flash('Ez a login név már foglalt.'); redirect('register'); }
    }
    public function logout(): void { session_destroy(); header('Location: index.php?route=home'); exit; }
}

<?php
require_once __DIR__ . '/BaseController.php';
class ContactController extends BaseController {
    public function index(): void { $this->view('contact/index'); }
    public function save(): void {
        $name = trim($_POST['name'] ?? ''); $email = trim($_POST['email'] ?? ''); $subject = trim($_POST['subject'] ?? ''); $message = trim($_POST['message'] ?? '');
        $errors = [];
        if (mb_strlen($name) < 3) $errors[] = 'A név legalább 3 karakter legyen.';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Érvénytelen e-mail cím.';
        if (mb_strlen($subject) < 3) $errors[] = 'A tárgy legalább 3 karakter legyen.';
        if (mb_strlen($message) < 10) $errors[] = 'Az üzenet legalább 10 karakter legyen.';
        if ($errors) { flash(implode(' ', $errors)); redirect('contact'); }
        $userId = $_SESSION['user']['id'] ?? null;
        $stmt = db()->prepare('INSERT INTO messages(name,email,subject,message,user_id) VALUES(?,?,?,?,?)');
        $stmt->execute([$name,$email,$subject,$message,$userId]);
        $this->view('contact/sent', compact('name','email','subject','message'));
    }
    public function messages(): void {
        requireLogin();
        $messages = db()->query("SELECT m.*, COALESCE(CONCAT(u.last_name,' ',u.first_name),'Vendég') sender FROM messages m LEFT JOIN users u ON m.user_id=u.id ORDER BY m.created_at DESC")->fetchAll();
        $this->view('contact/messages', compact('messages'));
    }
}

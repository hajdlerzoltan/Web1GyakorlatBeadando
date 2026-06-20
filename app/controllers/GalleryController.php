<?php
require_once __DIR__ . '/BaseController.php';
class GalleryController extends BaseController {
    public function index(): void {
        $images = db()->query('SELECT * FROM images ORDER BY uploaded_at DESC')->fetchAll();
        $this->view('gallery/index', compact('images'));
    }
    public function upload(): void {
        requireLogin();
        if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) { flash('Nem sikerült a feltöltés.'); redirect('gallery'); }
        $allowed = ['image/jpeg'=>'jpg','image/png'=>'png','image/gif'=>'gif','image/webp'=>'webp'];
        $mime = mime_content_type($_FILES['image']['tmp_name']);
        if (!isset($allowed[$mime]) || $_FILES['image']['size'] > 3*1024*1024) { flash('Csak JPG, PNG, GIF vagy WEBP kép tölthető fel, max. 3 MB.'); redirect('gallery'); }
        $filename = uniqid('img_', true) . '.' . $allowed[$mime];
        $target = __DIR__ . '/../../public/uploads/' . $filename;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $caption = trim($_POST['caption'] ?? '');
        $stmt = db()->prepare('INSERT INTO images(filename, caption, user_id) VALUES(?,?,?)');
        $stmt->execute([$filename, $caption, $_SESSION['user']['id']]);
        redirect('gallery');
    }
}

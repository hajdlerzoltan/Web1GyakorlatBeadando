<?php
require_once __DIR__ . '/BaseController.php';
class PageController extends BaseController {
    public function home(): void { $this->view('home'); }
}

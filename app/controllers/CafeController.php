<?php
require_once __DIR__ . '/BaseController.php';
class CafeController extends BaseController {
    public function index(): void { $cafes = db()->query('SELECT * FROM cafes ORDER BY id DESC')->fetchAll(); $this->view('cafes/index', compact('cafes')); }
    public function create(): void { $cafe = ['id'=>null,'name'=>'','city'=>'','address'=>'','rating'=>'','price_level'=>'']; $this->view('cafes/form', compact('cafe')); }
    public function store(): void { $this->save(); }
    public function edit(): void { $stmt=db()->prepare('SELECT * FROM cafes WHERE id=?'); $stmt->execute([$_GET['id']??0]); $cafe=$stmt->fetch(); if(!$cafe) redirect('crud'); $this->view('cafes/form', compact('cafe')); }
    public function update(): void { $this->save((int)($_POST['id']??0)); }
    private function save(?int $id=null): void {
        $data=[trim($_POST['name']??''),trim($_POST['city']??''),trim($_POST['address']??''),(float)($_POST['rating']??0),trim($_POST['price_level']??'')];
        if ($data[0]==='' || $data[1]==='' || $data[2]==='') { flash('Név, város és cím kötelező.'); redirect('crud'); }
        if ($id) { $stmt=db()->prepare('UPDATE cafes SET name=?,city=?,address=?,rating=?,price_level=? WHERE id=?'); $stmt->execute([...$data,$id]); }
        else { $stmt=db()->prepare('INSERT INTO cafes(name,city,address,rating,price_level) VALUES(?,?,?,?,?)'); $stmt->execute($data); }
        redirect('crud');
    }
    public function delete(): void { $stmt=db()->prepare('DELETE FROM cafes WHERE id=?'); $stmt->execute([$_GET['id']??0]); redirect('crud'); }
}

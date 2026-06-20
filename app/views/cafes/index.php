<section class="card">
    <h2>CRUD – Kávézók</h2>
    <p><a class="button" href="index.php?route=cafe_create">Új rekord</a></p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Név</th>
                <th>Város</th>
                <th>Cím</th>
                <th>Értékelés</th>
                <th>Árszint</th>
                <th>Művelet</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cafes as $c): ?><tr><td><?= e($c['id']) ?></td><td><?= e($c['name']) ?></td><td><?= e($c['city']) ?></td><td><?= e($c['address']) ?></td><td><?= e($c['rating']) ?></td><td><?= e($c['price_level']) ?></td><td><a href="index.php?route=cafe_edit&id=<?= e($c['id']) ?>">Szerkesztés</a> | <a onclick="return confirm('Biztos törlöd?')" href="index.php?route=cafe_delete&id=<?= e($c['id']) ?>">Törlés</a></td></tr><?php endforeach; ?>
            </tbody>
        </table>
</section>

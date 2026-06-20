<section class="card">
    <h2>Üzenetek</h2>
    <table>
        <thead>
            <tr>
                <th>Idő</th>
                <th>Küldő</th>
                <th>Név</th>
                <th>E-mail</th>
                <th>Tárgy</th>
                <th>Üzenet</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($messages as $msg): ?><tr><td><?= e($msg['created_at']) ?></td><td><?= e($msg['sender']) ?></td><td><?= e($msg['name']) ?></td><td><?= e($msg['email']) ?></td><td><?= e($msg['subject']) ?></td><td><?= e($msg['message']) ?></td></tr><?php endforeach; ?>
            </tbody>
        </table>
</section>

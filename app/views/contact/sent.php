<section class="card">
    <h2>Elküldött üzenet</h2>
    <p>
        <strong>Név:</strong> <?= e($name) ?>
    </p>
    <p>
        <strong>E-mail:</strong> <?= e($email) ?>
    </p>
    <p>
        <strong>Tárgy:</strong> <?= e($subject) ?>
    </p>
    <p>
        <?= nl2br(e($message)) ?>
    </p>
</section>

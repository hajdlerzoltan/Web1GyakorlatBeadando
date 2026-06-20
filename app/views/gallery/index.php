<section class="card">
    <h2>Képgaléria</h2>
    <?php if(isLoggedIn()): ?>
        <form class="upload" method="post" enctype="multipart/form-data" action="index.php?route=upload">
            <label>Kép kiválasztása<input type="file" name="image" accept="image/*"></label>
            <label>Képaláírás<input name="caption"></label>
            <button>Feltöltés</button>
        </form><?php else: ?><p>Képfeltöltéshez jelentkezz be.</p><?php endif; ?></section><section class="gallery"><?php foreach($images as $img): ?><figure><img src="public/uploads/<?= e($img['filename']) ?>" alt="<?= e($img['caption']) ?>"><figcaption><?= e($img['caption']) ?></figcaption></figure><?php endforeach; ?></section>

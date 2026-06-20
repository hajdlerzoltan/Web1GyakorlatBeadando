<section class="card narrow">
    <h2><?= $cafe['id'] ? 'Rekord szerkesztése' : 'Új kávézó' ?></h2>
    <form method="post" action="index.php?route=<?= $cafe['id'] ? 'cafe_update' : 'cafe_store' ?>">
        <input type="hidden" name="id" value="<?= e((string)$cafe['id']) ?>">
        <label>Név<input name="name" value="<?= e($cafe['name']) ?>"></label>
        <label>Város<input name="city" value="<?= e($cafe['city']) ?>"></label>
        <label>Cím<input name="address" value="<?= e($cafe['address']) ?>"></label>
        <label>Értékelés<input name="rating" value="<?= e((string)$cafe['rating']) ?>"></label>
        <label>Árszint<input name="price_level" value="<?= e($cafe['price_level']) ?>"></label>
        <button>Mentés</button>
    </form>
</section>

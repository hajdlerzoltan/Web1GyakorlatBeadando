<section class="card narrow">
    <h2>Kapcsolat</h2>
    <form id="contactForm" method="post" action="index.php?route=contact_save" novalidate>
        <label>Név<input name="name"></label>
        <label>E-mail<input name="email"></label>
        <label>Tárgy<input name="subject"></label>
        <label>Üzenet<textarea name="message" rows="6"></textarea></label>
        <p id="formError" class="error"></p>
        <button>Üzenet küldése</button>
    </form>
</section>

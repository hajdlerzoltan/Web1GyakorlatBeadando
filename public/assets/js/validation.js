document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('contactForm');
  if (!form) return;
  form.addEventListener('submit', (e) => {
    const name = form.name.value.trim();
    const email = form.email.value.trim();
    const subject = form.subject.value.trim();
    const message = form.message.value.trim();
    const errors = [];
    if (name.length < 3) errors.push('A név legalább 3 karakter legyen.');
    if (!/^\S+@\S+\.\S+$/.test(email)) errors.push('Érvénytelen e-mail cím.');
    if (subject.length < 3) errors.push('A tárgy legalább 3 karakter legyen.');
    if (message.length < 10) errors.push('Az üzenet legalább 10 karakter legyen.');
    if (errors.length) { e.preventDefault(); document.getElementById('formError').textContent = errors.join(' '); }
  });
});

document.getElementById('menu-toggle').addEventListener('click', () => {
  document.querySelector('nav').classList.toggle('open');
});

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.2 });

document.querySelectorAll('.event-card, .archive-card, #stay-form')
        .forEach(el => observer.observe(el));

document.addEventListener('DOMContentLoaded', () => {
  const params = new URLSearchParams(window.location.search);
  const msgEl = document.getElementById('stay-message');
  if (params.get('success') === '1') {
    msgEl.textContent = 'Thank you! Watch your inbox for updates and event details.';
    msgEl.style.display = 'block';
    document.getElementById('stay-form')
            .scrollIntoView({ behavior: 'smooth' });
  }
});

document.getElementById('stay-form').addEventListener('submit', function (e) {
  const n  = document.getElementById('stay-name').value.trim();
  const em = document.getElementById('stay-email').value.trim();
  const p  = document.getElementById('stay-phone').value.trim();
  const a  = document.getElementById('stay-address').value.trim();

  if (!n) {
    alert('Please enter your name.');
    e.preventDefault();
    return;
  }
  if (!em && !p && !a) {
    alert('Provide at least one contact method.');
    e.preventDefault();
    return;
  }
  if (em && !/^[^@\s]+@[^@\s\.]+\.[^@\s\.]+$/.test(em)) {
    alert('Please enter a valid email (example: you@example.com).');
    e.preventDefault();
    return;
  }
  if (p) {
    const digits = p.replace(/\D/g, '');
    if (digits.length !== 10) {
      alert('Phone number must contain exactly 10 digits (e.g., (555) 123-4567 or 555-123-4567).');
      e.preventDefault();
      return;
    }
  }
  if (a.length > 500) {
    alert('Address must be 500 characters or fewer.');
    e.preventDefault();
    return;
  }
  if (n.length > 100) {
    alert('Name must be 100 characters or fewer.');
    e.preventDefault();
    return;
  }
  if (em.length > 320) {
    alert('Email must be 320 characters or fewer.');
    e.preventDefault();
    return;
  }
});
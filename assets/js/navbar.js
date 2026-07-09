// navbar.js
// Simple navbar helpers: collapse on link click and basic active state.
document.addEventListener('DOMContentLoaded', () => {
	const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
	const bsCollapseEl = document.querySelector('.navbar-collapse');

	navLinks.forEach(link => {
		link.addEventListener('click', () => {
			// Collapse navbar on mobile after clicking a link
			if (bsCollapseEl && bsCollapseEl.classList.contains('show') && typeof bootstrap !== 'undefined') {
				const bsCollapse = new bootstrap.Collapse(bsCollapseEl);
				bsCollapse.hide();
			}
			// set active class
			navLinks.forEach(l => l.classList.remove('active'));
			link.classList.add('active');
		});
	});
});

// Categories Menu

const categoriesMenu = document.querySelector('.categories-menu');

const leftButton = document.querySelector('.left-btn');
const rightButton = document.querySelector('.right-btn');

function scrollLeft() {
	categoriesMenu.scrollBy({
		top: 0,
		left: 100,
		behavior: 'smooth',
	});
}

function scrollRight() {
	categoriesMenu.scrollBy({
		top: 0,
		left: -100,
		behavior: 'smooth',
	});
}

leftButton &&
	leftButton.addEventListener('click', () => {
		scrollRight();
	});

rightButton &&
	rightButton.addEventListener('click', () => {
		scrollLeft();
	});

// Toogle Navbar

const navbarMenu = document.querySelector('#navbar ul');
const navbarForm = document.querySelector('#navbar form');

const toggleMenuButton = document.querySelector('#toggle-menu');

toggleMenuButton &&
	toggleMenuButton.addEventListener('click', () => {
		navbarForm && navbarForm.classList.toggle('toggle-visibility');
		navbarMenu && navbarMenu.classList.toggle('toggle-visibility');
	});

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

// Pass Visibility

const passInput = document.querySelector('#password');
const passConfirmationInput = document.querySelector('#password-confirmation');

const toggleVisibilityPassButton = document.querySelectorAll(
	'.toggle-visibility-pass'
);

function toggleHide(element) {
	element.classList.toggle('hide');
}

function toogglePassVisibility(parent, element) {
	let inputType = element.getAttribute('type');
	let newType = inputType === 'text' ? 'password' : 'text';

	element.setAttribute('type', newType);

	let visibleButton = parent.querySelector('.visible');
	let hiddenButton = parent.querySelector('.hidden');

	toggleHide(visibleButton);
	toggleHide(hiddenButton);
}

toggleVisibilityPassButton &&
	toggleVisibilityPassButton.forEach((btn) => {
		btn.addEventListener('click', () => {
			const dataArea = btn.dataset.area;

			switch (dataArea) {
				case 'pass':
					passInput && toogglePassVisibility(btn, passInput);
					break;

				case 'passconfirmation':
					passConfirmationInput &&
						toogglePassVisibility(btn, passConfirmationInput);
					break;
			}
		});
	});

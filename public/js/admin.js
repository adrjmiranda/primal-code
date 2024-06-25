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

// Toggle Menu

const toggleMenuButton = document.querySelector('#toggle-menu-btn');

const sideMenu = document.querySelector('#content .side-menu');
const contentArea = document.querySelector('#content .content-area');

toggleMenuButton &&
	toggleMenuButton.addEventListener('click', () => {
		let menuState = toggleMenuButton.dataset.active;

		if (menuState === 'true') {
			sideMenu.classList.remove('right_menu');
			contentArea.classList.remove('contract_content');

			sideMenu.classList.add('left_menu');
			contentArea.classList.add('expand_content');

			toggleMenuButton.dataset.active = 'false';
		}

		if (menuState === 'false') {
			sideMenu.classList.remove('left_menu');
			contentArea.classList.remove('expand_content');

			sideMenu.classList.add('right_menu');
			contentArea.classList.add('contract_content');

			toggleMenuButton.dataset.active = 'true';
		}
	});

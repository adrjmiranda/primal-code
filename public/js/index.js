const categoriesMenu = document.querySelector('.categories-menu');

const leftButton = document.querySelector('.left-btn');
const rightButton = document.querySelector('.right-btn');

function scrollLeft() {
	categoriesMenu.scrollBy({
		top: 0, // Ajuste o valor conforme necessário
		left: 100,
		behavior: 'smooth',
	});
}

function scrollRight() {
	categoriesMenu.scrollBy({
		top: 0, // Ajuste o valor conforme necessário
		left: -100,
		behavior: 'smooth',
	});
}

leftButton.addEventListener('click', () => {
	scrollRight();
});

rightButton.addEventListener('click', () => {
	scrollLeft();
});

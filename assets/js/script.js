function getAll(selector) {
    return document.querySelectorAll(selector);
}

function get(selector) {
    return document.querySelector(selector);
}

// Desktop items
const desktopNavItems = getAll('nav .menu-item-has-children');
const dropdown = get("#dropdown");
const dropdown_content = get("#dropdown-content");
const closeButton = get('#closeMenu');

// Mobile items
const mobileNavItems = getAll('#menu .menu-item-has-children > a');
const mobileMenu = get("#menu");

function isStyleVisible(element) {
    return element.style.visibility === "visible";
}

function isStyleDisplayFlex(element) {
    return element.style.display === "flex";
}

function changeMobileBars(mobileBars) {
    mobileBars.classList.toggle("changeMobile");
    mobileMenu.style.visibility = isStyleVisible(mobileMenu) ? "hidden" : "visible";
    mobileMenu.style.display = isStyleDisplayFlex(mobileMenu) ? "none" : "flex";
}

function removeBorderBottom(items) {
    items.forEach(item => {
        item.querySelector('a').style.borderBottomColor='#ffffff'
    });
}

function turnAllArrowsDown(items){
    items.forEach(item => {
        item.classList.remove('active')
    });
}

function toggleArrow(item){
    item.classList.toggle('active');
}

function closeDropdown() {
    removeBorderBottom(desktopNavItems);
    dropdown.style.display = "none";
}

function fillDesktopNav(li) {
    li.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            const borderColor = item.querySelector('a').style;

            if (borderColor.borderBottomColor === 'var(--c-yellow)') {
                closeDropdown();
            } else {
                turnAllArrowsDown(li);
                removeBorderBottom(li);

                borderColor.borderBottomColor = "var(--c-yellow)";
                dropdown.style.display = "flex";
                dropdown_content.innerHTML = item.querySelector('nav .sub-menu').innerHTML;
            }
            toggleArrow(item);
        });
    });
}

function fillMobileNav(li){
    li.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            const subMenu = item.parentElement.querySelector('.sub-menu');
            subMenu.style.display = isStyleDisplayFlex(subMenu) ? 'none' : 'flex';

            const borderColor = item.style;
            borderColor.borderBottomColor = (borderColor.borderBottomColor === 'var(--f-c-black)') ? "#ffffff" : "var(--f-c-black)";
            toggleArrow(item.parentElement);
        });
    });
}

fillDesktopNav(desktopNavItems);
fillMobileNav(mobileNavItems);

closeButton.addEventListener('click', () => {
    closeDropdown();
    turnAllArrowsDown(desktopNavItems);
});

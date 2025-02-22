// DESKTOP ITEMS
const DESKTOP_NAV_ITEMS = document.querySelectorAll('#root header nav .menu-item-has-children');
const DROPDOWN = document.querySelector("#root header .dropdown");
const DROPDOWN_CONTENT = document.querySelector("#root header .dropdown .dropdown-content");
const CLOSE_BUTTON = document.querySelector('#root header .dropdown .close-menu');

// MOBILE ITEMS
const MOBILE_NAV_ITEMS = document.querySelectorAll('.mobile-menu .menu .menu-item-has-children');
const MOBILE_MENU = document.querySelector("#root header .mobile-menu");

// DESKTOP FUNCTIONS
DESKTOP_NAV_ITEMS.forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();
        const link = item.querySelector('a');
        if (checkBorderBottom(link, 'desktop')) {
            toggleArrow(item);
            closeDropdown();
        } else {
            removeAllBorderBottom(DESKTOP_NAV_ITEMS, 'desktop');
            addBorderBottom(link, 'desktop');

            DROPDOWN.style.display = "flex";
            DROPDOWN.classList.add("open");
            DROPDOWN_CONTENT.innerHTML = item.querySelector('nav .sub-menu').innerHTML;
            turnAllArrowsDown(DESKTOP_NAV_ITEMS);
            toggleArrow(item);
        }
    });
});

document.addEventListener('click', event => {
    (!Array.from(DESKTOP_NAV_ITEMS).some(button => button.contains(event.target)) && !DROPDOWN.contains(event.target)) ? closeDropdown() : null;
});

function closeDropdown(){
    DROPDOWN.classList.remove("open");
    DROPDOWN.style.display = "none";
    turnAllArrowsDown(DESKTOP_NAV_ITEMS);
    removeAllBorderBottom(DESKTOP_NAV_ITEMS, 'desktop');
}

function toggleArrow(item){ item.classList.toggle('active'); }

function removeAllBorderBottom(li, where){
    li.forEach(item => {
        item.querySelector('a').classList.remove('border-bottom-' + where);
    });
}

CLOSE_BUTTON.addEventListener('click', () => closeDropdown());

// MOBILE FUNCTIONS
MOBILE_NAV_ITEMS.forEach(item => {
    item.querySelector('a').addEventListener('click', (e) => {
        e.preventDefault();
        const link = item.querySelector('a');
        const subMenu = item.querySelector('.sub-menu');
        subMenu.style.display = subMenu.style.display === 'flex' ? 'none' : 'flex';

        if(checkBorderBottom(link, 'mobile')){
            removeBorderBottom(link);
        } else {
            addBorderBottom(link, 'mobile');
            turnAllArrowsDown(MOBILE_NAV_ITEMS);
        }
        toggleArrow(item);
    });
});

function changeMobileBars(mobileBars) {
    MOBILE_NAV_ITEMS.forEach(item => {
        removeBorderBottom(item.querySelector('a'));
        item.querySelector('ul.sub-menu').style.display = 'none';
    });

    mobileBars.classList.toggle("mobile-bars");
    if (MOBILE_MENU.style.display === "flex") {
        MOBILE_MENU.classList.toggle("open")

        setTimeout(() => {
            MOBILE_MENU.style.visibility = "hidden";
            MOBILE_MENU.style.display = "none";
        }, 250);
    } else {
        MOBILE_MENU.style.visibility = "visible";
        MOBILE_MENU.style.display = "flex";
        setTimeout(() => MOBILE_MENU.classList.toggle("open"), 50);
    }
}

function removeBorderBottom(item){
    item.classList.remove('border-bottom-mobile');
}

// BOTH FUNCTION
function turnAllArrowsDown(items){
    items.forEach(item => {
        if (item.classList.contains("active")) {
            item.classList.remove("active");
        }
    });
}

function addBorderBottom(item, where){
    item.classList.add('border-bottom-' + where);
}

function checkBorderBottom(link, where){
    return link.classList.contains('border-bottom-' + where);
}

// scroll to top button
window.onscroll = () => {
    document.querySelector(".top-btn").style.display =
        document.body.scrollTop > 150 ||
        document.documentElement.scrollTop > 150 ? "flex" : "none";
};

function scrollToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function showFilter(btn) {
    btn.remove();
    document.querySelector(".filter-form form").style.display = "flex";
    document.querySelector(".reset-filter").style.display = "flex";
}

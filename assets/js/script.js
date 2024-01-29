// DESKTOP ITEMS
const DESKTOP_NAV_ITEMS = document.querySelectorAll('nav .menu-item-has-children');
const DROPDOWN = document.querySelector("#dropdown");
const DROPDOWN_CONTENT = document.querySelector("#dropdown-content");
const CLOSE_BUTTON = document.querySelector('#closeMenu');

// MOBILE ITEMS
const MOBILE_NAV_ITEMS = document.querySelectorAll('#menu .menu-item-has-children');
const MOBILE_MENU = document.querySelector("#menu");

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
            setTimeout(() => DROPDOWN.classList.add("open"), 50);
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
    setTimeout(() => DROPDOWN.style.display = "none", 250);
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

    mobileBars.classList.toggle("changeMobile");
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
    document.getElementById("backToTopBtn").style.display = document.body.scrollTop > 80 || document.documentElement.scrollTop > 80 ? "flex" : "none";
};

function scrollToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

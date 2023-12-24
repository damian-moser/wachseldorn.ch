function getAll(selector) { return document.querySelectorAll(selector); }

function get(selector) { return document.querySelector(selector); }

// Desktop items
const DESKTOP_NAV_ITEMS = getAll('nav .menu-item-has-children');
const DROPDOWN = get("#dropdown");
const DROPDOWN_CONTENT = get("#dropdown-content");
const CLOSE_BUTTON = get('#closeMenu');

// Mobile items
const MOBILE_NAV_ITEMS = getAll('#menu .menu-item-has-children');
const MOBILE_MENU = get("#menu");

function toggleVisibility(element) { return element.style.visibility === "visible" ? 'hidden' : 'visible'; }

function toggleFlex(element) { return element.style.display === "flex" ? 'none' : 'flex'; }

document.addEventListener('click', event => {
    const dropdown = document.getElementById('dropdown');
    const buttons = document.querySelectorAll('header nav ul.menu li.menu-item-has-children');

    (!Array.from(buttons).some(button => button.contains(event.target)) && !dropdown.contains(event.target)) ? closeDropdown() : null;
});

function changeMobileBars(mobileBars) {
    closeAllMobileMenus();
    mobileBars.classList.toggle("changeMobile");
    MOBILE_MENU.style.visibility = toggleVisibility(MOBILE_MENU);
    MOBILE_MENU.style.display = toggleFlex(MOBILE_MENU);
}

function closeAllMobileMenus(){
    MOBILE_NAV_ITEMS.forEach(item => {
        removeBorderBottom(item.querySelector('a'), 'mobile');
        item.querySelector('ul.sub-menu').style.display = 'none';
    });
}

function turnAllArrowsDown(items){
    items.forEach(item => {
        item.classList.remove('active')
    });
}

function toggleArrow(item){ item.classList.toggle('active'); }

function removeAllBorderBottom(li, where){
    li.forEach(item => {
        item.querySelector('a').classList.remove('border-bottom-' + where);
    });
}

function checkBorderBottom(link, where){ return link.classList.contains('border-bottom-' + where); }

function closeDropdown(){
    DROPDOWN.style.display = "none";
    turnAllArrowsDown(DESKTOP_NAV_ITEMS);
    removeAllBorderBottom(DESKTOP_NAV_ITEMS, 'desktop');
}

function addBorderBottom(item, where){ item.classList.add('border-bottom-' + where); }

function removeBorderBottom(item, where){ item.classList.remove('border-bottom-' + where); }

DESKTOP_NAV_ITEMS.forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();
        const link = item.querySelector('a');

        if (checkBorderBottom(link, 'desktop')) {
            removeBorderBottom(link, 'desktop');
            closeDropdown();
        } else {
            removeAllBorderBottom(DESKTOP_NAV_ITEMS, 'desktop');
            addBorderBottom(link, 'desktop');

            // show dropdown
            DROPDOWN.style.display = "flex";
            DROPDOWN_CONTENT.innerHTML = item.querySelector('nav .sub-menu').innerHTML;

            turnAllArrowsDown(DESKTOP_NAV_ITEMS);
        }

        toggleArrow(item);
    });
});

MOBILE_NAV_ITEMS.forEach(item => {
    item.querySelector('a').addEventListener('click', (e) => {
        e.preventDefault();
        const link = item.querySelector('a');
        item.querySelector('.sub-menu').style.display = toggleFlex(item.querySelector('.sub-menu'));

        if(checkBorderBottom(link, 'mobile')){
            removeBorderBottom(link, 'mobile');
        } else {
            addBorderBottom(link, 'mobile');
            turnAllArrowsDown(MOBILE_NAV_ITEMS);
        }

        toggleArrow(item);
    });
});

CLOSE_BUTTON.addEventListener('click', () => closeDropdown());

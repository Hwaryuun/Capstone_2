


const dropdownss = document.querySelectorAll('.dropdowns');

dropdownss.forEach(dropdowns => {

const select = dropdowns.querySelector('.select');
const caret = dropdowns.querySelector('.caret');
const menu = dropdowns.querySelector('.menus');
const options = dropdowns.querySelectorAll('.menus li');
const selected = dropdowns.querySelector('.selected');

select.addEventListener('click', () => 
{
    select.classList.toggle('select-clicked');
    caret.classList.toggle('caret-rotate');
    menu.classList.toggle('menus-open');
});

options.forEach(option => {
    option.addEventListener('click', () => {
        selected.innerText = option.innerText;
        select.classList.remove('select-clicked');
        select.classList.remove('caret-rotate');
        menu.classList.remove('menus-open');
        
        options.forEach(option => {
            option.classList.remove('active');
        });
        option.classList.add('active');
        });
    });
});




const dropdownsPR = document.querySelectorAll('.dropdownspr');

dropdownsPR.forEach(dropdownspr => {

const selectPR = dropdownspr.querySelector('.selectpr');
const caretPR  = dropdownspr.querySelector('.caretpr');
const menuPR  = dropdownspr.querySelector('.menuspr');
const optionsPR  = dropdownspr.querySelectorAll('.menuspr li');
const selectedPR  = dropdownspr.querySelector('.selectedpr');

selectPR.addEventListener('click', () => 
{
    selectPR.classList.toggle('selectpr-clicked');
    caretPR.classList.toggle('caretpr-rotate');
    menuPR.classList.toggle('menuspr-open');
});

optionsPR.forEach(option => {
    option.addEventListener('click', () => {
        selectedPR.innerText = option.innerText;
        selectPR.classList.remove('selectpr-clicked');
        selectPR.classList.remove('caretpr-rotate');
        menuPR.classList.remove('menuspr-open');
        
        optionsPR.forEach(option => {
            option.classList.remove('activepr');
        });
        option.classList.add('activepr');
        });
    });
});

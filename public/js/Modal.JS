const shows = document.getElementById('shows');

const CONTAINER = document.getElementById('CONTAINER');
const close = document.getElementById('close');


shows.addEventListener('click', ()=> {
    CONTAINER.classList.add('show');
} )

close.addEventListener('click', ()=> {
    CONTAINER.classList.remove('show');
} )

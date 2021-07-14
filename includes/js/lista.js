const addToListSongButtons = document.querySelectorAll('.addToCart');

addToListSongButtons.forEach((addToListSongButtons)=>{
    addToListSongButtons.addEventListener('click', addToListSongClicked);
});

function addToListSongClicked(event){
    const button = event.target;
    const item = button.closest('.podcast-list');
    const itemTitle = item.querySelector().textContent;
}
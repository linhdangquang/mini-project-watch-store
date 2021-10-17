/*====================CHANGE BACKGROUND================*/
function scrollHeader(){
    const header = document.getElementById('header')
    // When the scroll is greater than 100 viewport height, add the scroll-header class to the header tag
    if(this.scrollY >= 100) header.classList.add('scroll-header'); else header.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)

// SEARCH
const searchBtn = document.querySelector('.search-icon');
const formContainer = document.querySelector('.form__container')
const closeSearcher = document.querySelector('.close-search--form')

searchBtn.addEventListener('click', searchForm)
closeSearcher.addEventListener('click', () => {
    formContainer.classList.remove('search-active')
})

function searchForm() {
    formContainer.classList.toggle('search-active')
}



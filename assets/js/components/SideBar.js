const burger = document.querySelector('.toggle-sidebar-btn')

burger.addEventListener('click', () => {
    document.querySelector('body').classList.toggle('toggle-sidebar')
})
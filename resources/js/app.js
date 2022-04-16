require('./bootstrap');
(()=>{
    const menuItems = document.querySelectorAll('ul.menu .menu-item');
    const burgerMenu = document.querySelector('.logo-container .bar-mobile');

    //handle tab onClick
    menuItems.forEach(item =>{
        item.addEventListener('click' , (el)=> {
            const activeItem = document.querySelector('ul.menu li.active');
            if(activeItem !== null){
                activeItem.classList.remove('active');
                item.classList.add('active');
            }
          }
        )
    })

    //handle burger btn
    const onToggleMenu = () =>{
        document.querySelector('.nav-content ul.menu').classList.toggle('active');
        document.querySelector('.logo-container .bar-mobile').classList.toggle('active');
    }

    //add event click
    burgerMenu.addEventListener('click' , onToggleMenu);
})()

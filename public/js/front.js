let menu = document.querySelector('#menu');
let navDesktop = document.querySelector('#navDesktop');
let navMobile = document.querySelector('#navMobile');

menu.addEventListener('click', ()=>{
    if(navMobile.classList.contains('hidden')){
        navMobile.classList.remove('hidden');
    }else{
        navMobile.classList.add('hidden');
    }
});
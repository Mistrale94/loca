function btntoggle(){

    const btnToggle = document.querySelector('.btn-toggle');
    const body = document.body;
    var image = document.getElementById('darkmode');
    var logo = document.getElementById('logo');
    var burger = document.getElementById('img-burger');
    var picto = document.getElementById('picto');
    var picto2 = document.getElementById('picto2');
    var picto3 = document.getElementById('picto3');
    var image_mobile = document.querySelector('.mobile-nav .mobile_link-group .btn-toggle img');

    if(body.classList.contains('dark')){
        body.classList.add('light')
        body.classList.remove('dark')
        image.src = "asset/image/akar-icons_moon-fill.png";
        image_mobile.src = "asset/image/akar-icons_moon-fill.png";

        logo.src = "asset/image/logo.png";
        burger.src = "asset/image/Menu.png";
        picto.src = "asset/image/icones1.png";
        picto2.src = "asset/image/icones2.png";
        picto3.src = "asset/image/icones3.png";

    }else if (body.classList.contains('light')){
        body.classList.add('dark')
        body.classList.remove('light')
        image.src = "asset/image/akar-icons_sun-fill.png";
        image_mobile.src = "asset/image/akar-icons_sun-fill.png";

        logo.src = "asset/image/logo-white.png";
        burger.src = "asset/image/Menu (1).png";
        picto.src = "asset/image/icones1-white.png";
        picto2.src = "asset/image/icones2-white.png";
        picto3.src = "asset/image/icones3-white.png";

    }

}

function menu() {
    if (document.getElementById('burger').classList.contains('open')) {
        document.getElementsByClassName('mobile_link-group')[0].style.display = 'none';
        document.getElementById('burger').classList.remove('open');
    } else {
        document.getElementsByClassName('mobile_link-group')[0].style.display = 'flex';
        document.getElementById('burger').classList.add('open');
    }
}
function menu() {
    if (document.getElementById('burger').classList.contains('open')) {
        document.getElementsByClassName('mobile_link-group')[0].style.display = 'none';
        document.getElementById('burger').classList.remove('open');
    } else {
        document.getElementsByClassName('mobile_link-group')[0].style.display = 'flex';
        document.getElementById('burger').classList.add('open');
    }
}
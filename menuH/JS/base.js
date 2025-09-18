function abrir_menu() {
    const menu = document.getElementById('menu');
    const btnAbrir = document.querySelector('.menu-resp');

    menu.classList.toggle('ativo');

    // Se o menu estiver aberto, esconde o botão hamburguer
    if (menu.classList.contains('ativo')) {
        btnAbrir.style.display = "none";
    } else {
        btnAbrir.style.display = "block";
    }
}

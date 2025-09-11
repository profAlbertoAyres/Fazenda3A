document.addEventListener("DOMContentLoaded", () => {
  const list = document.querySelector(".list-card");
  let quadros = list.querySelectorAll(".card");
  const interval = 3000; // 3 segundos
  let cardWidth = list.firstElementChild.offsetWidth + 16; // largura + gap

  if (quadros.length > 3) {


    // já garante que exista um card extra no final
    let clone = list.firstElementChild.cloneNode(true);
    list.appendChild(clone);

    setInterval(() => {
      const firstCard = list.firstElementChild;

      // move para a esquerda
      list.style.transition = "transform 0.6s ease";
      list.style.transform = `translateX(-${cardWidth}px)`;

      setTimeout(() => {
        // remove o primeiro card (já saiu da tela)
        list.removeChild(firstCard);

        // adiciona novo clone no final
        const newClone = list.firstElementChild.cloneNode(true);
        list.appendChild(newClone);

        // reseta posição
        list.style.transition = "none";
        list.style.transform = "translateX(0)";
      }, 600);
    }, interval);

    // recalcula largura no resize
    window.addEventListener("resize", () => {
      cardWidth = list.firstElementChild.offsetWidth + 16;
    });
  }else{
    list.style.justifyContent = 'space-around';
  }
});

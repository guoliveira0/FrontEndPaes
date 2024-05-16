/**
 * Adicionando os eventos de collapse no 1° card de dúvidas
 */
document.getElementById("card1-content").addEventListener("show.bs.collapse", () => { rotateArrowIcon(1) });
document.getElementById("card1-content").addEventListener("hide.bs.collapse", () => { unchangeArrowIcon(1) });

/**
 * Adicionando os eventos de collapse no 2° card de dúvidas
 */
document.getElementById("card2-content").addEventListener("show.bs.collapse", () => { rotateArrowIcon(2) });
document.getElementById("card2-content").addEventListener("hide.bs.collapse", () => { unchangeArrowIcon(2) });

/**
 * Adicionando os eventos de collapse no 3° card de dúvidas
 */
document.getElementById("card3-content").addEventListener("show.bs.collapse", () => { rotateArrowIcon(3) });
document.getElementById("card3-content").addEventListener("hide.bs.collapse", () => { unchangeArrowIcon(3) });

/**
 * Rotaciona o ícone "arrow" nos cards de dúvidas em 180°
 * @param {Number} child Indica o card que se quer aplicar a transformação
 * @returns {void}
 */
function rotateArrowIcon(child = 1) {
    document.getElementById("arrow"+ child + "-expand").classList.add("rotate-180");
}

/**
 * Retorna o ícone "arrow" nos cards de dúvidas para sua rotação original
 * @param {Number} child Indica o card que se quer aplicar a transformação
 * @returns {void}
 */
function unchangeArrowIcon(child = 1) {
    document.getElementById("arrow"+ child + "-expand").classList.remove("rotate-180");
}
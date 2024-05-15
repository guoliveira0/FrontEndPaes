document.getElementById("card1-content").addEventListener("show.bs.collapse", () => { rotateArrowIcon(1) });
document.getElementById("card1-content").addEventListener("hide.bs.collapse", () => { unchangeArrowIcon(1) });

document.getElementById("card2-content").addEventListener("show.bs.collapse", () => { rotateArrowIcon(2) });
document.getElementById("card2-content").addEventListener("hide.bs.collapse", () => { unchangeArrowIcon(2) });

document.getElementById("card3-content").addEventListener("show.bs.collapse", () => { rotateArrowIcon(3) });
document.getElementById("card3-content").addEventListener("hide.bs.collapse", () => { unchangeArrowIcon(3) });

function rotateArrowIcon(child = 1) {
    document.getElementById("arrow"+ child + "-expand").classList.add("rotate-180");
}

function unchangeArrowIcon(child = 1) {
    document.getElementById("arrow"+ child + "-expand").classList.remove("rotate-180");
}
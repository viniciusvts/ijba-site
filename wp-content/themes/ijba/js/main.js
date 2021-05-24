window.onscroll = function() {
    let menuFixed = document.getElementById("menu-fixed");

    if (window.innerWidth > 768) {
        if (this.scrollY > 90) {
            menuFixed.setAttribute("style", "background-color:#0a2724");
        } else {
            menuFixed.setAttribute("style", "background:transparent");
        }
    }
}
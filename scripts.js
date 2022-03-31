function adjustFooter() {
    let body = document.body, html = document.documentElement;
    const documentHeight = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
    
    if (documentHeight > 939) {
        document.getElementById("footerId").classList.add("footer-relative");
        document.getElementById("footerId").classList.remove("footer");
    }else if (documentHeight <= 939) {
        document.getElementById("footerId").classList.remove("footer-relative");
        document.getElementById("footerId").classList.add("footer");
    }
}
window.addEventListener('load', adjustFooter());

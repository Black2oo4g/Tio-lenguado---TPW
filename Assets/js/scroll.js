function scrollToTable() {
    const table = document.getElementById("platillosTable");
    if (table) {
        table.scrollIntoView({ behavior: "smooth" });
    }
}
window.onload = function () {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('tipo') || urlParams.has('buscar')) {
        scrollToTable();
    }
};
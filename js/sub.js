function actualizarMapa(mapaUrl) {
    const iframe = document.getElementById('dynamicMap');
    iframe.src = mapaUrl;
}
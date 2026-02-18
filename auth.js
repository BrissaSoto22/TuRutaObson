document.addEventListener("DOMContentLoaded", () => {
    // 1. Obtener los datos guardados
    const ruta = localStorage.getItem("rutaSeleccionada");
    const horario = localStorage.getItem("horarioSeleccionado");

    // 2. Referencias a los elementos del HTML
    const infoSeleccion = document.getElementById("infoSeleccion");
    const rutaElegida = document.getElementById("rutaElegida");
    const horarioElegido = document.getElementById("horarioElegido");
    const mapContainer = document.getElementById("mapContainer");
    const mensajeHorario = document.getElementById("mensajeHorario");

    // 3. Si hay una ruta guardada, mostrar la información
    if (ruta && horario) {
        mensajeHorario.style.display = "none"; // Ocultamos el mensaje inicial
        infoSeleccion.style.display = "block"; // Mostramos el contenedor de info
        rutaElegida.textContent = ruta;
        horarioElegido.textContent = horario;

        // 4. Lógica especial para la Línea 4
        if (ruta === "Línea 4") {
            mapContainer.style.display = "block"; // ¡Aparece el mapa!
        } else {
            mapContainer.style.display = "none";
        }
    }
});

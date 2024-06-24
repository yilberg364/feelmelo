document.addEventListener("DOMContentLoaded", function() {
    const searchForm = document.querySelector(".search form");
    const contentContainer = document.querySelector(".content-container");
    const searchResults = document.getElementById("searchResults"); // Nuevo

    searchForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const formData = new FormData(searchForm);

        fetch("buscar.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (contentContainer) {
                contentContainer.style.display = "none"; // Ocultar contenido principal
            }
            if (searchResults) {
                searchResults.innerHTML = data; // Actualizar resultados de búsqueda
                searchResults.style.display = "block"; // Mostrar resultados de búsqueda
            }
        })
        .catch(error => {
            console.error("Error fetching search results:", error);
        });
    });
});







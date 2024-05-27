document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".publicar-comentario");
    const commentSection = document.querySelector(".commentSection");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch('publicar_comentario.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const div = document.createElement("div");
                div.className = "commentItem";

                // Añade el nombre del usuario y el comentario en el div
                div.innerHTML = `<strong>${data.nombre_us}</strong>: ${data.comentario}`;
                commentSection.appendChild(div);

                form.querySelector("textarea[name='comentario']").value = '';
            } else {
                alert(data.error);
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});

  
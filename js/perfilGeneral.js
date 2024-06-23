document.getElementById('boton-editar').addEventListener('click', function () {
    document.getElementById('boton-editar').style.display = 'none';
    document.getElementById('profile-actions').style.display = 'block';
});


function displayImage(src, title, description) {
    const imageCard = document.createElement("div");
    imageCard.classList.add("image-card");

    const image = document.createElement("img");
    image.src = src;
    image.alt = title;

    const imageTitle = document.createElement("h3");
    imageTitle.textContent = title;

    const imageDescription = document.createElement("p");
    imageDescription.textContent = description;

    imageCard.appendChild(image);
    imageCard.appendChild(imageTitle);
    imageCard.appendChild(imageDescription);
    uploadedImagesDiv.appendChild(imageCard);
}

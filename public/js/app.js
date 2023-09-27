// Obtenez une référence vers les éléments HTML
const imageInput = document.getElementById('imageInput');
const imagePreview = document.getElementById('imagePreview');

// Ajoutez un écouteur d'événement au champ de fichier pour écouter les changements
imageInput.addEventListener('change', function() {
    const file = imageInput.files[0];

    // Vérifiez si le fichier est une image
    if (file.type.startsWith('image/')) {
        const reader = new FileReader();

        // Lorsque la lecture du fichier est terminée
        reader.onload = function(event) {
            const imageUrl = event.target.result;

            imagePreview.style.display = "block"

            // Mettez à jour le contenu de la div avec l'aperçu de l'image
            imagePreview.innerHTML = `<img src="${imageUrl}" alt="Aperçu de l'image" />`;
        };

        // Lire le fichier en tant que URL de données (base64)
        reader.readAsDataURL(file);
    }
});

let inputSelect = document.querySelector('#annéescolaire')
let inputSouhaite = document.querySelector('#souhait')

inputSelect.addEventListener('change', function (){
    if (inputSelect.value === "1") {
        inputSouhaite.options[0].innerHTML = "Parrain"
        inputSouhaite.options[0].value = "PARRAIN"
        inputSouhaite.options[1].innerHTML = "Marraine"
        inputSouhaite.options[1].value = "MARRAINE"
    }else{
        inputSouhaite.options[0].innerHTML = "Filleul"
        inputSouhaite.options[0].value = "FILLEUL"
        inputSouhaite.options[1].innerHTML = "Filleule"
        inputSouhaite.options[1].value = "FILLEULE"
    }
});

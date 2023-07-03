const imgInput = document.getElementById('imgProducto');
const imgPreview = document.getElementById('imagenPrevia');

imgInput.addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        imgPreview.src = e.target.result;
    }

    reader.readAsDataURL(file);
});
// Image Preview
function previewImage(event) {
    let reader = new FileReader();
    reader.onload = function () {
        let output = document.getElementById('preview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}


// Loading spinner
document.addEventListener("DOMContentLoaded", function () {
    let form = document.querySelector("form");

    if (form) {
        form.addEventListener("submit", function () {
            document.getElementById("spinner").classList.remove("d-none");
            document.getElementById("submitBtn").disabled = true;
        });
    }
});
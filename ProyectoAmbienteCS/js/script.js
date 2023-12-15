const $owlLogin = document.getElementById('owl-login');
const $passwordInput = document.getElementById('password');

$passwordInput.addEventListener('focus', () => {
    $owlLogin.classList.add('password');
});

$passwordInput.addEventListener('focusout', () => {
    $owlLogin.classList.remove('password');
});


document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita el envío del formulario por defecto

    // Elimina los mensajes de error anteriores, si existen
    var errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach(function(element) {
        element.remove();
    });

    // Obtén los datos del formulario
    var formData = new FormData(document.getElementById("loginForm"));

    // Realiza una solicitud AJAX al servidor
    fetch("process_login.php", {
        method: "POST",
        body: formData
    })
    .then(function(response) {
        if (response.ok) {
            // Si la respuesta es exitosa, redirige al usuario a otra página
            window.location.href = "index.php";
        } else if (response.status === 401) {
            // Si las credenciales son inválidas, muestra un mensaje de error
            var errorMessage = document.createElement("p");
            errorMessage.textContent = "Usuario no registrado. Intente nuevamente.";
            errorMessage.className = "error-message"; // Agrega una clase para identificar el mensaje de error
            errorMessage.style.color = "red";
            document.getElementById("loginForm").appendChild(errorMessage);
        } else {
            console.error("Ocurrió un error en la solicitud.");
        }
    })
    .catch(function(error) {
        console.error("Hubo un problema con la solicitud fetch:", error);
    });
});



















  
  


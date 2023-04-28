// Sélectionner le formulaire et les champs email et mot de passe
const form = document.getElementById('form');
const emailField = document.getElementById('Adresse e-mail');
const passwordField = document.getElementById('Mot de passe');

// Fonction de validation de l'email
function isValidEmail(email) {
    // Expression régulière pour vérifier si l'email est valide
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Fonction de validation du formulaire
function validateForm(event) {
    // Empêcher le formulaire de se soumettre
    event.preventDefault();

    // Récupérer les valeurs des champs email et mot de passe
    const email = emailField.value.trim();
    const password = passwordField.value.trim();

    // Vérifier si l'email est valide
    if (!isValidEmail(email)) {
        alert('L\'adresse e-mail est invalide.');
        return;
    }

    // Vérifier si le champ mot de passe est vide
    if (password === '') {
        alert('Le champ mot de passe est obligatoire.');
        return;
    }

    // Soumettre le formulaire s'il est valide
    form.submit();
}

// Ajouter un écouteur d'événements pour le formulaire
form.addEventListener('submit', validateForm);
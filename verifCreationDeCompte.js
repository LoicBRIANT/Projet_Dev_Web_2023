// Récupération des éléments du formulaire
const form = document.getElementById('form');
const prenomInput = document.getElementById('prenom');
const nomInput = document.getElementById('nom');
const emailInput = document.getElementById('email');
const identifiantInput = document.getElementById('identifiant');
const motDePasseInput = document.getElementById('mot_de_passe');

// Fonction de validation du formulaire
function validateForm() {
  // Validation du prénom
  if (prenomInput.value.trim() === '') {
    alert('Veuillez entrer votre prénom');
    prenomInput.focus();
    return false;
  }

  // Validation du nom
  if (nomInput.value.trim() === '') {
    alert('Veuillez entrer votre nom');
    nomInput.focus();
    return false;
  }

  // Validation de l'adresse e-mail
  if (emailInput.value.trim() === '') {
    alert('Veuillez entrer votre adresse e-mail');
    emailInput.focus();
    return false;
  } else {
    // Vérification de la validité de l'adresse e-mail
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regex.test(emailInput.value.trim())) {
      alert('Adresse e-mail invalide');
      emailInput.focus();
      return false;
    }
  }

  // Validation de l'identifiant
  if (identifiantInput.value.trim() === '') {
    alert('Veuillez entrer un identifiant');
    identifiantInput.focus();
    return false;
  }

  // Validation du mot de passe
  if (motDePasseInput.value.trim() === '') {
    alert('Veuillez entrer votre mot de passe');
    motDePasseInput.focus();
    return false;
  }

  // Soumission du formulaire
  form.submit();
}

// Écouteur d'événement pour la soumission du formulaire
form.addEventListener('submit', function(event) {
  event.preventDefault(); // Empêche la soumission du formulaire par défaut
  validateForm();
});
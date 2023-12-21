function verifierReponse(exercice) {
    let reponse = document.querySelector('.lecon:nth-child(' + exercice + ') .reponse').value;
    reponse = parseFloat(reponse.replace(',', '.')); // Pour s'assurer que la réponse est lue comme un nombre décimal

    const reponseAttendue = 26.9; // Réponse attendue en pourcentage
    const tolerance = 0.1; // Tolérance pour la réponse

    const resultatElement = document.querySelector('.lecon:nth-child(' + exercice + ') .resultat');

    if (Math.abs(reponse - reponseAttendue) <= tolerance) {
        // Réponse correcte
        resultatElement.innerHTML = 'Bravo, tu as gagné 10 points.';
        // Ici, vous pouvez ajouter la logique pour incrémenter les points de l'utilisateur
    } else {
        // Réponse incorrecte
        resultatElement.innerHTML = 'Dommage, réessaie !';
        // Ici, vous pouvez ajouter la logique pour afficher une image ou un message d'encouragement
    }
}

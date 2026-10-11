
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("form");

        form.addEventListener("submit", function(event) {
            // Récupérer les valeurs des champs
            const nom = document.getElementById("nom").value.trim();
            const email = document.getElementById("email").value.trim();
            const sujet = document.getElementById("sujet").value.trim();
            const message = document.getElementById("message").value.trim();
            const dateDepart = document.getElementById("date_depart").value;
            const dateRetour = document.getElementById("date_retour").value;
            const methodePaiement = document.getElementById("methode_paiement").value;

            // Vérification des champs requis
            if (!nom || !email || !sujet || !message || !dateDepart || !dateRetour || !methodePaiement) {
                alert("Veuillez remplir tous les champs requis.");
                event.preventDefault(); 
                return;
            }

            // Vérification des dates
            const departDate = new Date(dateDepart);
            const retourDate = new Date(dateRetour);

            if (departDate >= retourDate) {
                alert("La date de retour doit être postérieure à la date de départ.");
                event.preventDefault(); 
                return;
            }

           
            alert("Formulaire soumis avec succès !");
        });
    });

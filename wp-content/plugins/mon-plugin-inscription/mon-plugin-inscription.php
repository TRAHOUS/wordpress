<?php
/*
Plugin Name: Mon Plugin d'Inscription
Description: Un plugin pour gérer l'inscription des utilisateurs.
Version: 1.0
Author: Houssem
*/

// Fonction pour afficher le formulaire d'inscription
function afficher_formulaire_inscription() {
    // Ici, vous pouvez créer le formulaire HTML pour l'inscription
    // Assurez-vous d'inclure les champs tels que le nom, l'email, le mot de passe, etc.
    // N'oubliez pas d'ajouter un champ de soumission (ex: <input type="submit">)
}

// Action pour afficher le formulaire d'inscription sur une page ou un article
add_shortcode('inscription_form', 'afficher_formulaire_inscription');

// Fonction pour traiter les données du formulaire lors de la soumission
function traiter_formulaire_inscription() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérez les données du formulaire
        $nom = sanitize_text_field($_POST['nom']);
        $email = sanitize_email($_POST['email']);
        $mot_de_passe = sanitize_text_field($_POST['mot_de_passe']);

        // Effectuez les vérifications nécessaires sur les données
        // Par exemple, vérifiez si l'email est unique

        // Créez un nouvel utilisateur WordPress
        $utilisateur_id = wp_create_user($nom, $mot_de_passe, $email);

        if (is_wp_error($utilisateur_id)) {
            // Gestion des erreurs
            echo "Une erreur s'est produite lors de la création de l'utilisateur : " . $utilisateur_id->get_error_message();
        } else {
            // Utilisateur créé avec succès
            echo "Inscription réussie !";
        }
    }
}

// Action pour traiter le formulaire lors de sa soumission
add_action('init', 'traiter_formulaire_inscription');
?>

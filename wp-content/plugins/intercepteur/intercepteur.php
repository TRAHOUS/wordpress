<?php
/*
Plugin Name: Custom Form Handler
Description: Intercepte la soumission du formulaire  et envoie les données au API.
Version: 1.0
Author: Houssem
*/

// Fonction pour intercepter la soumission du formulaire
function custom_form_submission_handler() {
    if (isset($_POST['et_pb_contactform_submit_0']) && $_POST['et_pb_contactform_submit_0'] === 'et_contact_proccess') {
        // Récupérez les données du formulaire
        $nom = sanitize_text_field($_POST['et_pb_contact_nom_0']);
        $prenom = sanitize_text_field($_POST['et_pb_contact_firstname_0']);
        $tel = sanitize_text_field($_POST['et_pb_contact_tel_0']);
        $commerce = sanitize_text_field($_POST['et_pb_contact_commerce_0']);
        $ville = sanitize_text_field($_POST['et_pb_contact_ville_0']);
        $email = sanitize_email($_POST['et_pb_contact_email_0']);

        // Construisez un tableau de données à envoyer à votre API
        $data = array(
            'nom' => $nom,
            'prenom' => $prenom,
            'tel' => $tel,
            'commerce' => $commerce,
            'ville' => $ville,
            'email' => $email,
        );

        // Convertissez le tableau de données en JSON
        $json_data = json_encode($data);

        // URL de votre API
        $api_url = 'https://api.hellocse.fr/account/v1/users';

        // Configuration de la requête HTTP
        $args = array(
            'body' => $json_data,
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
        );

        // Envoyez la requête à votre API
        $response = wp_remote_post($api_url, $args);

        // Vous pouvez gérer la réponse de votre API ici, par exemple, enregistrer des journaux ou afficher un message de confirmation
    }
}

// Ajoutez une action pour intercepter la soumission du formulaire
add_action('init', 'custom_form_submission_handler');

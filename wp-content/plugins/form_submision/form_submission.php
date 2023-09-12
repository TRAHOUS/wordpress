<?php

/*
Plugin Name: form_submission
Description: Intercepte la soumission du formulaire Divi et traite les données.
*/

function form_submission()
{
    if (isset($_POST['et_pb_contactform_submit_1']) && $_POST['et_pb_contactform_submit_1'] === 'et_contact_proccess') {

        $external_id = strtotime('now');
        $nom = ($_POST['et_pb_contact_nom_1']);
        $prenom = ($_POST['et_pb_contact_prenom_1']);
        $telephone = ($_POST['et_pb_contact_telephone_1']);  // !!!
        $commerce = ($_POST['et_pb_contact_commerce_1']);   // !!!
        $ville = ($_POST['et_pb_contact_ville_1']);        // !!!
        $email = ($_POST['et_pb_contact_email_1']);
        $salutation = 'M.';
        $start_date = strtotime('now');
        $activation_date = strtotime('now');
        $expires = strtotime('+3 days');

        $data_to_save = array(
            'key' => 'external_id',
            'data' => array(
                'external_id' => $external_id,
                'password' => null,         //  !!!
                'email' => $email,
                'username' => $nom . $prenom,
                'last_name' => $nom,
                'first_name' => $nom,
                'salutation' => $salutation,
                'start_date' => $start_date,
                'activation_date' => $activation_date,
                'expires' => $expires,
            ),
        );


        $api_url = 'https://api.hellocse.fr/account/v1/users';
        $response = wp_safe_remote_post($api_url, array(
            'body' => json_encode($data_to_save),
            'headers' => array('Content-Type' => 'application/json'),
        ));

        if (is_wp_error($response)) {
            error_log('Erreur lors de l\'envoi de la requête API : ' . $response->get_error_message());
            wp_die('Erreur lors de l\'envoi de la requête API : ' . $response->get_error_message());
        } else {
            error_log('Requête API réussie !');
            wp_die('Requête API réussie !');
        }
    }
}

add_action('init', 'form_submission');

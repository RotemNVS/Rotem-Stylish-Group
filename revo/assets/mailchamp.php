<?php


/**
 * This function via Ajax sends a post request to the server MailChimp
 */
function revo_mailchimp_send()
{
    //get api kode

    if(!is_email($_POST['q'])){
        echo '<i class="fa fa-exclamation-triangle"></i>'. esc_attr(__(' PLEASE ENTER A EMAIL  ', 'revo'));
        die();
    }
    preg_match("/(.*?)-(us..)/", sanitize_text_field(get_theme_mod('revo_mailchimpapi_key')), $math);

 
    @$api_key = (isset($math[1])) ? $math[1] : "";
    if (@strlen($math[1]) < 10) {
        echo '<i class="fa fa-exclamation-triangle"></i>'. esc_attr(__('You have incorrect API key  ', 'revo'));
        exit;
        die();

    }

    if ( isset($math[2]) && strlen($math[2]) < 1) {
        echo '<i class="fa fa-exclamation-triangle"></i>' . esc_attr(__('You have incorrect dc ', 'revo'));
        exit;
        die();

    }

    $list_id = sanitize_text_field(get_theme_mod('revo_mailchimp_id_list'));
    if (strlen($list_id) < 5) {
        echo  '<i class="fa fa-exclamation-triangle"></i>' . esc_attr(__('You have incorrect id list ', 'revo'));
        exit;
        die();

    }


    $dc = $math[2]; // date center MailChimp
    $email = sanitize_email($_POST['q']);
    $url = "https://$dc.api.mailchimp.com/2.0/lists/subscribe.json";

    $request = wp_remote_post( 	 esc_url_raw($url), array('body' => json_encode(array(
        'apikey' => sanitize_text_field($api_key),
        'id' =>sanitize_text_field($list_id),
        'email' => array('email' => $email),
    )),));

    $result = json_decode(wp_remote_retrieve_body($request));


    /*if have error then echo this*/
    if (isset($result->error)) {
        echo esc_attr($result->error);
    } elseif (isset($result->email)) {
        echo '<i class="fa fa-exclamation-triangle"></i>'. esc_html__('Email Submitted! You subscribe as  ', 'revo') . esc_attr($result->email);
    }

    wp_die();
    exit;
}

add_action('wp_ajax_revo_mailchimp_send', 'revo_mailchimp_send'); // for logged in user
add_action('wp_ajax_nopriv_revo_mailchimp_send', 'revo_mailchimp_send'); // if user not logged in


?>
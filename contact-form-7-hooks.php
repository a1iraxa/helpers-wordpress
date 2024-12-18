<?php
add_action('wpcf7_mail_sent', 'raza_save_leads_into_db');
add_action('wpcf7_mail_failed', 'raza_save_leads_into_db');

function raza_save_leads_into_db($contact_form)
{
    $lead = new Raza_Leads();

    $submission = WPCF7_Submission::get_instance();
    
    if (!$submission) {
        return;
    }

    $posted_data = $submission->get_posted_data();

    $lead_data = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'phone' => '',
        'location' => '',
        'service' => '',
        'message' => '',
    ];

    $lead_data['first_name'] = (isset($posted_data['first_name']) && !empty($posted_data['first_name'])) ? $posted_data['first_name'] : '-';
    $lead_data['last_name'] = (isset($posted_data['last_name']) && !empty($posted_data['last_name'])) ? $posted_data['last_name'] : '-';
    $lead_data['email'] = (isset($posted_data['email_address']) && !empty($posted_data['email_address'])) ? $posted_data['email_address'] : '-';
    $lead_data['phone'] = (isset($posted_data['phone_number']) && !empty($posted_data['phone_number'])) ? $posted_data['phone_number'] : '-';

    $lead_data['location'] = '-';
    if( isset( $posted_data['locations'][0] ) && !empty( $posted_data['locations'][0] )){ 

        if( $posted_data['locations'][0] == 'civic@gatewaydentalinc.com' ){
            $lead_data['location'] = 'Civic Center';
        }
        if( $posted_data['locations'][0] == 'pine@gatewaydentalinc.com' ){
            $lead_data['location'] = 'Pembroke Pines';
        }
        if( $posted_data['locations'][0] == 'miami@gatewaydentalinc.com' ){
            $lead_data['location'] = 'Coral Way';
        }        

        // for dev only
        if( $posted_data['locations'][0] == 'aliraza.contactme@gmail.com' ){
            $lead_data['location'] = 'Civic Center';
        }
        if( $posted_data['locations'][0] == 'raza.callme@gmail.com' ){
            $lead_data['location'] = 'Pembroke Pines';
        }
        if( $posted_data['locations'][0] == 'aliraza.progressive@gmail.com' ){
            $lead_data['location'] = 'Coral Way';
        }

    }

    $lead_data['service'] = (isset($posted_data['services'][0]) && !empty($posted_data['services'][0])) ? $posted_data['services'][0] : '-';
    $lead_data['message'] = (isset($posted_data['message']) && !empty($posted_data['message'])) ? $posted_data['message'] : '-';

    $lead->insert($lead_data);

    return;
}


function raza_redirect_after_submit() { 
    ?>
    <script type="text/javascript">
        document.addEventListener( 'wpcf7mailsent', function( event ) {
          location = `${window.location.origin}/thank-you-book-appointment/`;
        }, false );

    </script>
    <?php
}

add_action( 'wp_footer', 'raza_redirect_after_submit' );

function raza_before_send_mail_function( $contact_form, $abort, $submission ) {

    $form_id = $contact_form->id();

    if( $form_id === 6168 ){

        $first_name = $submission->get_posted_data('fname');
        $last_name = $submission->get_posted_data('lname');
        $email = $submission->get_posted_data('email');
        $program = $submission->get_posted_data('what-program');
        $campus = $submission->get_posted_data('what-campus');

        $dynamic_email = 'development.testing.official@gmail.com'; // get your email address...
        // $dynamic_email = 'aliraza.progressive@gmail.com'; // get your email address...

        $properties = $contact_form->get_properties();
        $properties['mail']['recipient'] = $dynamic_email;
        $contact_form->set_properties($properties);

        // if( $program === 'Computer Network Support Specialist (D)' ){
            
        //  $properties = $contact_form->get_properties();
           //  $properties['mail']['recipient'] = 'development.testing.official@gmail.com';;
           //  $contact_form->set_properties($properties);

        // }

        // echo "<pre>";
        // var_dump($form_id);
        // var_dump($first_name);
        // var_dump($last_name);
        // var_dump($email);
        // var_dump($program);
        // var_dump($campus);
        // echo "</pre>";

        // set abort to true which will not sent email
        // $abort = true;
    }

    

    return $contact_form;
    
}
add_filter( 'wpcf7_before_send_mail', 'raza_before_send_mail_function', 10, 3 );
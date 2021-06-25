<?php

/* * *********************** Theme Customizer with Sanitize function ******************************** */

function wallstreet_sanitize_fn($wp_customize) {

    //checkbox box sanitization function
    function wallstreet_sanitize_checkbox($checked) {
        // Boolean check.
        return ( ( isset($checked) && true == $checked ) ? 1 : 0 );
    }

}

add_action('customize_register', 'wallstreet_sanitize_fn');

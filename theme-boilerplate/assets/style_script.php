<?php
/**
 * The file for enqueue style sheets and scripts.
 *
 * @package Repairbuddy
 * @since Repairbuddy 1.0
 */
if ( ! function_exists( 'repairbuddy_fonts_url' ) ) :
    /**
     * Register Google fonts for Repairbuddy Theme.
     *
     * @since Repairbuddy 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function repairbuddy_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin';
        $protocol = is_ssl() ? 'https' : 'http';

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Serif, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'repairbuddy' ) ) {
            $fonts[] = 'Lato:100,300,400,700,900|Open+Sans:300,400,600,700,800|Poppins:300,400,500,600,700';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x( 'no-subset', 'Add new subset (Serif)', 'repairbuddy' );

        if ( 'cyrillic' == $subset ) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ( 'greek' == $subset ) {
            $subsets .= ',greek,greek-ext';
        } elseif ( 'devanagari' == $subset ) {
            $subsets .= ',devanagari';
        } elseif ( 'vietnamese' == $subset ) {
            $subsets .= ',vietnamese';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), "$protocol://fonts.googleapis.com/css" );
        }
        return $fonts_url;
    }
endif;
/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Repairbuddy 1.1
 */
function repairbuddy_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'repairbuddy_javascript_detection', 0 );


/**
 * Enqueue scripts and styles.
 *
 * @since Repairbuddy 1.0
 */
/**
 * Load javascript
 */
if( !function_exists( 'repairbuddy_load_scripts' ) ) {

    function repairbuddy_load_scripts()
    {
        if(!is_admin())
        {
            // All css
            wp_enqueue_style( 'repairbuddy-google-fonts', repairbuddy_fonts_url(), array(), null );
            if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
            }

            $style_sheets_name = array(
                'bootstrap',
                'font-awesome.min',
                'responsive',
            );
            foreach($style_sheets_name as $style){
                wp_enqueue_style( 'repairbuddy-'.$style, REPAIRBUDDY_CSS_URL.'/'.$style.'.css', array(), true);
            }
            wp_enqueue_style( 'repairbuddy-default-style', get_stylesheet_uri() );
            
            // All scripts
            wp_enqueue_script('jquery');
            wp_enqueue_script( 'repairbuddy-fontawesome-bkp', 'https://use.fontawesome.com/e18447245b.js', array( ), 
              REPAIRBUDDY_THEME_VERSION, true );

            $scripts_name = array(
            'bootstrap',
            'custom',
            
            );
            foreach($scripts_name as $script){
                wp_enqueue_script( 'repairbuddy-'.$script, REPAIRBUDDY_JS_URL . '/'.$script.'.js', 'jquery', REPAIRBUDDY_THEME_VERSION, true );
            }
            wp_localize_script( 'custom', 'theme_data', array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'theme_url' => get_template_directory_uri(),
                'home_url' => esc_url(home_url('/')),
                'home_blog' => get_option( 'page_for_posts' ),
            ) ); 
        }
    }
    add_action('wp_enqueue_scripts','repairbuddy_load_scripts');

}
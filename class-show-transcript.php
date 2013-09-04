<?php
/**
* Show Transcript Plugin
*
* A simple plugin based off the plugin boilerplate to add a transcript shortcode to a post/page.
*
* @package show-transcript
* @author Base93 <tomos@base93.com>
* @license GPL-2.0+
* @link http://base93.com
* @copyright 2013 Base93
*/

/**
* Plugin class.
*
* @package Plugin_Name
* @author Your Name <email@example.com>
*/
class Show_Transcript {

    /**
    * Plugin version, used for cache-busting of style and script file references.
     *
     * @since 1.0.0
     * @const string
     */
    const VERSION = '0.1';

    /**
     * Instance of this class.
     *
     * @since 1.0.0
     * @var object
     */
    protected static $instance = null;

    /**
     * Initialize the plugin by setting localization, filters, and administration functions.
     *
     * @since 1.0.0
     */
    private function __construct() {
        add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    }

    /**
     * Return an instance of this class.
     *
     * @since 1.0.0
     * @return object A single instance of this class.
     */
    public static function get_instance() {
        // If the single instance hasn't been set, set it now.
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Load the plugin text domain for translation.
     *
     * @since 1.0.0
     */
    public function load_plugin_textdomain() {
        $domain = 'show-transcript';
        $locale = apply_filters( 'plugin_locale', get_locale(), $domain );
        load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
        load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/lang/' );
        add_shortcode( 'transcript', array( $this, 'sht_transcript_shortcode'), 15);
    }

    /**
     * Register and enqueue public-facing style sheet.
     *
     * @since 1.0.0
     */
    public function enqueue_styles() {
        wp_enqueue_style( 'show-transcript-plugin-styles', plugins_url( 'css/show-transcript.css', __FILE__ ), array(), '0.1' );
    }

    /**
     * Register and enqueues public-facing JavaScript files.
     *
     * @since 1.0.0
     */
    public function enqueue_scripts() {
        wp_enqueue_script( 'show-transcript-plugin-script', plugins_url( 'js/show-transcript.js', __FILE__ ), array( 'jquery' ), '0.1' );
    }

    /**
     * Register the shortcode.
     *
     * @since 1.0.0
     */
    public function sht_transcript_shortcode( $atts, $content = null ) {
        $sht_transcript  = '<h3 class="transcript-toggle transcript-button">Show / Hide Transcript</h3>';
        $sht_transcript .= '<div id="sht-show-transcript">' . wpautop( $content ) . '</div>';
        return $sht_transcript;
    }

}
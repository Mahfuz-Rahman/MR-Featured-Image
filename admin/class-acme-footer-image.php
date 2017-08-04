<?php
/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link            http://www.codermahfuz.xyz/media-uploader
 * @since           0.1.0
 *
 * @package         Acme_Footer_Image
 * @subpackage      Acme_Footer_Image/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, the meta box functionality.
 * and enqueue the JavaScript for the loading the Media Uploader.
 *
 * @package     Acme_Footer_Image
 * @subpackage  Acme_Footer_Image/admin
 * @author      Mahfuz Rahman <asrmahfuz8@gmail.com>
 */
class Acme_Footer_Image {

    /**
     * The ID of this plugin.
     *
     * @since   0.1.0
     * @access  private
     * @var     string      $name       The ID of this plugin.
     */
    private $name;


    /**
     * The current version of the plugin.
     *
     * @since   0.1.0
     * @access  private
     * @var     string      $version  The version of the plugin.
     */
    private $version;


    /**
     * Initialize the plugin by defining the properties.
     *
     * @since   0.1.0
     */
    public function __construct() {
        $this->name = 'acme-footer-image';
        $this->version = '0.1.0';
    }

    /**
     * Defines the hooks that will register and enqueue the JavaScript
     * and the meta box that will render the option.
     *
     * @since   0.1.0
     */
    public function run() {

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts') );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles') );
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post', array( $this, 'save_post' ) );

    }


    /**
     * Renders the meta box on the post and pages.
     *
     * @since   0.1.0
     */
    public function add_meta_box() {

        $screens = array( 'post', 'page' );

        foreach( $screens as $screen ) {

            add_meta_box(
                $this->name,
                'Footer Featured Image',
                array( $this, 'display_featured_footer_image' ),
                $screen,
                'side'
            );

        }

    }

    /**
     * Registers the JavaScript for handling the media uploader.
     *
     * @since   0.1.0
     */
    public function enqueue_admin_scripts() {

        wp_enqueue_media();

        wp_enqueue_script(
            $this->name,
            plugin_dir_url( __FILE__ ) . 'js/admin.js',
            array( 'jquery' ),
            $this->version,
            'all'
        );

    }

    /**
     * Registers the stylesheet for handling the meta box
     *
     * @since   0.2.0
     */
    public function enqueue_styles() {
        wp_enqueue_style(
            $this->name,
            plugin_dir_url( __FILE__ ) . 'css/admin.css',
            array()
        );
    }

    /**
     * Sanitize and saves the post the featured footer image meta data specific with this post.
     *
     * @param   int     $post_id    The ID of the post with which we're currently working.
     * @since   0.1.0
     */
    public function save_post( $post_id ) {

        if( isset( $_REQUEST['footer-thumbnail-src'] ) ) {
            update_post_meta( $post_id, 'footer-thumbnail-src', sanitize_text_field( $_REQUEST['footer-thumbnail-src'] ), true );
        }

        if( isset( $_REQUEST['footer-thumbnail-title'] ) ) {
            update_post_meta( $post_id, 'footer-thumbnail-title', sanitize_text_field( $_REQUEST['footer-thumbnail-title'] ) );
        }

        if( isset( $_REQUEST['footer-thumbnail-alt'] ) ) {
            update_post_meta( $post_id, 'footer-thumbnail-alt', sanitize_text_field( $_REQUEST['footer-thumbnail-alt'] ) );
        }

    }


    /**
     * Renders the view that displays the contents for the meta box that for triggering
     * the meta box.
     *
     * @param       WP_Post     $post   The post object
     * @since       0.1.0
     */
    public function display_featured_footer_image( $post ) {
        include_once( dirname( __FILE__ ) . '/views/admin.php' );
    }

}

<?php
/**
ReduxFramework config file
For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
 * */

if (!class_exists("sc_theme_options")) {



  class sc_theme_options {

    public $args = array();
    public $sections = array();
    public $theme;
    public $ReduxFramework;

    public function __construct() {

      if ( !class_exists("ReduxFramework" ) ) {
        return;
      }

      // This is needed. Bah WordPress bugs.  ;)
      if ( defined('TEMPLATEPATH') && strpos( Redux_Helpers::cleanFilePath( __FILE__ ), Redux_Helpers::cleanFilePath( TEMPLATEPATH ) ) !== false) {
        $this->initSettings();
      } else {
        add_action('plugins_loaded', array($this, 'initSettings'), 10);
      }
    }

    public function initSettings() {
      // Just for demo purposes. Not needed per say.
      $this->theme = wp_get_theme();

      // Set the default arguments
      $this->setArguments();

      // Set a few help tabs so you can see how it's done
      //$this->setHelpTabs();

      // Create the sections and fields
      $this->setSections();

      if (!isset($this->args['opt_name'])) { // No errors please
        return;
      }

      // If Redux is running as a plugin, this will remove the demo notice and links
      //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

      // Function to test the compiler hook and demo CSS output.
      //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2);
      // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
      // Change the arguments after they've been declared, but before the panel is created
      //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
      // Change the default value of a field after it's been set, but before it's been useds
      //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
      // Dynamically add a section. Can be also used to modify sections/fields
      //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

      $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
    }



    public function setSections()
    {
      $this->sections[] = array(
        'title' => __('Settings', ''),
        'desc' => __('Set the theme options here...', ''),
        'icon' => 'el-icon-home',
        'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!

        'fields' => array(
          array(
            'id' => 'website-logo',
            'type' => 'media',
            'title' => __('Website logo', ''),
            'desc' => __('Set the website logo', ''),
            'subtitle' => __('this should be in a good format/dimentions etc.. :)', ''),
          ),
          array(
            'id' => 'front-gallery',
            'type' => 'gallery',
            'title' => __('Front-page gallery slider', ''),
            'subtitle' => __('Ajouter une galerie à la page d\'accueil', ''),
            //'desc' => __('This is the description field, again good for additional info.', ''),
          ),



        )
      );

    }

    public function setArguments() {

      $theme = wp_get_theme(); // For use with some settings. Not necessary.

      //args
      $this->args = array(
        'opt_name' => 'theme_options',
        'display_name' => $theme->get('Name'),
        'display_version' => $theme->get('Version'),
        'menu_type' => 'menu',
        'menu_title' => __('Theme Options', ''),
        'page_title' => __('Theme Options', ''),
        'show_import_export' => false, // REMOVE
        'footer_credit' => 'options panel by reduxFramework'
      );
    }

  }



  new sc_theme_options();
}
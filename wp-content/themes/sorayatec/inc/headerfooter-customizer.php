<?php


//Class for adding customizer fields for header & footer
class HeaderFooter_Customizer {
  
     public function __construct() {
         add_action( 'customize_register' , array($this, 'register_customize_sections'));

     }
     public function register_customize_sections($wp_customize){
          //initialize section
          $this->footer_section($wp_customize);    
     }
     
     //Footer Section ,Settings and Controls
     private function footer_section($wp_customize){
          
        //New Panel
        $wp_customize->add_section('basic-footer-section' , array(
                 'title' =>'Footer' , 
                 'priority' => 2 ,
                 'description'=>__('Customize site Footer...!' , 'soraytec')    
        ) );

         //Add Setting
         $wp_customize->add_setting('basic-footer-display' , array(
            'default' =>'No' , 
            'sanitize_callback' => array( $this, 'sanitize_custom_option')
              
       ) );

       //Add Control
       $wp_customize->add_control(new WP_Customize_Control($wp_customize,'basic-footer-display-control' , array(
        'label'    => 'Display this section',
        'section'  => 'basic-footer-section',
        'settings' => 'basic-footer-display',
        'type'     =>  'select',
         'choices' => array('No'=>'No', 'Yes'=>'Yes' )  

       ) ));

       //Display  logo function
         
       $wp_customize->add_setting('basic-footer-image', array(
          'default' => '',
          'type' => 'theme_mod',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => array( $this, 'sanitize_custom_url' )
      ));
  
      $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'basic-footer-image-control', array(
          'label' => 'Image',
          'section' => 'basic-footer-section',
          'settings' => 'basic-footer-image',
          'width' => 200,
          'height' => 100

     )));   

     //group function

     /*
     $wp_customize->add_setting('basic-footer-contact', array(
          'default' => '',
          'type' => 'group',
          'sanitize_callback' => array( $this, 'sanitize_custom_text' )
      ));
                                                  
      $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-footer-display-control', array(
          'label' => 'Contact',
          'section' => 'basic-footer-section',
          'settings' => 'basic-footer-contact'
                             
     )));
                                                                                        
     */

     }
     public function sanitize_custom_option($input){
          return ($input==="No") ? "No" : "Yes";
     }
     public function sanitize_custom_url($input) {
          return filter_var($input, FILTER_SANITIZE_URL);
      }
      public function sanitize_custom_text($input) {
          return filter_var($input, FILTER_SANITIZE_STRING);
      }

      
}
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
        $wp_customize->add_panel('footer-section' , array(
                 'title' =>'Footer' , 
                 'priority' => 2 ,
                 'description' => __('Footer Setting', 'soraytec')    
        ) );

         //Add Setting
         $wp_customize->add_setting('footer-display' , array(
            'default' =>'No' , 
            'sanitize_callback' => array( $this, 'sanitize_custom_option')
              
       ) );

       //Add Control
       $wp_customize->add_control(new WP_Customize_Control($wp_customize,'footer-display-control' , array(
        'label'    => 'Display this section',
        'panel'  => 'footer-section',
        'settings' => 'footer-display'  

       ) ));

       //Display  logo function
       //logo panel
     //   $wp_customize->add_panel( 'basic-footer-section', array(
     //      'title' => __( 'Footer' ),
     //      'section' => 'basic-footer-section',
     //      'description' => __('Footer Setting', 'soraytec'), 
     //      'priority' => 2
     //      ) );
       
     $wp_customize->add_section('footer-image-section' , array(
          'title' =>'Footer Logo' , 
          'panel' =>'footer-section',
          'priority' => 30,
          'description'=>__('Add Footer Logo' , 'soraytec')    
      ) );

         
       $wp_customize->add_setting('footer-image', array(
          'default' => '',
          'type' => 'theme_mod',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => array( $this, 'footer_sanitize_url' )
      ));
  
      $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer-image-control', array(
          'label' => 'Image',
          'section' => 'footer-image-section',
          'settings' => 'footer-image',
          'width' => 200,
          'height' => 100

     ))); 
      

     //Contact
     $wp_customize->add_section('footer_contact_section' , array(
          'title' =>'Contact' , 
          'panel' =>'footer-section',
          'priority' => 40,
          'description'=>__('Add Contact Details' , 'soraytec')    
      ) );

         
     //Contact-title 
     $wp_customize->add_setting( 'footer_contact_title', array(
          'capability' => 'edit_theme_options',
          'default' => 'Contact',
          'sanitize_callback' => array( $this, 'sanitize_custom_text')
     ) );
     
     $wp_customize->add_control( 'footer_contact_setting_title', array(
          'type' => 'text',
          'section' => 'footer_contact_section', 
          'settings' => 'footer_contact_title',
          'label' => __( 'Contact Title' )
     ) );

     //Contact email
     $wp_customize->add_setting( 'footer_contact_email', array(
          'capability' => 'edit_theme_options',
          'default' => '',
          'sanitize_callback' => array( $this, 'sanitize_custom_email')
        ) );
        
        $wp_customize->add_control( 'footer_contact_email_setting', array(
          'type' => 'email',
          'section' => 'footer_contact_section', 
          'settings' => 'footer_contact_email',
          'label' => __( 'Contact E-mail' ),
          'input_attrs' => array(
            'placeholder' => __( 'info@soraytec.com' )
          ),
        ) );
        
     
     //Follow
     $wp_customize->add_section('footer-follow-section' , array(
          'title' =>'Follow Us' , 
          'panel' =>'footer-section',
          'priority' => 50,
          'description'=>__('Add Follow Details' , 'soraytec')    
      ) );

     //Follow-title
     $wp_customize->add_setting( 'footer-follow-title', array(
          'capability' => 'edit_theme_options',
          'default' => 'Follow Us',
          'sanitize_callback' => array( $this, 'sanitize_custom_text')
     ) );
     
     $wp_customize->add_control( 'footer_follow_setting_title', array(
          'type' => 'text',
          'section' => 'footer-follow-section', 
          'settings' => 'footer-follow-title',
          'label' => __( 'Custom Text' ),
          'description' => __( 'This is a custom text box.' )
     ) );

         //follow-1
         $wp_customize->add_setting( 'footer_url_setting_1', array(
          'capability' => 'edit_theme_options',
          'sanitize_callback' => array( $this, 'footer_sanitize_url')
        ) );
        
        $wp_customize->add_control( 'footer_url_setting_id_1', array(
          'type' => 'url',
          'section' => 'footer-follow-section', 
          'settings' => 'footer_url_setting_1', 
          'label' => __( 'LinkedIn URL' ),
          'input_attrs' => array(
            'placeholder' => __( 'https://in.linkedin.com/company/soraytec' )
          ),
        ) );

     //follow-2
        $wp_customize->add_setting( 'footer_url_setting_2', array(
          'capability' => 'edit_theme_options',
          'sanitize_callback' => array( $this, 'footer_sanitize_url')
        ) );
        
        $wp_customize->add_control( 'footer_url_setting_id_2', array(
          'type' => 'url',
          'section' => 'footer-follow-section', 
          'settings' => 'footer_url_setting_2', 
          'label' => __( 'Twitter URL' ),
          'input_attrs' => array(
            'placeholder' => __( 'https://twitter.com/hashtag/soraytec' )
          )
        ) );
        

     //follow-3
       $wp_customize->add_setting( 'footer_url_setting_3', array(
          'capability' => 'edit_theme_options',
          'sanitize_callback' => array( $this, 'footer_sanitize_url')
        ) );
        
        $wp_customize->add_control( 'footer_url_setting_id_3', array(
          'type' => 'url',
          'section' => 'footer-follow-section', 
          'settings' => 'footer_url_setting_3', 
          'label' => __( 'Facebook URL' ),
          'input_attrs' => array(
            'placeholder' => __( 'http://www.facebook.com/' )
          ),
        ) );
        

        //Privacy Policy
          $wp_customize->add_section('footer_privacy_policy' , array(
               'title' =>'Privacy Policy' , 
               'panel' =>'footer-section',
               'priority' => 60,
               'description'=>__('Add Privacy Policy Details' , 'soraytec')    
          ) );

          
          //Contact-title 
          $wp_customize->add_setting( 'footer_privacy_policy_title', array(
               'capability' => 'edit_theme_options',
               'default' => 'Privacy Policy',
               'sanitize_callback' => array( $this, 'sanitize_custom_text')
          ) );
          
          $wp_customize->add_control( 'footer_privacy_policy_title1', array(
               'type' => 'text',
               'section' => 'footer_privacy_policy', 
               'settings' => 'footer_privacy_policy_title',
               'label' => __( 'Privacy Policy Placeholder' )
          ) );

          //Copyright
          $wp_customize->add_section('footer_copyright' , array(
               'title' =>'Copyright' , 
               'panel' =>'footer-section',
               'priority' => 60,
               'description'=>__('Add Copyright Details' , 'soraytec')    
          ) );

          
          //Contact-title 
          $wp_customize->add_setting( 'footer_copyright_title', array(
               'capability' => 'edit_theme_options',
               'default' => 'Copyright',
               'sanitize_callback' => array( $this, 'sanitize_custom_text')
          ) );
          
          $wp_customize->add_control( 'footer_copyright_title1', array(
               'type' => 'text',
               'section' => 'footer_copyright', 
               'settings' => 'footer_copyright_title',
               'label' => __( 'Copyright Text' )
          ) );
         
    

     }
     public function sanitize_custom_option($input){
          return ($input==="No") ? "No" : "Yes";
     }
     
     public function footer_sanitize_url($input) {
          return filter_var($input, FILTER_SANITIZE_URL);
      }
      public function sanitize_custom_text($input) {
          return filter_var($input, FILTER_SANITIZE_STRING);
      }

      public function sanitize_custom_email( $email, $setting ) {
          return ( is_email($email) ? $email : $setting->default );
     }


      
}
<?php
/**
 * exploore Theme Customizer.
 *
 * @package exploore
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function exploore_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



  //___Custom Option___//
  $wp_customize->add_section(
      'exploore_custom',
      array(
          'title' => esc_html__('General Settings', 'exploore'),
          'priority' => 15,
      )
  );





  $wp_customize->add_setting('font_size', array(
    'default'        => esc_html__('14','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'font_size', array(
    'settings' => 'font_size',
    'label'   =>  esc_html__('Menu Font Size','exploore'),
    'section' => 'exploore_custom',
    'type'    => 'text',
  ));


  $wp_customize->add_setting('text_transform', array(
    'default'        => esc_html__('uppercase','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'text_transform', array(
    'settings' => 'text_transform',
    'label'   =>  esc_html__('Menu Text Transform','exploore'),
    'section' => 'exploore_custom',
    'type'    => 'select',
    'choices' => array(
      'uppercase'    => esc_html__('Uppercase','exploore'),
      'lowercase'    => esc_html__('Lowercase','exploore'),
      'capitalize'    => esc_html__('Capitalize','exploore'),
      
    )
  ));


  $wp_customize->add_setting('list_page_meta_position', array(
    'default'        => esc_html__('bottom','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'list_page_meta_position', array(
    'settings' => 'list_page_meta_position',
    'label'   =>  esc_html__('List Page Meta Position','exploore'),
    'section' => 'exploore_custom',
    'type'    => 'select',
    'choices' => array(
      'top'    => esc_html__('Top','exploore'),
      'bottom'    => esc_html__('Bottom','exploore'),
      
    )
  ));

  //___Custom header image___//
$wp_customize->add_panel( 'header_image', array(
  'title'    => esc_html__('Header Image', 'exploore'),
  'priority' => 60, // Mixed with top-level-section hierarchy.
) );


  $wp_customize->add_setting('title_text_align', array(
    'default'     => esc_html__('left','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'title_text_align', array(
    'settings'=> 'title_text_align',
    'label'   =>  esc_html__('Title Alignment','exploore'),
    'section' => 'header_image',
    'type'    => 'select',
    'choices' => array(
      'left'      => esc_html__('Left','exploore'),
      'center'    => esc_html__('Center','exploore'),
      'right'     => esc_html__('Right','exploore'),
      
    )
  ));


$wp_customize->add_panel( 'google_fonts_panel', array(
  'title'    => esc_html__('Google Fonts', 'exploore'),
  'priority' => 30, // Mixed with top-level-section hierarchy.
) );


  //___Custom header image___//
$wp_customize->add_section( 'google_fonts_body', array(
  'title'    => esc_html__('Body', 'exploore'),
  'priority' => 30, // Mixed with top-level-section hierarchy.
  'panel' => 'google_fonts_panel'
) );

    $font_choices = array(
      'none'  => 'Default',
      'Arimo:400,700,400italic,700italic' => 'Arimo',
      'Arvo:400,700,400italic,700italic' => 'Arvo',
      'Bitter:400,700,400italic' => 'Bitter',   
      'Cabin:400,700,400italic' => 'Cabin',
      'Droid Sans:400,700' => 'Droid Sans',
      'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
      'Fjalla One:400' => 'Fjalla One',
      'Francois One:400' => 'Francois One',
      'Josefin Sans:400,300,600,700' => 'Josefin Sans',
      'Lato:400,700,400italic,700italic' => 'Lato',
      'Lora:400,700,400italic,700italic' => 'Lora',
      'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
      'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
      'Montserrat:400,700' => 'Montserrat',
      'Muli:300,400,600' => 'Muli',
      'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
      'Open Sans:400italic,700italic,400,700' => 'Open Sans',
      'Oswald:400,700' => 'Oswald',
      'Oxygen:400,300,700' => 'Oxygen',
      'PT Serif:400,700' => 'PT Serif',
      'PT Sans:400,700,400italic,700italic' => 'PT Sans',
      'PT Sans Narrow:400,700' => 'PT Sans Narrow',
      'Playfair Display:400,700,400italic' => 'Playfair Display',
      'Quicksand:300,400,500,600,700' => 'Quicksand',
      'Roboto:400,400italic,700,700italic' => 'Roboto',
      'Raleway:400,700' => 'Raleway',
      'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
      'Roboto Slab:400,700' => 'Roboto Slab',
      'Rokkitt:400' => 'Rokkitt',
      'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
      'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
      'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
      
    );



  $wp_customize->add_setting('body_google_font', array(
    'default'     => esc_html__('none','exploore'),
    'sanitize_callback' => 'exploore_sanitize_fonts',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'body_google_font', array(
    'settings'=> 'body_google_font',
    'label'   =>  esc_html__('Select Font','exploore'),
    'section' => 'google_fonts_body',
    'type'    => 'select',
    'choices' =>  $font_choices
  ));

$wp_customize->add_setting('font_size_body', array(
    'default'        => esc_html__('16','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'font_size_body', array(
    'settings' => 'font_size_body',
    'label'   =>  esc_html__('Font Size','exploore'),
    'section' => 'google_fonts_body',
    'type'    => 'number',
  ));


  $wp_customize->add_setting('body_font_weight_value', array(
      'default'     => esc_html__('400','exploore'),
      'sanitize_callback' => 'sanitize_text_field',
      'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'body_font_weight_value', array(
      'settings'=> 'body_font_weight_value',
      'label'   =>  esc_html__('Font Weight','exploore'),
      'section' => 'google_fonts_body',
      'type'    => 'select',
      'priority'  => 23,
      'choices' => array(
        '300'    => esc_html__('300','exploore'),
        '400'    => esc_html__('400','exploore'),
        '500'    => esc_html__('500','exploore'),
        '600'    => esc_html__('600','exploore'),
        
      )
    ));

   $wp_customize->add_setting('body_line_height', array(
        'default'     => esc_html__('26','exploore'),
        'sanitize_callback' => 'absint',
        'transport'   => 'refresh'
      ));
    $wp_customize->add_control('body_line_height', array(
      'type'     => 'number',
      'section'  => 'google_fonts_body',
      'settings' => 'body_line_height',
      'label'    => __( 'Line Height', 'exploore' ),
      'priority'  => 24,
    ) );





      //___Custom header image___//
$wp_customize->add_section( 'google_fonts_heading', array(
  'title'    => esc_html__('Heading', 'exploore'),
  'priority' => 31, // Mixed with top-level-section hierarchy.
  'panel' => 'google_fonts_panel'
) );


    $heading_font_choices = array(
      'none'  => 'Default',
      'Arimo:400,700,400italic,700italic' => 'Arimo',
      'Arvo:400,700,400italic,700italic' => 'Arvo',
      'Bitter:400,700,400italic' => 'Bitter',   
      'Cabin:400,700,400italic' => 'Cabin',
      'Droid Sans:400,700' => 'Droid Sans',
      'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
      'Fjalla One:400' => 'Fjalla One',
      'Francois One:400' => 'Francois One',
      'Josefin Sans:400,300,600,700' => 'Josefin Sans',
      'Lato:400,700,400italic,700italic' => 'Lato',
      'Lora:400,700,400italic,700italic' => 'Lora',
      'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
      'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
      'Montserrat:400,700' => 'Montserrat',
      'Muli:300,400,600' => 'Muli',
      'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
      'Open Sans:400italic,700italic,400,700' => 'Open Sans',
      'Oswald:400,700' => 'Oswald',
      'Oxygen:400,300,700' => 'Oxygen',
      'PT Serif:400,700' => 'PT Serif',
      'PT Sans:400,700,400italic,700italic' => 'PT Sans',
      'PT Sans Narrow:400,700' => 'PT Sans Narrow',
      'Playfair Display:400,700,400italic' => 'Playfair Display',
      'Quicksand:300,400,500,600,700' => 'Quicksand',
      'Roboto:400,400italic,700,700italic' => 'Roboto',
      'Raleway:400,700' => 'Raleway',
      'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
      'Roboto Slab:400,700' => 'Roboto Slab',
      'Rokkitt:400' => 'Rokkitt',
      'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
      'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
      'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
    );

  $wp_customize->add_setting('heading_google_font', array(
    'default'     => esc_html__('none','exploore'),
    'sanitize_callback' => 'exploore_sanitize_fonts',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'heading_google_font', array(
    'settings'=> 'heading_google_font',
    'label'   =>  esc_html__('Select Font','exploore'),
    'description' => esc_html__( 'Effective with all headings', 'exploore'),
    'section' => 'google_fonts_heading',
    'type'    => 'select',
    'choices' =>  $heading_font_choices
  ));

$wp_customize->add_setting('heading_font_size', array(
    'default'        => esc_html__('52','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'heading_font_size', array(
    'settings' => 'heading_font_size',
    'label'   =>  esc_html__('Font Size','exploore'),
    'description' => esc_html__( 'less 10px for every headings except h1', 'exploore'),
    'section' => 'google_fonts_heading',
    'type'    => 'number',
  ));


  $wp_customize->add_setting('heading_font_weight_value', array(
      'default'     => esc_html__('700','exploore'),
      'sanitize_callback' => 'sanitize_text_field',
      'transport'   => 'refresh'
    ));
    $wp_customize->add_control( 'heading_font_weight_value', array(
      'settings'=> 'heading_font_weight_value',
      'label'   =>  esc_html__('Font Weight','exploore'),
      'description' => esc_html__( 'Effective with all headings', 'exploore'),
      'section' => 'google_fonts_heading',
      'type'    => 'select',
      'priority'  => 37,
      'choices' => array(
        '300'    => esc_html__('300','exploore'),
        '400'    => esc_html__('400','exploore'),
        '500'    => esc_html__('500','exploore'),
        '600'    => esc_html__('600','exploore'),
        '700'    => esc_html__('700','exploore'),
        
      )
    ));

   $wp_customize->add_setting('heading_line_height', array(
        'default'     => esc_html__('62','exploore'),
        'sanitize_callback' => 'absint',
        'transport'   => 'refresh'
      ));
    $wp_customize->add_control('heading_line_height', array(
      'type'     => 'number',
      'section'  => 'google_fonts_heading',
      'settings' => 'heading_line_height',
      'label'    => __( 'Line Height', 'exploore' ),
      'description' => esc_html__( 'less 5px for every headings except h1', 'exploore'),
      'priority'  => 38,
    ) );



    //___Color Option___//
    $wp_customize->add_section(
        'colors',
        array(
            'title' => esc_html__('Colors', 'exploore'),
            'priority' => 40,
        )
    );

    //___Body text Color___//
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default' => '#404040',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
               'label'          => esc_html__( 'Body Text Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'colors',
               'settings'       => 'body_text_color',
                'priority' => 9,
            )
        )
    );

    //___theme primary Color___//
    $wp_customize->add_setting(
        'theme_primary_color',
        array(
            'default' => '#51BBE5',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_primary_color',
            array(
               'label'          => esc_html__( 'Primary Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'colors',
               'settings'       => 'theme_primary_color',
            )
        )
    );


    //___Header Background Color___//
    $wp_customize->add_setting(
        'header_bg_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color',
            array(
               'label'          => esc_html__( 'Header Bg Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'colors',
               'settings'       => 'header_bg_color',
               'priority' => 11,
            )
        )
    );
    //___End header background option___//

    //___Menu Link  Color___//
    $wp_customize->add_setting(
        'nav_link_color',
        array(
            'default' => '#444',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'nav_link_color',
            array(
               'label'          => esc_html__( 'Menu Link Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'colors',
               'settings'       => 'nav_link_color',
               'priority' => 12,
            )
        )
    );
    //___End menu link color option___//

    //___Menu Link  hover Color___//
    $wp_customize->add_setting(
        'nav_link_hover_color',
        array(
            'default' => '#419dd8',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'nav_link_hover_color',
            array(
               'label'          => esc_html__( 'Menu Hover & Active Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'colors',
               'settings'       => 'nav_link_hover_color',
               'priority' => 13,
            )
        )
    );


    //___Body text Color___//
    $wp_customize->add_setting(
        'heading_color',
        array(
            'default' => '#424242',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'heading_color',
            array(
               'label'          => esc_html__( 'Heading Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'colors',
               'settings'       => 'heading_color',
                'priority' => 19,
            )
        )
    );

    //___End menu link color option___//






//___Sidebar Selection___//
  $wp_customize->add_section('tx_sidebar_position', array(
    'title'    => esc_html__('SideBar', 'exploore'),
    'priority' => 116,
  )); 

  $wp_customize->add_setting('tx_sidebar', array(
    'default'        => esc_html__('right','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'tx_sidebar', array(
    'settings' => 'tx_sidebar',
    'label'   =>  esc_html__('Select Sidebar','exploore'),
    'section' => 'tx_sidebar_position',
    'type'    => 'select',
    'choices' => array(
      'left'    => esc_html__('Left','exploore'),
      'right'    => esc_html__('Right','exploore'),
      
    )
  ));




  //___Slider Enable Disable__//
  $wp_customize->add_section('tx_slider_enable', array(
    'title'    => esc_html__('Slider', 'exploore'),
    'priority' => 16,
  ));

  $wp_customize->add_setting('slider_enable', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));

  $wp_customize->add_control( 'slider_enable', array(
    'settings' => 'slider_enable',
    'label'   =>  esc_html__('Slider Enable/Disable','exploore'),
    'section' => 'tx_slider_enable',
    'type'    => 'checkbox',
    'std'         => '1'
  ));



//___post Selection___//

  $wp_customize->add_setting('slider_post_selector', array(
    'default'        => esc_html__('sticky','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'slider_post_selector', array(
    'settings' => 'slider_post_selector',
    'label'   =>  esc_html__('Select Post','exploore'),
    'section' => 'tx_slider_enable',
    'type'    => 'select',
    'choices' => array(
      'regular'     => esc_html__('Regular','exploore'),
      'recent'      => esc_html__('Recent','exploore'),
      'featured'    => esc_html__('Featured','exploore'),
      'sticky'      => esc_html__('Sticky','exploore'),
      
    )
  ));


//___Sticky Post___//

  $wp_customize->add_setting('exploore_sticky', array(
    'default'        => esc_html__('3','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'exploore_sticky', array(
    'settings' => 'exploore_sticky',
    'label'   =>  esc_html__('Post Show','exploore'),
    //'description'    => esc_html__('Post must be sticky', 'exploore'),
    'section' => 'tx_slider_enable',
    'type'    => 'text',
  ));


  $wp_customize->add_setting('slider_title_word', array(
    'default'        => esc_html__('3','exploore'),
    'sanitize_callback' => 'absint',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'slider_title_word', array(
    'settings' => 'slider_title_word',
    'label'   =>  esc_html__('Title Word','exploore'),
    'section' => 'tx_slider_enable',
    'type'    => 'number',
  ));


    $wp_customize->add_setting(
        'slider_text_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'slider_text_color',
            array(
               'label'          => esc_html__( 'Text Color', 'exploore' ),
               'type'           => 'color',
               'section' => 'tx_slider_enable',
               'settings'       => 'slider_text_color',
                'priority' => 19,
            )
        )
    );



  //___Copyright ___//
  $wp_customize->add_section('exploore_copyright_text', array(
    'title'    => esc_html__('Footer', 'exploore'),
    'priority' => 558,
  ));

  $wp_customize->add_setting('exploore_copyright', array(
    'default'        => esc_html__('Copyright @ 2016-2018. All right reserved.','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
   
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'exploore_copyright', array(
    'settings' => 'exploore_copyright',
    'label'   =>  esc_html__('Write Your Copyright Text','exploore'),
    'section' => 'exploore_copyright_text',
    'type'    => 'textarea',
  ));



    //___Footer Background Color___//
    $wp_customize->add_setting(
        'footer_bg_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg_color',
            array(
               'label'          => esc_html__( 'Footer Background Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'exploore_copyright_text',
               'settings'       => 'footer_bg_color',
               'priority' => 14,
            )
        )
    );

    //___Copyright Background Color___//
    $wp_customize->add_setting(
        'copyright_bg_color',
        array(
            'default' => '#676767',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'copyright_bg_color',
            array(
               'label'          => esc_html__( 'Copyright Background Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'exploore_copyright_text',
               'settings'       => 'copyright_bg_color',
               'priority' => 15,
            )
        )
    );

    //___Copyright Text Color___//
    $wp_customize->add_setting(
        'copyright_text_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'copyright_text_color',
            array(
               'label'          => esc_html__( 'Copyright Text Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'exploore_copyright_text',
               'settings'       => 'copyright_text_color',
               'priority' => 16,
            )
        )
    );
             
}
add_action( 'customize_register', 'exploore_customize_register' );


// Custom Css



function exploore_customize_css(){
    $body_font = esc_html(get_theme_mod('body_google_font'));
    $body_font_size = esc_html(get_theme_mod('font_size_body'));
    $body_font_weight_vaule = esc_html(get_theme_mod('body_font_weight_value'));
    $body_font_line_height = esc_html(get_theme_mod('body_line_height'));
    $font_pieces = explode(":", $body_font);

    $heading_font = esc_html(get_theme_mod('heading_google_font'));
    $heading_font_size = esc_html(get_theme_mod('heading_font_size'));
    $heading_font_weight_vaule = esc_html(get_theme_mod('heading_font_weight_value'));
    $heading_font_line_height = esc_html(get_theme_mod('heading_line_height'));
    $heading_font_pieces = explode(":", $heading_font);

    ?>
        <style type="text/css">



            body{
                  color:<?php echo esc_attr(get_theme_mod( 'body_text_color', '#404040' )); ?>;
                  background-color:#f5f5f5;
                  font-size:<?php echo $body_font_size;?>px;
                  font-weight:<?php echo $body_font_weight_vaule;?>;
                  line-height:<?php echo $body_font_line_height;?>px;
                  <?php if ($body_font ):?>
                     font-family: <?php echo $font_pieces[0];?>;
                  <?php else: ?>
                      font-family: 'Muli', sans-serif;
                  <?php endif;?>
              }
              a, ul li, li{
                color:<?php echo esc_attr(get_theme_mod( 'body_text_color', '#404040' )); ?>;
              }


              h1, h2, h3, h4, h5, h6, 
              .h1, .h2, .h3, .h4, .h5, .h6, 
              h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, 
              .h1 a, .h2 a, .h3 a, .h4 a, .h5 a, .h6 a, .post-heading a{
                  color:<?php echo esc_attr(get_theme_mod( 'heading_color', '#424242' )); ?>;
                  <?php if ($heading_font ):?>
                    font-family: <?php echo $heading_font_pieces[0];?>;
                    font-weight:<?php echo $heading_font_weight_vaule;?>;
                    
                  <?php else:?>
                    font-family: 'Lato', sans-serif;font-weight: 700;line-height: 40px;
                  <?php endif;?>
              }

            .h1, h1{
                
                font-size:<?php echo $heading_font_size;?>px;
                line-height:<?php echo $heading_font_line_height;?>px;

            }
            .h2, h2{
                font-size:<?php echo ($heading_font_size) -15;?>px;
                line-height:<?php echo ($heading_font_line_height)-15;?>px;

            }
            .h3, h3{
                font-size:<?php echo ($heading_font_size) -20;?>px;
                line-height:<?php echo ($heading_font_line_height)-20;?>px;

            }
            .h4, h4{
                font-size:<?php echo ($heading_font_size) -30;?>px;
                line-height:<?php echo ($heading_font_line_height)-25;?>px;

            }

            .h5, h5{
                font-size:<?php echo ($heading_font_size) -40;?>px;
                line-height:<?php echo ($heading_font_line_height)-35;?>px;

            }
            .h6, h6{
                font-size:<?php echo ($heading_font_size) -45;?>px;
                line-height:<?php echo ($heading_font_line_height)-40;?>px;

            }


          .carousel-caption a,
          .carousel-caption{
             color: <?php echo esc_attr(get_theme_mod('slider_text_color', '#fff')); ?>; 
          }
          .carousel-caption .btn{
            border-color: <?php echo esc_attr(get_theme_mod('slider_text_color', '#fff')); ?>; 
          }

          .btn, 
          .copyright a, 
          .entry-meta a:hover, 
          .widget a:hover,  
          .carousel-caption 
          .slider-title a:hover, 
          .carousel-caption .entry-meta a:hover,
          .entry-title a:hover,
          #wp-calendar tbody td a, 
          #wp-calendar tfoot td#prev a:hover, 
          #wp-calendar tfoot td#next a:hover,
          .edit-link a,
          .nav-links span, .nav-links a{
            color: <?php echo esc_attr(get_theme_mod('theme_primary_color', '#419dd8')); ?>; 
          }

          .link-excerpt {
              background: <?php echo esc_attr(get_theme_mod('theme_primary_color', '#419dd8')); ?>;
              padding: 30px 30px 10px;
          }

          .post .triangle{border-top: 100px solid <?php echo esc_attr(get_theme_mod('theme_primary_color', '#419dd8')); ?>;}

          blockquote{border-left:5px solid <?php echo esc_attr(get_theme_mod('theme_primary_color', '#419dd8')); ?>;}

        .btn-border:hover,   
        .btn-nav:hover, 
        .post-meta a:hover,button, 
        input[type="button"], 
        input[type="reset"], 
        input[type="submit"],
        .reply a:hover, 
        .post-meta a:hover,
        button, 
        input[type="button"]:hover,
        input[type="reset"]:hover, 
        input[type="submit"]:hover, 
        .widget .tagcloud a:hover,
        .nav-links span:hover, 
        .nav-links a:hover, 
        .page-numbers.current,
        .carousel-control:focus,
        .carousel-control:hover,
        .pager li > a:hover, 
        .pager li > a:focus,
        .edit-link a:hover{
            background-color: <?php echo esc_attr(get_theme_mod('theme_primary_color', '#419dd8')); ?>;
            border-color: <?php echo esc_attr(get_theme_mod('theme_primary_color', '#419dd8')); ?>;
            color: #fff;
        }

        .widget-title:before{background-color: <?php echo esc_attr(get_theme_mod('theme_primary_color', '#419dd8')); ?>;}
           .page-header-bg .page-header-title,
            .default-page-header .page-header-title{
             text-align: <?php echo esc_attr(get_theme_mod('title_text_align', 'center')); ?>;
            }
            .navbar-default .navbar-nav>li>a, .search-icon .ion-search { 
                color:<?php echo esc_attr(get_theme_mod('nav_link_color', '#444')); ?>;
                text-transform: <?php echo esc_attr(get_theme_mod('text_transform', 'uppercase')); ?>;
                <?php if( get_theme_mod('font_size') ):?>  
                    font-size: <?php echo get_theme_mod( 'font_size', '12' ); ?>px;
                <?php else: ?>
                    font-size: 12px;
                <?php endif; ?>
              }

          #wp-calendar tbody td#today{
            color: <?php echo esc_attr(get_theme_mod('theme_primary_color', '#419dd8')); ?>;
            border-color: <?php echo esc_attr(get_theme_mod('theme_primary_color', '#419dd8')); ?>;
          }


            .navbar-default .navbar-nav>li>a:hover,
            .current-menu-item a,
            .current-menu-parent>a,
            .navbar-nav>li>a:hover, .search-icon i:hover, .active{  
                color:<?php echo esc_attr(get_theme_mod('nav_link_hover_color', '#419dd8')); ?> !important;}

            ul.sub-menu li a:hover{ background-color:<?php echo esc_attr(get_theme_mod('nav_link_hover_color', '#419dd8')); ?> ;}

            ul.sub-menu li:first-child {border-top: 2px solid <?php echo esc_attr(get_theme_mod('nav_link_hover_color', '#419dd8')); ?> ;}

            .site-footer { 
                background-color:<?php echo esc_attr(get_theme_mod('footer_bg_color')); ?>;
                padding: 40px 0;
            }
            .copyright { 
                background-color: <?php echo esc_attr(get_theme_mod('copyright_bg_color', '#676767')); ?>;
                padding: 30px 20px 10px;
                color: <?php echo esc_attr(get_theme_mod('copyright_text_color', '#fff')); ?>;
            }
        </style>
    <?php
}
add_action( 'wp_head', 'exploore_customize_css');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function exploore_customize_preview_js() {
  wp_enqueue_script( 'exploore_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'exploore_customize_preview_js' );

<?php
/**
 * Declaring widgets
 *
 *
 * @package exploore
 */
function exploore_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Main Sidebar', 'exploore' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Main Widget Area.', 'exploore' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 1', 'exploore' ),
		'id'            => 'footer-sidebar-1',
		'description'   => 'Footer Widget Area 1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
	) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Sidebar 2', 'exploore' ),
        'id'            => 'footer-sidebar-2',
        'description'   => 'Footer Widget Area 2',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Sidebar 3', 'exploore' ),
        'id'            => 'footer-sidebar-3',
        'description'   => 'Footer Widget Area 3',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_widget('exploore_recent_post');

}
add_action( 'widgets_init', 'exploore_widgets_init' );

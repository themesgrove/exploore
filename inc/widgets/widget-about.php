<?php

/*

Widget Name:About Us
Widget URI:https://themesgrove.com
Description:About Us Widget
Version:1.0.
Author:Themesgrove
Author URI:https://themesgrove.com

*/



// Register and load the widget
function exploore_about_widget() {
    register_widget( 'about_widget' );
}
add_action( 'widgets_init', 'exploore_about_widget' );
 
// Creating the widget 
class about_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'about_widget', 
 
// Widget name will appear in UI
__('About Me', 'exploore'), 
 
// Widget description
array( 'description' => __( 'Use this widget to show about me', 'exploore' ), ) 
);
}
 

         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'About Me', 'exploore' );
}


if ( isset( $instance[ 'description' ] ) ) {
	$description = $instance[ 'description' ];
}
else {
	$description = __( ' I am a Web Devloper studying the history and archaeology of slavery during the Viking Age.', 'exploore' );
}

if ( isset( $instance[ 'thumbnail' ] ) ) {
	$thumbnail = $instance[ 'thumbnail' ];
}
else {
	$thumbnail = __( 'http://exploore.demo.themesgrove.com/wp-content/uploads/2016/08/about.jpg', 'exploore' );
}

if ( isset( $instance[ 'facebook_link' ] ) ) {
	$facebook = $instance[ 'facebook_link' ];
}
else {
	$facebook = __( 'http://www.facebook.com/themesgorve', 'exploore' );
}

if ( isset( $instance[ 'twitter_link' ] ) ) {
	$twitter = $instance[ 'twitter_link' ];
}
else {
	$twitter = __( 'http://www.twitter.com/themesgorve', 'exploore' );
}

if ( isset( $instance[ 'linkedin_link' ] ) ) {
	$linkedin = $instance[ 'linkedin_link' ];
}
else {
	$linkedin = __( 'http://www.linkedin.com/themesgorve', 'exploore' );
}

if ( isset( $instance[ 'dribbble_link' ] ) ) {
	$dribbble = $instance[ 'dribbble_link' ];
}
else {
	$dribbble = __( 'http://www.dribbble.com/themesgorve', 'exploore' );
}

// Widget admin form
?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'exploore' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php esc_html_e( 'Description', 'exploore' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'thumbnail' ); ?>"><?php esc_html_e( 'Thumbnail Url', 'exploore' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail' ); ?>" type="text" value="<?php echo esc_attr( $thumbnail ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'facebook_link' ); ?>"><?php esc_html_e( 'Facebook Url', 'exploore' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_link' ); ?>" name="<?php echo $this->get_field_name( 'facebook_link' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'twitter_link' ); ?>"><?php esc_html_e( 'Twitter Url', 'exploore' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'twitter_link' ); ?>" name="<?php echo $this->get_field_name( 'twitter_link' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'linkedin_link' ); ?>"><?php esc_html_e( 'Linkedin Url', 'exploore' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'linkedin_link' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_link' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'dribbble_link' ); ?>"><?php esc_html_e( 'Dribbble Url', 'exploore' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'dribbble_link' ); ?>" name="<?php echo $this->get_field_name( 'dribbble_link' ); ?>" type="text" value="<?php echo esc_attr( $dribbble ); ?>" />
	</p>

<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['description'] = strip_tags( $new_instance['description'] );
	    $instance['thumbnail'] = $new_instance['thumbnail'];
	    $instance['facebook_link'] = $new_instance['facebook_link'];
	    $instance['twitter_link'] = $new_instance['twitter_link'];
	    $instance['linkedin_link'] = $new_instance['linkedin_link'];
	    $instance['dribbble_link'] = $new_instance['dribbble_link'];
	return $instance;
}

// Creating widget front-end
 
public function widget( $args, $instance ) {

extract($args);
extract($instance);?>


        <section id="about-me" class="widget widget-about">
        	<h2 class="widget-title"><?php echo esc_html($instance['title']); ?></h2>
        	<div class="about-info">
	        	<?php if ($instance['thumbnail']):?>
	        		<img src="<?php echo esc_url($instance['thumbnail']); ?>" alt="about-me">
	        	<?php endif; ?>

	        	<?php if ($instance['description']):?>
	        		<p class="about-desc"><?php echo esc_html($instance['description']); ?></p>
	        	<?php endif; ?>

        		<div class="list-inline social-share">
        			<?php if ($instance['facebook_link']):?>
        				<a class="facebook" target="_blank" href="<?php echo esc_url($instance['facebook_link']); ?>">
        					<i class="fa fa-facebook"></i>
        				</a>
        			<?php endif; ?>

        			<?php if ($instance['twitter_link']):?>
        				<a class="twitter" target="_blank" href="<?php echo esc_url($instance['twitter_link']); ?>">
        					<i class="fa fa-twitter"></i>
        				</a>
        			<?php endif; ?>

        			<?php if ($instance['linkedin_link']):?>
        				<a class="linkedin" target="_blank" href="<?php echo esc_url($instance['linkedin_link']); ?>">
        					<i class="fa fa-linkedin"></i>
        				</a>
        			<?php endif; ?>

        			<?php if ($instance['dribbble_link']):?>
        				<a class="dribbble" target="_blank" href="<?php echo esc_url($instance['dribbble_link']); ?>">
        					<i class="fa fa-dribbble"></i>
        				</a>
        			<?php endif; ?>
        		</div>
        	</div>

        </section>

    <?php
}


}
<?php

/*

Plugin Name:Exploore Recent Post
Plugin URI:https://themesgrove.com
Description:Recent Post Widget
Version:1.0.3
Author:Themesgrove
Author URI:https://themesgrove.com

*/

class exploore_recent_post extends WP_Widget{
 public function __construct() {
        $widget_ops = array(
         'classname' => 'exploore_recent_post',
         'description' => __('Use this widget to show your recent
			 posts','exploore'),
			         );
			         parent::__construct( 'exploore_recent_post', __('Exploore Recent
			 Posts', 'exploore'), $widget_ops );
 }


function form( $instance ) {

	$defaults = array(
	   'title' => '-1'
	);

		if (isset( $instance[ 'title' ] )) {
		   $title = $instance[ 'title' ];
		}

		if ( isset($instance[ 'postno' ]) ) {
		   $postno = $instance[ 'postno' ];
		}

	    if ( isset($instance[ 'thumbWidth' ]) ) {
	       $thumbWidth = $instance[ 'thumbWidth' ];
	    }
		if ( isset($instance[ 'thumbHeight' ]) ) {
			$thumbHeight = $instance[ 'thumbHeight' ];
		}

       // markup for form 
       ?>
       <p>
           <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
           	<?php echo esc_html__('Title', 'exploore'); ?>
           </label><br>

           <input class="widefat" 
	           type="text" 
	           id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
	           name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
	           value="<?php if(isset($title)) echo esc_attr($title);?>"
	           >

        </p>
     	<p>
			<label for="<?php echo esc_attr( $this->get_field_id('postno') );?>"><?php echo esc_html__('Number The Post :', 'exploore'); ?></label>
			<br>
			<input type="text"
			       id="<?php echo esc_attr( $this->get_field_id('postno') );?>"
			       name="<?php echo esc_attr($this->get_field_name('postno'));?>"
			       value="<?php if(isset($postno)) echo esc_attr($postno);?>"
			       class="widefat">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('thumbWidth') );?>"><?php echo esc_html__('Thumbnail Width(ex. 70px)', 'exploore'); ?> </label>
			<br>
			<input type="text"
			       id="<?php echo esc_attr( $this->get_field_id('thumbWidth') );?>"
			       name="<?php echo esc_attr( $this->get_field_name('thumbWidth') );?>"
			       value="<?php if(isset($thumbWidth)) echo esc_attr($thumbWidth);?>"
			       class="widefat">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('thumbHeight') );?>"><?php echo esc_html__('Thumbnail Height(ex. 70px)', 'exploore'); ?> </label>
			<br>
			<input type="text"
			       id="<?php echo esc_attr( $this->get_field_id('thumbHeight') );?>"
			       name="<?php echo esc_attr( $this->get_field_name('thumbHeight') );?>"
			       value="<?php if(isset($thumbHeight)) echo esc_attr($thumbHeight);?>"
			       class="widefat">
		</p>

   

       <?php
   }


public	function update( $new_instance, $old_instance){
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['postno'] = strip_tags( $new_instance['postno'] );
    $instance['thumbWidth'] = $new_instance['thumbWidth'];
    $instance['thumbHeight'] = $new_instance['thumbHeight'];
	return $instance;

}

public	function widget($args, $instance){

extract($args);
extract($instance);

		?>

        <section id="recent-post" class="widget widget-post">
        	<h2 class="widget-title"><?php echo $instance['title']; ?></h2>

        	   <?php 
	        	    $height =   $thumbHeight;
			        $width =  $thumbWidth;
                    $query_args = array(
	                    'order'                 => 'order',
						'orderby'               => 'orderby',
						'posts_per_page'        => $instance['postno'],
						'ignore_sticky_posts'    => 1
                    );
                    $query = new Wp_Query($query_args);
                    while($query->have_posts()) : $query->the_post();
        	   ?>

        	   <?php if ( has_post_thumbnail() ): ?>

		        	<div class="media">
						<div class="widget-img media-left">
							<a href="<?php the_permalink(); ?>">
								<?php 
									// check if the post has a Post Thumbnail assigned to it.
										the_post_thumbnail(array($width, $height ));				
						        ?>
							</a>
						</div>
						<div class="blog-details media-body">
							<h5 class="post-heading media-heading"> 
							    <a href="<?php the_permalink();?>"> 
								  <?php the_title(); // post title ?>
							    </a>
							</h5>

						    <div class="entry-meta">
								<?php the_time('F j, Y'); ?>
							</div><!-- .entry-meta -->
						</div>
					</div>
				<?php endif; ?>
			<?php endwhile;?>
        </section>


	<?php

	}

}



<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package condocoop
 * Template Name: About Page
 */

get_header(); ?>

<div class="container mainContent">
	<div class="row">
		<div class="col-lg-12">
			<?php 
				while ( have_posts() ) : the_post();

			    	the_content();

				endwhile; // end of the loop. 
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
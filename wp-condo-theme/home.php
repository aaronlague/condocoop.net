<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package condocoop
 */

get_header(); ?>
<section class="topSection">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 contentContainer">					
				<?php
				// The Query
					$the_query = new WP_Query( 'pagename=homepage-content' ); //page slug of the homepage content
					// The Loop
					if ( $the_query->have_posts() ) {
					        
						while ( $the_query->have_posts() ) {

							$the_query->the_post();
							the_post_thumbnail('', array('class' => 'img-responsive'));
							the_content('Read more...');
						}
					        
					} else {
						// no posts found
					}

					wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</section>
<div class="container mainContent">
		<div class="row">
			<div class="col-lg-6 leftContent">
				<?php
					$column_1_args = array(

						'category_name' => 'main', //for the homepage display main category on the first column
						'orderby' => 'meta_value', //add custom field to the post and set the value to an integer
						'order' => 'ASC' //order things from 1 to the highest meta_value value

						);

					$column_1_main_query = new WP_Query( $column_1_args );
					
					if ( $column_1_main_query->have_posts() ) {

				        global $more;
						$more = 0;

						while ( $column_1_main_query->have_posts() ) {

							$column_1_main_query->the_post();

							echo '<h1>' . get_the_title() . '</h1>';

							the_post_thumbnail('', array('class' => 'img-responsive'));

							the_content('Read more...');
						}
					        
					} else {
						// no posts found
					}

					wp_reset_postdata();
				?>				
			</div>
			<div class="col-lg-6 rightContent">
				<h1>Services</h1>
				<?php
					$column_2_args = array(

						'category_name' => 'services', //for the homepage display services category on the second column
						'orderby' => 'meta_value', //add custom field to the post and set the value to an integer
						'order' => 'ASC' //order things from 1 to the highest meta_value value

						);

					$column_2_services_query = new WP_Query( $column_2_args );
					
					if ( $column_2_services_query->have_posts() ) {

				        global $more;
						$more = 0;

						echo '<ul>';

						while ( $column_2_services_query->have_posts() ) {

							$column_2_services_query->the_post();

							echo '<li>' . get_the_title() . '</li>';

							//the_post_thumbnail('', array('class' => 'img-responsive'));

							the_content('Read more...');

						}

						echo '</ul>';
					        
					} else {
						// no posts found
					}

					wp_reset_postdata();
				?>

				<h1>Products</h1>
				<?php
					$column_2b_args = array(

						'category_name' => 'products', //for the homepage display services category on the second column
						'orderby' => 'meta_value', //add custom field to the post and set the value to an integer
						'order' => 'ASC' //order things from 1 to the highest meta_value value

						);

					$column_2_products_query = new WP_Query( $column_2b_args );
					
					if ( $column_2_products_query->have_posts() ) {

				        global $more;
						$more = 0;

						while ( $column_2_products_query->have_posts() ) {

							$column_2_products_query->the_post();

							echo '<h2>' . get_the_title() . '</h2>';

							the_post_thumbnail('', array('class' => 'img-responsive'));

							the_content('Read more...');

						}
					        
					} else {
						// no posts found
					}

					wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
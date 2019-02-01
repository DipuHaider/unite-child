<?php /* Template Name: Films Page*/ ?>
 <?php get_header(); ?>
 
	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
		
			<?php get_template_part( 'content', 'single' ); ?>
			<?php get_post($post-> ID = '34'); ?>
			<h5>Values under description</h5>
			<h6>Country:</h6> <?php $taxonomies_country = get_terms("country"); $count = count($taxonomies_country); if ( $count > 0 ){ 
			foreach ( $taxonomies_country as $term ) { echo $term->name . '.           '; } } ?> </br>
			<h6>Genre:</h6> <?php $taxonomies_genre = get_terms("genre"); $count = count($taxonomies_genre); if ( $count > 0 ){ 
			foreach ( $taxonomies_genre as $term ) { echo $term->name . '.           '; } } ?> </br>
			<h6>Ticket Price:</h6> <?php $custom_field = get_post_meta( get_the_ID(), 'ticket_price', true ); 
				echo $custom_field;?></br>
			<h6>Release Date:</h6> <?php $release_date = get_post_meta( get_the_ID(), 'release_date', true ); 
				echo $release_date;?></br>

			<?php unite_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
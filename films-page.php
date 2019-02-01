<?php /* Template Name: Films Page*/ ?>
 <?php get_header(); ?>
 
	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">
			<p>
		<?php while ( have_posts() ) : the_post(); ?>
		
			<?php get_template_part( 'content', 'single' ); ?>
			<?php get_post($post-> ID = '34'); ?>
			<h5>Values under description</h5>
			<h6>Releasing Country:</h6> <?php $taxonomies_country = get_terms("country"); $count = count($taxonomies_country); if ( $count > 0 ){ 
			foreach ( $taxonomies_country as $term ) { echo $term->name . '.           '; } } ?> </br>
			<h6>Genre:</h6> <?php $taxonomies_genre = get_terms("genre"); $count = count($taxonomies_genre); if ( $count > 0 ){ 
			foreach ( $taxonomies_genre as $term ) { echo $term->name . '.           '; } } ?> </br>
			<h6>Ticket Price:</h6> <?php $custom_field = get_post_meta( get_the_ID(), 'ticket_price', true ); 
				echo $custom_field;?></br>
			<h6>Release Date:</h6> <?php $release_date = get_post_meta( get_the_ID(), 'release_date', true ); 
				echo $release_date;?></br>

			<?php unite_post_nav(); ?>

		<?php endwhile; // end of the loop. ?>
			</p>
		
		<?php $loop = new WP_Query( array( 'post_type' => 'films', 'posts_per_page' => 10 ) ); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
				<?php $t_country = get_the_terms( get_the_ID(), 'country' );
					if ( $t_country && ! is_wp_error( $t_country ) ) : $draught_links = array();
						foreach ( $t_country as $term ) {
						$draught_links[] = $term->name;
						}
					$on_draught = join( ", ", $draught_links );?>
				<h6>Releasing Country:</h6>
				<?php printf( esc_html__( '%s', 'textdomain' ), esc_html( $on_draught ) ); ?>
				<?php endif; ?>
				<?php $t_genre = get_the_terms( get_the_ID(), 'genre' );
					if ( $t_genre && ! is_wp_error( $t_genre ) ) : $draught_links = array();
						foreach ( $t_genre as $term ) {
						$draught_links[] = $term->name;
						}
					$on_draught = join( ", ", $draught_links );?>
				<h6>Genre:</h6>
				<?php printf( esc_html__( '%s', 'textdomain' ), esc_html( $on_draught ) ); ?>
				<?php endif; ?>
				<h6>Ticket Price:</h6> <?php $custom_field = get_post_meta( get_the_ID(), 'ticket_price', true ); 
				echo $custom_field;?>
				<h6>Release Date:</h6> <?php $release_date = get_post_meta( get_the_ID(), 'release_date', true ); 
				echo $release_date;?>
				
				<?php endwhile; // end of the loop. ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
			

<?php get_sidebar(); ?>
<?php get_footer(); ?>
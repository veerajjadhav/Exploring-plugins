<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>

	</main><!-- .site-main -->
	<?php if ( have_rows( 'Team' ) ): ?>

		<ul class="slides">

			<?php
			while ( have_rows( 'Team' ) ): the_row();

				// vars
				$image		 = get_sub_field( 'image' );
				$name		 = get_sub_field( 'name' );
				$link		 = get_sub_field( 'url' );
				$designation = get_sub_field( 'designation' )
				?>

				<li class="slide">

					<?php if ( $link ): ?>
						<a href="<?php echo $link; ?>">
						<?php endif; ?>

						<img src="<?php echo $image[ 'url' ]; ?>" alt="<?php echo $image[ 'alt' ] ?>" />

						<?php if ( $link ): ?>
						</a>
					<?php endif; ?>

					<div class="member-name"><?php echo $name; ?></div>
					<div class="member-designation"><?php echo $designation ?></div>
					<a href="#" target="_blank"><?php echo $link ?></a>

				</li>

			<?php endwhile; ?>

		</ul>

	<?php endif; ?>

	<?php
	$images = get_field( 'gallery' );

	if ( $images ):
		?>
		<ul class="my-gallery">
			<?php foreach ( $images as $image ): ?>
				<li>
					<a href="<?php echo $image[ 'url' ]; ?>">
						<img src="<?php echo $image[ 'sizes' ][ 'thumbnail' ]; ?>" alt="<?php echo $image[ 'alt' ]; ?>" />
					</a>
					<p><?php echo $image[ 'caption' ]; ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

</div>


<!-- .content-area -->



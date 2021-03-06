<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h2 class="page-title"><?php _e( 'Posts', 'twentyseventeen' ); ?></h2>
	</header>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) {
					
					the_post(); //<- recoge la consulta del post
			?>
			<h1>
			<strong><a href="
			<?php
					the_permalink(); //<- enlace del post
			?>
			">
			<?php
					the_title(); //<- titulo del post
			?>
			</a></strong>
			</h1>
			<table align="center">
				<tr>
					<td>
			<?php
					the_post_thumbnail(); //<- imagen de portada del post
			?>
					</td>
					<td>
			<?php
					the_excerpt(); // <- resumen del contenido del post
			?>
					</td>
				</tr>
			</table>
			
			<hr>
			<?php
					the_content(); //<- contenido del post
			?>
			
			<strong></b><a href="
			<?php
					the_permalink(); //<- enlace del post (Leer más)
			?>
			">> Leer más</a></strong>
			<hr>
			<?php
					the_author();
					echo "&nbsp"; echo "&nbsp"; echo "&nbsp"; echo "&nbsp"; echo "&nbsp"; echo "&nbsp";
					the_date();
					echo "&nbsp"; echo "&nbsp"; echo "&nbsp";
					the_time();
					
					
					
					
				}

				the_posts_pagination( array(
					'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
				) );

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();

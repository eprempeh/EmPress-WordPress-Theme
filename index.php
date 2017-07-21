<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EmPress_Lite
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div id="primary" class="content-area col-md-8">
	    		<main id="main" class="site-main" role="main">

					<?php
					// Breadcrumb
                    if ( function_exists( 'yoast_breadcrumb' ) ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    }
                        
					if ( have_posts() ) : ?>

						<?php if ( is_home() && ! is_front_page() ) : ?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
						<?php endif; ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );
							?>
						<?php endwhile; ?>

						<?php the_posts_navigation(); ?>

					<?php else : ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>

					<!-- Advertisement -->
                    <?php empress_lite_get_below_ad(); ?>
					
				</main><!-- end of #main -->
        	</div><!-- end of #primary -->

            <?php get_sidebar(); ?>
        </div> <!-- end of .row --> 
    </div> <!-- end of .container -->

<?php get_footer(); ?>

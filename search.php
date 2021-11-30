<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wadi
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
			<div class="search-page wadi-search__form">
				<?php
					get_search_form();
				?>
			</div>

			<div class="content-area">
				<header class="page-header">
					<h1 class="page-title search-page-head">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'wadi' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->
                <div class="blog__content-posts">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
			
			?>
		</div>
		<?php
		
					$big = 999999999; // need an unlikely integer
					echo '<div class="wadi-pagination">';
						echo paginate_links(array(
						'base'         => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
						'format'       => '?paged=%#%',
						'total'        => $wp_query->max_num_pages,
						'current'      => max(1, get_query_var('paged')),
						'show_all'     => false,
						'type'         => 'plain',
						'end_size'     => 2,
						'mid_size'     => 1,
						'prev_next'    => true,
						'prev_text'    => sprintf('<i></i> %1$s', __('« Previous Page', 'wadi')),
						'next_text'    => sprintf('%1$s <i></i>', __('Next Page »', 'wadi')),
						'add_args'     => false,
						'add_fragment' => '',
						));
					echo '</div>';
		
					?>
			</div>
			<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

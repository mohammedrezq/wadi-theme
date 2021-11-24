<?php
/**
 * The template for displaying category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wadi
 */


$currCat = get_category(get_query_var('cat'));
$cat_name = $currCat->name;
$cat_id   = get_cat_ID($cat_name);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $temp = $wp_query;
  $wp_query = null;
  $wp_query = new WP_Query();
  $wp_query->query('post_type=post&paged='.$paged.'&cat='.$cat_id);


get_header();
?>

	<main id="primary" class="site-main">

		<?php if ($wp_query->have_posts()) : ?>

			<header class="page-header">
				<?php
                single_term_title('<h1 class="page-title category-page-head">', '</h1>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>
			</header><!-- .page-header -->
            <div class="content-area">
                <div class="blog__content-posts">
                <?php
                /* Start the Loop */
                while ($wp_query->have_posts()) :
                    the_post();

                    /*
                    * Include the Post-Type-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                    */
                    get_template_part('template-parts/content', 'category');

                endwhile;
                ?>

            </div>
            <?php
            global $wp_query;
            
            
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

            get_template_part('template-parts/content', 'none');

        endif;
        ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

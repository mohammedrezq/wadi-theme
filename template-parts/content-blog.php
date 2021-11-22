<?php
/**
 * Template part for displaying Blog page content in page-blog.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wadi
 */


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
 $args = array(
    'post_status' => 'publish',
    'post_type' => 'post',
    'posts_per_page' => 4,
    'paged' => $paged,
    'ignore_sticky_posts' => 1
 );

$the_query = new WP_Query($args);


?>

<div class="content-area">
    <h1 class="blog-page-head"><?php echo get_the_title(); ?></h1>

    <div class="blog__content-posts">
    <?php

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post(); ?>
            <div>
                <div class="wadi-blog-post-container">
                    <div class="wadi-blog-thumbnail">
                        <a class="wadi-post-image__link" href="<?php echo get_permalink(); ?>">
                            <?php echo get_the_post_thumbnail(); ?>
                        </a>
                    </div>
                    <div class="wadi-blog-post__text">
                        <div class="wadi-blog-post__date">
                            <?php echo  get_the_date('F j, Y'); ?>
                        </div>
                        <div class="wadi-blog-post__title">
                        <a href="<?php echo get_permalink(); ?>">    
                            <h2>
                                <?php echo get_the_title(); ?>
                            </h2>
                        </a>
                        </div>
                        <div class="wadi-blog-post__excerpt">
                            <?php echo get_the_excerpt(); ?>
                        </div>
                    </div>
                </div>
        </div>
            <?php
        } ?>
        
    </div>
        <div class="wadi-pagination">
    <?php

        echo paginate_links(array(
            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'total'        => $the_query->max_num_pages,
            'current'      => max(1, get_query_var('paged')),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf('<i></i> %1$s', __('« Previous Page', 'wadi')),
            'next_text'    => sprintf('%1$s <i></i>', __('Next Page »', 'wadi')),
            'add_args'     => false,
            'add_fragment' => '',
        )); ?>
</div>
<?php
    }
    /* Restore original Post Data */
    wp_reset_postdata();
    ?>
</div>
<?php
/**
 * Template part for displaying Blog page content in page-blog.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wadi
 */


 $args = array(
    'post_status' => 'publish',
    'post_type' => 'post',
    'posts_per_page' => -1,
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
        }
    }
    /* Restore original Post Data */
    wp_reset_postdata();
    ?>
        
    </div>
</div>
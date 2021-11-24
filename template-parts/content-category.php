<?php
/**
 * Template part for displaying category posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wadi
 */

?>


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
                            <h2><?php echo get_the_title(); ?></h2>
                        </a>
                        </div>
                        <div class="wadi-blog-post__excerpt">
                            <?php excerpt_articles(the_ID()); ?>
                        </div>
                    </div>
                </div>
        </div>

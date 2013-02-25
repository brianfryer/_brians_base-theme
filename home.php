<?php get_header(); ?>

<div class="content-container">
        <section class="wrapper">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <?php the_content(); ?>
                <span class="full-post">
                    <a class="btn" title="<?php the_title(); ?>" href="<?php the_permalink();?>">View full post &raquo;</a
                </span>
            </article>
            <?php endwhile; else: ?>
            <article>
                <h2><?php _e('Sorry, there are no posts to display here.'); ?></h2>
                <img id="nothing-to-do-here" height="682px" width="960px" src="<?php echo bloginfo('template_url'); ?>/img/nothing-to-do-here.png" />
            </article>
            <?php endif; ?>

            <nav class="pagination">
                <ul>
                    <li><?php next_posts_link('&laquo; Previous Posts') ?></li>
                    <li><?php previous_posts_link('Newer Posts &raquo;') ?></li>
                </ul>
            </nav><!-- .pagination -->

        </section>
    </div><!-- .content-container -->

<?php get_footer(); ?>

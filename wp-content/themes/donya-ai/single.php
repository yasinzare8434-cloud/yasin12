<?php if (!defined('ABSPATH')) exit; get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="content-area content-narrow">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                    <header class="entry-header">
                        <?php
                        $cats = get_the_category();
                        if (!empty($cats)) :
                            echo '<a href="' . esc_url(get_category_link($cats[0]->term_id)) . '" class="entry-category">' . esc_html($cats[0]->name) . '</a>';
                        endif;
                        ?>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <div class="entry-meta">
                            <span class="meta-author">✍️ <?php the_author(); ?></span>
                            <span class="meta-date">📅 <?php echo get_the_date(); ?></span>
                            <?php if (function_exists('the_views')) : ?>
                                <span class="meta-views">👁️ <?php the_views(); ?></span>
                            <?php endif; ?>
                        </div>
                    </header>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="entry-thumbnail">
                            <?php the_post_thumbnail('hero-image'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                        <?php wp_link_pages(['before' => '<div class="page-links">صفحات:', 'after' => '</div>']); ?>
                    </div>

                    <?php
                    $tags = get_the_tags();
                    if ($tags) :
                        echo '<div class="entry-tags">';
                        echo '<span class="tags-label">برچسب‌ها: </span>';
                        foreach ($tags as $tag) {
                            echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="tag-link">#' . esc_html($tag->name) . '</a>';
                        }
                        echo '</div>';
                    endif;
                    ?>

                    <div class="entry-footer">
                        <div class="author-box">
                            <span class="author-avatar"><?php echo get_avatar(get_the_author_meta('ID'), 60); ?></span>
                            <div>
                                <p class="author-name"><?php the_author_meta('display_name'); ?></p>
                                <p class="author-bio"><?php the_author_meta('description'); ?></p>
                            </div>
                        </div>
                    </div>
                </article>

                <?php
                // Related posts
                $related = new WP_Query([
                    'post__not_in'      => [get_the_ID()],
                    'posts_per_page'    => 3,
                    'category__in'       => wp_get_post_categories(get_the_ID(), ['fields' => 'ids']),
                    'no_found_rows'      => true,
                    'cache_results'      => false,
                ]);
                if ($related->have_posts()) :
                    echo '<section class="related-posts"><h2 class="section-title">مطالب مرتبط</h2><div class="posts-grid">';
                    while ($related->have_posts()) : $related->the_post();
                        get_template_part('template-parts/card');
                    endwhile;
                    echo '</div></section>';
                    wp_reset_postdata();
                endif;
                ?>

                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>

            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>

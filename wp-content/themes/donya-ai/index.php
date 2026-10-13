<?php if (!defined('ABSPATH')) exit; get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="content-area">
            <?php if (have_posts()) : ?>
                <header class="page-header">
                    <h1 class="page-title">
                        <?php
                        if (is_home()) {
                            echo 'وبلاگ';
                        } elseif (is_archive()) {
                            the_archive_title();
                        }
                        ?>
                    </h1>
                    <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
                </header>

                <div class="posts-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/card'); ?>
                    <?php endwhile; ?>
                </div>

                <?php the_posts_pagination([
                    'prev_text' => '→ قبلی',
                    'next_text' => 'بعدی ←',
                ]); ?>

            <?php else : ?>
                <p class="no-posts">مطلب موردنظر یافت نشد.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>

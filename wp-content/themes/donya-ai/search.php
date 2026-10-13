<?php if (!defined('ABSPATH')) exit; get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="content-area">
            <header class="page-header">
                <h1 class="page-title">
                    <?php printf('نتایج جست‌وجو برای: %s', '<span>' . get_search_query() . '</span>'); ?>
                </h1>
            </header>

            <?php if (have_posts()) : ?>
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
                <p class="no-posts">نتیجه‌ای یافت نشد. عبارت دیگری را امتحان کنید.</p>
                <?php get_search_form(); ?>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>

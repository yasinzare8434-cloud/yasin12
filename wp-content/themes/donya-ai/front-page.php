<?php if (!defined('ABSPATH')) exit; get_header(); ?>

<main id="main" class="site-main">

    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">دنیای هوش مصنوعی؛ یادگیری، ابزارها و کسب درآمد</h1>
                <p class="hero-desc">با جدیدترین اخبار، آموزش‌های کاربردی و ابزارهای هوش مصنوعی آشنا شو و راه‌های استفاده از AI در کار و زندگی را یاد بگیر.</p>
                <div class="hero-buttons">
                    <a href="<?php echo esc_url(donya_ai_cat_link('ai-news')); ?>" class="btn btn-primary">مطالعه آخرین اخبار</a>
                    <a href="<?php echo esc_url(donya_ai_cat_link('ai-tutorials')); ?>" class="btn btn-secondary">شروع آموزش</a>
                    <a href="<?php echo esc_url(donya_ai_cat_link('ai-monetization')); ?>" class="btn btn-outline-light">کشف روش‌های کسب درآمد</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="categories-section">
        <div class="container">
            <h2 class="section-title">دسته‌بندی‌های اصلی</h2>
            <div class="category-grid">
                <a href="<?php echo esc_url(donya_ai_cat_link('ai-news')); ?>" class="category-card cat-news">
                    <span class="cat-icon">📰</span>
                    <h3>اخبار روز هوش مصنوعی</h3>
                    <p>آخرین اخبار و تحولات دنیای AI</p>
                </a>
                <a href="<?php echo esc_url(donya_ai_cat_link('ai-tutorials')); ?>" class="category-card cat-tutorials">
                    <span class="cat-icon">📚</span>
                    <h3>آموزش ابزارهای AI</h3>
                    <p>آموزش‌های کاربردی از مبتدی تا پیشرفته</p>
                </a>
                <a href="<?php echo esc_url(donya_ai_cat_link('ai-tools')); ?>" class="category-card cat-tools">
                    <span class="cat-icon">🛠️</span>
                    <h3>معرفی ابزارهای رایگان</h3>
                    <p>ابزارهای کاربردی و رایگان هوش مصنوعی</p>
                </a>
                <a href="<?php echo esc_url(donya_ai_cat_link('ai-monetization')); ?>" class="category-card cat-monetization">
                    <span class="cat-icon">💰</span>
                    <h3>کسب درآمد با هوش مصنوعی</h3>
                    <p>روش‌های واقعی درآمدزایی با AI</p>
                </a>
                <a href="<?php echo esc_url(donya_ai_cat_link('ai-content-creation')); ?>" class="category-card cat-content">
                    <span class="cat-icon">✍️</span>
                    <h3>تولید محتوا با هوش مصنوعی</h3>
                    <p>تولید متن، تصویر و ویدئو با AI</p>
                </a>
                <a href="<?php echo esc_url(donya_ai_cat_link('ai-marketing')); ?>" class="category-card cat-marketing">
                    <span class="cat-icon">📈</span>
                    <h3>بازاریابی و تبلیغات هوشمند</h3>
                    <p>بازاریابی دیجیتال با کمک AI</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="posts-section" id="latest-news">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">تازه‌ترین اخبار</h2>
                <a href="<?php echo esc_url(donya_ai_cat_link('ai-news')); ?>" class="view-all">همه اخبار ←</a>
            </div>
            <div class="posts-grid">
                <?php
                $q = new WP_Query([
                    'category_name'    => 'ai-news',
                    'posts_per_page'   => 6,
                    'post_status'      => 'publish',
                    'no_found_rows'    => true,
                    'cache_results'    => false,
                ]);
                if ($q->have_posts()) :
                    while ($q->have_posts()) : $q->the_post();
                        get_template_part('template-parts/card');
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="no-posts">به‌زودی مقالات اخبار منتشر خواهد شد.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Ad placeholder -->
    <section class="ad-section">
        <div class="container">
            <div class="ad-placeholder">
                <span>جایگاه تبلیغات — برای رزرو این جایگاه با ما تماس بگیرید</span>
            </div>
        </div>
    </section>

    <!-- Featured Tools -->
    <section class="posts-section" id="featured-tools">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">ابزارهای منتخب</h2>
                <a href="<?php echo esc_url(donya_ai_cat_link('ai-tools')); ?>" class="view-all">همه ابزارها ←</a>
            </div>
            <div class="posts-grid">
                <?php
                $q = new WP_Query([
                    'category_name'    => 'ai-tools',
                    'posts_per_page'   => 3,
                    'post_status'      => 'publish',
                    'no_found_rows'    => true,
                    'cache_results'    => false,
                ]);
                if ($q->have_posts()) :
                    while ($q->have_posts()) : $q->the_post();
                        get_template_part('template-parts/card');
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="no-posts">به‌زودی معرفی ابزارها منتشر خواهد شد.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Tutorials -->
    <section class="posts-section" id="tutorials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">آموزش‌های کاربردی</h2>
                <a href="<?php echo esc_url(donya_ai_cat_link('ai-tutorials')); ?>" class="view-all">همه آموزش‌ها ←</a>
            </div>
            <div class="posts-grid">
                <?php
                $q = new WP_Query([
                    'category_name'    => 'ai-tutorials',
                    'posts_per_page'   => 3,
                    'post_status'      => 'publish',
                    'no_found_rows'    => true,
                    'cache_results'    => false,
                ]);
                if ($q->have_posts()) :
                    while ($q->have_posts()) : $q->the_post();
                        get_template_part('template-parts/card');
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="no-posts">به‌زودی آموزش‌ها منتشر خواهد شد.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Monetization -->
    <section class="posts-section" id="monetization">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">راهنمای کسب درآمد</h2>
                <a href="<?php echo esc_url(donya_ai_cat_link('ai-monetization')); ?>" class="view-all">همه مقالات ←</a>
            </div>
            <div class="posts-grid">
                <?php
                $q = new WP_Query([
                    'category_name'    => 'ai-monetization',
                    'posts_per_page'   => 3,
                    'post_status'      => 'publish',
                    'no_found_rows'    => true,
                    'cache_results'    => false,
                ]);
                if ($q->have_posts()) :
                    while ($q->have_posts()) : $q->the_post();
                        get_template_part('template-parts/card');
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="no-posts">به‌زودی راهنمای کسب درآمد منتشر خواهد شد.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>

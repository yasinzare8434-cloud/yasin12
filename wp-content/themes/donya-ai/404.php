<?php if (!defined('ABSPATH')) exit; get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="error-404 not-found">
            <div class="error-404-content">
                <h1 class="error-code">۴۰۴</h1>
                <p class="error-text">صفحه موردنظر پیدا نشد.</p>
                <p class="error-subtext">ممکن است این صفحه حذف شده باشد یا آدرس آن تغییر کرده باشد.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">بازگشت به صفحه اصلی</a>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

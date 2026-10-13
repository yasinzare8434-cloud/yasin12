    </div><!-- #content -->

    <!-- Newsletter -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-box">
                <h2>عضویت در خبرنامه</h2>
                <p>جدیدترین اخبار، آموزش‌ها و ابزارهای هوش مصنوعی را در ایمیل خود دریافت کنید. ثبت‌نام اختیاری است و می‌توانید هر زمان لغو کنید.</p>
                <form class="newsletter-form" onsubmit="return false;">
                    <input type="email" name="newsletter-email" placeholder="ایمیل شما" required>
                    <button type="submit">عضویت</button>
                </form>
                <p class="newsletter-privacy">با ثبت‌نام، <a href="<?php echo esc_url(home_url('/privacy')); ?>">سیاست حریم خصوصی</a> سایت را می‌پذیرید.</p>
            </div>
        </div>
    </section>

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <!-- About -->
                <div class="footer-col footer-about">
                    <h4 class="footer-logo">دنیای هوش مصنوعی</h4>
                    <p>هوش مصنوعی را یاد بگیر، ابزارها را بشناس و فرصت‌های جدید بساز.</p>
                    <p class="footer-tagline">مرجع فارسی اخبار، آموزش‌ها و ابزارهای هوش مصنوعی</p>
                </div>

                <!-- Categories -->
                <div class="footer-col">
                    <h4>دسته‌بندی‌ها</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(donya_ai_cat_link('ai-news')); ?>">اخبار هوش مصنوعی</a></li>
                        <li><a href="<?php echo esc_url(donya_ai_cat_link('ai-tutorials')); ?>">آموزش هوش مصنوعی</a></li>
                        <li><a href="<?php echo esc_url(donya_ai_cat_link('ai-tools')); ?>">ابزارهای هوش مصنوعی</a></li>
                        <li><a href="<?php echo esc_url(donya_ai_cat_link('ai-monetization')); ?>">کسب درآمد با AI</a></li>
                    </ul>
                </div>

                <!-- Quick links -->
                <div class="footer-col">
                    <h4>دسترسی سریع</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/about')); ?>">درباره ما</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>">تماس با ما</a></li>
                        <li><a href="<?php echo esc_url(home_url('/advertise')); ?>">تبلیغات با ما</a></li>
                        <li><a href="<?php echo esc_url(home_url('/privacy')); ?>">حریم خصوصی</a></li>
                        <li><a href="<?php echo esc_url(home_url('/terms')); ?>">شرایط استفاده</a></li>
                    </ul>
                </div>

                <!-- Social -->
                <div class="footer-col">
                    <h4>ما را دنبال کنید</h4>
                    <div class="footer-social">
                        <a href="#" aria-label="تلگرام" class="social-link">📨</a>
                        <a href="#" aria-label="اینستاگرام" class="social-link">📷</a>
                        <a href="#" aria-label="یوتیوب" class="social-link">▶️</a>
                        <a href="#" aria-label="لینکدین" class="social-link">💼</a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© <?php echo date('Y'); ?> دنیای هوش مصنوعی. تمامی حقوق محفوظ است.</p>
                <p>ساخته‌شده با ❤️ برای جامعه فارسی‌زبان هوش مصنوعی</p>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>

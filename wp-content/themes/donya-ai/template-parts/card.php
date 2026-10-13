<?php if (!defined('ABSPATH')) exit; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <a href="<?php the_permalink(); ?>" class="card-link">
        <div class="card-thumbnail">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('card-thumbnail'); ?>
            <?php else : ?>
                <div class="card-no-image">
                    <span class="no-image-icon">📄</span>
                </div>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <?php
            $cats = get_the_category();
            if (!empty($cats)) :
                echo '<span class="card-category">' . esc_html($cats[0]->name) . '</span>';
            endif;
            ?>
            <h3 class="card-title"><?php the_title(); ?></h3>
            <p class="card-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 22); ?></p>
            <div class="card-meta">
                <span class="card-date">📅 <?php echo get_the_date(); ?></span>
                <span class="card-read">→ ادامه مطلب</span>
            </div>
        </div>
    </a>
</article>

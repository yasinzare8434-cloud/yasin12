<?php if (!defined('ABSPATH')) exit; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

    <header id="masthead" class="site-header">
        <div class="header-inner">
            <!-- Logo -->
            <div class="site-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-text">
                        <span class="logo-icon">🤖</span>
                        <span class="logo-name">دنیای هوش مصنوعی</span>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Navigation -->
            <nav id="site-nav" class="site-nav" aria-label="<?php esc_attr_e('منوی اصلی', 'donya-ai'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'primary-menu',
                    'fallback_cb'    => false,
                    'container'      => false,
                ]);
                ?>
            </nav>

            <!-- Search -->
            <div class="header-search">
                <?php get_search_form(); ?>
            </div>

            <!-- Dark mode toggle -->
            <button class="theme-toggle" id="theme-toggle" aria-label="<?php esc_attr_e('تغییر حالت تاریک/روشن', 'donya-ai'); ?>">
                <span class="toggle-icon-dark">🌙</span>
                <span class="toggle-icon-light">☀️</span>
            </button>

            <!-- Mobile menu button -->
            <button class="menu-toggle" id="menu-toggle" aria-label="<?php esc_attr_e('منو', 'donya-ai'); ?>" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>

    <div id="content" class="site-content">

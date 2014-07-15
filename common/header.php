<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
        <?php if ($description = option('description')): ?>
        <meta name="description" content="<?php echo $description; ?>" />
        <?php endif; ?>

        <?php
        if (isset($title)) {
            $titleParts[] = strip_formatting($title);
        }
        $titleParts[] = option('site_title');
        ?>
            <title><?php echo implode(' &middot; ', $titleParts); ?></title>

        <?php echo auto_discovery_link_tags(); ?>

        <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>
        <!-- Stylesheets -->
        <?php queue_css_file(array('iconfonts', 'style')); ?>

        <!-- NAL header styles -->
        <?php queue_css_file('nal_header'); ?>


        <!-- Local plugin styles -->
        <?php queue_css_file('exhibit_local'); ?>
        <?php queue_css_file('nlmaps_local'); ?>
        <?php queue_css_file('nltime_local'); ?>
        <?php echo head_css(); ?>


        <!-- JavaScripts -->
        <?php queue_js_file('vendor/modernizr'); ?>
        <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
        <?php queue_js_file('vendor/respond'); ?>
        <?php queue_js_file('globals'); ?>
        <?php echo head_js(); ?>


        <?php echo head_js(); ?>
        <base target="_parent" />
    </head>

    <?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>

    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="white-wrapper">
        <header id="header-back">
            <!-- Begin NAL main header -->
                 <header class="header" id="header" role="banner">

                    <div id="header_logo_site_info">
                        <div class="logo-col">
                            <a href="http://www.nal.usda.gov/" title="United States Department of Agriculture" class="header__logo" id="logo" target="_blank">
                            <img src="http://www.nal.usda.gov/sites/all/themes/nal/images/usdalogocolor.png" alt="United States Department of Agriculture" class="header__logo-image">
                            </a>
                        </div>

                        <div class="header__name-and-slogan" id="name-and-slogan">
                            <div>
                                <h1 class="header__site-name" id="site-name">
                                <a href="http://www.nal.usda.gov/" title="National Agricultural Library" class="header__site-link" rel="home" target="_blank">
                                    <span>National Agricultural Library</span>
                                </a>
                                </h1>
                            </div>

                            <div>
                                <h2 class="header__site-slogan" id="site-slogan">
                                <a href="http://www.nal.usda.gov/" title="United States Department of Agriculture" target="_blank">
                                    <span>United States Department of Agriculture</span>
                                </a>
                                </h2>
                            </div>
                        </div>
                        <!-- /#name-and-slogan -->

                    </div>

                    <div id="sub-nav-container">
                        <nav class="header__secondary-menu" id="sub-links" role="navigation">
                        <ul id="secondary-menu-sub-links" class="links inline clearfix">
                        <li class="menu-432 first"><a target="_blank" href="http://www.nal.usda.gov/ask-question" title="Ask a Question" id="ask">Ask</a>
                        </li>
                        <li class="menu-433"><a target="_blank" href="http://www.nal.usda.gov/contact-us" title="Contact Us" id="contact">Contact</a>
                        </li>
                        <li class="menu-434 last"><a target="_blank" href="http://www.nal.usda.gov/visit-library" title="Visit the Library" id="visit">Visit</a>
                        </li>
                        </ul>
                        </nav>
                     </div>
                </header>
            <!-- End NAL main header -->

            <!-- Bread crumbs -->
            <span class="breadcrumbs"> <a href="http://nal.usda.gov">National Agricultural Library</a> &gt; <a href="http://specialcollections.nal.usda.gov/" title="Special Collections at the National Agricultural Library">Special Collections</a> &gt; <a href="http://specialcollections.nal.usda.gov/exhibits-0" title="Special Collections Online Exhibits Page">Exhibits</a> &gt; The Merrigan Collection</span>
            
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

            <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>

            <div id="search-container">
                <h2>Search</h2>
                <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                <?php echo search_form(array('show_advanced' => true)); ?>
                <?php else: ?>
                <?php echo search_form(); ?>
                <?php endif; ?>
            </div>
        </header>

        <div id="primary-nav">
            <?php echo public_nav_main(); ?>
        </div>

        <div id="mobile-nav">
            <?php echo public_nav_main(); ?>
        </div>

        <?php echo theme_header_image(); ?>

        <div id="content">
        <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>

<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">

<head>
    <meta charset="utf-8">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    
    <title><?php echo option('site_title'); echo isset($title) ? ' | ' . strip_formatting($title) : ''; ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_theme_header'); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_file('style');
    echo head_css(); 
    ?>
    <!-- JavaScripts -->
    <?php echo head_js(); ?>
</head>
<?php //echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<?php echo body_tag(array('id'=>@$bodyid, 'class'=>@$bodyclass)); ?>
    <?php fire_plugin_hook('public_theme_body',array('view'=>$this)); ?>
    	<div id="wrap">
    
    		<div id="header">
    		<?php fire_plugin_hook('public_theme_page_header'); ?>
    		<div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>
    		
    			<div id="search-container">
    				    <h2>Search</h2>
    				    <?php echo search_form(); ?>
        			</div>
        </div>	
    		
    		    <?php fire_plugin_hook('public_theme_page_content'); ?>
    			<div id="primary-nav">
        			
        			    <?php echo public_nav_main(); ?>

    			</div>
    		<div id="content">
    
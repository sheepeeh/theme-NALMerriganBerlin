
<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <p class="homepage-text"><?php echo $homepageText; ?></p>
    <?php endif; ?>
<div id="primary">
    <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Item') == 1): ?>
    <!-- Featured Item -->
    <div id="featured-item">
        <h2><?php echo __('Featured Item'); ?></h2>
        <?php echo random_featured_items(1); ?>
    </div><!--end featured-item-->
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Collection')): ?>
    <!-- Featured Collection -->
    <div id="featured-collection">
        <h2><?php echo __('Featured Collection'); ?></h2>
        <?php echo random_featured_collection(); ?>
    </div><!-- end featured collection -->
    <?php endif; ?>


</div><!-- end primary -->

<div id="secondary">
    <?php
    $recentItems = get_theme_option('Homepage Recent Items');
    if ($recentItems === null || $recentItems === ''):
        $recentItems = 3;
    else:
        $recentItems = (int) $recentItems;
    endif;
    if ($recentItems):
    ?>
    <div id="recent-items">
        <h2><?php echo __('Recently Added Items'); ?></h2>
        <?php
        $homepageRecentItems = (int)get_theme_option('Homepage Recent Items') ? get_theme_option('Homepage Recent Items') : '3';
        set_loop_records('items', get_item_obj(array('recent' => true, 'type' => 'Text'),$homepageRecentItems));
        if (has_loop_records('items')):
        ?>
        <ul class="items-list">
        <?php foreach (loop('items') as $item): ?>
        
	        <li class="item">

	            <?php if (metadata('item', 'has thumbnail')): ?>
	                <?php echo files_for_item(array('item_image' => 'square_thumbnail', 'imgAttributes' => array('alt' => 'Thumbnail for the first content page of the item, linking to the full file.' ))); ?>
	            <?php endif; ?>
	            <h3><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title'), array('snippet'=>150)), array('class'=>'permalink')); ?></h3>
	        </li>

        <?php endforeach; ?>
        </ul>
        <?php else: ?>
        <p><?php echo __('No recent items available.'); ?></p>
        <?php endif; ?>
        <p class="view-items-link"><a href="<?php echo url('items/browse'); ?>">View All Items</a></p>
    </div><!-- end recent-items -->
   <?php endif; ?>
    
    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

</div><!-- end secondary -->
<?php echo foot(); ?>
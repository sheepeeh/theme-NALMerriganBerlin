<?php   

    $head = array('title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
        'bodyclass' => 'exhibits show'
    );

    $pg_title = metadata('exhibit_page', 'title');
    
    if ($pg_title == 'Gallery Only' || $pg_title == 'Selected Documents') {
        queue_css_file('gal');
        echo head_css();
    } elseif  ($pg_title == 'Text and Gallery') {
        queue_css_file('t-gal2');
        echo head_css();
    } elseif ($pg_title == 'Development Documents' || $pg_title == 'Implementation Documents') {
        queue_css_file('gal');
        echo head_css();
    }
    
    echo head($head);

?>

<nav id="exhibit-pages">
    <?php echo exhibit_builder_page_nav(); ?>
    <br />
</nav>

<h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></h1>

<nav id="exhibit-child-pages">
    <?php echo exhibit_builder_child_page_nav(); ?>
</nav>

<?php exhibit_builder_render_exhibit_page(); ?>
<!--
<div id="exhibit-page-navigation">
    <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
    <div id="exhibit-nav-prev">
    <?php echo $prevLink; ?>
    </div>
    <?php endif; ?>
<?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
    <div id="exhibit-nav-next">
    <?php echo $nextLink; ?>
    </div>
    <?php endif; ?> 
<div id="exhibit-nav-up">
    <?php echo exhibit_builder_page_trail(); ?>
    </div> 
</div>-->

<?php echo foot(); ?>

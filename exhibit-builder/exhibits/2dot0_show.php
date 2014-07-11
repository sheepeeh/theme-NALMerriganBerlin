<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>

<nav id="exhibit-pages">
    <?php echo exhibit_builder_page_nav(); ?>
</nav>
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
	
<!-- This is commented out to suppress displaying the page title between prev/nav links -->
 <?php endif; ?>
 <!--   <div id="exhibit-nav-up">
    <?php echo exhibit_builder_page_trail(); ?>
    </div> -->
</div>
<!-- This is here to fix weird title formatting from removing the above text -->
<div><p>&nbsp;</p></div>

<h1 style="clear:both;" id="exhibit-page-title"><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></h1>

<nav id="exhibit-child-pages">
    <?php echo exhibit_builder_child_page_nav(); ?>
</nav>

<?php exhibit_builder_render_exhibit_page(); ?>

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
    <!--<div id="exhibit-nav-up">
    <?php echo exhibit_builder_page_trail(); ?>
    </div>-->
</div>

<?php echo foot(); ?>

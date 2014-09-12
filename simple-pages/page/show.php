<?php echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => 'page simple-page',
    'bodyid' => metadata('simple_pages_page', 'slug')
)); ?>
<div id="primary">
     <?php if (metadata('simple_pages_page', 'slug') == 'about'): ?>
        <?php
            $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
            if (metadata('simple_pages_page', 'use_tiny_mce')) {
                echo $text;
            } else {
                echo eval('?>' . $text);
            }
        ?>
    <?php else: ?>
        <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
        <?php
            $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
            echo $this->shortcodes($text);
        ?>
    <?php endif; ?>
</div>

<?php echo foot(); ?>

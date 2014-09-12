<div class="item record">
    <?php
    $title = metadata($item, array('Dublin Core', 'Title'),array('snippet' => '75'));
    $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 200));
    ?>
<h3><?php echo link_to($item, 'show', strip_formatting($title)); ?></h3>
<div class="featured-image">
<?php if (metadata($item, 'has files')) {
            echo link_to_item(
                item_image('square_thumbnail', array(), 0, $item),
                array('class' => 'image'), 'show', $item
            );
        }
        ?>
</div>
<?php if ($description): ?>
<p class="item-description"><?php echo $description; ?></p>
<?php endif; ?>
</div>

<div style="float:right;clear:both;margin-bottom:-20px;"><p>
	<?php print_num_of_count($item->id); ?>
</p></div>

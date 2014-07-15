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
	<?php 
		if ($item->id == 5434) {
			echo "<strong>1</strong> of <a href='/exhibits/merrigan/items/browse?search=&advanced[0][element_id]=&advanced[0][type]=&advanced[0][terms]=&range=&collection=&type=&user=&tags=&public=&featured=1&exhibit=&submit_search=Search+for+items' title='View all featured items'>3</a>";
		}
		elseif ($item->id == 4303) {
			echo "<strong>2</strong> of <a href='/exhibits/merrigan/items/browse?search=&advanced[0][element_id]=&advanced[0][type]=&advanced[0][terms]=&range=&collection=&type=&user=&tags=&public=&featured=1&exhibit=&submit_search=Search+for+items' title='View all featured items'>3</a>";
		}
		else {
			echo "<strong>3</strong> of <a href='/exhibits/merrigan/items/browse?search=&advanced[0][element_id]=&advanced[0][type]=&advanced[0][terms]=&range=&collection=&type=&user=&tags=&public=&featured=1&exhibit=&submit_search=Search+for+items' title='View all featured items'>3</a>";
		}
?>
</p></div>

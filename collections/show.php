<?php
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
if ($collectionTitle == '') {
    $collectionTitle = __('[Untitled]');
}
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>

<h1><?php echo $collectionTitle; ?></h1>

<?php if ($description = metadata('collection', array('Dublin Core', 'Description'),array('index' => 0))): ?>
    <?php echo $description; ?>
<?php endif; ?>
<?php if ($description = metadata('collection', array('Dublin Core', 'Description'),array('index' => 1))): ?>
    <?php echo $description; ?>
<?php endif; ?>

<div id="collection-items">
    <h2><?php echo link_to_items_browse(__('Sample items from %s', $collectionTitle), array('collection' => metadata('collection', 'id'),'sort_field' => "Dublin Core,Identifier",'sort_order' => 'desc')); ?></h2>
    <p style="text-align:right;clear:both;"><?php echo link_to_items_browse("View all items in this series.", array('collection' => metadata('collection', 'id'),'sort_field' => "Dublin Core,Identifier",'sort_order' => 'desc')); ?><br /></p>
      <?php if (metadata('collection', 'total_items') > 0): ?>
        <?php foreach (loop('items') as $item): ?>
        <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
        <div class="item hentry">
            <div class="item-title"><h3><?php echo link_to_item($itemTitle, array('class'=>'permalink')); ?></h3></div>

            <?php if (metadata('item', 'has thumbnail')): ?>
            <div class="item-img">
                <?php echo link_to_item(item_image('square_thumbnail', array('alt' => $itemTitle))); ?>
            </div>
            <?php endif; ?>
       </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p><?php echo __("There are currently no items within this collection."); ?></p>
    <?php endif; ?>
<p style="text-align:right;clear:both;"><?php echo link_to_items_browse("View all items in this series.", array('collection' => metadata('collection', 'id'),'sort_field' => "Dublin Core,Identifier",'sort_order' => 'desc')); ?></p>    
</div><!-- end collection-items -->



<?php echo foot(); ?>

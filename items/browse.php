<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<?php parse_str($_SERVER['QUERY_STRING'], $queryarray); ?>

<?php if (array_key_exists('collection',$queryarray) && $queryarray['collection'] != ''): ?>

    <?php
       $db = get_db();
       $collection = $db->getTable('Collection')->find($queryarray['collection']);
       $collectionTitle = strip_formatting(metadata($collection, array('Dublin Core', 'Title')));
      if ($collectionTitle == '') {
          $collectionTitle = __('[Untitled]');
      }
      ?>

     <h1><?php echo $collectionTitle; ?></h1>

      <?php if ($description = metadata($collection, array('Dublin Core', 'Description'),array('index' => 0))): ?>
          <?php echo $description; ?>
      <?php endif; ?>
      <?php if ($description = metadata($collection, array('Dublin Core', 'Description'),array('index' => 1))): ?>
          <?php echo $description; ?>
      <?php endif; ?>
<?php endif; ?>

<h3><?php echo __('%s Items', $total_results); ?></h3>
<p class="disclaimer">Please note that full-text search is only available for items which have successfully had their text extracted. Due to the nature of the materials, many documents are not OCR-compatible.</p>

<?php echo pagination_links(); ?>

<?php echo item_search_filters(); ?>

<?php if ($total_results > 0): ?>

<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Contributor')] = 'Dublin Core,Contributor';
$sortLinks[__('Date')] = 'Dublin Core,Date';
?>
<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>

<?php endif; ?>


<?php foreach (loop('items') as $item): ?>
<div class="item hentry">
    <div class="item-meta">
    <?php
      // Preserve query when browsing items from search results.

        if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']))
        {

            $searchlink = record_url('item').'?' . $_SERVER['QUERY_STRING'];

            echo '<div><h3><a href="'.$searchlink.'">'. metadata('item', array('Dublin Core','Title')).'</a></h3></div>';
        }

        else
        {
            echo '<h3>'.link_to_item(metadata('item', array('Dublin Core','Title'), array('snippet'=>150)), array('class'=>'permalink')).'</h3>';
        }
    ?>

      


    <?php if (metadata('item', 'has thumbnail')): ?>
    <div class="item-img">
            <?php echo files_for_item(array('item_image' => 'square_thumbnail', 'imgAttributes' => array('alt' => 'Thumbnail for the first content page of the item, linking to the full file.' ) ) ); ?>
    </div>
    <?php endif; ?>
    

    <div class="item-details">
    <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
    <div class="item-description"><p><strong><?php echo __('Description'); ?>:</strong>
        <?php echo $description . '</p>'; ?>
    </div>
    <?php endif; ?>

    <?php if ($contributor = metadata('item', array('Dublin Core', 'Contributor'))): ?>
    <div class="item-contributor"><p><strong><?php echo __('Contributors'); ?>:</strong>
           <?php if (count(metadata('item', array('Dublin Core', 'Contributor'), array('all' => true))) > 1): ?>
               <?php  $contrib = metadata('item', array('Dublin Core', 'Contributor'), array('all' => true)); ?>
               <?php $count = sizeof($contrib);?>
               <?php foreach ($contrib as $c): ?>
                  <?php if ($count > 1): ?>
                        <?php  echo "$c, "; ?>
                        <?php $count -= 1; ?>
                  <?php else: ?>
                        <?php  echo "$c"; ?>
                    <?php endif; ?>
               <?php endforeach; ?>

           <?php else: ?>
                <?php echo $contributor . '</p>'; ?>
           <?php endif; ?>
    </div>
    <?php endif; ?>


    <?php if ($date = metadata('item', array('Dublin Core', 'Date'))): ?>
    <div class="item-date"><p><strong><?php echo __('Date'); ?>:</strong>
        <?php if (count(metadata('item', array('Dublin Core', 'Date'), array('all' => true))) > 1): ?>
               <?php  $dates = metadata('item', array('Dublin Core', 'Date'), array('all' => true)); ?>
               <?php $count = sizeof($dates);?>
               <?php foreach ($dates as $d): ?>
                  <?php if ($count > 1): ?>
                        <?php  echo "$d, "; ?>
                        <?php $count -= 1; ?>
                  <?php else: ?>
                        <?php  echo "$d"; ?>
                    <?php endif; ?>
               <?php endforeach; ?>

           <?php else: ?>
                <?php echo $date . '</p>'; ?>
           <?php endif; ?>
    </div>
    <?php endif; ?>
    </div>

 <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

  </div><!-- end class="item-meta" -->
</div><!-- end class="item hentry" -->
<?php endforeach; ?>


<?php echo pagination_links(); ?>

<div id="outputs">
  <span class="outputs-label"><?php echo __('Output Formats for Search Results'); ?></span>
  <?php echo output_format_list(false); ?>
</div>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>
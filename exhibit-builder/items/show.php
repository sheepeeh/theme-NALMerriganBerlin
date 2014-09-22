<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<div> 
	<ul class="item-pagination navigation">
      <?php custom_paging(); ?>
    </ul>
</div>
<div><h1 id="show-item-title"><?php echo metadata('item', array('Dublin Core','Title')); ?></h1></div>
<div id="primary-show">


   <!-- Items File -->
   <?php if (metadata('item', 'has files')): ?>
    <div id="itemfiles" class="element">
        <div class="element-text"><?php echo files_for_item( array ('imgAttributes' => array('alt' => 'Thumbnail for the first content page of the item, linking to the full file.' ), 'imageSize' => 'fullsize' ) ); ?></div>
    </div>

  <?php elseif (!metadata('item', 'has files') && metadata('item','Item Type Name') == 'Physical Object'): ?>

    <div id="itemfiles" class="element">
        <div class="element-text"><img src="<?php echo url('/files/theme_uploads/binder_fallback.png'); ?>" alt="Placeholder image for a physical object."></div>
    </div>
<?php endif; ?>


<!-- Prints link to view file  metadata -->
 <div class="element">
       <?php if (metadata('item', 'has files')): ?>
         <h3><?php echo __('View File Metadata') ?></h3>
          <div class="element text">
             <?php foreach (loop('files', $this->item->Files) as $file): ?>
                <?php 
                     $fileTitle = metadata('file', 'original filename');
                     $fileTitle = basename($fileTitle);
                echo link_to_file_show(array('class'=>'show', 'title'=>__("$fileTitle")), $fileTitle); ?>
                <br />
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>


 <!-- The following prints a citation for this item. -->
<div id="item-citation" class="element">
  <h3><?php echo __('Citation'); ?></h3>
  <div class="element-text"><?php echo metadata('item','citation',array('no_escape'=>true)); ?></div>
</div>



</div> <!-- End of Primary. -->

<!-- Begin Dublin Core. -->
<div id="secondary-show">
  <div id="item-metadata">
     <?php echo all_element_texts('item'); ?>
      
      <?php if(metadata('item','Collection Name')): ?>
        <div id="collection" class="element">
          <h3><?php echo __('Series'); ?></h3>
          <div class="element-text"><?php echo link_to_collection_for_item(); ?></div>
        </div>
      <?php endif; ?>


        <?php echo link_to_related_exhibits($item); ?>
      

     <?php echo get_specific_plugin_hook_output('ItemRelations', 'public_items_show', array('view' => $this, 'item' => $item)); ?>
     

 

 </div>

<?php echo get_specific_plugin_hook_output('Coins', 'public_items_show', array('view' => $this, 'item' => $item)); ?>

<!-- End of Secondary. -->


<?php echo foot(); ?>

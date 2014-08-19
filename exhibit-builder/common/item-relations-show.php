<div id="item-relations-display-item-relations" class="element">

    <?php if (!$subjectRelations && !$objectRelations): ?>
    
    <?php else: ?>

        <h3>Related Items</h3>

        <?php foreach ($subjectRelations as $subjectRelation): ?>
            <div class="element-text">
               <?php if ($subjectRelation['relation_text'] == "Has Part" && $subjectRelation['object_item_id'] != metadata('item','id')): ?>
                <ul>
                    <li><a href="<?php echo url('items/show/' . $subjectRelation['object_item_id']); ?>"><?php echo $subjectRelation['object_item_title']; ?></a> was originally a part of this item.</li>
                </ul>

                <?php else: ?>
                    This item was originally a part of <a href="<?php echo url('items/show/' . $subjectRelation['object_item_id']); ?>"><?php echo $subjectRelation['object_item_title']; ?></a>
                <?php endif; ?>
            </div>

        <?php endforeach; ?>
        
        <?php foreach ($objectRelations as $objectRelation): ?>
            <div class="element-text">
             <?php if ($objectRelation['relation_text'] == "Has Part" && $objectRelation['object_item_id'] != metadata('item','id')): ?>
                This item was originally a part of <a href="<?php echo url('items/show/' . $objectRelation['subject_item_id']); ?>"><?php echo $objectRelation['subject_item_title']; ?></a>
                

                <?php else: ?>

            <ul>
                <li><a href="<?php echo url('items/show/' . $objectRelation['subject_item_id']); ?>"><?php echo $objectRelation['subject_item_title']; ?></a> was originally a part of this item.</li>
            </ul>
            <?php endif; ?> 
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
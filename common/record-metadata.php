<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
    <div class="element-set">
    <?php if ($setName != ('Dublin Core' or 'Text Item Type Metadata')): ?>
      <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>       
        
        <?php
            $customName = null;

            // Make Box and Folder print on the same line
            if ($elementName == 'Box'):
                $customName = "<div class='shelfLoc' style='width:200px;'><div class='boxLoc' style='float:left; margin-bottom:1.5em;'><h3>Box</h3>";
            elseif ($elementName == 'Folder'):
                $customName = "<div class='folderLoc' style='float:right;'><h3>Folder</h3>";
            endif;
            ?>

        <?php if ($customName): ?>
            <?php echo $customName; ?>
            <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>">
            <?php else: ?>
            <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
            <h3><?php echo html_escape(__($elementName)); ?></h3>
        <?php endif; ?>

        <?php foreach ($elementInfo['texts'] as $text): ?>


        <?php
        $customText = null;
        // Close shelfLoc divs
        if ($elementName == 'Box'):
            $customText = "$text</div>";
        elseif ($elementName == 'Folder'):
            $customText = "$text</a></div></div>";

        // Make Table of Contents an unordered list
        elseif ($elementName == 'Table of Contents'):
            $customText = "<ul class='toc'><li>$text</li></ul>";

        // Make rights statement link to contact page
         elseif ($elementName == 'Rights'):
            $customText = "<a href='http://specialcollections.nal.usda.gov/contact-us-0'>$text</a>";
        
        endif;
        
        ?>



        <div class="element-text">
            <?php

                if ($elementName == 'Coverage') {
                   $pos = preg_match("/POINT\(/",$text);
                } else {
                    $pos = false;
                }
            ?>
            <?php if ($customText): ?>
                <?php echo $customText; ?>
            <?php elseif ($pos!=true): ?>
              
                <?php echo $text; ?>

            <?php else: ?>
            <?php endif; ?>
            
        </div>
        <?php endforeach; ?>
        </div><!-- end element -->
    <?php endforeach; ?>
    </div><!-- end element-set -->
<?php endforeach;

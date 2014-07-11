<?php
    $fileTitle = metadata('file', array('Dublin Core', 'Title')) ? strip_formatting(metadata('file', array('Dublin Core', 'Title'))) : metadata('file', 'original filename');

    if ($fileTitle != '') {
        $fileTitleOnly = $fileTitle;
        $fileTitle = ':' .basename($fileTitle);
    } else {
        $fileTitle = '';
    }
    $fileTitle = __('File #%s', metadata('file', 'id')) . $fileTitle;
?>
<?php echo head(array('title' => $fileTitle, 'bodyclass'=>'files show primary-secondary')); ?>


<h2><?php echo $fileTitle; ?></h2>


<div id="primary" style="float: left; width: 310px; margin-left:20px;">
    <?php echo file_markup($file, array('imageSize'=>'fullsize')); ?>
<<<<<<< HEAD
=======
    
>>>>>>> origin/refactoring/integration
</div>


<aside id="show-file-metadata">
    <!-- begin format-metadata -->
    <div id="format-metadata">
        <h2><?php echo __('Format Metadata'); ?></h2>
        <div id="original-filename" class="element">
            <h3><?php echo __('Original Filename'); ?></h3>
            <div class="element-text">
                <?php 
                $fileBasename = metadata('file', 'Original Filename'); 
                $fileBasename = basename($fileBasename);
                echo $fileBasename;
                ?></div>
        </div>
    
        <div id="file-size" class="element">
            <h3><?php echo __('File Size'); ?></h3>
            <div class="element-text"><?php echo __('%s bytes', metadata('file', 'Size')); ?></div>
        </div>

        <div id="authentication" class="element">
            <h3><?php echo __('Checksum'); ?></h3>
            <div class="element-text"><?php echo metadata('file', 'Authentication'); ?></div>
        </div>
    </div><!-- end format-metadata -->
    
    <!-- begin type-metadata -->
    <div id="type-metadata" class="section">
        <h2><?php echo __('Type Metadata'); ?></h2>
        <div id="mime-type-browser" class="element">
            <h3><?php echo __('Mime Type'); ?></h3>
            <div class="element-text"><?php echo metadata('file', 'MIME Type'); ?></div>
        </div>
        <div id="file-type-os" class="element">
            <h3><?php echo __('File Type / OS'); ?></h3>
            <div class="element-text"><?php echo metadata('file', 'Type OS'); ?></div>
        </div>
        
    </div><!-- end type-metadata -->





</aside>
<?php echo foot();?>

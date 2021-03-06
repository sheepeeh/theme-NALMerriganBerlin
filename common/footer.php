</div><!-- end content -->
<!--Return to sending page -->



<footer>
    <div class="previous-page">
    <?php echo to_previous() ?>
    </div>
    <div id="footer-content" class="center-div">
        <?php if($footerText = get_theme_option('Footer Text')): ?>
        <div id="custom-footer-text">
            <p><?php echo get_theme_option('Footer Text'); ?></p>
        </div>
        <?php endif; ?>
        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
        <?php endif; ?>
        <!-- Begin NAL Footer -->


        <div id="footer-panels-wrapper">
            <div class="region region-footer-first">
                <div id="block-block-4" class="block block-block first last odd">


                    <div id="footer-links" class="navigation">
                        <a href="http://www.nal.usda.gov" target="_blank">NAL Home</a> | <a href="http://www.usda.gov" target="_blank">USDA.gov</a> | <a href="http://www.ars.usda.gov" target="_blank">Agricultural Research Service</a> | <a href="http://www.ars.usda.gov/Services/docs.htm?docid=1398" target="_blank">FOIA</a> | <a href="http://www.usda.gov/wps/portal/usda/usdahome?navtype=FT&amp;navid=ACCESSIBILITY_STATEM" target="_blank">Accessibility Statement</a> 
                        <br>
                        <br><a href="http://www.ars.usda.gov/Main/docs.htm?docid=8040" target="_blank">Information Quality</a> | <a href="http://www.ars.usda.gov/disclaim.html#Privacy" target="_blank">Privacy Policy</a> | <a href="http://www.usda.gov/wps/portal/usda/usdahome?navtype=FT&amp;navid=NON_DISCRIMINATION" target="_blank">Non-Discrimination Statement</a> | <a class="ext" href="http://www.usa.gov" target="_blank">USA.gov</a>
                        <span class="ext"></span>| <a class="ext" href="http://www.whitehouse.gov" target="_blank">White House</a>
                        <span class="ext"></span>
                    </div>

                </div>
            </div>
        </div>

        <footer id="footer" class="region region-footer">
            <div id="block-block-7" class="block block-block first last odd">


                <div id="footer-address" class="navigation">National Agricultural Library &nbsp;&nbsp;&nbsp; 10301 Baltimore Avenue &nbsp;&nbsp;&nbsp; Beltsville, MD 20705 &nbsp;&nbsp;&nbsp; 301-504-5755</div>

            </div>
        </footer>
        <!-- End NAL Footer -->

        

    </div><!-- end footer-content -->

     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.showAdvancedForm();
               Omeka.dropDown();
    });
</script>

</body>

</html>

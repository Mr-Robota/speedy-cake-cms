<div id="imageGallery" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3><?php echo __('Images'); ?></h3>
    </div>
    <div class="modal-body" style="overflow:hidden">
    	<iframe src="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/articles/imagegallery" frameborder="0" width="100%" height="500" scrolling="yes"></iframe>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><?php echo __('Close'); ?></button>
    </div>
</div>
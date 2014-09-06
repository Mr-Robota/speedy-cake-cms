<div id="deleteImageSrcModal" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3><?php echo __('Confirm'); ?></h3>
    </div>
    <div class="modal-body">
    	<p><?php echo __('Sure you want to delete this image?'); ?></p>
    </div>
    <div class="modal-footer">
    	<button class="btn btn-success" onclick="javascript:deleteImageSrc('<?php echo $id; ?>');"><?php echo __('Yes'); ?></button>
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
    </div>
</div>
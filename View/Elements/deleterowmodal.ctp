<div id="deleteRowModal" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3><?php echo __('Confirm'); ?></h3>
    </div>
    <div class="modal-body">
    	<p><?php echo __('Sure you want to delete this item?'); ?></p>
    </div>
    <div class="modal-footer">
    	<button class="btn btn-success" onclick="javascript:goDeleteRow('<?php echo Configure::read('SpeedyCake.url'); ?>');"><?php echo __('Yes'); ?></button>
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
        <input type="hidden" id="idRow" value="0" />
        <input type="hidden" id="controllerRow" value="" />
    </div>
</div>
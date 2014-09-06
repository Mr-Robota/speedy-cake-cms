<script type="text/javascript">
	
$(document).ready(function() {
	
	$("#btnAdd").click(function() {
		var data = parent.CKEDITOR.instances.content.getData();
		data += '<img src="<?php echo $file; ?>">';
		parent.CKEDITOR.instances.content.setData(data);
		parent.closeUpload();
	});
	
	
});

</script>
<div class="row-fluid" style="margin-top:20px">
    <div class="span12">
        <div class="well">
            <div class="row-fluid text-center">
            	<div class="span12">
                    <p>
					 <?php 
					
						echo $this->Form->button('<i class="icon-arrow-down icon-white"></i> ' .__('Add to Editor'),array(
							'id'=>'btnAdd',
							'type'=>'button',
							'class'=>'btn btn-inverse btn-block btn-large'
						)); 
						
						?>
					</p>
                    <p><a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/articles/uploader" class="btn btn-inverse"><i class="icon-arrow-up icon-white"></i> <?php echo __('New Upload'); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
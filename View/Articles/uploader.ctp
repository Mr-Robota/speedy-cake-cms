<script type="text/javascript">
	
$(document).ready(function() {
	
	$("#btnUpload").click(function() {
		
		var submitForm = true;
		
		$('#loader').hide();
		parent.$('#mainModal').hide();
		
		var title = $('#title').val();
		var newfile = $('#ArticleNewfile').val();
		
		if (title=="") {
			submitForm = false;
			parent.$('#modalMessage').html("<?php echo __('Insert title.'); ?>");
			parent.$('#mainModal').modal('show');
		}
		
		if (newfile=="") {
			submitForm = false;
			parent.$('#modalMessage').html("<?php echo __('Choose file.'); ?>");
			parent.$('#mainModal').modal('show');	
		}
		
		if (newfile!="" && !isValidImage(newfile)) {
			submitForm = false;
			parent.$('#modalMessage').html("<?php echo __('Choose file JPG, GIF or PNG.'); ?>");
			parent.$('#mainModal').modal('show');		
		}
		
		
		if (!submitForm) {
			$('#loader').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#ArticleUploaderForm').submit();	
		}
		
	});
	
	
});

</script>
<div class="row-fluid" style="margin-top:20px">
    <div class="span12">
        <div class="well">
        	<?php echo $this->Form->create('Article',array('action' => 'uploader','type'=>'file')); ?>
            <div class="row-fluid">
                <div class="span12">
                    <p><strong><?php echo __('Title'); ?></strong></p>
                    <?php 
                        
                      echo $this->Form->input('title',array(
                          'id'=>'title',
                          'type'=>'text',
                          'class'=>'input-block-level',
                          'label'=>false,
                          'div'=>false
                      )); 
                      
                    ?>
                </div>
            </div>
            <div class="row-fluid">
            	<div class="span12">
                	<p><?php echo $this->Form->file('newfile',array('title'=>__('Choose image file'))); ?></p>
                    <p>
                    <?php 
					
					echo $this->Form->button('<i class="icon-arrow-up icon-white"></i> ' .__('Upload'),array(
						'id'=>'btnUpload',
						'type'=>'button',
						'class'=>'btn btn-inverse btn-block btn-large'
					)); 
					
					?>
                    </p>
                </div>
            </div>
            <div class="row-fluid text-center">
				<div class="span12">
                	<p>&nbsp;</p>
					<?php echo $this->Html->image('loader.gif', array('alt' => 'Wait...', 'title'=>'Wait...','style'=>'display:none;','id'=>'loader')); ?>
				</div>
			</div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
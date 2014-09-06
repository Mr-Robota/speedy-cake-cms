<script type="text/javascript">
	
$(document).ready(function() {
	
	$('#title').focus();
	
	$('#title').keypress(function(e) {
		
		if (e.which == 13) $("#btnSave").click();
		
	});
	
	$("#btnSave").click(function() {
		
		var submitForm = true;
		
		$('#loader').hide();
		$('#mainModal').hide();
		
		var title = $('#title').val();
		var newfile = $('#FileNewfile').val();
		
		if (title=="") {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert title.'); ?>");
			$('#mainModal').modal('show');
		}
		
		if (newfile!="" && !isValidImage(newfile)) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Choose file JPG, GIF or PNG.'); ?>");
			$('#mainModal').modal('show');		
		}
		
		if (!submitForm) {
			$('#loader').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#FileEditForm').submit();	
		}
		
	});
	
});

</script>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<?php echo $this->Form->create('File',array('action' => 'edit','type'=>'file')); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Edit Image'); ?></h1>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Title'); ?></strong></p>
                <?php 
					
				  echo $this->Form->input('title',array(
					  'id'=>'title',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$title,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
            <div class="span12">
                <p>
				<?php 
				
				echo $this->Form->file('newfile',array(
					'title'=>'<i class="icon-picture"></i> ' .__('Edit Image')
				));
				
				if ($oldUrl!="") echo '<p><img width="100" class="thumbnail" src="' .$oldUrl .'"></p>';
				
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
            
			<div class="row-fluid">
				<div class="span12">
					<p>&nbsp;</p>
					<?php 
					
					echo $this->Form->button('<i class="icon-ok icon-white"></i> ' .__('Save'),array(
						'id'=>'btnSave',
						'type'=>'button',
						'class'=>'btn btn-large btn-inverse'
					));
					
					echo $this->Form->input('id',array(
						'id'=>'id',
						'type'=>'hidden',
						'value'=>$id
					));
					
					echo $this->Form->input('oldUrl',array(
						'id'=>'oldUrl',
						'type'=>'hidden',
						'value'=>$oldUrl
					)); 
					
					?>
				</div>
			</div>
            
	</div>
    
</div>

<?php echo $this->Form->end(); ?>

</div>
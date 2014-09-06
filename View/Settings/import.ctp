<script type="text/javascript">
	
$(document).ready(function() {
	
	$('#sql').focus();
	
	$("#btnSave").click(function() {
		
		var submitForm = true;
		
		$('#loader').hide();
		$('#mainModal').hide();
		
		var sql = $('#sql').val();
		var file = $('#file').val();
	
		if (sql=="" && file=="") {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert SQL or choose file.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		if (file!="" && !isValidFileBackup(file)) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Choose file SQL or TXT.'); ?>");
			$('#mainModal').modal('show');		
		}
		
		
		if (!submitForm) {
			$('#loader').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#SettingImportForm').submit();	
		}
		
	});
	
	
});

</script>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<?php echo $this->Form->create('Setting',array('action' => 'import','type'=>'file')); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Import'); ?> Database</h1>
        
        <div class="row-fluid">
            <div class="span12">
                <p><strong>DB backup</strong></p>
                <?php 
				
				echo $this->Form->file('file',array(
					'id'=>'file',
					'title'=>'<i class="icon-hdd"></i> ' .__('Choose file')
				));
				
				?>
                <p>&nbsp;</p>
            </div>
        </div>
        
		<div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('or Paste SQL'); ?></strong></p>
                <?php 
					
				  echo $this->Form->input('sql',array(
					  'id'=>'sql',
					  'type'=>'textarea',
					  'rows'=>10,
					  'class'=>'input-block-level',
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
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
					
					echo $this->Form->button('<i class="icon-upload icon-white"></i> ' .__('Import'),array(
						'id'=>'btnSave',
						'type'=>'button',
						'class'=>'btn btn-large btn-inverse'
					)); 
					
					?>
				</div>
			</div>
            
	</div>
    
</div>

<?php echo $this->Form->end(); ?>

</div>
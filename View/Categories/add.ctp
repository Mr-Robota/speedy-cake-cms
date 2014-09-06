<script type="text/javascript">
	
$(document).ready(function() {
	
	$('#name').focus();
	
	$('#name').keypress(function(e) {
		
		if (e.which == 13) $("#btnSave").click();
		
	});
	
	$("#btnSave").click(function() {
		
		var submitForm = true;
		
		$('#loader').hide();
		$('#mainModal').hide();
		
		var name = $('#name').val();
		
		if (name=="") {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert name.'); ?>");
			$('#mainModal').modal('show');		
		}
		
		$.ajax({
		type: "POST",
		async: false,
		url: "<?php echo Configure::read('SpeedyCake.url'); ?>/admin/categories/nameIsUnique",
		data: { name: name}
		})
		.done(function(response) {
			if (parseInt(response)>0) {
				submitForm = false;
				$('#modalMessage').html("<?php echo __('Name already exists.'); ?>");
				$('#mainModal').modal('show');	
			}
		});
		
		if (!submitForm) {
			$('#loader').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#CategorieAddForm').submit();	
		}
		
	});
	
});

</script>

<?php echo $this->Form->create('Categorie',array('action' => 'add')); ?>
<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Add new category'); ?></h1>
        
        <div class="row-fluid marginTop20">
			<div class="span12">
				<p><strong><?php echo __('Name'); ?></strong></p>
                <?php 
					
				  echo $this->Form->input('name',array(
					  'id'=>'name',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				  echo $this->Form->input('silence_is_golden',array(
					  'id'=>'silence_is_golden',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'label'=>false,
					  'div'=>false,
					  'style'=>'display:none'
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
					
					echo $this->Form->button('<i class="icon-ok icon-white"></i> ' .__('Save'),array(
						'id'=>'btnSave',
						'type'=>'button',
						'class'=>'btn btn-large btn-inverse'
					)); 
					
					?>
				</div>
			</div>
            
	</div>
    
</div>

</div>

<?php echo $this->Form->end(); ?>
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
		
		
		if (!submitForm) {
			$('#loader').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#CategorieEditForm').submit();	
		}
		
	});
	
});

</script>

<?php echo $this->Form->create('Categorie',array('action' => 'edit')); ?>
<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Edit Category'); ?></h1>
        
        <div class="row-fluid">
        
			<div class="span12">
				<p><strong><?php echo __('Name'); ?></strong></p>
                <?php 
					
				  echo $this->Form->input('name',array(
					  'id'=>'name',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$name,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong>Slug - <span class="text-error"><?php echo __("edit it only if you're a God of the SEO"); ?> :)</span></strong></p>
                <?php 
					
				  echo $this->Form->input('slug',array(
					  'id'=>'slug',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$slug,
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
					
					?>
				</div>
			</div>
            
	</div>
    
</div>

</div>

<?php echo $this->Form->end(); ?>
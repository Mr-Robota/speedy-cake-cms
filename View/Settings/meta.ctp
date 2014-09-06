<script type="text/javascript">
	
$(document).ready(function() {
	
	$('#description').focus();
	
	$('#keywords').keypress(function(e) {
		
		if (e.which == 13) $("#btnSave").click();
		
	});
	
	$("#btnSave").click(function() {
		
		$('#loader').show();
		$('#SettingMetaForm').submit();	
		
	});
	
});

</script>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<?php echo $this->Form->create('Setting',array('action' => 'meta')); ?>

<div class="span9">

	<div class="well">
    
		<h1>Meta</h1>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Title'); ?></strong></p>
                <?php 
					
				  echo $this->Form->input('title',array(
					  'id'=>'title',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$tagTitle,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
		<div class="row-fluid">
			<div class="span12">
				<p><strong>Meta Description (max 160 chars)</strong></p>
                <?php 
					
				  echo $this->Form->input('description',array(
					  'id'=>'description',
					  'type'=>'textarea',
					  'maxlength'=>160,
					  'rows'=>5,
					  'class'=>'input-block-level',
					  'value'=>$description,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong>Meta Keywords</strong></p>
                <?php 
					
				  echo $this->Form->input('keywords',array(
					  'id'=>'keywords',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$keywords,
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
					
					?>
				</div>
			</div>
            
	</div>
    
</div>

<?php echo $this->Form->end(); ?>

</div>
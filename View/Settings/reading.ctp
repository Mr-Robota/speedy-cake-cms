<script type="text/javascript">
	
$(document).ready(function() {
	
	$("#btnSave").click(function() {
		
		var submitForm = true;
		
		$('#loader').hide();
		$('#mainModal').hide();
		
		if (!submitForm) {
			$('#loader').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#SettingReadingForm').submit();	
		}
		
	});
	
});

</script>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<?php echo $this->Form->create('Setting',array('action' => 'reading')); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Lettura'); ?></h1>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Text format'); ?></strong></p>
				<p>&nbsp;</p>
				<?php
            
                if ($text_format=="0") $default = 0; 
                if ($text_format=="1") $default = 1; 
                
                $options = array( 
                    0 => __('All text'),
                    1 => __('Excerpt')
                );
                
                echo $this->Form->select('text_format', $options, array(
                    'id'=>'text_format',
                    'default'=>$default,
                    'empty'=>false
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
<script type="text/javascript">
	
$(document).ready(function() {
	
	$("#btnSave").click(function() {
		
		$('#loader').show();
		$('#SettingWritingForm').submit();	
		
	});
	
});

</script>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<?php echo $this->Form->create('Setting',array('action' => 'writing')); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Writing'); ?></h1>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Convert textual emoticons in images'); ?></strong></p>
				<p>&nbsp;</p>
				<?php
            
                if ($convert_emoticons=="1") $default = 1; 
                if ($convert_emoticons=="0") $default = 0; 
                
                $options = array( 
                    1 => __('Yes'),
                    0 => "No"
                );
                
                echo $this->Form->select('convert_emoticons', $options, array(
                    'id'=>'convert_emoticons',
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
					<p></p>
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
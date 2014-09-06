<script type="text/javascript">
	
$(document).ready(function() {
	
	$('#facebook').focus();
	
	$('#youtube').keypress(function(e) {
		
		if (e.which == 13) $("#btnSave").click();
		
	});
	
	$("#btnSave").click(function() {
		
		$('#loader').show();
		$('#SettingSocialForm').submit();	
		
	});
	
});

</script>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<?php echo $this->Form->create('Setting',array('action' => 'social')); ?>

<div class="span9">

	<div class="well">
    
		<h1>Social</h1>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong>Open Graph</strong></p>
				<?php
            
                if ($opengraph=="1") $default = 1; 
                if ($opengraph=="0") $default = 0; 
                
                $options = array( 
                    1 => __('Active'),
                    0 => __('Inactive')
                );
                
                echo $this->Form->select('opengraph', $options, array(
                    'id'=>'opengraph',
                    'default'=>$default,
                    'empty'=>false
                ));
                
                ?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo $this->Html->image('facebook.png'); ?> <?php echo __('Facebook Profile'); ?> URL</strong></p>
                <?php 
					
				  echo $this->Form->input('facebook',array(
					  'id'=>'facebook',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$facebook,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
		<div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo $this->Html->image('google.png'); ?> <?php echo __('Google+ Profile'); ?> URL</strong></p>
                <?php 
					
				  echo $this->Form->input('google',array(
					  'id'=>'google',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$google,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo $this->Html->image('instagram.png'); ?> <?php echo __('Instagram Profile'); ?> URL</strong></p>
                <?php 
					
				  echo $this->Form->input('instagram',array(
					  'id'=>'instagram',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$instagram,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo $this->Html->image('linkedin.png'); ?> <?php echo __('LinkedIn Profile'); ?> URL</strong></p>
                <?php 
					
				  echo $this->Form->input('linkedin',array(
					  'id'=>'linkedin',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$linkedin,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo $this->Html->image('twitter.png'); ?> <?php echo __('Twitter Profile'); ?> URL</strong></p>
                <?php 
					
				  echo $this->Form->input('twitter',array(
					  'id'=>'twitter',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$twitter,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo $this->Html->image('youtube.png'); ?> <?php echo __('YouTube Channel'); ?> URL</strong></p>
                <?php 
					
				  echo $this->Form->input('youtube',array(
					  'id'=>'youtube',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$youtube,
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
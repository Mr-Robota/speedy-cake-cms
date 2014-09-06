<script type="text/javascript">
	
$(document).ready(function() {
	
	$('#email').focus();
	
	$('#email').keypress(function(e) {
		
		if (e.which == 13) $("#btnSend").click();
		
	});
	
	$("#btnSend").click(function() {
		
		var submitForm = true;
		
		$('#loader').hide();
		$('#mainModal').hide();
		
		var email = $('#email').val();
		
		if (email=="") {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert email.'); ?>");
			$('#mainModal').modal('show');		
		}
		
		
		if (!isValidEmail(email)) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert a valid email.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		
		if (!submitForm) {
			$('#loader').hide();
			$('#mainModal').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#mainModal').hide();
			$('#PageForgotPasswordForm').submit();	
		}
		
	});
	
});

</script>

<div class="row-fluid">
	
    <?php echo $this->Form->create('Page',array('action' => 'forgot_password')); ?>
    
	<div class="span4 offset4 text-center">
    
		<div class="well">
        
			<h1><?php echo __('Forgot password'); ?></h1>
            
			<div class="row-fluid">
				<div class="span12">
					<p><strong>Email</strong></p>
                    <?php 
					
					  echo $this->Form->input('email',array(
						  'id'=>'email',
						  'type'=>'text',
						  'class'=>'input-block-level',
						  'label'=>false,
						  'div'=>false,
						  'value'=>''
					  )); 
					  
					  echo $this->Form->input('silenceIsGolden',array(
						  'id'=>'silenceIsGolden',
						  'type'=>'text',
						  'class'=>'input-block-level',
						  'style'=>'display:none',
						  'label'=>false,
						  'div'=>false,
						  'value'=>''
					  )); 
					  
					?>
				</div>
			</div>
            
			<div class="row-fluid">
				<div class="span12">
					<p>&nbsp;</p>
					<?php echo $this->Html->image('loader.gif', array('alt' => 'Wait...', 'title'=>'Wait...','style'=>'display:none;','id'=>'loader')); ?>
				</div>
			</div>
            
			<div class="row-fluid">
				<div class="span12">
					<p></p>
                    <?php 
					
					echo $this->Form->button('<i class="icon-envelope icon-white"></i> ' .__('Send me a new password'),array(
						'id'=>'btnSend',
						'type'=>'button',
						'class'=>'btn btn-large btn-inverse'
					)); 
					
					?>
				</div>
			</div>
            
			<div class="row-fluid">
				<div class="span12">
					<p></p>
					<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin"><i class="icon-chevron-left"></i> <?php echo __('Go to Login'); ?></a>
				</div>
			</div>
            
		</div>
        
	</div>
    
    <?php echo $this->Form->end(); ?>
	
</div>

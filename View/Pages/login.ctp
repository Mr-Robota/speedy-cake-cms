<script type="text/javascript">
	
$(document).ready(function() {
	
	$('#username').focus();
	
	$('#pwd').keypress(function(e) {
		
		if (e.which == 13) $("#btnLogin").click();
		
	});
	
	$("#btnLogin").click(function() {
		
		var submitForm = true;
		$('#loader').hide();
		$('#mainModal').hide();
		
		var username = $('#username').val();
		var pwd = $('#pwd').val();
		
		if (username=="" || pwd=="") {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('All fields are required.'); ?>");
			$('#mainModal').modal('show');		
		}
		
		
		if (!isValidUsername(username)) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert a valid username.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		
		if (!submitForm) {
			$('#loader').hide();
			$('#mainModal').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#mainModal').hide();
			$('#PageLoginForm').submit();	
		}
		
	});
	
});

</script>


<div class="row-fluid">
	
	
    <?php echo $this->Form->create('Page',array('action' => 'login')); ?>
    
	<div class="span6 offset3 text-center">
    
		<div class="well">
        
			<h1>Login</h1>
            
			<div class="row-fluid">
				<div class="span12">
					<p><strong>Username</strong></p>
                    <?php 
					
					  echo $this->Form->input('username',array(
						  'id'=>'username',
						  'type'=>'text',
						  'class'=>'input-block-level',
						  'label'=>false,
						  'div'=>false,
						  'value'=>''
					  )); 
					  
					?>
				</div>
			</div>
            
			<div class="row-fluid">
				<div class="span12">
					<p><strong>Password</strong></p>
                    <?php 
					
					  echo $this->Form->input('pwd',array(
						  'id'=>'pwd',
						  'type'=>'password',
						  'class'=>'input-block-level',
						  'label'=>false,
						  'div'=>false,
						  'value'=>''
					  )); 
					  
					?>
				</div>
			</div>
            
			<div class="row-fluid">
				<div class="span12 text-left">
					<p>&nbsp;</p>
					<label class="checkbox">
						<?php
					
						echo $this->Form->checkbox('rememberme', array(
							'value' => 1
						));
						
						?> <?php echo __('Remember me'); ?>
					</label>
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
					<p>&nbsp;</p>
                    <?php 
					
					echo $this->Form->button('<i class="icon-ok icon-white"></i> Login',array(
						'id'=>'btnLogin',
						'type'=>'button',
						'class'=>'btn btn-large btn-inverse'
					)); 
					
					?>
				</div>
			</div>
            
			<div class="row-fluid">
				<div class="span12">
					<p>&nbsp;</p>
					<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/forgot-password"><?php echo __('Forgot your Password?'); ?></a>
				</div>
			</div>
            
		</div>
        
	</div>
    
    <?php echo $this->Form->end(); ?>
	
	
</div>

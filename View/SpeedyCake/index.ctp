<script type="text/javascript">

$(document).ready(function() {
	
	$('#email').focus();
	
	$("#pwd").keypress(function(e) {
		if(e.which == 13) {
			$('#btnInstall').click();
		}
	});
	
	$("#btnInstall").click(function() {
		
		var submitForm = true;
		
		$('#loader').hide();
		$('#mainModal').hide();
		
		var email = $('#email').val();
		var username = $('#username').val();
		var pwd = $('#pwd').val();
		
		if (email=="" || username=="" || pwd=="") {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('All fields are required.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		if (!isValidEmail(email)) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert a valid email.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		if (!isValidUsername(username)) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert a valid username.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		if (!isValidPassword(pwd)) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert a valid password.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		if (!submitForm) {
			$('#loader').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#installForm').submit();	
		}
		
	});
	
});


</script>

<div class="row-fluid">
<div class="span8 offset2">
<div class="well">


<?php echo $this->Form->create( false, array('controller'=>'SpeedyCake','action' => 'install')); ?>

<div class="row-fluid text-center">
	<div class="span12">
		<h1><?php echo __('Welcome!'); ?></h1>
		<p>SpeedyCake Cms <?php echo __('version'); ?> <?php echo Configure::read('SpeedyCake.version'); ?></p>
	</div>
</div>

<div class="row-fluid text-center">
	<div class="span12">
		<h3><?php echo __('Installation'); ?></h3>
		<p><?php echo __("Insert the administrator user's data."); ?></p>
	</div>
</div>

<div class="row-fluid">
  <div class="span6 offset3">
      <div class="row-fluid">
          <div class="span12">
              <p><strong>Email</strong></p>
              <?php 
					
				  echo $this->Form->input('email',array(
					  'id'=>'email',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
          </div>
      </div>
      
      <div class="row-fluid">
          <div class="span12">
              <p><strong>Username</strong></p>
              <?php 
					
				  echo $this->Form->input('username',array(
					  'id'=>'username',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'label'=>false,
					  'div'=>false
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
      
      <div class="row-fluid text-center">
          <div class="span12">
              <p>&nbsp;</p>
              <?php 

              echo $this->Form->button(__('Install'),array(
                  'id'=>'btnInstall',
                  'type'=>'button',
                  'class'=>'btn btn-inverse btn-large'
              )); 
              
              ?>
          </div>
      </div>
      
  </div>
  
</div>

<?php echo $this->Form->end(); ?>

</div>
</div>
</div>
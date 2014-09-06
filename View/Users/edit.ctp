<script type="text/javascript">
	
$(document).ready(function() {
	
	$('#pwd').focus();
	
	$('#pwd').keypress(function(e) {
		
		if (e.which == 13) $("#btnSave").click();
		
	});
	
	$("#btnSave").click(function() {
		
		var submitForm = true;
		
		$('#loader').hide();
		$('#mainModal').hide();
		
		var avatar = $('#avatar').val();
		var pwd = $('#pwd').val();
		var pwd2 = $('#pwd2').val();
		var role = $('#role').val();
		var status = $('#status').val();
		
		
		if (role=="" || status=="") {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('All fields are required.'); ?>");
			$('#mainModal').modal('show');		
		}
		
		if (avatar!="" && !isValidImage(avatar)) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Choose file JPG, GIF or PNG.'); ?>");
			$('#mainModal').modal('show');		
		}
		
		if (pwd!="" && !isValidPassword(pwd)) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert a valid password.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		if (pwd!=pwd2) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Passwords do not match.'); ?>");
			$('#mainModal').modal('show');		
		}
		
		if (role=="") {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Select role.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		if (status=="") {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Select status.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		
		if (!submitForm) {
			$('#loader').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#UserEditForm').submit();	
		}
		
	});
	
});

</script>

<?php echo $this->Form->create('User',array('action' => 'edit','type'=>'file')); ?>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Edit User'); ?></h1>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong>Username</strong></p>
                <?php 
					
				  echo $this->Form->input('username',array(
					  'id'=>'username',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$username,
					  'disabled'=>'disabled',
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
            <div class="span12">
                <p><strong>Avatar</strong></p>
                <?php 
				
				echo $this->Form->file('avatar',array(
					'id'=>'avatar',
					'title'=>'<i class="icon-picture"></i> ' .__('Edit Avatar')
				));
				
				if ($oldAvatar!="") echo '<p><a href="' .Configure::read('SpeedyCake.url') .'/files/uploads/' .$oldAvatar .'" target="_blank"><img width="100" class="thumbnail" src="' .Configure::read('SpeedyCake.url') .'/files/uploads/' .$oldAvatar .'"></a></p>';
				
				?>
                <p></p>
            </div>
        </div>
        
		<div class="row-fluid">
			<div class="span12">
				<p><strong>Password (<?php echo __('enter to edit'); ?>)</strong></p>
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
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Repeat Password'); ?></strong></p>
                <?php 
					
				  echo $this->Form->input('pwd2',array(
					  'id'=>'pwd2',
					  'type'=>'password',
					  'class'=>'input-block-level',
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong>Email</strong></p>
                <?php 
					
				  echo $this->Form->input('email',array(
					  'id'=>'email',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$email,
					  'disabled'=>'disabled',
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Role'); ?></strong></p>
                <?php 
				
				if ($role=="") $default = "";
				if ($role=="administrator") $default = "administrator";
				if ($role=="editor") $default = "editor";
				if ($role=="author") $default = "author";
				
				$options = array(
					"" => __('Role'), 
					"administrator" => __('Administrator'),
					"editor" => __('Editor'),
					"author" => __('Author')
				);
				
				echo $this->Form->select('role', $options, array(
					'id'=>'role',
					'default'=>$default,
					'empty'=>false
				));
				
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Status'); ?></strong></p>
                <?php 
				
				if ($status=="") $default = ""; 
				if ($status=="0") $default = 0; 
				if ($status=="1") $default = 1; 
				
				$options = array(
					"" => __('Status'), 
					0 => __('Inactive'),
					1 => __('Active')
				);
				
				echo $this->Form->select('status', $options, array(
					'id'=>'status',
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
					
					echo $this->Form->input('id',array(
						'id'=>'id',
						'type'=>'hidden',
						'value'=>$id
					)); 
					
					echo $this->Form->input('oldPwd',array(
						'id'=>'oldPwd',
						'type'=>'hidden',
						'value'=>$oldPwd
					)); 
					
					echo $this->Form->input('oldAvatar',array(
						'id'=>'oldAvatar',
						'type'=>'hidden',
						'value'=>$oldAvatar
					)); 
					
					?>
				</div>
			</div>
            
	</div>
    
</div>

</div>

<?php echo $this->Form->end(); ?>
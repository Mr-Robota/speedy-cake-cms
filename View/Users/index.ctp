<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Users'); ?></h1>
        
        <p><?php echo __('elements found'); ?>: <?php echo $numRows; ?></p>
        
		<div class="row-fluid">
			<div class="span12 visible-desktop visible-tablet">
				<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/users/add" class="btn btn-inverse btn-large"><i class="icon-plus icon-white"></i> <?php echo __('New User'); ?></a>
			</div>
			<div class="span12 visible-phone">
				<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/users/add" class="btn btn-inverse btn-block"><i class="icon-plus icon-white"></i> <?php echo __('New User'); ?></a>
			</div>
		</div>
        
		<div class="row-fluid marginTop20 visible-desktop">
        	<?php 
			
				echo $this->Form->create('User',array(
					'action' => 'index',
					'class'=>'form-inline',
					'type'=>'get'
				));
			
			?>
                
                <div class="span12">
                        <?php 
					
						  echo $this->Form->input('q',array(
							  'id'=>'q',
							  'type'=>'text',
							  'class'=>'span8',
							  'label'=>false,
							  'div'=>false,
							  'value'=>$q
						  )); 
						  
						?>
                        
                        <?php
						
						echo $this->Form->button('<i class="icon-search icon-white"></i> ' .__('Search'),array(
							'id'=>'btnForm',
							'type'=>'submit',
							'class'=>'btn btn-inverse'
						)); 
						
						?>
                </div>
        	<?php echo $this->Form->end(); ?>
		</div>
        
		<div class="row-fluid marginTop20 visible-phone visible-tablet">
        <?php 
			
			  echo $this->Form->create('User',array(
				  'action' => 'index',
				  'class'=>'form-inline',
				  'type'=>'get'
			  ));
		  
		  ?>
			
			<div class="span12 text-center">
            		<p>&nbsp;</p>
					<?php 
					
						  echo $this->Form->input('q',array(
							  'id'=>'q',
							  'type'=>'text',
							  'class'=>'input-block-level',
							  'label'=>false,
							  'div'=>false,
							  'value'=>$q
						  )); 
						  
						?>
					<p></p>
					<?php
						
					echo $this->Form->button('<i class="icon-search icon-white"></i> ' .__('Search'),array(
						'id'=>'btnForm',
						'type'=>'submit',
						'class'=>'btn btn-inverse'
					)); 
					
					?>
			</div>
        <?php echo $this->Form->end(); ?>
		</div>
        
        <?php if ($numRows>0) { ?>
		<div class="row-fluid marginTop20 rowData visible-desktop visible-tablet">
				<div class="span1">
					<p><strong>ID</strong></p>
				</div>
                <div class="span1">
					<p><strong>Avatar</strong></p>
				</div>
                <div class="span5">
					<p><strong>Username</strong></p>
				</div>
				<div class="span2">
					<p><strong><?php echo __('Role'); ?></strong></p>
				</div>
                <div class="span1">
					<p><strong><?php echo __('Status'); ?></strong></p>
				</div>
				<div class="span2">
					<p><strong><?php echo __('Actions'); ?></strong></p>
				</div>
			</div>
		<div class="row-fluid rowData visible-phone">
			<ul class="unstyled inline">
				<li><strong>ID</strong></li>
                <li><strong>Avatar</strong></li>
				<li><strong>Username</strong></li>
				<li><strong><?php echo __('Role'); ?></strong></li>
                <li><strong><?php echo __('Status'); ?></strong></li>
				<li><strong><?php echo __('Actions'); ?></strong></li>
			</ul>
		</div>
        <?php foreach ($rows as $row): ?>
		<div class="row-fluid rowData visible-desktop visible-tablet">
			<div class="span1">
				<p><?php echo $row['User']['id']; ?></p>
			</div>
            <div class="span1">
            	<?php if ($row['User']['avatar']=="") { ?>
				<p><?php echo $this->Html->image('user.png', array('alt' => $row['User']['username'],'width'=>48)); ?></p>
                <?php } else { ?>
                <p><?php echo $this->Html->image(Configure::read('SpeedyCake.url') .'/files/uploads/' .$row['User']['avatar'], array('alt' => $row['User']['username'],'width'=>48)); ?></p>
                <?php } ?>
			</div>
            <div class="span5">
				<p><strong><?php echo $row['User']['username']; ?></strong></p>
			</div>
			<div class="span2">
				<p>
					<?php 
				
					if ($row['User']['role']=="administrator") echo '<span class="label label-success">' .__('Administrator') .'</span>';
					if ($row['User']['role']=="editor") echo '<span class="label label-default">' .__('Editor') .'</span>';
					if ($row['User']['role']=="author") echo '<span class="label label-inverse">' .__('Author') .'</span>';
					
					?>
                </p>
			</div>
            <div class="span1">
				<p><?php if ($row['User']['status']==1) echo '<span class="label label-success">' .__('Active') .'</span>'; else echo '<span class="label">' .__('Inactive') .'</span>'; ?></p>
			</div>
			<div class="span2">
				<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/users/edit/<?php echo $row['User']['id']; ?>" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>"><i class="icon-pencil"></i></a>
				<a href="javascript:deleteRow('users',<?php echo $row['User']['id']; ?>);" rel="tooltip" data-original-title="<?php echo __('Delete'); ?>"><i class="icon-trash"></i></a>
			</div>
		</div>
		<div class="row-fluid rowData visible-phone">
			<ul class="unstyled inline">
				<li><p><?php echo $row['User']['id']; ?></p></li>
                <li>
                <?php if ($row['User']['avatar']=="") { ?>
				<p><?php echo $this->Html->image('user.png', array('alt' => $row['User']['username'],'width'=>48)); ?></p>
                <?php } else { ?>
                <p><?php echo $this->Html->image(Configure::read('SpeedyCake.url') .'/files/uploads/' .$row['User']['avatar'], array('alt' => $row['User']['username'],'width'=>48)); ?></p>
                <?php } ?>
                </li>
                <li><p><?php echo $row['User']['username']; ?></p></li>
                <li>
                    <p>
					<?php 
				
					if ($row['User']['role']=="administrator") echo '<span class="label label-success">' .__('Administrator') .'</span>';
					if ($row['User']['role']=="editor") echo '<span class="label label-default">' .__('Editor') .'</span>';
					if ($row['User']['role']=="author") echo '<span class="label label-inverse">' .__('Author') .'</span>';
					
					?>
                    </p>
                </li>
				<li><p><?php if ($row['User']['status']==1) echo '<span class="label label-success">' .__('Active') .'</span>'; else echo '<span class="label">' .__('Inactive') .'</span>'; ?></p></li>
				<li>
                	<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/users/edit/<?php echo $row['User']['id']; ?>" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>"><i class="icon-pencil"></i></a>
					<a href="javascript:deleteRow('users',<?php echo $row['User']['id']; ?>);" rel="tooltip" data-original-title="<?php echo __('Delete'); ?>"><i class="icon-trash"></i></a>
                </li>
			</ul>
		</div>
        <?php endforeach; ?> 
        <?php } else echo '<p>' .__('No elements found.') .'</p>'; ?>
        <?php echo $this->element('pagination'); ?>
		</div>
	</div>
</div>

</div>



<?php echo $this->element('deleterowmodal'); ?>
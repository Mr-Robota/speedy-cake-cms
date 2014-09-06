<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Images'); ?></h1>
        
        <p><?php echo __('elements found'); ?>: <?php echo $numRows; ?></p>
        
		<div class="row-fluid databtn">
			<div class="span12 visible-desktop visible-tablet">
				<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/files/add" class="btn btn-inverse btn-large"><i class="icon-plus icon-white"></i> <?php echo __('New Image'); ?></a>
			</div>
			<div class="span12 visible-phone">
				<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/files/add" class="btn btn-inverse btn-block"><i class="icon-plus icon-white"></i> <?php echo __('New Image'); ?></a>
			</div>
		</div>
        
		<div class="row-fluid visible-desktop">
        	<?php 
			
				echo $this->Form->create('File',array(
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
		<div class="row-fluid visible-phone visible-tablet">
        <?php 
			
			  echo $this->Form->create('File',array(
				  'action' => 'index',
				  'class'=>'form-inline',
				  'type'=>'get'
			  ));
		  
		  ?>
			<div class="span12 dataformsearch text-center">
            		<p></p>
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
		<div class="row-fluid datarowhead visible-desktop visible-tablet">
				<div class="span1">
					<p>ID</p>
				</div>
                <div class="span2">
					<p>URL</p>
				</div>
                <div class="span2">
					<p><?php echo __('Title'); ?></p>
				</div>
				<div class="span3">
					<p><?php echo __('Type'); ?></p>
				</div>
				<div class="span2">
					<p><?php echo __('Size'); ?></p>
				</div>
				<div class="span2">
					<p><?php echo __('Actions'); ?></p>
				</div>
			</div>
		<div class="row-fluid datarowhead visible-phone">
			<ul class="unstyled inline">
				<li><p>ID</p></li>
                <li><p>URL</p></li>
				<li><p><?php echo __('Title'); ?></p></li>
				<li><p><?php echo __('Type'); ?></p></li>
				<li><p><?php echo __('Size'); ?></p></li>
				<li><p><?php echo __('Actions'); ?></p></li>
			</ul>
		</div>
        <?php foreach ($rows as $row): ?>
		<div class="row-fluid datarow visible-desktop visible-tablet">
			<div class="span1">
				<p><?php echo $row['File']['id']; ?></p>
			</div>
            <div class="span2">
				<p><a href="<?php echo $row['File']['url']; ?>" target="_blank"><img class="thumbnail" width="100" src="<?php echo $row['File']['url']; ?>"></a></p>
			</div>
            <div class="span2">
				<p><strong><?php echo $row['File']['title']; ?></strong></p>
			</div>
			<div class="span3">
				<p><?php echo $row['File']['type']; ?></p>
			</div>
			<div class="span2">
				<p><?php echo $this->Number->toReadableSize($row["File"]["size"]); ?></p>
			</div>
			<div class="span2 btnactions">
            	<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/files/crop/<?php echo $row['File']['id']; ?>" rel="tooltip" data-original-title="<?php echo __('Crop Image'); ?>"><i class="icon-move"></i></a>
				<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/files/edit/<?php echo $row['File']['id']; ?>" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>"><i class="icon-pencil"></i></a>
				<a href="javascript:deleteRow('files',<?php echo $row['File']['id']; ?>);" rel="tooltip" data-original-title="<?php echo __('Delete'); ?>"><i class="icon-trash"></i></a>
			</div>
		</div>
		<div class="row-fluid datarow visible-phone">
			<ul class="unstyled inline">
				<li><p><?php echo $row['File']['id']; ?></p></li>
                <li><a href="<?php echo $row['File']['url']; ?>" target="_blank"><img class="thumbnail" width="100" src="<?php echo $row['File']['url']; ?>"></a></li>
                <li><p><?php echo $row['File']['title']; ?></p></li>
				<li><p><?php echo $row['File']['type']; ?></p></li>
				<li><p><?php echo $this->Number->toReadableSize($row["File"]["size"]); ?></p></li>
				<li>
                	<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/files/crop/<?php echo $row['File']['id']; ?>" rel="tooltip" data-original-title="<?php echo __('Crop Image'); ?>"><i class="icon-move"></i></a>
                    <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/files/edit/<?php echo $row['File']['id']; ?>" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>"><i class="icon-pencil"></i></a>
					<a href="javascript:deleteRow('files',<?php echo $row['File']['id']; ?>);" rel="tooltip" data-original-title="<?php echo __('Delete'); ?>"><i class="icon-trash"></i></a>
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
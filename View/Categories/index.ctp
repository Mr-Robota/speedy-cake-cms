<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Categories'); ?></h1>
        
        <p><?php echo __('elements found'); ?>: <?php echo $numRows; ?></p>
        
		<div class="row-fluid">
			<div class="span12 visible-desktop visible-tablet">
				<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/categories/add" class="btn btn-inverse btn-large"><i class="icon-plus icon-white"></i> <?php echo __('New Category'); ?></a>
			</div>
			<div class="span12 visible-phone">
				<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/categories/add" class="btn btn-inverse btn-block"><i class="icon-plus icon-white"></i> <?php echo __('New Category'); ?></a>
			</div>
		</div>
        
		<div class="row-fluid marginTop20 visible-desktop">
        	<?php 
			
				echo $this->Form->create('Categorie',array(
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
			
			  echo $this->Form->create('Categorie',array(
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
                <div class="span4">
					<p><strong><?php echo __('Name'); ?></strong></p>
				</div>
                <div class="span5">
					<p><strong><?php echo __('Articles'); ?></strong></p>
				</div>
				<div class="span2">
					<p><strong><?php echo __('Actions'); ?></strong></p>
				</div>
			</div>
		<div class="row-fluid rowData visible-phone">
			<ul class="unstyled inline">
				<li><strong>ID</strong></li>
                <li><strong><?php echo __('Name'); ?></strong></li>
				<li><strong><?php echo __('Articles'); ?></strong></li>
				<li><strong><?php echo __('Actions'); ?></strong></li>
			</ul>
		</div>
        <?php foreach ($rows as $row): ?>
		<div class="row-fluid rowData visible-desktop visible-tablet">
			<div class="span1">
				<p><?php echo $row['Categorie']['id']; ?></p>
			</div>
            <div class="span4">
            	<p><?php echo $row['Categorie']['name']; ?></p>
			</div>
            <div class="span5">
				<p><a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/articles/indexcategories?categorie_id=<?php echo $row['Categorie']['id']; ?>"><span class="badge badge-inverse"><?php echo $this->SpeedyCake->articlesAssociated($row['Categorie']['id']); ?></span></a></p>
			</div>
			<div class="span2">
				<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/categories/edit/<?php echo $row['Categorie']['id']; ?>" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>"><i class="icon-pencil"></i></a>
				<a href="javascript:deleteRow('categories',<?php echo $row['Categorie']['id']; ?>);" rel="tooltip" data-original-title="<?php echo __('Delete'); ?>"><i class="icon-trash"></i></a>
			</div>
		</div>
		<div class="row-fluid rowData visible-phone">
			<ul class="unstyled inline">
				<li><p><?php echo $row['Categorie']['id']; ?></p></li>
                <li><p><?php echo $row['Categorie']['name']; ?></p></li>
                <li><p><a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/articles/indexcategories?categorie_id=<?php echo $row['Categorie']['id']; ?>"><span class="badge badge-inverse"><?php echo $this->SpeedyCake->articlesAssociated($row['Categorie']['id']); ?></span></a></p></li>
				<li>
                	<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/categories/edit/<?php echo $row['Categorie']['id']; ?>" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>"><i class="icon-pencil"></i></a>
					<a href="javascript:deleteRow('categories',<?php echo $row['Categorie']['id']; ?>);" rel="tooltip" data-original-title="<?php echo __('Delete'); ?>"><i class="icon-trash"></i></a>
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
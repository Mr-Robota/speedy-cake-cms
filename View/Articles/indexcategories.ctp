<script type="text/javascript">

function setFilter() {
	
	$('#formSearch').submit();
	
}

function setFilterMobile() {
	
	$('#formSearchMobile').submit();
	
}

</script>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Articles'); ?></h1>
        
        <p><?php echo __('elements found'); ?>: <?php echo $numRows; ?></p>
        
		<div class="row-fluid databtn">
			<div class="span12 visible-desktop visible-tablet">
				<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/articles/add" class="btn btn-inverse btn-large"><i class="icon-plus icon-white"></i> <?php echo __('New Article'); ?></a>
			</div>
			<div class="span12 visible-phone">
				<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/articles/add" class="btn btn-inverse btn-block"><i class="icon-plus icon-white"></i> <?php echo __('New Article'); ?></a>
			</div>
		</div>
		<div class="row-fluid visible-desktop">
            <?php 
			
				echo $this->Form->create('Article',array(
					'action' => 'indexcategories',
					'id'=>'formSearch',
					'class'=>'form-inline',
					'type'=>'get'
				));
			
			?>
                <div class="span6">
                    <?php
					
					if ($filter=="") $default = "";
					if ($filter=="0") $default = 0;
					if ($filter=="1") $default = 1;
				
					$options = array("" => __('Status'), 0 => __('Draft'), 1 => __('Published'));
					
					echo $this->Form->select('filter', $options, array(
						'id'=>'filter',
						'default'=>$default,
						'onchange'=>'javascript:setFilter();',
						'empty'=>false
					));
					
					?>
                </div>
                <div class="span6">
                        <?php 
					
						  echo $this->Form->input('q',array(
							  'id'=>'q',
							  'type'=>'text',
							  'class'=>'span8',
							  'label'=>false,
							  'div'=>false,
							  'value'=>$q
						  )); 
						  
						  echo $this->Form->input('categorie_id',array(
							  'id'=>'categorie_id',
							  'type'=>'hidden',
							  'class'=>'span8',
							  'label'=>false,
							  'div'=>false,
							  'value'=>$categorie_id
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
			
			  echo $this->Form->create('Article',array(
				  'action' => 'indexcategories',
				  'id'=>'formSearchMobile',
				  'class'=>'form-inline',
				  'type'=>'get'
			  ));
		  
		  ?>
			<div class="span12 text-center">
				<?php
					
				if ($filter=="") $default = "";
				if ($filter=="0") $default = 0;
				if ($filter=="1") $default = 1;
			
				$options = array("" => __('Status'), 0 => __('Draft'), 1 => __('Published'));
				
				echo $this->Form->select('filter', $options, array(
					'id'=>'filter',
					'default'=>$default,
					'class'=>'input-block-level',
					'onchange'=>'javascript:setFilterMobile();',
					'empty'=>false
				));
				
				?>
			</div>
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
						  
						  echo $this->Form->input('categorie_id',array(
							  'id'=>'categorie_id',
							  'type'=>'hidden',
							  'class'=>'span8',
							  'label'=>false,
							  'div'=>false,
							  'value'=>$categorie_id
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
                <div class="span3">
					<p><?php echo __('Title'); ?></p>
				</div>
                <div class="span2">
					<p><?php echo __('Author'); ?></p>
				</div>
				<div class="span2">
					<p><?php echo __('Status'); ?></p>
				</div>
				<div class="span2">
					<p><?php echo __('Date'); ?></p>
				</div>
				<div class="span2">
					<p><?php echo __('Actions'); ?></p>
				</div>
			</div>
		<div class="row-fluid datarowhead visible-phone">
			<ul class="unstyled inline">
				<li><p>ID</p></li>
                <li><p><?php echo __('Title'); ?></p></li>
				<li><p><?php echo __('Author'); ?></p></li>
				<li><p><?php echo __('Status'); ?></p></li>
				<li><p><?php echo __('Date'); ?></p></li>
				<li><p><?php echo __('Actions'); ?></p></li>
			</ul>
		</div>
        <?php foreach ($rows as $row): ?>
		<div class="row-fluid datarow visible-desktop visible-tablet">
			<div class="span1">
				<p><?php echo $row['Article']['id']; ?></p>
			</div>
            <div class="span3">
				<p><?php echo $row['Article']['title']; ?></p>
			</div>
            <div class="span2">
				<p><strong><?php echo $this->SpeedyCake->getUsername($row['Article']['user_id']); ?></strong></p>
			</div>
			<div class="span2">
				<p>
				<?php
                
					if ($row['Article']['status']==0) echo '<span class="label">' .__('Draft') .'</span>';
					if ($row['Article']['status']==1) echo '<span class="label label-success">' .__('Published') .'</span>';
				
				?>
                </p>
			</div>
			<div class="span2">
				<p><?php echo $row['Article']['created']; ?></p>
			</div>
			<div class="span2 btnactions">
				<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/articles/edit/<?php echo $row['Article']['id']; ?>" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>"><i class="icon-pencil"></i></a>
				<a href="javascript:deleteRow('articles',<?php echo $row['Article']['id']; ?>);" rel="tooltip" data-original-title="<?php echo __('Delete'); ?>"><i class="icon-trash"></i></a>
			</div>
		</div>
		<div class="row-fluid datarow visible-phone">
			<ul class="unstyled inline">
				<li><p><?php echo $row['Article']['id']; ?></p></li>
                <li><p><?php echo $row['Article']['title']; ?></p></li>
                <li><p><strong><?php echo $this->SpeedyCake->getUsername($row['Article']['user_id']); ?></strong></p></li>
				<li><p>
                <?php
                
					if ($row['Article']['status']==0) echo '<span class="label">' .__('Draft') .'</span>';
					if ($row['Article']['status']==1) echo '<span class="label label-success">' .__('Published') .'</span>';
				
				?>
                </p></li>
				<li><p><?php echo $row['Article']['created']; ?></p></li>
				<li>
                	<a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/articles/edit/<?php echo $row['Article']['id']; ?>" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>"><i class="icon-pencil"></i></a>
					<a href="javascript:deleteRow('articles',<?php echo $row['Article']['id']; ?>);" rel="tooltip" data-original-title="<?php echo __('Delete'); ?>"><i class="icon-trash"></i></a>
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
<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<div class="span9">
	<div class="well">
		<h1><?php echo __('Download a Database Backup'); ?></h1>
        <div class="row-fluid">
			<div class="span12">
				<p>&nbsp;</p>
                <?php
				  
				  echo $this->Html->link(
					  'Download',
					  Configure::read('SpeedyCake.url') .'/speedycake/download-backup/' .$file,
					  array('class' => 'btn btn-inverse btn-large', 'target' => '_blank')
				  );
				  
				  ?>
			</div>
		</div>
	</div>
</div>

</div>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

	<div class="span9">
    
		<div class="well">
        
			<h1><?php echo __('Dashboard'); ?></h1>
            
			<div class="row-fluid">
				<div class="span12">
					<p><?php echo __('Welcome Human!'); ?></p>
				</div>
			</div>
            
            <div class="row-fluid">
				<div class="span12">
					<p><?php echo __('Are you using'); ?> <strong>SpeedyCake CMS</strong> <?php echo __('version'); ?> <?php echo Configure::read("SpeedyCake.version"); ?></p>
				</div>
			</div>
            
            <div class="row-fluid">
				<div class="span12">
					<p><?php echo __('Sitename:'); ?> <strong><?php echo Configure::read("SpeedyCake.name"); ?></strong> - URL: <a href="<?php echo Configure::read("SpeedyCake.url"); ?>" target="_blank"><?php echo Configure::read("SpeedyCake.url"); ?></a></p>
				</div>
			</div>
            
            <div class="row-fluid">
				<div class="span12 marginTop20">
                	<ul class="unstyled inline">
                        <li><i class="icon-user"></i> <?php echo __('Users:'); ?> <strong><?php echo $users; ?></strong></li>
                        <li><i class="icon-file"></i> <?php echo __('Pages:'); ?> <strong><?php echo $pages; ?></strong></li>
                        <li><i class="icon-pencil"></i> <?php echo __('Articles:'); ?> <strong><?php echo $articles; ?></strong></li>
                        <li><i class="icon-picture"></i> <?php echo __('Images:'); ?> <strong><?php echo $files; ?></strong></li>
                    </ul>
				</div>
			</div>
            
            <div class="row-fluid">
				<div class="span12">
					<p><a href="<?php echo Configure::read("SpeedyCake.url"); ?>/admin/articles/add" class="btn btn-inverse btn-large"><?php echo __('Create a new Article'); ?> <i class="icon-plus icon-white"></i></a></p>
				</div>
			</div>
            
		</div>
        
	</div>
	
</div>
<div class="span3">

	<div class="accordion" id="accordion">
    
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="icon-pencil icon-white"></i> <?php echo __('Articles'); ?></a>
			</div>
			<div id="collapse1" class="accordion-body collapse <?php if (($this->params['controller']=="articles" || $this->params['controller']=="categories") && $this->params['action']!="dashboard") echo "in"; ?>">
				<div class="accordion-inner">
					<ul class="unstyled">
						<li><i class="icon-list"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/articles"><?php echo __('All Articles'); ?></a></li>
						<li><i class="icon-plus"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/articles/add"><?php echo __('New Article'); ?></a></li>
                        <?php if ($this->Session->read('Administrator.role')=="administrator" || $this->Session->read('Administrator.role')=="editor") { ?>
                        <li><i class="icon-tag"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/categories"><?php echo __('Categories'); ?></a></li>
                        <?php } ?>
					</ul>
				</div>
			</div>
		</div>
        
        <?php if ($this->Session->read('Administrator.role')=="administrator" || $this->Session->read('Administrator.role')=="editor") { ?>
        
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="icon-file icon-white"></i> <?php echo __('Pages'); ?></a>
			</div>
			<div id="collapse2" class="accordion-body collapse <?php if ($this->params['controller']=="pages" && $this->params['action']!="dashboard") echo "in"; ?>">
				<div class="accordion-inner">
					<ul class="unstyled">
						<li><i class="icon-list"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/pages"><?php echo __('All Pages'); ?></a></li>
						<li><i class="icon-plus"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/pages/add"><?php echo __('New Page'); ?></a></li>
					</ul>
				</div>
			</div>
		</div>
        
        <?php } ?>
        
        <?php if ($this->Session->read('Administrator.role')=="administrator") { ?>
        
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3"><i class="icon-picture icon-white"></i> <?php echo __('Images'); ?></a>
			</div>
			<div id="collapse3" class="accordion-body collapse <?php if ($this->params['controller']=="files" && $this->params['action']!="dashboard") echo "in"; ?>">
				<div class="accordion-inner">
					<ul class="unstyled">
						<li><i class="icon-list"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/files"><?php echo __('All Images'); ?></a></li>
						<li><i class="icon-plus"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/files/add"><?php echo __('New Image'); ?></a></li>
					</ul>
				</div>
			</div>
		</div>
        
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4"><i class="icon-user icon-white"></i> <?php echo __('Users'); ?></a>
			</div>
			<div id="collapse4" class="accordion-body collapse <?php if ($this->params['controller']=="users") echo "in"; ?>">
				<div class="accordion-inner">
					<ul class="unstyled">
						<li><i class="icon-list"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/users"><?php echo __('All Users'); ?></a></li>
						<li><i class="icon-plus"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/users/add"><?php echo __('New User'); ?></a></li>
					</ul>
				</div>
			</div>
		</div>
        
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse7"><i class="icon-wrench icon-white"></i> <?php echo __('Settings'); ?></a>
			</div>
			<div id="collapse7" class="accordion-body collapse <?php if ($this->params['controller']=="settings" || $this->params['action']=="backup") echo "in"; ?>">
				<div class="accordion-inner">
					<ul class="unstyled">
						<li><i class="icon-globe"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/settings"><?php echo __('Generals'); ?></a></li>
						<li><i class="icon-tag"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/settings/meta">Meta</a></li>
						<li><i class="icon-list-alt"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/settings/reading"><?php echo __('Reading'); ?></a></li>
						<li><i class="icon-edit"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/settings/writing"><?php echo __('Writing'); ?></a></li>
                        <li><i class="icon-edit"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/settings/social">Social</a></li>
						<li><i class="icon-circle-arrow-up"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/settings/import"><?php echo __('Import'); ?></a></li>
						<li><i class="icon-circle-arrow-down"></i> <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/speedycake/backup"><?php echo __('Export'); ?></a></li>
					</ul>
				</div>
			</div>
		</div>
        
        <?php } ?>
        
	</div>

</div>
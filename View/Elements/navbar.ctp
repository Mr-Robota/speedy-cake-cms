<div class="navbar navbar-inverse">

        <div class="navbar-inner">
        
            <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </a>
            
            <a href="<?php echo Configure::read('SpeedyCake.url'); ?>/dashboard" class="brand"><?php echo Configure::read('SpeedyCake.name'); ?></a>
            
            <div class="nav-collapse collapse">
            
            	<?php if ($this->Session->check('Administrator.username')) { ?>
                
                <ul class="nav">
                	<li><a href="<?php echo Configure::read('SpeedyCake.url'); ?>" target="_blank"><?php echo __('View website'); ?></a></li>
                </ul>
                
                <div class="pull-right visible-desktop">
                        <ul class="nav pull-right">
                          <li><a href="#"><?php echo __('Welcome'); ?> <?php echo $this->Session->read('Administrator.username'); ?></a></li>
                          <li class="divider-vertical"></li>
                          <li><a href="<?php echo Configure::read('SpeedyCake.url'); ?>/logout"><?php echo __('Logout'); ?></a></li>
                        </ul>
                </div>
                
                <div class="visible-phone visible-tablet">
                     <ul class="nav">
                          <li class="visible-desktop"><a href="#"><?php echo __('Welcome'); ?> <?php echo $this->Session->read('Administrator.username'); ?></a></li>
                          <li class="divider-vertical"></li>
                          <li><a href="<?php echo Configure::read('SpeedyCake.url'); ?>/logout"><?php echo __('Logout'); ?></a></li>
                        </ul>
                </div>
                
                <?php } ?>
                
            </div>

            </div>

        </div>

    </div>
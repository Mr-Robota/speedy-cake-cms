<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </a>
            <a href="<?php echo Configure::read('SpeedyCake.url'); ?>" class="brand"><?php echo Configure::read('SpeedyCake.name'); ?></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li><a href="<?php echo Configure::read('SpeedyCake.url'); ?>"><?php echo $this->SpeedyCake->slogan(); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

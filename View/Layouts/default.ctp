<!DOCTYPE html>
<html>
<head>
<title><?php if (isset($title)) echo $title; ?></title>
<meta name="description" content="<?php if (isset($description)) echo $description; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php echo $this->Html->css('bootstrap.min.css') ."\r\n"; ?>
<?php echo $this->Html->css('bootstrap-responsive.min.css') ."\r\n"; ?>
<?php echo $this->Html->css('jcrop.min.css') ."\r\n"; ?>
<?php echo $this->Html->css('style.css') ."\r\n"; ?>
<?php echo $this->Html->script('jquery.min.js') ."\r\n"; ?>
<?php echo $this->Html->script('bootstrap.min.js') ."\r\n"; ?>
<?php echo $this->Html->script('functions.js') ."\r\n"; ?>
<?php echo $this->Html->script('respond.js') ."\r\n"; ?>
<?php echo $this->Html->script('jquery.color.js') ."\r\n"; ?>
<?php echo $this->Html->script('jcrop.min.js') ."\r\n"; ?>
<?php echo $this->Html->script('bootstrap.file-input.js') ."\r\n"; ?>
<?php echo $this->Html->script('ckeditor/ckeditor.js') ."\r\n"; ?>
<?php echo $this->Html->script('core.js') ."\r\n"; ?>
</head>
<body>

<div class="container-fluid allspace">
    
    <?php echo $this->element('navbar'); ?>
    
</div>

<?php if (isset($breadcrumbs) && $breadcrumbs===true) { ?>

<div class="container-fluid">

	<div class="row-fluid">
    
    	<div class="span12 marginBottom20">
        
        	<ul class="unstyled inline">
            	<li><a href="<?php echo Configure::read('SpeedyCake.url'); ?>/dashboard"><i class="icon-home"></i> <?php echo __('Dashboard'); ?></a></li>
                <?php if ($this->params["action"]!="dashboard") { ?>
                <li><span class="divider">/</span></li>
                <li><a href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/<?php echo $this->params["controller"]; ?>"><?php echo __(Inflector::humanize($this->params["controller"])); ?></a></li>
                <li><span class="divider">/</span></li>
                <li class="active"><?php echo __(Inflector::humanize($this->params["action"])); ?></li>
                <?php } ?>
                
            </ul>
            
        </div>
        
    </div>
    
</div>

<?php } ?>


<div class="container-fluid">
    
    <?php echo $this->Session->flash(); ?>
    
    <?php echo $this->fetch('content'); ?>

</div>

<?php echo $this->element('modalmessage'); ?>

</body>
</html>
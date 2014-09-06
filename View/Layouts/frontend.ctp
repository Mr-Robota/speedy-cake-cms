<!DOCTYPE html>
<?php if ($this->SpeedyCake->checkOpenGraph()==0) { ?>
<html>
<?php } else { ?>
<html xmlns:fb="http://ogp.me/ns/fb#"
	xmlns="http://www.w3.org/1999/xhtml" 
	xmlns:og="http://ogp.me/ns#" 
	xmlns:fb="http://www.facebook.com/2008/fbml" >
<?php } ?>
<head>
<title><?php if (isset($title)) echo $title; ?></title>
<meta name="description" content="<?php if (isset($description)) echo $description; ?>">
<meta name="keywords" content="<?php if (isset($keywords)) echo $keywords; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if (isset($canonical)) echo '<link rel="canonical" href="' .$canonical .'">' ."\r\n"; ?>
<?php if ($this->SpeedyCake->isHome()) echo '<link rel="canonical" href="' .Configure::read('SpeedyCake.url') .'">' ."\r\n"; ?>
<?php if ($this->SpeedyCake->checkOpenGraph()==1) { ?>
<meta property="og:title" content="<?php if (isset($title)) echo $title; ?>" />
<?php if ($this->SpeedyCake->isHome()) { ?>
<meta property="og:type" content="website" />
<?php } else { ?>
<meta property="og:type" content="article" />
<?php } ?>
<?php if ($this->SpeedyCake->isHome()) { ?>
<meta property="og:url" content="<?php echo Configure::read('SpeedyCake.url'); ?>" />
<?php } else { ?>
<meta property="og:url" content="<?php if (isset($canonical)) echo $canonical; ?>" />
<?php } ?>
<meta property="og:image" content="<?php if (isset($row['Article']['id'])) echo $this->SpeedyCake->mainImageUrl('Article',$row['Article']['id']); if (isset($row['Page']['id'])) echo $this->SpeedyCake->mainImageUrl('Page',$row['Page']['id']); ?>" />
<meta property="og:site_name" content="<?php echo Configure::read('SpeedyCake.name'); ?>" />
<meta property="og:description" content="<?php if (isset($description)) echo $description; ?>" />
<?php } ?>
<?php echo $this->Html->css('bootstrap.min.css') ."\r\n"; ?>
<?php echo $this->Html->css('bootstrap-responsive.min.css') ."\r\n"; ?>
<?php echo $this->Html->css('style.css') ."\r\n"; ?>
<?php echo $this->Html->script('jquery.min.js') ."\r\n"; ?>
<?php echo $this->Html->script('bootstrap.min.js') ."\r\n"; ?>
<?php echo $this->Html->script('functions.js') ."\r\n"; ?>
<?php echo $this->Html->script('respond.js') ."\r\n"; ?>
<?php echo $this->Html->script('bootstrap.file-input.js') ."\r\n"; ?>
<?php echo $this->Html->script('core.js') ."\r\n"; ?>
</head>
<body>

<?php echo $this->fetch('content'); ?>

</body>
</html>
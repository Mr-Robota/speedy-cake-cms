<div class="container-fluid allspace">
    
    <?php echo $this->element('header'); ?>
    
</div>

<div class="container-fluid">

    <div class="row-fluid">
    
        <div class="span9">
            <div class="well">
                <h1><?php echo $row['Article']['title']; ?></h1>
                <small><?php echo $this->SpeedyCake->getTime($row['Article']['created']); ?> - <?php echo __('Written by'); ?> <strong><?php echo $this->SpeedyCake->author($row['Article']['user_id']); ?></strong></small>
                <?php echo $this->SpeedyCake->mainImage('Article',$row['Article']['id'],'<p class="text-center">','</p>'); ?>
                <?php echo $this->SpeedyCake->theContent($row['Article']['content']); ?>
                <?php if ($this->SpeedyCake->ifExists('categories') && $this->SpeedyCake->getArticleCategories($row['Article']['id'])!="") { ?>
                <p><?php echo __('Published'); ?> in: <?php echo $this->SpeedyCake->getArticleCategories($row['Article']['id']); ?></p>
                <?php } ?>
            </div>
        
        </div>
        
        <?php echo $this->element('sidebar'); ?>
    
    </div>

</div>

<?php echo $this->element('footer'); ?>
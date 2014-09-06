<div class="container-fluid allspace">
    
    <?php echo $this->element('header'); ?>
    
</div>

<div class="container-fluid">

    <div class="row-fluid">
    
        <div class="span9">
            <div class="well">
                <h1><?php echo $row['Page']['title']; ?></h1>
                <small><?php echo $this->SpeedyCake->getTime($row['Page']['created']); ?> - <?php echo __('Written by'); ?> <strong><?php echo $this->SpeedyCake->author($row['Page']['user_id']); ?></strong></small>
                <?php echo $this->SpeedyCake->mainImage('Page',$row['Page']['id'],'<p class="text-center">','</p>'); ?>
                <?php echo $this->SpeedyCake->theContent($row['Page']['content']); ?>
            </div>
        
        </div>
        
        <?php echo $this->element('sidebar'); ?>
    
    </div>

</div>

<?php echo $this->element('footer'); ?>
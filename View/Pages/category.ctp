<div class="container-fluid allspace">
    
    <?php echo $this->element('header'); ?>
    
</div>

<div class="container-fluid">

    <div class="row-fluid">
    
        <div class="span9">
        
            <?php if ($numRows>0) { ?>
            
            <?php foreach ($rows as $row): ?>
            
            <div class="well">
            
                <h1><a href="<?php echo Configure::read('SpeedyCake.url'); ?>/article/<?php echo $row['Article']['slug']; ?>"><?php echo $row['Article']['title']; ?></a></h1>
                
                <small><?php echo $this->SpeedyCake->getTime($row['Article']['created']); ?> - <?php echo __('Written by'); ?> <strong><?php echo $this->SpeedyCake->author($row['Article']['user_id']); ?></strong></small>
                
                <?php echo $this->SpeedyCake->mainImage('Article',$row['Article']['id'],'<p class="text-center">','</p>'); ?>
                
                <?php echo $this->SpeedyCake->theContent($row['Article']['content']); ?>
                
                <p><?php echo __('Published'); ?> in <?php echo $this->SpeedyCake->getArticleCategories($row['Article']['id']); ?></p>
            </div>
            
            <?php endforeach; ?>
            
            <p><?php echo $this->element('pagination'); ?></p>
            
            <?php } else echo '<p>' .__('No elements found.') .'</p>'; ?> 
        
        </div>
        
        <?php echo $this->element('sidebar'); ?>
    
    </div>

</div>

<?php echo $this->element('footer'); ?>
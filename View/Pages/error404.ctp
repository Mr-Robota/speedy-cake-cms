<div class="container-fluid allspace">
    
    <?php echo $this->element('header'); ?>
    
</div>

<div class="container-fluid">

    <div class="row-fluid">
    
        <div class="span9">
            <div class="well">
                <h1><?php echo __('Page not found!'); ?></h1>
                <p><?php echo $message; ?></p>
            </div>
        
        </div>
        
        <?php echo $this->element('sidebar'); ?>
    
    </div>

</div>

<?php echo $this->element('footer'); ?>
<div class="span3">

	<div class="accordion" id="accordion">
    
    <div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="icon-search icon-white"></i> <?php echo __('Search'); ?></a>
			</div>
			<div id="collapse2" class="accordion-body collapse in">
				<div class="accordion-inner">
					<?php 
			
						echo $this->Form->create('Page', array(
							'url' => Configure::read('SpeedyCake.url') .'/search',
							'type' => 'get',
							'class' => 'form-inline'
						));
						
					?>
                    <div class="row-fluid text-center marginTop20">
                    <div class="span12">
                    <?php
						
						if (isset($_GET["q"])) $q = stripslashes($_GET["q"]);
						else $q = "";
						
						echo $this->Form->input('q',array(
							  'id'=>'q',
							  'type'=>'text',
							  'class'=>'input-block-level',
							  'label'=>false,
							  'div'=>false,
							  'value'=>$q
						  ));
						  
					?>
                    </div>
                    </div>
                    <div class="row-fluid text-center marginTop20">
                    <div class="span12">
					<?php
					
						echo $this->Form->button(__('Search'),array(
							'type'=>'submit',
							'class'=>'btn btn-inverse'
						));
						
					?>
                    </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
    
    
    <div class="accordion-group marginTop20">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="icon-hand-right icon-white"></i> Follow me</a>
			</div>
			<div id="collapse2" class="accordion-body collapse in">
				<div class="accordion-inner">
					<ul class="unstyled">
						<?php echo '<li><a href="' .Configure::read('SpeedyCake.url') .'/feed">' .$this->Html->image('feed.png') .' Feed</a></li>'; ?>
                        <?php echo $this->SpeedyCake->getSocial(); ?>
					</ul>
				</div>
			</div>
		</div>
    
    
    <?php if ($this->SpeedyCake->ifExists('pages')) { ?>
    <div class="accordion-group marginTop20">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="icon-file icon-white"></i> <?php echo __('Pages'); ?></a>
			</div>
			<div id="collapse2" class="accordion-body collapse in">
				<div class="accordion-inner">
					<ul class="unstyled menuBorderBottom">
						<?php echo $this->SpeedyCake->getPages(); ?>
					</ul>
				</div>
			</div>
		</div>
        <?php } ?>

    	<?php if ($this->SpeedyCake->ifExists('articles')) { ?>
		<div class="accordion-group marginTop20">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="icon-list icon-white"></i> <?php echo __('Last Articles'); ?></a>
			</div>
			<div id="collapse1" class="accordion-body collapse in">
				<div class="accordion-inner">
					<ul class="unstyled menuBorderBottom">
						<?php echo $this->SpeedyCake->lastArticles(); ?>
					</ul>
				</div>
			</div>
		</div>
        <?php } ?>
        
        
        
        <?php if ($this->SpeedyCake->ifExists('categories')) { ?>
        <div class="accordion-group marginTop20">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="icon-tag icon-white"></i> <?php echo __('Categories'); ?></a>
			</div>
			<div id="collapse1" class="accordion-body collapse in">
				<div class="accordion-inner">
					<ul class="unstyled menuBorderBottom">
						<?php echo $this->SpeedyCake->getCategories(); ?>
					</ul>
				</div>
			</div>
		</div>
        <?php } ?>
        
        
        
	</div>

</div>
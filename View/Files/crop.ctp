<script type="text/javascript">

<?php $ar = 1; ?>

<?php if (isset($_GET["ar"])) $ar = $_GET["ar"]; ?>

$(function() {
	
	$('#cropimage').Jcrop({
		aspectRatio: <?php echo $ar; ?>,
		onSelect: updateCoords
	});

});

function updateCoords(c) {
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#w').val(c.w);
	$('#h').val(c.h);
	$('#xview').val(c.x);
	$('#yview').val(c.y);
	$('#wview').val(c.w);
	$('#hview').val(c.h);
}

function checkCoords() {
	if (parseInt($('#w').val())>0) return true;
	else {
		alert("<?php echo __('Please select a crop region then press Crop Image.'); ?>");
		return false;
	}
}

	
$(document).ready(function() {
	
	$("#btnSave").click(function() {
		
		var submitForm = true;
		
		$('#loader').hide();
		$('#mainModal').hide();
		
		if (!submitForm) {
			$('#loader').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#FileCropForm').submit();	
		}
		
	});
	
});

</script>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<?php echo $this->Form->create('File',array('action' => 'crop')); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Crop Image'); ?></h1>
        
        <div class="row-fluid">
        	<div class="span12">
				<p>
                	<strong>Aspect ratio</strong>
                    <div class="btn-group" data-toggle="buttons-radio">
                    <a id="aspectRatioYes" href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/files/crop/<?php echo $id; ?>?ar=1" type="button" class="btn btn-inverse <?php if ($ar==1) echo "active"; ?>"><?php echo __('Yes'); ?></a>
                    <a id="aspectRatioNo" href="<?php echo Configure::read('SpeedyCake.url'); ?>/admin/files/crop/<?php echo $id; ?>?ar=0" type="button" class="btn btn-inverse <?php if ($ar==0) echo "active"; ?>">No</a>
                    </div>
                </p>
			</div>
        </div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Image'); ?></strong></p>
                <img id="cropimage" src="<?php echo $file; ?>">
			</div>
		</div>
        
        <div class="row-fluid text-center">
				<div class="span12">
					<p>&nbsp;</p>
					<?php echo $this->Html->image('loader.gif', array('alt' => 'Wait...', 'title'=>'Wait...','style'=>'display:none;','id'=>'loader')); ?>
				</div>
			</div>
            
            <div class="row-fluid">
				<div class="span3">
					<p>X</p>
                    <?php
					echo $this->Form->input('xview',array(
						'id'=>'xview',
						'type'=>'text',
						'class'=>'input-block-level',
						'div'=>false,
						'label'=>false,
						'disabled'=>true
					));
					?>
				</div>
                <div class="span3">
					<p>Y</p>
                    <?php
					echo $this->Form->input('yview',array(
						'id'=>'yview',
						'type'=>'text',
						'class'=>'input-block-level',
						'div'=>false,
						'label'=>false,
						'disabled'=>true
					));
					?>
				</div>
                <div class="span3">
					<p>W</p>
                    <?php
					echo $this->Form->input('wview',array(
						'id'=>'wview',
						'type'=>'text',
						'class'=>'input-block-level',
						'div'=>false,
						'label'=>false,
						'disabled'=>true
					));
					?>
				</div>
                <div class="span3">
					<p>H</p>
                    <?php
					echo $this->Form->input('hview',array(
						'id'=>'hview',
						'type'=>'text',
						'class'=>'input-block-level',
						'div'=>false,
						'label'=>false,
						'disabled'=>true
					));
					?>
				</div>
			</div>
            
			<div class="row-fluid">
				<div class="span12">
					<p>&nbsp;</p>
					<?php 
					
					echo $this->Form->button('<i class="icon-ok icon-white"></i> ' .__('Crop Image'),array(
						'id'=>'btnSave',
						'type'=>'button',
						'class'=>'btn btn-large btn-inverse'
					)); 
					
					echo $this->Form->input('id',array(
						'id'=>'id',
						'type'=>'hidden',
						'value'=>$id
					));
					
					echo $this->Form->input('x',array(
						'id'=>'x',
						'type'=>'hidden'
					));
					
					echo $this->Form->input('y',array(
						'id'=>'y',
						'type'=>'hidden'
					));
					
					echo $this->Form->input('w',array(
						'id'=>'w',
						'type'=>'hidden'
					));
					
					echo $this->Form->input('h',array(
						'id'=>'h',
						'type'=>'hidden'
					));
					
					?>
				</div>
			</div>
            
	</div>
    
</div>

<?php echo $this->Form->end(); ?>

</div>
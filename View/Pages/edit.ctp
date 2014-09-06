<script type="text/javascript">

<?php 

if ($this->request->is('mobile')) echo 'var isMobile=true;';
else echo 'var isMobile=false;';

?>

var numCustomFields = <?php echo $numPagefields; ?>;

function addCustomField() {
	
	var field = '';
	field += '<div class="row-fluid" id="field_' + numCustomFields + '">';
	field += '<div class="span5">';
    field += '<p><strong><?php echo __('Key'); ?></strong></p>';
	field += '<input type="text" class="input-block-level" id="Pagefield.' + numCustomFields + '.key" name="data[Pagefield][' + numCustomFields + '][key]">';
    field += '</div>';
	field += '<div class="span5">';
    field += '<p><strong><?php echo __('Value'); ?></strong></p>';
	field += '<input type="text" class="input-block-level" id="Pagefield.' + numCustomFields + '.key" name="data[Pagefield][' + numCustomFields + '][value]">';
    field += '</div>';
	field += '<div class="span2">';
	field += '<p class="visible-desktop">&nbsp;</p>';
	field += '<button type="button" class="btn btn-inverse" onclick="javascript:deleteField(' + numCustomFields + ');"><i class="icon-remove icon-white"></i> <?php echo __('Delete'); ?></button>';
	field += '</div>';
	field += '</div>';
	
	numCustomFields++;
	
	$('#customFields').append(field);
	
}

function deleteField(id) {
	$('#field_' + id).remove();
}
	
$(document).ready(function() {
	
	$('#title').focus();
	
	$("#btnSave").click(function() {
		
		var submitForm = true;
		
		$('#loader').hide();
		$('#mainModal').hide();
		
		var title = $('#title').val();
		var description = $('#description').val();
		var image_src = $('#image_src').val();
		var created = $('#created').val();
	
		if (title=="") {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert title.'); ?>");
			$('#mainModal').modal('show');
		}
		
		if (created=="") {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert date.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		if (created!="" && !isValidDate(created)) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert a valid date.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		if (image_src!="" && !isValidImage(image_src)) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Choose file JPG, GIF or PNG.'); ?>");
			$('#mainModal').modal('show');
		}
		
		
		if (!submitForm) {
			$('#loader').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#PageEditForm').submit();	
		}
		
	});
	
	
	$('textarea[maxlength]').keyup(function(){  

        var limit = parseInt($(this).attr('maxlength'));  
        var text = $(this).val();  
        var chars = text.length;  
  
        if (chars > limit) {  
		
            var update = text.substr(0, limit);  
            $(this).val(update);
			 
        }  
    });
	
	if (!isMobile) {
		CKEDITOR.replace( 'content', {
		height:'400px',
		language:'<?php echo substr($this->Session->read('Config.language'),0,2); ?>',
		toolbar: [
				{ name: 'document', items: ['Source'] },
				{ name: 'document', items: ['Maximize'] },
				[ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ],
				[ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ],
				[ 'NumberedList','BulletedList','-','Blockquote'],
				[ 'Link','Unlink','Anchor'],
				{ name: 'insert', items : [ 'Image','Table','HorizontalRule','SpecialChar' ] },
				{ name: 'basicstyles', items: [ 'Bold','Italic','Strike' ] },
				{ name: 'colors', items : [ 'TextColor','BGColor' ] }
			]
		});
	}
	
	
});

function confirmDeleteImageSrc() {
	$('#deleteImageSrcModal').modal('show');
}

function deleteImageSrc(id) {
	window.location.href = '<?php echo Configure::read('SpeedyCake.url') ."/admin/pages/deleteImageSrc/"; ?>' + id;
}

</script>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<?php echo $this->Form->create('Page',array('type'=>'file')); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Edit Page'); ?></h1>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Title'); ?></strong></p>
                <?php 
					
				  echo $this->Form->input('title',array(
					  'id'=>'title',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$title_page,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong>Slug - <span class="text-error"><?php echo __("edit it only if you're a God of the SEO"); ?> :)</span></strong></p>
                <?php 
					
				  echo $this->Form->input('slug',array(
					  'id'=>'slug',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$slug,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
            <div class="span12">
                <p><strong><?php echo __('Main image'); ?></strong></p>
                <?php 
				
				echo $this->Form->file('image_src',array(
					'id'=>'image_src',
					'title'=>'<i class="icon-picture"></i> ' .__('Edit Image')
				));
				
				if ($oldimage_src!="") echo " " .$this->Form->button('<i class="icon-picture icon-white"></i> ' .__('Delete Image'),array(
					'onclick'=>"javascript:confirmDeleteImageSrc();",
					'type'=>'button',
					'class'=>'btn btn-danger'
				)); 
				
				if ($oldimage_src!="") echo '<p><img width="100" class="thumbnail" src="' .Configure::read('SpeedyCake.url') .'/files/uploads/' .$oldimage_src .'"></p>';
				
				?>
            </div>
        </div>
        
		<div class="row-fluid">
			<div class="span12">
				<p><strong>Meta Description (Max 160 chars)</strong></p>
                <?php 
					
				  echo $this->Form->input('description',array(
					  'id'=>'description',
					  'type'=>'textarea',
					  'rows'=>3,
					  'class'=>'input-block-level',
					  'value'=>$description,
					  'label'=>false,
					  'div'=>false,
					  'maxlength'=>160
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong>Meta Keywords</strong></p>
				<?php 
					
				  echo $this->Form->input('keywords',array(
					  'id'=>'keywords',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$keywords,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
            <div class="span12">
                <p>&nbsp;</p>
                <?php 
					
				echo $this->Form->button('<i class="icon-picture icon-white"></i> ' .__('Upload/Insert'),array(
					'onclick'=>"javascript:openFilemanager();",
					'type'=>'button',
					'class'=>'btn btn-inverse'
				)); 
				
				?>
            </div>
        </div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Content'); ?></strong></p>
                <?php 
					
				  echo $this->Form->input('content',array(
					  'id'=>'content',
					  'type'=>'textarea',
					  'rows'=>10,
					  'class'=>'input-block-level ckeditor',
					  'value'=>$content,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p>&nbsp;</p>
                <?php 
				
				if ($status==0) $default = 0;
				if ($status==1) $default = 1;
				
				$options = array(0 => __('Draft'), 1 => __('Published'));
				echo $this->Form->select('status', $options, array(
					'id'=>'status',
					'default'=>$default,
					'empty'=>false
				));
				
				?>
			</div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Date'); ?></strong> (yyyy-mm-dd hh:mm:ss)</p>
                <?php 
					
				  echo $this->Form->input('created',array(
					  'id'=>'created',
					  'type'=>'text',
					  'class'=>'input-block-level',
					  'value'=>$created,
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid">
            <div class="well" style="background-color:#E1E1E1;margin-top:10px;">
                <h1><?php echo __('Custom Fields'); ?></h1>
                <div id="customFields">
                	<?php $i= 0; ?>
                	<?php if ($numPagefields>0) { ?>
                    <?php foreach ($pagefields as $pagefield): ?>
                        <div class="row-fluid" id="field_<?php echo $i; ?>">
                        <div class="span5">
                        <p><strong><?php echo __('Key'); ?></strong></p>
                        <input type="text" class="input-block-level" id="Pagefield.<?php echo $i; ?>.key" name="data[Pagefield][<?php echo $i; ?>][key]" value="<?php echo $pagefield['Pagefield']['key']; ?>">
                        </div>
                        <div class="span5">
                        <p><strong><?php echo __('Value'); ?></strong></p>
                        <input type="text" class="input-block-level" id="Pagefield.<?php echo $i; ?>.key" name="data[Pagefield][<?php echo $i; ?>][value]" value="<?php echo $pagefield['Pagefield']['value']; ?>">
                        </div>
                        <div class="span2">
                        <p class="visible-desktop">&nbsp;</p>
                        <button type="button" class="btn btn-inverse" onclick="javascript:deleteField(<?php echo $i; ?>);"><i class="icon-remove icon-white"></i> <?php echo __('Delete'); ?></button>
                        </div>
                        </div>
                    <?php $i++; ?>
                    <?php endforeach; } ?>
                </div>
                <div class="row-fluid">
                	<div class="span12">
                    	<p>&nbsp;</p>
						<?php 
                        
                        echo $this->Form->button('<i class="icon-plus icon-white"></i> ' .__('Add'),array(
                            'onclick'=>'javascript:addCustomField();',
                            'type'=>'button',
                            'class'=>'btn btn-inverse'
                        )); 
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid text-center">
				<div class="span12">
					<p>&nbsp;</p>
					<?php echo $this->Html->image('loader.gif', array('alt' => 'Wait...', 'title'=>'Wait...','style'=>'display:none;','id'=>'loader')); ?>
				</div>
			</div>
            
			<div class="row-fluid">
				<div class="span12">
					<p>&nbsp;</p>
                    <?php 
					
					echo $this->Form->button('<i class="icon-ok icon-white"></i> ' .__('Save'),array(
						'id'=>'btnSave',
						'type'=>'button',
						'class'=>'btn btn-large btn-inverse'
					));
					
					echo $this->Form->input('id',array(
						'id'=>'id',
						'type'=>'hidden',
						'value'=>$id
					));  
					
					echo $this->Form->input('oldimage_src',array(
						'id'=>'oldimage_src',
						'type'=>'hidden',
						'value'=>$oldimage_src
					));  
					
					?>
				</div>
			</div>
            
	</div>
    
</div>

<?php echo $this->Form->end(); ?>

</div>



<?php echo $this->element('filemanager'); ?>

<?php echo $this->element('uploadfile'); ?>

<?php echo $this->element('imagegallery'); ?>

<?php echo $this->element('deleteimagesrc'); ?>
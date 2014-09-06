<script type="text/javascript">

<?php 

if ($this->request->is('mobile')) echo 'var isMobile=true;';
else echo 'var isMobile=false;';

?>

var numCustomFields = 0;

function addCustomField() {
	
	var field = '';
	field += '<div class="row-fluid" id="field_' + numCustomFields + '">';
	field += '<div class="span5">';
    field += '<p><strong><?php echo __('Key'); ?></strong></p>';
	field += '<input type="text" class="input-block-level" id="Articlefield.' + numCustomFields + '.key" name="data[Articlefield][' + numCustomFields + '][key]">';
    field += '</div>';
	field += '<div class="span5">';
    field += '<p><strong><?php echo __('Value'); ?></strong></p>';
	field += '<input type="text" class="input-block-level" id="Articlefield.' + numCustomFields + '.key" name="data[Articlefield][' + numCustomFields + '][value]">';
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
	
		if (title=="") {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Insert title.'); ?>");
			$('#mainModal').modal('show');	
		}
		
		if (image_src!="" && !isValidImage(image_src)) {
			submitForm = false;
			$('#modalMessage').html("<?php echo __('Choose file JPG, GIF or PNG.'); ?>");
			$('#mainModal').modal('show');		
		}
		
		
		$.ajax({
		type: "POST",
		async: false,
		url: "<?php echo Configure::read('SpeedyCake.url'); ?>/admin/articles/titleIsUnique",
		data: { title: title}
		})
		.done(function(response) {
			if (parseInt(response)>0) {
				submitForm = false;
				$('#modalMessage').html("<?php echo __('Title already exists.'); ?>");
				$('#mainModal').modal('show');		
			}
		});
		
		
		if (!submitForm) {
			$('#loader').hide();
			$('html, body').animate({scrollTop:0}, 400);	
		} else {
			$('#loader').show();
			$('#ArticleAddForm').submit();	
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
		CKEDITOR.replace('content', {
		height:'400px',
		language:"<?php echo substr($this->Session->read('Config.language'),0,2); ?>",
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

</script>

<div class="row-fluid">

<?php echo $this->element('menu'); ?>

<?php echo $this->Form->create('Article',array('action' => 'add','type'=>'file')); ?>

<div class="span9">

	<div class="well">
    
		<h1><?php echo __('Add new article'); ?></h1>
        
        <div class="row-fluid">
			<div class="span12">
				<p><strong><?php echo __('Title'); ?></strong></p>
                <?php 
					
				  echo $this->Form->input('title',array(
					  'id'=>'title',
					  'type'=>'text',
					  'class'=>'input-block-level',
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
					'title'=>'<i class="icon-picture"></i> ' .__('Choose image file')
				));
				
				?>
                <p></p>
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
					  'label'=>false,
					  'div'=>false
				  )); 
				  
				?>
			</div>
		</div>
        
        <div class="row-fluid marginTop20">
        	<div class="span12">
                <div class="well" style="background-color:#E1E1E1;">
                    <p><strong><?php echo __('Categories'); ?></strong></p>
                    <?php foreach ($categories as $item): ?>
                    <label class="checkbox">
                        <?php
                    
                        echo $this->Form->checkbox('Categorie', array(
                            'value' => 1,
                            'name'=>"data[Article][category][" .$item["Categorie"]["id"] ."]"
                        ));
                        
                        ?>
                        <?php echo $item["Categorie"]["name"]; ?>
                    </label>
                    <?php endforeach; ?>
                </div>
            </div>
		</div>
        
        <div class="row-fluid">
			<div class="span12">
				<p>&nbsp;</p>
                <?php 
				
				$options = array(0 => __('Draft'), 1 => __('Published'));
				echo $this->Form->select('status', $options, array(
					'id'=>'status',
					'default'=>0,
					'empty'=>false
				));
				
				?>
			</div>
		</div>
        
        <div class="row-fluid">
            <div class="well" style="background-color:#E1E1E1;margin-top:10px;">
                <h1><?php echo __('Custom Fields'); ?></h1>
                <div id="customFields"></div>
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
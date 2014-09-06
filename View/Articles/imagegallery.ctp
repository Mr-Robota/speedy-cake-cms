<script type="text/javascript">

function addToEditor(url) {
	
	var data = parent.CKEDITOR.instances.content.getData();
	data += '<img src="' + url +'">';
	parent.CKEDITOR.instances.content.setData(data);
	parent.$('#imageGallery').modal('hide');

}

function setFilter() {
	
	$('#formSearch').submit();
	
}

function setFilterMobile() {
	
	$('#formSearchMobile').submit();
	
}

</script>

<div class="row-fluid" style="margin-top:20px">
    <div class="span12">
        <div class="well">
        	<div class="row-fluid visible-desktop">
				<?php 
                
                    echo $this->Form->create('Article',array(
                        'action' => 'imagegallery',
                        'id'=>'formSearch',
                        'class'=>'form-inline',
                        'type'=>'get'
                    ));
                
                ?>
                    <div class="span12">
                            <?php 
                        
                              echo $this->Form->input('q',array(
                                  'id'=>'q',
                                  'type'=>'text',
                                  'class'=>'span8',
                                  'label'=>false,
                                  'div'=>false,
                                  'value'=>$q
                              )); 
                              
                            ?>
                            
                            <?php
                            
                            echo $this->Form->button('<i class="icon-search icon-white"></i> ' .__('Search'),array(
                                'id'=>'btnForm',
                                'type'=>'submit',
                                'class'=>'btn btn-inverse'
                            )); 
                            
                            ?>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
            <div class="row-fluid visible-phone visible-tablet">
            <?php 
                
                  echo $this->Form->create('Article',array(
                      'action' => 'imagegallery',
                      'id'=>'formSearchMobile',
                      'class'=>'form-inline',
                      'type'=>'get'
                  ));
              
              ?>
                <div class="span12 dataformsearch text-center">
                        <p></p>
                        <?php 
                        
                              echo $this->Form->input('q',array(
                                  'id'=>'q',
                                  'type'=>'text',
                                  'class'=>'input-block-level',
                                  'label'=>false,
                                  'div'=>false,
                                  'value'=>$q
                              )); 
                              
                            ?>
                        <p></p>
                        <?php
                            
                        echo $this->Form->button('<i class="icon-search icon-white"></i> ' .__('Search'),array(
                            'id'=>'btnForm',
                            'type'=>'submit',
                            'class'=>'btn btn-inverse'
                        )); 
                        
                        ?>
                </div>
            <?php echo $this->Form->end(); ?>
            </div>
        	<div class="row-fluid text-center">
                <ul class="thumbnails">
                <?php if ($numRows>0) { ?>
                <?php foreach ($rows as $row): ?>
                  <li class="span12">
                    <div class="thumbnail">
                      <img src="<?php echo $row["File"]["url"]; ?>">
                      <div class="caption">
                        <h5><?php echo $row["File"]["title"]; ?></h5>
                        <p><strong><?php echo __('Size'); ?>:</strong> <?php echo $this->Number->toReadableSize($row["File"]["size"]); ?> - <strong><?php echo __('Type'); ?>:</strong> <?php echo $row["File"]["type"]; ?></p>
                        <p>
						<?php 
					
						echo $this->Form->button('<i class="icon-arrow-down icon-white"></i><br>' .__('Add to Editor'),array(
							'onclick'=>"javascript:addToEditor('" .$row["File"]["url"] ."');",
							'type'=>'button',
							'class'=>'btn btn-inverse btn-large'
						)); 
						
						?>
                        </p>
                      </div>
                    </div>
                  </li>
                  <?php endforeach; ?> 
                  <?php } else echo '<p>' .__('No elements found.') .'</p>'; ?>
        		  <?php echo $this->element('pagination'); ?>
                </ul>
              </div>
        </div>
    </div>
</div>
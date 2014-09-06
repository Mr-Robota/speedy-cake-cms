<?php if ($this->Paginator->numbers()!=NULL) { ?>
<p><?php echo $this->Paginator->counter(
    __('Page') .' {:page} ' .__('of') .' {:pages}'
); ?></p>
<div class="pagination">
	<ul>
		<li><?php echo $this->Paginator->first(__('First')); ?></li>
		<li><?php echo $this->Paginator->prev(__('Previous')); ?></li>
			<?php echo $this->Paginator->numbers(array('before'=>'<li>','after'=>'</li>','separator'=>'')); ?>
		<li><?php echo $this->Paginator->next(__('Next')); ?></li>
		<li><?php echo $this->Paginator->last(__('Last')); ?></li>
	</ul>
</div>
<?php } ?>
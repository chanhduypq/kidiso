<div id="view-school">
	<div class="modal-header" id="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title" id="modal-title"><?php echo __('School'); ?></h4>
	</div>
	<div class="modal-body" id="modal-body">
		<!-- <?php debug($school); ?> -->
		<div class="form-group">
		    <div class="input-group" style="width: 100%;">
		        <label class="input-group-addon-1" style=""><?php echo __('School:'); ?></label>
		        <label class="input-group-addon-1" style="text-align: left; width: 70%;"><?php echo $school['School']['name'];  ?></label>
		    </div>
		    <div class="input-group" style="width: 100%;">
		        <label class="input-group-addon-1" style=""><?php echo __('Country:'); ?></label>
		        <label class="input-group-addon-1" style="text-align: left; width: 70%;"><?php echo $school['District']['Country']['name'];  ?></label>
		    </div>
		    <div class="input-group" style="width: 100%;">
		        <label class="input-group-addon-1" style=""><?php echo __('City:'); ?></label>
		        <label class="input-group-addon-1" style="text-align: left; width: 70%;"><?php echo $school['District']['city_name'];  ?></label>
		    </div>
		    <div class="input-group" style="width: 100%;">
		        <label class="input-group-addon-1" style=""><?php echo __('Address:'); ?></label>
		        <label class="input-group-addon-1" style="text-align: left; width: 70%;"><?php echo $school['School']['address'];  ?></label>
		    </div>
		    <div class="input-group" style="width: 100%;">
		        <label class="input-group-addon-1" style=""><?php echo __('Tel:'); ?></label>
		        <label class="input-group-addon-1" style="text-align: left; width: 70%;"><?php echo $school['School']['tel'];  ?></label>
		    </div>
		    <div class="input-group" style="width: 100%;">
		        <label class="input-group-addon-1" style=""><?php echo __('Fax:'); ?></label>
		        <label class="input-group-addon-1" style="text-align: left; width: 70%;"><?php echo $school['School']['fax'];  ?></label>
		    </div>
		    <div class="form-group">
		    	<label class="input-group-addon-1" style=""><?php echo __('Description:'); ?></label>
		        <?php echo $this->Form->input('description', array('value' => $school['School']['description'], 'disabled' => true, 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Description', 'style' => 'height: 120px', 'label' => false, 'div' => false)); ?>
		    </div>
		</div>

		<div class="modal-footer clearfix">

		    <button type="button" class="btn btn-danger" data-dismiss="modal"> <?php echo __('Cancel') ?></button>

		    <button type="submit" class="btn btn-primary pull-left" id="edit-school-btn"> <?php echo __('Edit') ?></button>
		</div>
	</div>
</div>

<script>
	$('#edit-school-btn').click(function(event) {
		event.preventDefault();
		var schoolId = '<?php echo $school['School']['id']; ?>';
		$.ajax({
			url: '<?php echo $this->Html->url(array('action' => 'load_edit_school')) ?>',
			type: 'post',
			data: {id: schoolId}
		})
		.done(function(data) {
			$('#view-school').html(data)
		});
	});
</script>
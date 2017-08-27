<div class="modal-header" id="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="modal-title"><?php echo __('Admin Profile'); ?></h4>
</div>
<div class="modal-body" id="modal-body">
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Name:'); ?></label>
	        <label class="input-group-addon-1" style="text-align: left; width: 70%;"><?php echo $subAdmin['SubAdmin']['sub_admin_name'];  ?></label>
	    </div>
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Birthday:'); ?></label>
	        <label class="input-group-addon-1" style="text-align: left; width: 70%;"><?php echo date('Y/m/d', strtotime($subAdmin['SubAdmin']['sub_admin_birthday']));  ?></label>
	    </div>
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Email:'); ?></label>
	        <label class="input-group-addon-1" style="text-align: left; width: 70%;"><?php echo $subAdmin['SubAdmin']['sub_admin_email'];  ?></label>
	    </div>
	</div>

	<div class="modal-footer clearfix">

	    <button type="button" class="btn btn-danger" data-dismiss="modal"> <?php echo __('Cancel') ?></button>

	    <button type="submit" class="btn btn-primary pull-left" id="edit-profile-btn"> <?php echo __('Edit') ?></button>
	</div>
</div>

<script>
	$('#edit-profile-btn').click(function(event) {
		$.ajax({
			url: '<?php echo $this->Html->url(array('action' => 'load_form_edit')); ?>',
			type: 'POST'
		})
		.done(function(data) {
			$('#modal-title').html(
				"<?php echo __('Profile Setting'); ?>"
			);
			$('#modal-body').html(data);
		})
    });
    // $('#edit-profile-modal').on('shown.bs.modal', function() {
    // 	// $('#sub-admin-modal').modal('hide');
    // })
</script>
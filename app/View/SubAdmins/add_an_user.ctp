<?php echo $this->Form->create('SchoolAdmin', array('url' => array('controller'=>'sub_admins', 'action'=>"$form_action"),'id'=>'SchoolAdminAddAnUserForm')); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="modal-title"><?php echo __('Add an user'); ?></h4>
</div>
<div class="modal-body" id="modal-body">
	<?php echo $this->Form->hidden('SchoolAdmin.id'); ?>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Username'); ?></label>
	        <?php echo $this->Form->input('school_admin_username', array('class'=>'form-control','placeholder'=>'Type username','label'=>false,'div'=>false)); ?>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Name'); ?></label>
	        <?php echo $this->Form->input('SchoolAdmin.school_admin_name', array('class'=>'form-control','placeholder'=>'Type name','label'=>false,'div'=>false)); ?>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Password'); ?></label>
	        <?php echo $this->Form->input('SchoolAdmin.school_admin_password', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'div' => false)); ?>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Confirm Password'); ?></label>
	        <?php echo $this->Form->input('password_confirm', array('value' => $this->request->data['SchoolAdmin']['school_admin_password'], 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirm password', 'label' => false, 'div' => false)) ?>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Email'); ?></label>
	        <?php echo $this->Form->input('SchoolAdmin.school_admin_email', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter email', 'label' => false, 'div' => false)); ?>
	        <label class="error hidden" id="sub-admin-email-exists"></label>
	    </div>
	</div>
	<div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('School'); ?></label>
            <?php echo $this->Form->input('SchoolAdmin.school_id', array('options' => $schools,'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
        </div>
    </div>

	<div class="modal-footer clearfix">

	    <button type="button" class="btn btn-danger" data-dismiss="modal"> <?php echo __('Cancel') ?></button>

	    <button type="submit" class="btn btn-primary pull-left"> <?php echo __('Submit') ?></button>
	</div>
</div>

<script>
	/**
	 * validation
	 */
	$('#SchoolAdminAddAnUserForm').validate({
		rules: {
			'data[SchoolAdmin][school_admin_username]': {
				noSpace: true,
			},
			'data[SchoolAdmin][school_admin_password]': 'required',
			'data[SchoolAdmin][password_confirm]': {
				equalTo: '#SchoolAdminSchoolAdminPassword'
			},
			'data[SchoolAdmin][school_admin_email]': {
				required: true,
				email: true,
			}
		},
		messages: {
			'data[SchoolAdmin][school_admin_username]': {
				noSpace: "<?php echo NO_SPACE_AND_NOT_EMPTY ?>",
				// remote: 'This username is not available'
			},
			'data[SchoolAdmin][school_admin_password]': '<?php echo PASSWORD_REQUIRE ?>',
			'data[SchoolAdmin][password_confirm]': '<?php echo PASSWORD_CONFIRM_ERROR ?>',
			'data[SchoolAdmin][school_admin_email]': {
				required: '<?php echo EMAIL_REQUIRE ?>',
				email: '<?php echo EMAIL_INVALID ?>'
			}
		},
        submitHandler: function(form) {
            form.submit();
        }
	});
	$('#SchoolAdminSchoolAdminPassword').change(function() {
        $('#SchoolAdminPasswordConfirm').val('');
    });
    $(document).ready(function() {
        jQuery.validator.addMethod("noSpace", function(value, element) {
          return value.indexOf(" ") < 0 && value != "";
        });
    });
    // Check username available
    $('#SchoolAdminSchoolAdminUsername').change(function() {
    	$.post('<?php echo $this->Html->url(array('action' => 'check_username')); ?>', {username: $('#SchoolAdminSchoolAdminUsername').val()}, function(result) {
    		if (result == 'false') {
    			$('#SchoolAdminSchoolAdminUsername').after('<label for="SchoolAdminSchoolAdminUsername" class="error" style=""><?php echo USERNAME_EXISTS ?></label>');
    		};
    	});
    });
    // Check email available
    $('#SchoolAdminSchoolAdminEmail').change(function() {
    	$.post('<?php echo $this->Html->url(array('action' => 'check_email')); ?>', {email: this.value}, function(result) {
    		if (result == 'false') {
    			$('#SchoolAdminSchoolAdminEmail').after('<label for="SchoolAdminSchoolAdminEmail" class="error" style=""><?php echo EMAIL_EXISTS ?></label>');
    		};
    	});
    });
</script>
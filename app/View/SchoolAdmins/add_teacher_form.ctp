<?php echo $this->Form->create('Instructor', array('url' => array('controller'=>'school_admins', 'action'=>"$form_action"),'id'=>'teacher-form')); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="modal-title"><?php echo __('Add Teacher'); ?></h4>
</div>
<div class="modal-body" id="modal-body">
	<?php echo $this->Form->hidden('id'); ?>
    <?php echo $this->Form->hidden('school_id', array('value' => $schoolId)) ?>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Username'); ?></label>
	        <?php echo $this->Form->input('instructor_username', array('class'=>'form-control','placeholder'=>'Type username','label'=>false,'div'=>false)); ?>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Full Name'); ?></label>
	        <?php echo $this->Form->input('name', array('class'=>'form-control','placeholder'=>'Type name','label'=>false,'div'=>false)); ?>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Password'); ?></label>
	        <?php echo $this->Form->input('instructor_password', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'div' => false)); ?>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Confirm Password'); ?></label>
	        <?php echo $this->Form->input('instructor_password_confirm', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirm password', 'label' => false, 'div' => false)) ?>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Birthday'); ?></label>
	        <?php echo $this->Form->input('birthday', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter birthday', 'label' => false, 'div' => false)); ?>
	    </div>
	</div>
	<div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('Sex'); ?></label>
            <?php echo $this->Form->input('sex', array('label'=>false,'div'=>false, 'class' => 'form-control', 'type' => 'select', 'options' => $sex_array)); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('Email'); ?></label>
            <?php echo $this->Form->input('email', array('label'=>false,'div'=>false, 'class' => 'form-control', 'placeholder' => 'Type email')); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="input-group-addon-1"><?php echo __('Description'); ?></label>
        <?php echo $this->Form->input('description', array('type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Description', 'style' => 'height: 120px', 'label' => false, 'div' => false)); ?>
    </div>
    <!-- <div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('District'); ?></label>
            <?php echo $this->Form->input('district_id', array('label'=>false,'div'=>false, 'class' => 'form-control', 'options' => $districts)); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('School'); ?></label>
            <?php echo $this->Form->input('school_id', array('label'=>false,'div'=>false, 'class' => 'form-control', 'options' => $schools)); ?>
        </div>
    </div> -->

	<div class="modal-footer clearfix">

	    <button type="button" class="btn btn-danger" data-dismiss="modal"> <?php echo __('Cancel') ?></button>

	    <button type="submit" class="btn btn-primary pull-left"> <?php echo __('Submit') ?></button>
	</div>
</div>
<?php echo $this->Html->css('admin/datepicker'); ?>
<?php echo $this->Html->script('admin/bootstrap-datepicker'); ?>


<script>
	$(document).ready(function() {
		var districtId = $('#InstructorDistrictId').val();
		var schoolId = $('#InstructorSchoolId').val();

		// getSchool(districtId);
		// getClass(schoolId);
	});
	$('#InstructorBirthday').datepicker({
    	format: 'yyyy/mm/dd'
    });
    $('#InstructorDistrictId').change(function() {
    	getSchool(this.value);
    });
    function getSchool (id) {
    	$.ajax({
    		url: '<?php echo $this->Html->url(array('action' => 'get_school')) ?>',
    		type: 'post',
    		data: {districtId: id},
    		dataType: 'json',
    		beforeSend: function() {
    			$('#InstructorSchoolId').empty();
    		},
    		success: function(data) {
    			$.each(data, function(index, val) {
    				$('#InstructorSchoolId').append($('<option></option>')
     				.attr("value", index).text(val));
    			});
    		}
    	});
    }
    $('#teacher-form').validate({
        rules: {
            'data[Instructor][instructor_username]': {
                required: true,
                noSpace: true
            },
            'data[Instrcutor][name]': 'required',
            'data[Instructor][instructor_password]': 'required',
            'data[Instructor][instructor_password_confirm]': {
                equalTo: '#InstructorInstructorPassword'
            },
            'data[Instructor][birthday]': 'required',
            'data[Instructor][school_id]': 'required',
        },
        messages: {
            'data[Instructor][instructor_username]': {
                required: '<?php echo TEACHER_USERNAME_REQUIRE ?>',
                noSpace: "<?php echo NO_SPACE_AND_NOT_EMPTY ?>"
            },
            'data[Instructor][name]': '<?php echo TEACHER_NAME_REQUIRE ?>',
            'data[Instructor][instructor_password]': '<?php echo PASSWORD_REQUIRE ?>',
            'data[Instructor][instructor_password_confirm]': '<?php echo PASSWORD_CONFIRM_ERROR ?>',
            'data[Instructor][birthday]': '<?php echo TEACHER_BIRTHDAY_REQUIRE ?>',
            'data[Instructor][school_id]': '<?php echo SCHOOL_REQUIRE ?>',
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    $('#InstructorInstructorUsername').change(function(event) {
        $.post('<?php echo $this->Html->url(array('action' => 'check_instructor_username')) ?>', {instructor_username: this.value}, function(result) {
            if (result == 'false') {
                $('#InstructorInstructorUsername').after('<label for="InstructorInstructorUsername" class="error" style=""><?php echo USERNAME_EXISTS ?></label>');
            };
        });
    });
    $('#InstructorEmail').change(function(event) {
        $.post('<?php echo $this->Html->url(array('action' => 'check_instructor_email')) ?>', {email: this.value}, function(result) {
            if (result == 'false') {
                $('#InstructorEmail').after('<label for="InstructorEmail" class="error" style=""><?php echo EMAIL_EXISTS ?></label>');
            };
        });
    });
    $('#InstructorInstructorPassword').change(function() {
        $('#InstructorInstructorPasswordConfirm').val('');
    });
    $(document).ready(function() {
        jQuery.validator.addMethod("noSpace", function(value, element) {
          return value.indexOf(" ") < 0 && value != "";
        });
    });
</script>
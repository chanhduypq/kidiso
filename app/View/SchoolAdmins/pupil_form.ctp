<?php echo $this->Form->create('Pupil', array('url' => array('controller'=>'school_admins', 'action'=>"$form_action"),'id'=>'pupil-form')); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="modal-title"><?php echo __('Edit Pupil'); ?></h4>
</div>
<div class="modal-body" id="modal-body">
	<?php echo $this->Form->hidden('id'); ?>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Username'); ?></label>
	        <?php echo $this->Form->input('pupil_username', array('class'=>'form-control','placeholder'=>'Type username','label'=>false,'div'=>false)); ?>
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
	        <?php echo $this->Form->input('pupil_password', array('value' => $this->request->data['Pupil']['pupil_password'], 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'div' => false)); ?>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Confirm Password'); ?></label>
	        <?php echo $this->Form->input('pupil_password_confirm', array('value' => $this->request->data['Pupil']['pupil_password'], 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirm password', 'label' => false, 'div' => false)) ?>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Birthday'); ?></label>
	        <?php echo $this->Form->input('birthday', array('value' => date('Y/m/d', strtotime($this->request->data['Pupil']['birthday'])),'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter birthday', 'label' => false, 'div' => false)); ?>
	    </div>
	</div>
	<div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('Sex'); ?></label>
            <?php echo $this->Form->input('sex', array('label'=>false,'div'=>false, 'class' => 'form-control', 'type' => 'select', 'options' => $sex_array, 'selected' => $this->request->data['Pupil']['sex'])); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('Family Member No'); ?></label>
            <?php echo $this->Form->input('family_member_no', array('label'=>false,'div'=>false, 'class' => 'form-control')); ?>
        </div>
    </div>
    <!-- <div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('District'); ?></label>
            <?php echo $this->Form->input('district_id', array('label'=>false,'div'=>false, 'class' => 'form-control')); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('School'); ?></label>
            <?php echo $this->Form->input('school_id', array('label'=>false,'div'=>false, 'class' => 'form-control')); ?>
        </div>
    </div> -->
    <div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('ClassID'); ?></label>
            <?php echo $this->Form->input('classes_id', array('label'=>false,'div'=>false, 'class' => 'form-control')); ?>
        </div>
    </div>

	<div class="modal-footer clearfix">

	    <button type="button" class="btn btn-danger" data-dismiss="modal"> <?php echo __('Cancel') ?></button>

	    <button type="submit" class="btn btn-primary pull-left"> <?php echo __('Submit') ?></button>
	</div>
</div>
<?php echo $this->Html->css('admin/datepicker'); ?>
<?php echo $this->Html->script('admin/bootstrap-datepicker'); ?>


<script>
	$(document).ready(function() {
		var districtId = $('#PupilDistrictId').val();
		var schoolId = $('#PupilSchoolId').val();

		// getSchool(districtId);
		// getClass(schoolId);
	});
	$('#PupilBirthday').datepicker({
    	format: 'yyyy/mm/dd'
    });
    $('#PupilDistrictId').change(function() {
    	getSchool(this.value);
    });
    $('#PupilSchoolId').change(function() {
    	getClass(this.value);
    });
    function getSchool (id) {
    	$.ajax({
    		url: '<?php echo $this->Html->url(array('action' => 'get_school')) ?>',
    		type: 'post',
    		data: {districtId: id},
    		dataType: 'json',
    		beforeSend: function() {
    			$('#PupilSchoolId').empty();
    		},
    		success: function(data) {
    			$.each(data, function(index, val) {
    				$('#PupilSchoolId').append($('<option></option>')
     				.attr("value", index).text(val));
    			});
    			getClass($('#PupilSchoolId').val());
    		}
    	});
    }
    function getClass (id) {
    	$.ajax({
    		url: '<?php echo $this->Html->url(array('action' => 'get_class')) ?>',
    		type: 'post',
    		data: {schoolId: id},
    		dataType: 'json',
    		beforeSend: function() {
		    	$('#PupilClassesId').empty();
    		},
    		success: function(data) {
    			// $('#PupilClassId').empty();
    			$.each(data, function(index, val) {
    				$('#PupilClassesId').append($('<option></option>')
     				.attr("value", index).text(val));
    			});
    		}
    	});
    }
    $('#pupil-form').validate({
        rules: {
            'data[Pupil][pupil_username]': {
                required: true,
                noSpace: true
            },
            'data[Pupil][name]': 'required',
            'data[Pupil][pupil_password]': 'required',
            'data[Pupil][pupil_password_confirm]': {
                equalTo: '#PupilPupilPassword'
            },
            'data[Pupil][birthday]': 'required',
            'data[Pupil][district_id]': 'required',
            'data[Pupil][school_id]': 'required',
            'data[Pupil][classes_id]': 'required'
        },
        messages: {
            'data[Pupil][pupil_username]': {
                required: '<?php echo PUPIL_USERNAME_REQUIRE ?>',
                noSpace: "<?php echo NO_SPACE_AND_NOT_EMPTY ?>"
            },
            'data[Pupil][name]': '<?php echo PUPIL_NAME_REQUIRE ?>',
            'data[Pupil][pupil_password]': '<?php echo PASSWORD_REQUIRE ?>',
            'data[Pupil][pupil_password_confirm]': '<?php echo PASSWORD_CONFIRM_ERROR ?>',
            'data[Pupil][birthday]': '<?php echo PUPIL_BIRTHDAY_REQUIRE ?>',
            'data[Pupil][district_id]': '<?php echo CITY_REQUIRE ?>',
            'data[Pupil][school_id]': '<?php echo SCHOOL_REQUIRE ?>',
            'data[Pupil][classes_id]': '<?php echo CLASS_REQUIRE ?>'
        },
        submitHandler: function(form) {
            if (submitForm == false) {
                return false;
            }
            else {
                form.submit();
            }
        }
    });
    var submitForm = true;
    $('#PupilPupilUsername').change(function(event) {
        $.post('<?php echo $this->Html->url(array('action' => 'check_pupil_username')) ?>', {pupil_username: this.value}, function(result) {
            if (result == 'false') {
                $('#PupilPupilUsername').after('<label for="PupilPupilUsername" class="error" style=""><?php echo USERNAME_EXISTS ?></label>');
                submitForm = false;
            } else {
                submitForm = true;
            }
        });
    });
    $('#PupilPupilPassword').change(function() {
        $('#PupilPupilPasswordConfirm').val('');
    });
    $(document).ready(function() {
        jQuery.validator.addMethod("noSpace", function(value, element) {
          return value.indexOf(" ") < 0 && value != "";
        });
    });
</script>
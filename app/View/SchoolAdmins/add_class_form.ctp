<?php echo $this->Form->create('Classes', array('url' => array('controller'=>'school_admins', 'action'=>"$form_action"),'id'=>'classes-form')); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="modal-title"><?php echo __('Add Class'); ?></h4>
</div>
<div class="modal-body" id="modal-body">
	<?php echo $this->Form->hidden('id'); ?>
    <?php echo $this->Form->hidden('school_id', array('value' => $schoolId)) ?>
    <div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('ClassID'); ?></label>
            <?php echo $this->Form->input('class_name', array('label'=>false,'div'=>false, 'class' => 'form-control', 'placeholder' => 'Type ClassID')); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('Description'); ?></label>
            <?php echo $this->Form->input('description', array('type' => 'textarea', 'placeholder' => 'Type description' , 'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
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
            <label class="input-group-addon-1" style=""><?php echo __('Teacher'); ?></label>
            <?php echo $this->Form->input('instructor_id', array('label'=>false,'div'=>false, 'class' => 'form-control', 'options' => $instructors)); ?>
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
    var requestSent = false;
    var submitForm = true;
	$(document).ready(function() {
		var districtId = $('#ClassesDistrictId').val();
		var schoolId = $('#ClassesSchoolId').val();

		// getSchool(districtId);
	});
    $('#ClassesDistrictId').change(function() {
    	getSchool(this.value);
    });
    $('#ClassesSchoolId').change(function() {
    	// getClass(this.value);
        getTeacher(this.value);
    });
    function getSchool (id) {
        if (!requestSent) {
            requestSent = true;
            $.ajax({
                url: '<?php echo $this->Html->url(array('action' => 'get_school')) ?>',
                type: 'post',
                data: {districtId: id},
                dataType: 'json',
                beforeSend: function() {
                    $('#ClassesSchoolId').empty();
                },
                success: function(data) {
                    $.each(data, function(index, val) {
                        $('#ClassesSchoolId').append($('<option></option>')
                        .attr("value", index).text(val));
                    });
                    // getClass($('#ClassesSchoolId').val());
                    getTeacher($('#ClassesSchoolId').val());
                    requestSent = false;
                }
            });
        };
    	
    }

    function getTeacher(id) {
        $.ajax({
            url: '<?php echo $this->Html->url(array('action' => 'get_teacher')) ?>',
            type: 'post',
            data: {schoolId: id},
            dataType: 'json',
            beforeSend: function() {
                $('#ClassesInstructorId').empty();
            },
            success: function(data) {
                $.each(data, function(index, val) {
                    $('#ClassesInstructorId').append($('<option></option>')
                    .attr("value", index).text(val));
                });
            }
        });
    }
    $('#classes-form').validate({
        rules: {
            'data[Classes][class_name]': {
                required: true,
                noSpace: true
            }
        },
        messages: {
            'data[Classes][class_name]': {
                required: '<?php echo CLASS_ID_REQUIRE ?>',
                noSpace: "<?php echo NO_SPACE_AND_NOT_EMPTY ?>"
            }
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
    $(document).ready(function() {
        jQuery.validator.addMethod("noSpace", function(value, element) {
          return value.indexOf(" ") < 0 && value != "";
        });
    });
    $('#ClassesClassName').blur(function() {
        var schoolId = $('#ClassesSchoolId').val();
        var classId = this.value;
        $.post('<?php echo $this->Html->url(array('action' => 'check_class_name')) ?>', {schoolId: schoolId, classId: classId}, function(result) {
            if (result == 'false') {
                $('#ClassesClassName').after('<label for="ClassesClassName" class="error" style=""><?php echo CLASS_ID_EXISTS ?></label>');
                submitForm = false;
            } else {
                submitForm = true;
            }
        });
    });

</script>
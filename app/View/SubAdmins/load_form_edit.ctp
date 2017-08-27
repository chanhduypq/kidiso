<?php echo $this->Form->create('SubAdmin', array('url' => array('controller'=>'sub_admins', 'action'=>'edit'))); ?>
<?php echo $this->Form->input('id', array('type' =>'hidden', 'value' => $subAdmin['SubAdmin']['id'])); ?>
<div class="form-group">
    <div class="input-group" style="width: 100%;">
        <label class="input-group-addon-1" style=""><?php echo __('Name'); ?></label>
        <?php echo $this->Form->input('sub_admin_name', array('value' => $subAdmin['SubAdmin']['sub_admin_name'],'class'=>'form-control','placeholder'=>'Type name','label'=>false,'div'=>false)); ?>
    </div>
</div>
<div class="form-group">
    <div class="input-group" style="width: 100%;">
        <label class="input-group-addon-1" style=""><?php echo __('Birthday'); ?></label>
        <?php echo $this->Form->input('sub_admin_birthday', array('type' => 'text', 'value' => date('Y/m/d',strtotime($subAdmin['SubAdmin']['sub_admin_birthday'])),'class'=>'form-control','placeholder'=>'Type name','label'=>false,'div'=>false)); ?>
    </div>
</div>
<div class="form-group">
    <div class="input-group" style="width: 100%;">
        <label class="input-group-addon-1" style=""><?php echo __('Email'); ?></label>
        <?php echo $this->Form->input('sub_admin_email', array('value' => $subAdmin['SubAdmin']['sub_admin_email'],'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Address', 'label' => false, 'div' => false)); ?>
        <label class="error hidden" id="sub-admin-email-exists"></label>
    </div>
</div>
<div class="form-group">
    <div class="input-group" style="width: 100%;">
        <label class="input-group-addon-1" style=""><?php echo __('New password'); ?></label>
        <?php echo $this->Form->input('sub_admin_password', array('value' => $subAdmin['SubAdmin']['sub_admin_password'],'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'div' => false)); ?>
    </div>
</div>
<div class="form-group">
    <div class="input-group" style="width: 100%;">
        <label class="input-group-addon-1" style=""><?php echo __('Confirm new password'); ?></label>
        <?php echo $this->Form->input('password_confirm', array('value' => $subAdmin['SubAdmin']['sub_admin_password'],'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirm password', 'label' => false, 'div' => false)) ?>
    </div>
</div>
<div class="modal-footer clearfix">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> <?php echo __('Cancel') ?></button>
    <button type="submit" class="btn btn-primary pull-left"> <?php echo __('Submit') ?></button>
</div>
<?php echo $this->Html->css('admin/datepicker'); ?>
<?php echo $this->Html->script('admin/bootstrap-datepicker'); ?>
<script>
    $('#SubAdminSubAdminEmail').change(function() {
        $.post('system_admins/check_email', {email: $('#SubAdminSubAdminEmail').val()}, function(result) {
            $("#sub-admin-email-exists").addClass('hidden');
            if (result == 1) {
                $("#sub-admin-email-exists").removeClass('hidden');
                $("#sub-admin-email-exists").text('<?php echo EMAIL_EXISTS ?>');

            };
        });
    });
    $("#SubAdminLoadFormEditForm").validate({
         rules: {
            'data[SubAdmin][sub_admin_email]': {
                required: true,
                email: true
            },
            'data[SubAdmin][sub_admin_password]': "required",
            'data[SubAdmin][password_confirm]': {
                equalTo: '#SubAdminSubAdminPassword'
            }

        },
        messages: {
            'data[SubAdmin][sub_admin_email]': "<?php echo EMAIL_INVALID ?>",
            'data[SubAdmin][sub_admin_password]': "<?php echo PASSWORD_REQUIRE ?>",
            'data[SubAdmin][password_confirm]': "<?php echo PASSWORD_CONFIRM_ERROR ?>"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    $('#SubAdminSubAdminPassword').change(function() {
        $('#SubAdminPasswordConfirm').val('');
    });
    $('#SubAdminSubAdminBirthday').datepicker({
    	format: 'yyyy/mm/dd'
    });
</script>
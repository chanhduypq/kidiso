<?php echo $this->Form->create('SubAdmin', array('url' => array('controller'=>'system_admins', 'action'=>'edit'))); ?>
<?php echo $this->Form->input('id', array('type' =>'hidden', 'value' => $subAdmin['SubAdmin']['id'])); ?>
<div class="form-group">
    <div class="input-group" style="width: 100%;">
        <label class="input-group-addon-1" style=""><?php echo __('Username'); ?></label>
        <?php echo $this->Form->input('sub_admin_username', array('value' => $subAdmin['SubAdmin']['sub_admin_username'],'class'=>'form-control','placeholder'=>'Type name','label'=>false,'div'=>false)); ?>
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
        <label class="input-group-addon-1" style=""><?php echo __('Password'); ?></label>
        <?php echo $this->Form->input('sub_admin_password', array('value' => $subAdmin['SubAdmin']['sub_admin_password'],'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'div' => false)); ?>
    </div>
</div>
<div class="form-group">
    <div class="input-group" style="width: 100%;">
        <label class="input-group-addon-1" style=""><?php echo __('Confirm Password'); ?></label>
        <?php echo $this->Form->input('password_confirm', array('value' => $subAdmin['SubAdmin']['sub_admin_password'],'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirm password', 'label' => false, 'div' => false)) ?>
    </div>
</div>
<div class="form-group">
    <div class="input-group" style="width: 100%;">
        <label class="input-group-addon-1" style=""><?php echo __('City'); ?></label>
        <?php echo $this->Form->input('District', array('options' => $District,'type' => 'select', 'selected' => $subAdmin['District']['id'],'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
    </div>
</div>
<div class="form-group">
	<label class="input-group-addon-1" style="visibility: hidden;"><?php echo __('Description'); ?></label>
    <?php echo $this->Form->input('description', array('value' => $subAdmin['SubAdmin']['description'],'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Description', 'style' => 'height: 120px', 'label' => false, 'div' => false)); ?>
    <!-- <textarea name="message" id="email_message" class="form-control" placeholder="Description" style="height: 120px;"></textarea> -->
</div>
<div class="modal-footer clearfix">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel</button>
    <button type="submit" class="btn btn-primary pull-left"> Submit</button>
</div>
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
    $('#SubAdminSubAdminUsername').change(function() {
        $.post('<?php echo $this->Html->url(array('action' => 'check_username')) ?>', {username: this.value}, function(result) {
            if (result == 'false') {
                $('#SubAdminSubAdminUsername').after('<label for="SubAdminSubAdminUsername" class="error"><?php echo USERNAME_EXISTS ?></label>');
            };
        });
    });
    $("#SubAdminLoadDataEditForm").validate({
         rules: {
            'data[SubAdmin][sub_admin_username]': {
                noSpace: true
            },
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
            'data[SubAdmin][sub_admin_username]': {
                noSpace: "<?php echo NO_SPACE_AND_NOT_EMPTY ?>"
            },
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
    $(document).ready(function() {
        jQuery.validator.addMethod("noSpace", function(value, element) {
          return value.indexOf(" ") < 0 && value != "";
        });
    });
</script>
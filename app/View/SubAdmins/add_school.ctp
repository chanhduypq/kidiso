<?php echo $this->Form->create('School', array('url' => array('controller'=>'sub_admins', 'action'=>"$form_action"), 'id' => 'SchoolAddSchoolFormForm')); ?>
<?php echo $this->Form->input('id', array('type' =>'hidden')); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo __('Add/Edit School'); ?></h4>
</div>
<?php //debug($form_action); ?>
<div class="modal-body" id="modal-body">
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('School'); ?></label>
	        <?php echo $this->Form->input('School.name', array('class'=>'form-control','placeholder'=>'Type name of school','label'=>false,'div'=>false)); ?>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Address'); ?></label>
	        <?php echo $this->Form->input('School.address', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Address', 'label' => false, 'div' => false)); ?>
	        <label class="error hidden" id="sub-admin-email-exists"></label>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Tel'); ?></label>
	        <?php echo $this->Form->input('School.tel', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Tel', 'label' => false, 'div' => false)); ?>
	    </div>
	</div>
	<div class="form-group">
	    <div class="input-group" style="width: 100%;">
	        <label class="input-group-addon-1" style=""><?php echo __('Fax'); ?></label>
	        <?php echo $this->Form->input('School.fax', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Fax', 'label' => false, 'div' => false)) ?>
	    </div>
	</div>
	<div class="form-group">
        <div class="input-group" style="width: 100%;">
            <label class="input-group-addon-1" style=""><?php echo __('City'); ?></label>
            <?php echo $this->Form->input('School.district_id', array('options' => $District,'type' => 'select', 'selected' => $this->request->data['School']['district_id'],'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
        </div>
    </div>
	<div class="form-group">
	    <label class="input-group-addon-1" style=""><?php echo __('Description'); ?></label>
	    <?php echo $this->Form->input('School.description', array('type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Description', 'style' => 'height: 120px', 'label' => false, 'div' => false)); ?>
	</div>

	<div class="modal-footer clearfix">

	    <button type="button" class="btn btn-danger" data-dismiss="modal"> <?php echo __('Cancel') ?></button>

	    <button type="submit" class="btn btn-primary pull-left"> <?php echo __('Submit') ?></button>
	</div>
</div>
<script>
	$('#SchoolAddSchoolFormForm').validate({
		rules: {
			'data[School][name]': 'required',
			'data[School][address]': 'required'

		},
		'messages': {
			'data[School][name]': "<?php echo SCHOOL_NAME_REQUIRE; ?>",
			'data[School][address]': "<?php echo SCHOOL_ADDRESS_REQUIRE; ?>"
		},
		submitHandler: function(form) {
			form.submit();
		}
	})
</script>
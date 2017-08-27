<?php
    $this->Paginator->options(array(
        'update' => '#main-content',
        'evalScripts' => true,
        'before' => $this->Js->get('#busy-indicator')->effect(
            'fadeIn',
            array('buffer' => false)
        ),
        'complete' => $this->Js->get('#busy-indicator')->effect(
            'fadeOut',
            array('buffer' => false)
        )
    ));
 ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?php echo __('Teacher Management'); ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    	<div class="ajax-loading" style="text-align: center">
    	    <?php echo $this->Html->image('images/ajax-loader.gif', array('id' => 'busy-indicator', 'style' => 'display: none;')); ?>
    	</div>

    	<?php if ($this->Session->check('Message.flash')) { ?>
    	    <div class="alert alert-info alert-dismissable">
    	        <i class="fa fa-info"></i>
    	        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    	        <b><?php echo $this->Session->flash(); ?></b>
    	    </div>
    	<?php } ?>
    	<?php if (!empty($instructors)): ?>
	        <table class="table table-bordered">
	            <tbody>
	            	<tr>
		                <th style="width: 10px"><?php echo __('No'); ?></th>
		                <th><?php echo __('Username'); ?></th>
		                <th><?php echo __('Name'); ?></th>
		                <th><?php echo __('Birthday'); ?></th>
		                <th><?php echo __('Description'); ?></th>
		                <th><?php echo __('Sex'); ?></th>
		                <th><?php echo __('Email'); ?></th>
		                <!-- <th><?php echo __('School'); ?></th> -->
		                <th><?php echo __('Actions'); ?></th>
		            </tr>
		            <?php 
		            $i = 1;
		            foreach ($instructors as $instructor): ?>
		            <!-- <?php debug($instructor); ?> -->
		            	<tr>
		            	    <td><?php echo $i++; ?></td>
		            	    <td><?php echo $instructor['Instructor']['instructor_username']; ?></td>
		            	    <td><?php echo $instructor['Instructor']['name']; ?></td>
		            	    <td><?php echo date('Y/m/d', strtotime($instructor['Instructor']['birthday'])); ?></td>
		            	    <td><?php echo $instructor['Instructor']['description']; ?></td>
		            	    <td><?php echo ($instructor['Instructor']['sex']==1)?'Male':'Female'; ?></td>
		            	    <td><?php echo $instructor['Instructor']['email']; ?></td>
		            	    <!-- <td><?php echo $instructor['School']['name']; ?></td> -->
		            	    <td style="width: 150px">
		            	    	<a href="#" onclick="editInstructor(<?php echo $instructor['Instructor']['id']; ?>)" data-target="#school-admin-modal" data-toggle="modal" class="btn btn-info"><?php echo __('Edit') ?></a>
		            	    	<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete_instructor', $instructor['Instructor']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $instructor['Instructor']['id'])); ?>
		            	    </td>
		            	</tr>
		            <?php endforeach ?>
		        </tbody>
		    </table>
			<div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <?php
                            if($this->params['paging']['Instructor']['pageCount'] >1){
                            echo $this->Paginator->prev('&laquo;', array('tag' => 'li',  'title' => __('Previous page'), 'disabledTag' => 'span', 'escape' => false), null, array('tag' => 'li', 'disabledTag' => 'span', 'escape' => false, 'class' => 'disabled'));
                            echo $this->Paginator->numbers(array('separator' => false, 'tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active'));
                            echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'disabledTag' => 'span', 'title' => __('Next page'), 'escape' => false), null, array('tag' => 'li', 'disabledTag' => 'span', 'escape' => false, 'class' => 'disabled'));
                            }
                         ?>
                    </ul>
                </div>
            <?php else: ?>
                <p><b><?php echo NO_RECORD_FOUND; ?></b></p>
            <?php endif ?>
    </div><!-- /.box-body -->
</div>
<?php echo $this->Js->writeBuffer(); ?>
<!-- ADD/EDIT SCHOOL MODAL -->
<div class="modal fade kid-modal" id="school-admin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	function editInstructor (id) {
		$.ajax({
			url: '<?php echo $this->Html->url(array('action' => 'edit_instructor_form')) ?>',
			type: 'post',
			data: {id: id},
		})
		.done(function(result) {
			$('#modal-content').html(result);

		})
	}
	$('#add-a-teacher').click(function(event) {
		event.preventDefault();
		$.ajax({
			url: '<?php echo $this->Html->url(array('action' => 'add_teacher_form')) ?>',
			type: 'post'
		})
		.done(function(result) {
			$('#modal-content').html(result);
		})
	});
</script>
<?php
    $this->Paginator->options(array(
        'update' => '#content',
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
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo __('Home') ?></a></li>
        <li><a href="#"><?php echo __('School Admin') ?></a></li>
        <li class="active"><?php echo __('Index') ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content" id="main-content">
    <div class="box">
	    <div class="box-header">
	        <h3 class="box-title"><?php echo __('Pupil Management'); ?></h3>
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
	    	<?php if (!empty($pupils)): ?>
		        <table class="table table-bordered">
		            <tbody>
		            	<tr>
			                <th style="width: 10px"><?php echo __('No'); ?></th>
			                <th><?php echo __('Username'); ?></th>
			                <th><?php echo __('Full Name'); ?></th>
			                <th><?php echo __('Birthday'); ?></th>
			                <th><?php echo __('Sex'); ?></th>
			                <th><?php echo __('ClassID'); ?></th>
			                <th><?php echo __('Actions'); ?></th>
			            </tr>
			            <?php 
			            $i = 1;
			            foreach ($pupils as $pupil): ?>
			            	<tr>
			            	    <td><?php echo $i++; ?></td>
			            	    <td><?php echo $pupil['Pupil']['pupil_username']; ?></td>
			            	    <td><?php echo $pupil['Pupil']['name']; ?></td>
			            	    <td><?php echo date('Y/m/d', strtotime($pupil['Pupil']['birthday'])); ?></td>
			            	    <td><?php echo ($pupil['Pupil']['sex'] == 1)?'Male':'Female'; ?></td>
			            	    <td><?php echo $pupil['Classes']['class_name']; ?></td>
			            	    <td style="width: 150px">
			            	    	<a href="#" onclick="editPupil(<?php echo $pupil['Pupil']['id']; ?>)" data-target="#school-admin-modal" data-toggle="modal" class="btn btn-info"><?php echo __('Edit') ?></a>
			            	    	<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete_pupil', $pupil['Pupil']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $pupil['Pupil']['id'])); ?>
			            	    </td>
			            	</tr>
			            <?php endforeach ?>
			        </tbody>
			    </table>
				<div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <?php
                                if($this->params['paging']['Pupil']['pageCount'] >1){
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
</section><!-- /.content -->
<?php echo $this->Js->writeBuffer(); ?>
<!-- ADD/EDIT SCHOOL MODAL -->
<div class="modal fade kid-modal" id="school-admin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	var requestSent = false;
	var page = 'pupil';
	$(document).ready(function() {
		var class_flag = "<?php echo $this->Session->read('add_class_flag'); ?>";
		var instructor_flag = "<?php echo $this->Session->read('add_instructor_flag'); ?>";
		if (class_flag == '1') {
			$('#list-class-btn').click();
		};
		if (instructor_flag == '1') {
			$('#list-teacher-btn').click();
		};
	});
	function editPupil (id) {
		$.ajax({
			url: '<?php echo $this->Html->url(array('action' => 'edit_pupil_form')) ?>',
			type: 'post',
			data: {id: id},
		})
		.done(function(result) {
			$('#modal-content').html(result);

		})
	}
	$('#add-a-pupil').click(function(event) {
		event.preventDefault();
		$.ajax({
			url: '<?php echo $this->Html->url(array('action' => 'add_pupil_form')) ?>',
			type: 'post'
		})
		.done(function(result) {
			$('#modal-content').html(result);
		})
	});
	$('#list-class-btn').click(function(event) {
		event.preventDefault();
		if (!requestSent) {
			requestSent = true;
			$.ajax({
				url: '<?php echo $this->Html->url(array('action' => 'classes')) ?>',
				type: 'post',
				beforeSend: function() {
					$('#main-content').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
				}
			})
			.done(function(result) {
				$('#main-content').html(result);
				requestSent = false;
				page = 'class';
			})
		};
		
	});
	$('#list-teacher-btn').click(function(event) {
		event.preventDefault();
		if (!requestSent) {
			requestSent = true;
			$.ajax({
				url: '<?php echo $this->Html->url(array('action' => 'instructor')) ?>',
				type: 'post',
				beforeSend: function() {
					$('#main-content').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
				}
			})
			.done(function(result) {
				$('#main-content').html(result);
				requestSent = false;
				page = 'teacher';
			})
		};
		
	});
	$('#list-pupil-btn').click(function(event) {
		event.preventDefault();
		if (!requestSent) {
			requestSent = true;
			$.ajax({
				url: '<?php echo $this->Html->url(array('action' => 'index')) ?>',
				type: 'post',
				beforeSend: function() {
					$('#main-content').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
				}
			})
			.done(function(result) {
				$('#content').html(result);
				requestSent = false;
			})
		};
	});
	$('#search-btn').click(function(event) {
        event.preventDefault();
        var key_word = $('#search-box').val();
        if(!requestSent) {
            requestSent = true;
            $.ajax({
                url: '<?php echo $this->Html->url(array('action' => 'search')); ?>',
                type: 'get',
                data: {'key_word': key_word},
                success: function(data) {
                	if (page == 'pupil') {
                    	$('#content').html(data);
                	} else {
                		$('#main-content').html(data);
                	}
                    requestSent = false;
                }
            });
        }
    });
</script>
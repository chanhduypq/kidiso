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

    // $data = $this->Js->get('#SubAdminIndexForm')->serializeForm(array('isForm' => true, 'inline' => true));
    // $this->Js->get('#SubAdminIndexForm')->event(
    //   'submit',
    //   $this->Js->request(array('action' => 'add'), array(
    //         'update' => '#content',
    //         'data' => $data,
    //         'async' => true,
    //         'dataExpression'=>true,
    //         'method' => 'POST',
    //         'before' => "$('#busy-indicator').fadeIn();",

    //         )
    //     )
    // );
 ?>
 <section class="content-header">
 <ol class="breadcrumb">
     <li><a href="/"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
     <li><a href="<?php echo $this->Html->url('/system_admins') ?>"><?php echo __('System Admin') ?></a></li>
     <li class="active"><?php echo __('List System Admin') ?></li>
 </ol>
</section>
<section class="content" id="content-search">
	<div class="box">
	    <div class="box-header">
	        <h3 class="box-title"><?php echo __('List Sub Admin') ?></h3>
	    </div><!-- /.box-header -->
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
        <div id="search-result">
            <?php if (!empty($subAdmins)): ?>
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody><tr>
                        <th style="width: 10px"><?php echo __('No') ?></th>
                        <th><?php echo __('Username') ?></th>
                        <th><?php echo __('City') ?></th>
                        <th><?php echo __('Email') ?></th>
                        <th style="width: 150px"><?php echo __('Actions') ?></th>
                    </tr>
                    <?php
                        $i = 1;
                        foreach ($subAdmins as $subAdmin):
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo h($subAdmin['SubAdmin']['sub_admin_username']); ?></td>
                        <td><?php echo h($subAdmin['District']['city_name']); ?></td>
                        <td><?php echo h($subAdmin['SubAdmin']['sub_admin_email']); ?></td>
                        <td>
                            <a href="#" onclick="editSubAdmin(<?php echo $subAdmin['SubAdmin']['id']; ?>)" class="btn btn-info" data-target="#add-subadmin-modal" data-toggle="modal"><?php echo __('Edit'); ?></a>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subAdmin['SubAdmin']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $subAdmin['SubAdmin']['id'])); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody></table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <?php
                        if($this->params['paging']['SubAdmin']['pageCount'] >1){
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
        </div>
	</div>
</section>
<?php echo $this->Js->writeBuffer();?>
<?php //echo $this->element('sql_dump'); ?>
<!-- COMPOSE MESSAGE MODAL -->
<div class="modal fade kid-modal" id="add-subadmin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo __('Add/Edit SubAdmin') ?></h4>
            </div>
            <div class="modal-body" id="modal-body">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    function editSubAdmin(id) {
        var data = {};
        $.ajax({
            url: '<?php echo $this->Html->url(array('action' => 'load_data_edit')); ?>/' + id,
            type: 'post',
            data: data,
            update: '#add-subadmin-modal',
            beforeSend: function() {
                $('#result').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
            },
            success: function(data){
                $('#modal-body').html(data);
            }
        });
    }
    $('#add-sub-admin').click(function() {
        var data = {};
        $.ajax({
            url: '<?php echo $this->Html->url(array('action' => 'load_data_add')); ?>',
            type: 'post',
            data: data,
            update: '#add-subadmin-modal',
            beforeSend: function() {
                $('#result').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
            },
            success: function(data){
                $('#modal-body').html(data);
            }
        });
    });
    var requestSent = false;
    $('#search-btn').click(function(event) {
        event.preventDefault();
        var dataSearch = $('#search-box').val();
        if(!requestSent) {
            requestSent = true;
            $.ajax({
                url: '<?php echo $this->Html->url(array('action' => 'search')); ?>',
                type: 'get',
                data: {'dataSearch': dataSearch},
                success: function(data) {
                    $('#content').html(data);
                    requestSent = false;
                }
            });
        }
    });
</script>
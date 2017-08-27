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
  <li><a href="/"><i class="fa fa-dashboard"></i> <?php echo __('Home') ?></a></li>
  <li><a href="/kid_iso/system_admins"><?php echo __('Sub Admin') ?></a></li>
  <li class="active"><?php echo __('List School Admin') ?></li>
</ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo __('User Management') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="box box-info">
                    <div class="box-header" style="cursor: move;">
                        <h4 style="padding-left: 10px; margin-bottom: 0px"><?php echo __('Find an user:') ?></h4>
                    </div>
                    <div class="box-body subadmin-form">
                        <form method="post" action="#">
                            <div class="form-group">
                                <input type="text" placeholder="<?php echo __('Type username, school or city...'); ?>" name="keyword" class="form-control" style="width: 76%; display: inline-block; margin-right: 8px" id="subadmin-search-keyword">
                                <button class="btn btn-success" id="subadmin-search-btn"><?php echo __('Search'); ?></button>
                            </div>

                        </form>
                    </div>
                </div>

            </section>
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div>
                    <button id="add-a-school" class="btn btn-success" style="display: block; width: 140px; margin: 10px 0 10px 0;" data-target="#sub-admin-modal" data-toggle="modal"><?php echo __('Add a School') ?></button>
                    <button id="add-an-user" data-target="#sub-admin-modal" data-toggle="modal" class="btn btn-success" style="display: block; width: 140px"><?php echo __('Add an User') ?></button>
                </div>
            </section>
            <?php //debug($schoolAdmins); ?>
            <section style="clear: both" class="box">
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
                <?php if (!empty($schoolAdmins)): ?>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 10px"><?php echo __('No'); ?></th>
                                <th><?php echo __('Username'); ?></th>
                                <th><?php echo __('Name'); ?></th>
                                <th><?php echo __('School'); ?></th>
                                <th><?php echo __('City'); ?></th>
                                <th><?php echo __('Email'); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                            <?php
                                $i = 1;
                                foreach ($schoolAdmins as $schoolAdmin):
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo h($schoolAdmin['SchoolAdmin']['school_admin_username']); ?></td>
                                <td><?php echo h($schoolAdmin['SchoolAdmin']['school_admin_name']); ?></td>
                                <td><a href="#" onclick="viewSchool(<?php echo $schoolAdmin['School']['id']; ?>)" style="text-decoration: underline" data-target="#sub-admin-modal" data-toggle="modal"><?php echo h($schoolAdmin['School']['name']) ?></a></td>
                                <td><?php echo h($schoolAdmin['District']['city_name']) ?></td>
                                <td><?php echo h($schoolAdmin['SchoolAdmin']['school_admin_email']) ?></td>
                                <td style="width: 150px">
                                    <a href="#" onclick="editSchoolAdmin(<?php echo $schoolAdmin['SchoolAdmin']['id']; ?>)" class="btn btn-info" data-target="#sub-admin-modal" data-toggle="modal"><?php echo __('Edit'); ?></a>
                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete_school_admin', $schoolAdmin['SchoolAdmin']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $schoolAdmin['SchoolAdmin']['id'])); ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <?php
                                if($this->params['paging']['SchoolAdmin']['pageCount'] >1){
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
            </section>

        </div>
        <!-- /.box-body -->
    </div>
</section>
<?php echo $this->Js->writeBuffer(); ?>
<!-- ADD/EDIT SCHOOL MODAL -->
<div class="modal fade kid-modal" id="sub-admin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
    $('#add-a-school').click(function() {
        $.ajax({
            url: '<?php echo $this->Html->url(array('action' => 'add_school_form')); ?>',
            type: 'post',
            success: function(data) {
                $('#modal-content').html(data);
            }
        })
    });
    function editSchoolAdmin(id) {
        $.ajax({
            url: '<?php echo $this->Html->url(array('action' => 'load_edit_school_admin')) ?>/' + id,
            type: 'post',
        })
        .done(function(data) {
            $('#modal-content').html(data);
            $('#modal-title').html("<?php echo __('Edit User'); ?>");
        });
    }
    $('#profile-btn').click(function(event) {
        event.preventDefault();
        $.ajax({
            url: '<?php echo $this->Html->url(array('action' => 'display_profile')) ?>',
            type: 'post',
        })
        .done(function(data) {
            $('#modal-content').html(data);
        });
    });
    $('#subadmin-search-btn').click(function(event) {
        event.preventDefault();
        var keyword = $('#subadmin-search-keyword').val();
        $.ajax({
            url: '<?php echo $this->Html->url(array('action' => 'search')); ?>',
            type: 'GET',
            data: {keyword: keyword}
        })
        .done(function(data) {
            $('#content').html(data);
        })
    });
    $('#add-an-user').click(function() {
        $.ajax({
            url: '<?php echo $this->Html->url(array('action' => 'add_an_user')); ?>',
            type: 'post',
        })
        .done(function(data) {
            $('#modal-content').html(data);
        });
    });

    // View school method
    function viewSchool (id) {
        $.ajax({
            url: '<?php echo $this->Html->url(array('action' => 'view_school')); ?>',
            type: 'post',
            data: {'id': id}
        })
        .done(function(data) {
            $('#modal-content').html(data)
        });
    }
</script>
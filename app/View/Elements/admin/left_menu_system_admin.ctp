 <section class="sidebar">
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <?php if ($role == '1') { ?>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>SystemAdmin</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="#" data-target="#add-subadmin-modal" data-toggle="modal" id="add-sub-admin"><i class="fa fa-angle-double-right"></i> Add a Sub Admin</a></li>
                </ul>
            </li>
        <?php } else if ($role == '2') { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>SubAdmin</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="#" data-target="#add-subadmin-modal" data-toggle="modal" id="add-sub-admin"><i class="fa fa-angle-double-right"></i> Add a School Admin</a></li>
                </ul>
            </li>
        <?php } else if ($role == '3') { ?>
            <!-- School Admin Menu -->
            <li class="treeview">
                <a href="#" id="list-class-btn">
                    <i class="fa fa-folder"></i> <span>Class</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="#" data-target="#school-admin-modal" data-toggle="modal" id="add-a-class"><i class="fa fa-angle-double-right"></i> Add a Class</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#" id="list-pupil-btn">
                    <i class="fa fa-folder"></i> <span>Pupil</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="#" data-target="#school-admin-modal" data-toggle="modal" id="add-a-pupil"><i class="fa fa-angle-double-right"></i> Add a Pupil</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#" id="list-teacher-btn">
                    <i class="fa fa-folder"></i> <span>Teacher</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="#" data-target="#school-admin-modal" data-toggle="modal" id="add-a-teacher"><i class="fa fa-angle-double-right"></i> Add a Teacher</a></li>
                </ul>
            </li>
        <?php } ?>

        <?php echo $this->element('admin/search'); ?>
    </ul>

</section>
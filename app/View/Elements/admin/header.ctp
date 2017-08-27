<nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $username; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <?php if($role==2){ ?>
                                    <div class="">
                                        <a href="#" class="btn btn-default btn-flat" id="profile-btn" data-target="#sub-admin-modal" data-toggle="modal">Profile</a>
                                    </div>
                                    <?php } ?>
                                    <div class="">
                                        <a href="<?php echo $this->Html->url("/Pages/logout");?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
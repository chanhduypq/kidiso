<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <?php echo $this->Html->css("admin/bootstrap.min"); ?>
        <!-- font Awesome -->
        <?php echo $this->Html->css("admin/font-awesome.min"); ?>
        <!-- Ionicons -->
        <?php echo $this->Html->css("admin/ionicons.min"); ?>
        <!-- Theme style -->
        <?php echo $this->Html->css("admin/AdminLTE"); ?>
        <?php echo $this->Html->css("admin/custom"); ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <?php echo $this->Html->script("admin/bootstrap.min"); ?>
        <!-- AdminLTE App -->
        <?php echo $this->Html->script("admin/AdminLTE/app"); ?>
        <?php echo $this->Html->script("admin/jquery.validate.min"); ?>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <!-- <a href="../../index.html" class="logo">
                Add the class icon to your logo image or logo icon to add the margining
                AdminLTE
            </a> -->
            <!-- Header Navbar: style can be found in header.less -->
            <?php echo $this->element('admin/header');?>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php 
            $style="style='margin-left:0px'";
            if($role !="4" && $role !="2"){
                $style='';
            ?>
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
               <?php echo $this->element('admin/left_menu_system_admin');?>
                <!-- /.sidebar -->
            </aside>
            <?php } ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side" id="content" <?php echo $style;?>>
                <!-- Main content -->
                <?php echo $content_for_layout; ?>
                <!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        
    </body>
</html>
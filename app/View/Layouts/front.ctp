<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
    <?php echo $title_for_layout ;?>
</title>
<?php 
echo $this->Html->css('front/style');
echo $this->Html->css('front/datepicker');
echo $this->Html->css('front/jquery-ui-1.10.3/themes/smoothness/jquery-ui');
echo $this->Html->script('front/jquery-1.9.1.min');
echo $this->Html->script('front/datepicker');
?>


<?php echo $this->Html->script('front/jquery-ui-1.10.3/ui/jquery-ui');?>
<?php
$before_after_array=array();
$before_after_array[]=array("before"=>"pupil","after"=>"pupil4");
$before_after_array[]=array("before"=>"pupil4","after"=>"pupil5");
$before_after_array[]=array("before"=>"pupil5","after"=>"pupil6");
$before_after_array[]=array("before"=>"pupil6","after"=>"pupil8");
$before_after_array[]=array("before"=>"pupil8","after"=>"pupil10");
$before_after_array[]=array("before"=>"pupil10","after"=>"pupil11");
$before_after_array[]=array("before"=>"pupil11","after"=>"pupil12");
$before_after_array[]=array("before"=>"pupil12","after"=>"pupil13");
$before_after_array[]=array("before"=>"pupil13","after"=>"pupil14");
$before_after_array[]=array("before"=>"pupil14","after"=>"pupil15");
$before_after_array[]=array("before"=>"pupil15","after"=>"pupil16");
$before_after_array[]=array("before"=>"pupil16","after"=>"pupil17");
$before_after_array[]=array("before"=>"pupil17","after"=>"pupil18");
$before_after_array[]=array("before"=>"pupil18","after"=>"pupil20");
$before_after_array[]=array("before"=>"pupil20","after"=>"pupil21");
$before_after_array[]=array("before"=>"pupil21","after"=>"pupil22");
$before_after_array[]=array("before"=>"pupil22","after"=>"pupil23");
$before_after_array[]=array("before"=>"pupil23","after"=>"pupil24");
$before_after_array[]=array("before"=>"pupil24","after"=>"pupil25");
$before_after_array[]=array("before"=>"pupil25","after"=>"pupil26");
$before_after_array[]=array("before"=>"pupil26","after"=>"pupil27");
$before_after_array[]=array("before"=>"pupil27","after"=>"pupil28");
$before_after_array[]=array("before"=>"pupil28","after"=>"pupil30");
$before_after_array[]=array("before"=>"pupil30","after"=>"pupil31");
$before_after_array[]=array("before"=>"pupil31","after"=>"pupil32");
$before_after_array[]=array("before"=>"pupil32","after"=>"pupil33");
$before_after_array[]=array("before"=>"pupil33","after"=>"pupil34");
$before_after_array[]=array("before"=>"pupil34","after"=>"pupil35");
$before_after_array[]=array("before"=>"pupil35","after"=>"pupil36");
$before_after_array[]=array("before"=>"pupil36","after"=>"pupil37");
$before_after_array[]=array("before"=>"pupil37","after"=>"pupil38");
$before_after_array[]=array("before"=>"pupil38","after"=>"pupil40");
$before_after_array[]=array("before"=>"pupil40","after"=>"pupil41");
$before_after_array[]=array("before"=>"pupil41","after"=>"pupil42");
$before_after_array[]=array("before"=>"pupil42","after"=>"pupil43");
$before_after_array[]=array("before"=>"pupil43","after"=>"pupil44");
$before_after_array[]=array("before"=>"pupil44","after"=>"pupil45");
$before_after_array[]=array("before"=>"pupil45","after"=>"pupil46");
$before_after_array[]=array("before"=>"pupil46","after"=>"pupil47");
$before_after_array[]=array("before"=>"pupil47","after"=>"pupil48");

/**
 * 
 */
$action=$this->request->params['action'];
if($action!="pupil"){
    foreach ($before_after_array as $before_after){
        if($before_after["before"]==$action){
            $after_action=$before_after["after"];        
        }
        if($before_after["after"]==$action){
            $before_action=$before_after["before"];        
        }
    }
}

?>
<script type="text/javascript">
    var dateFormatForView='format-<?php echo DATE_FORMAT_FOR_VIEW;?>'; 
    jQuery(function ($){       
        
       <?php
       if($action!="pupil"){
       ?>
       $("a.but_footer").attr("href","<?php echo $this->webroot.'pupils/'.$before_action;?>"); 
       $("a.but_footer_next").attr("href","<?php echo $this->webroot.'pupils/'.$after_action;?>"); 
       $("a.but_footer_save").removeAttr("href").css("cursor","pointer");
       $("a.but_footer_save").click(function (){
           $("form").submit();
       });
       <?php
       }

       if($action=="pupil10" || $action=="pupil20" || $action=="pupil30" || $action=="pupil40"||$action=="pupil14" || $action=="pupil24" || $action=="pupil34" || $action=="pupil44"){           
           echo '$("form").addClass("validate_input_123");';
           echo '$("table.tab").addClass("form_input_123");';
       }
       else if($action=="pupil11" || $action=="pupil21" || $action=="pupil31"){    
           echo '$("form").addClass("validate_input_date");';
           echo '$("form").addClass("validate_input_number");';
           echo '$("table.tab11").addClass("date");';
           echo '$("table.tab11").addClass("disable_input_on_last_row");';
       }
       else if($action=="pupil13" || $action=="pupil23" || $action=="pupil33"){    
           echo '$("form").addClass("validate_input_date");';
           echo '$("form").addClass("validate_input_number");';
           echo '$("form").addClass("validate_input_text");';
           echo '$(".arena_13").addClass("validate_input_text");';
           echo '$("table.tab11").addClass("date");';
           echo '$("table.tab11").addClass("disable_input_on_last_row");';
       }       
       else if($action=="pupil16" || $action=="pupil17" || $action=="pupil26" || $action=="pupil27" || $action=="pupil36" || $action=="pupil37" || $action=="pupil46" || $action=="pupil47"){           
           echo '$("form").addClass("validate_input_text");';
       }
       else if($action=="pupil41"){    
           echo '$("form").addClass("validate_input_date");';
           echo '$("form").addClass("validate_input_number_integer");';           
           echo '$("table.tab11").addClass("date");';
           echo '$("table.tab11").addClass("process_last_two_row");';
       }  
       else if($action=="pupil43"){    
           echo '$("form").addClass("validate_input_date");';
           echo '$("form").addClass("validate_input_number_integer");';
           echo '$("form").addClass("validate_input_text");';
           echo '$(".arena_13").addClass("validate_input_text");';
           echo '$("table.tab11").addClass("date");';
           echo '$("table.tab11").addClass("process_last_two_row");';
       }  
       else if ($action=="pupil15"||$action=="pupil25"||$action=="pupil35"||$action=="pupil45") {           
           echo '$("input[type=\'text\']").attr("disabled","disabled");';
       }
       ?>
               
    });
</script>
<?php 
echo $this->Html->script('front/build_form');
echo $this->Html->script('front/build_table');
?>
<style>
    input.input_11_red{
        border-color: red;
    }
</style>
</head>

<body class="bg_blue">
<div class="header" <?php echo $action;?>>
    <div class="wrapper">
        <div class="logo fl">
          <a href="<?php echo $this->Html->url(array('controller' => 'pupils', 'action' => 'pupil'));?>"><img src="<?php echo $this->webroot ?>img/images/logo.png" alt="logo" /></a>
        </div>
        <div class="banner_larger fr">
          <img src="<?php echo $this->webroot ?>img/images/banner_top.png" />
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php echo $this->element('front/top_menu');
if($action!="pupil"){
?>    
<form method="post" action="<?php echo $this->webroot.'pupils/'.$after_action;?>">
<?php 
}
echo $content_for_layout ;
if($action!="pupil"){
?>
</form>
<?php 
}
echo $this->element('front/footer');?>
    <div id="error_input_123" style="display: none;">
        <?php
        echo ERROR_INPUT_123;
        ?>
    </div>
    <div id="error_input_text" style="display: none;">
        <?php
        echo ERROR_INPUT_TEXT;
        ?>
    </div>
    <div id="error_input_date" style="display: none;">
        <?php
        echo ERROR_INPUT_DATE;
        ?>
    </div>
    <div id="error_input_number" style="display: none;">
        <?php
        echo ERROR_INPUT_NUMBER;
        ?>
    </div>
</body>
</html>

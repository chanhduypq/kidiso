<style>
    .slt_error{
        border :1px solid red;
    }
    .rad_error
    {
        outline: 1px solid red;
    }
</style>
<?php echo $this->Html->css('admin/teacher'); 
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
        <li><a href="#"><i class="fa fa-dashboard"></i><?php echo __("Home"); ?></a></li>
        <li class="active"><?php echo __('Valuation'); ?></li>
    </ol>
</section>
<section class="content">
    
 <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="form-group col-lg-10  ">
                  <label for="lastname" class="control-label col-lg-2" style="width: 10%;padding-top:8px;"><?php echo _('Class') ?></label>
                  <div class="col-lg-2">
                      <input type="text" value="<?php echo $classe['Classes']['class_name']?>" disabled="disabled"/>
                      <span class="help-inline " id="error_type_name" style="color:red"></span>
                  </div>
                  <div class="col-lg-4">
                        <div class="progress xs" style="margin-top: 6px;">
                            <div class="progress-bar progress-bar-green" style="width: <?php echo ($numpupil !=0)?$num_done/$numpupil*100:0;?>%;"></div>
                        </div>
                  </div>                              
                </div>
                <form method="get" action="<?php echo $this->Html->url("/Instructors/index");?>"> 
                <div class="form-group col-lg-10 ">
                  <label for="lastname" class="control-label col-lg-2" style="width: 10%;padding-top:8px;"><?php echo __('Find') ?></label>
                 <div class="col-lg-6">
                      <input class=" form-control" id="keyword" name="keyword" type="text" placeholder="<?php echo __('Key word');?>" value="<?php echo $keyword;?>">
                  </div>
                  <div class="col-lg-2">
                  <button class="btn btn-success" type="submit"><?php echo __('Search');?></button>
               </div>
                </div>
                </form>
               
                <div class="box-body">
                <div class="ajax-loading" style="clear:both;text-align:center">
                  <?php echo $this->Html->image('images/ajax-loader.gif', array('id' => 'busy-indicator', 'style' => 'display: none;margin:0 auto;')); ?>
                </div>
                <?php if ($this->Session->check('Message.flash')) { ?>
                  <div class="alert alert-info alert-dismissable" style="clear: both;" id="alert_message">
                      <i class="fa fa-info"></i>
                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                      <b><?php echo $this->Session->flash(); ?></b>
                  </div>
                <?php } ?>
                <?php if(!empty($pupils)){?>
                    <table class="table table-bordered">
                        <tbody><tr>
                            <th style="width: 10px"><?php echo __('No');?></th>
                            <th><?php echo __('Pupil Name');?></th>
                            <th><?php echo __('Class');?></th>
                            <th><?php echo __('PCDA_ID');?></th>
                            <th><?php echo __('Valuation');?></th>
                            <th style="width: 40px"><?php echo __('Status');?></th>
                        </tr>
                        <?php  foreach($pupils as $k=>$vl){  
                        ?>
                        <tr>
                            <td><?php echo $k+1;?></td>
                            <td><?php echo h($vl['Pupil']['name']);?></td>
                            <td>
                                <?php echo h($vl['Classes']['class_name']);?>
                            </td>
                            <td>
                                <a href="#" onclick="return pdca_electricid('<?php echo  $vl['Pdca']['id']; ?>','<?php echo $vl['Pupil']['name']; ?>');" data-target="#pdca-modal" data-toggle="modal"><?php echo h($vl['Pdca']['id']);?></a>
                            </td>
                            <td>
                                <a href="#" onclick="return electricid('<?php echo  $vl['Pdca']['id']; ?>','<?php echo $vl['Pupil']['name']; ?>');" data-target="#add-subadmin-modal" data-toggle="modal"><?php if($vl['Pdca']['id']) echo __('Valution');?></a>
                            </td>
                             <td>
                                <?php if(($vl['Pdca']['evalue_flag']==1)){
                                         echo __("Done");
                                    }else{
                                        echo __("Not");
                                    }       
                               ?> 
                             </td>
                        </tr>
                        <?php } ?>
                    </tbody></table>
                    <?php } 
                    else {?>
                    <div style="display: block;clear: both;text-align:center" >
                    <?php echo NO_RESULT; ?>
                    <?php }  ?>
                </div><!-- /.box-body -->
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
            </div>
            <div class="modal fade kid-modal" id="add-subadmin-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" style="width: 800px;">
                    <div class="modal-content">
                        <div class="modal-header" >
                             <div class="box-header" style="overflow: hidden;">
                                <h3 class="box-title" style="float: left;"><?php echo __('Valuation Form');?></h3>
                                <div style="float: right;margin-right: 30px;margin-top:10px;">
                                    <p>
                                    <span style="font-weight: bold;">Teacher</span>:<?php echo $teacherName;?><br />
                                    <span style="font-weight: bold;">Pupil</span>:<span id="pupil_name"></span><br />
                                    <span style="font-weight: bold;">Date</span>:<?php echo date("Y/m/d");?>
                                    </p>
                           
                                </div>
                            </div><!-- /.box-header -->
                            <div style="text-align: center;color:red" id="error"></div>
                        </div>
                        <div class="modal-body" id="modal-body">
                            
                          </div>
                          
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
                <div class="modal fade kid-modal" id="pdca-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" style="width: 800px;">
                    <div class="modal-content">
                        <div class="modal-header" >
                             <div class="box-header" style="overflow: hidden;">
                                <h3 class="box-title" style="float: left;"><?php echo __('Pdca detail');?></h3>
                                <div style="float: right;margin-right: 30px;margin-top:10px;">
                                    <p>
                                    <span style="font-weight: bold;">Teacher</span>:<?php echo $teacherName;?><br />
                                    <span style="font-weight: bold;">Pupil</span>:<span id="pupil_name_pdca"></span><br />
                                    <span style="font-weight: bold;">Date</span>:<?php echo date("Y/m/d");?>
                                    </p>
                           
                                </div>
                            </div><!-- /.box-header -->
                            <div style="text-align: center;color:red" id="error"></div>
                        </div>
                        <div class="modal-body" id="pdca-modal-body">
                        </div>
                          
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
              
                
         
</section>
<?php echo $this->Js->writeBuffer();?>
<script>
    function electricid(pdca_id,pupil_name)
    {
        $("#alert_message").css('display','none');
        $("#pupil_name").html(pupil_name);
        $.ajax({
           url:'<?php echo $this->Html->url('/Instructors/evalueElectric');?>',
           type:'POST',
           data:{pdca_id:pdca_id},
           async:false,
           update: '#add-subadmin-modal',
           beforeSend: function() {
           //     $('#result').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
           },
           success:function (data)
           {
                $("#modal-body").html(data);
           }
            
        });
        changePoint();
        loadFraseData(1);
        loadContador(1);
    }
    function loadGas(pdca_id)
    {
       $.ajax({
           url:'<?php echo $this->Html->url('/Instructors/evalueGas');?>',
           type:'POST',
           data:{pdca_id:pdca_id},
           async:false,
           beforeSend: function() {
           //     $('#result').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
           },
           success:function (data)
           {
                
                $("#gas").html(data);
           }
            
        });
         changePointGas();
         loadFraseData(2);
         loadContador(2)
      
    }
    function loadAqua(pdca_id)
    {
       $.ajax({
           url:'<?php echo $this->Html->url('/Instructors/evalueAqua');?>',
           type:'POST',
           data:{pdca_id:pdca_id},
           async:false,
           beforeSend: function() {
           //     $('#result').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
           },
           success:function (data)
           {
                
                $("#aqua").html(data);
           }
            
        });
        changePointAqua();
        loadFraseData(3);
        loadContador(3)
    }
    function loadResidous(pdca_id)
    {
       $.ajax({
           url:'<?php echo $this->Html->url('/Instructors/evalueResidous');?>',
           type:'POST',
           data:{pdca_id:pdca_id},
           async:false,
           beforeSend: function() {
           //     $('#result').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
           },
           success:function (data)
           {
                
                $("#residuos").html(data);
           }
            
        });
        changePointResidous();
        loadFraseData(4);
        loadContador(4)
    }
    function changePoint()
    {
       var recognite_before ='';
        if($("input[name='data[Electricid][recognite_before]']").is(":checked"))
        {
            $("input[name='data[Electricid][recognite_before]']").removeClass('rad_error');
            recognite_before = $("input[name='data[Electricid][recognite_before]']:checked").val();
        }
         
    	var plan = '';
        if($("input[name='data[Electricid][plan]']").is(":checked"))
        {
            $("input[name='data[Electricid][plan]']").removeClass('rad_error');
            plan = $("input[name='data[Electricid][plan]']:checked").val();
        }
        var recognite_after = '';
        if($("input[name='data[Electricid][recognite_after]']").is(":checked"))
        {
            $("input[name='data[Electricid][recognite_after]']").removeClass('rad_error');
            recognite_after = $("input[name='data[Electricid][recognite_after]']:checked").val();
    
        }
        
    	var compare_result = '';
        if($("input[name='data[Electricid][compare_result]']").is(":checked"))
        {
            $("input[name='data[Electricid][compare_result]']").removeClass('rad_error');
            compare_result = $("input[name='data[Electricid][compare_result]']:checked").val();
        }
    	var result = '';
        if($("input[name='data[Electricid][result]']").is(":checked"))
        {
            $("input[name='data[Electricid][result]']").removeClass('rad_error');
            result =  $("input[name='data[Electricid][result]']:checked").val();
        }
        //alert(recognite_before+"---"+plan+"---"+recognite_after+"---"+compare_result+"----"+result);
        $.ajax({
           url:"<?php echo $this->Html->url('/Instructors/evalueManager');?>",
           type:'post',
           data:{recognite_before:recognite_before,plan:plan,recognite_after:recognite_after,compare_result:compare_result,result:result}, 
           success: function(data)
           {
               $("#evalue_manage").html(data);
           } 
        });
    }
    function loadFraseData(type)
    {
        var accessible    = '';
        var data_collect  = ''
        switch(type)
        {
            case 1: if($("input[name='data[Electricid][accessible]']").is(':checked'))
                    {
                        $("input[name='data[Electricid][accessible]']").removeClass('rad_error');
                        accessible    = $("input[name='data[Electricid][accessible]']:checked").val();
                    }
                    
                    if($("input[name='data[Electricid][data_collect]']").is(':checked'))
                    {
                        $("input[name='data[Electricid][data_collect]']").removeClass('rad_error');
                        data_collect  = $("input[name='data[Electricid][data_collect]']:checked").val();
                    }
                    break;
            case 2: if($("input[name='data[Gas][accessible]']").is(':checked'))
                    {
                        $("input[name='data[Gas][accessible]']").removeClass('rad_error');
                        accessible    = $("input[name='data[Gas][accessible]']:checked").val();
                    }
                    
                    if($("input[name='data[Gas][data_collect]']").is(':checked'))
                    {
                        $("input[name='data[Gas][data_collect]']").removeClass('rad_error');
                        data_collect  = $("input[name='data[Gas][data_collect]']:checked").val();
                    }
                    break;
           case 3: if($("input[name='data[Aqua][accessible]']").is(':checked'))
                    {
                        $("input[name='data[Aqua][accessible]']").removeClass('rad_error');
                        accessible    = $("input[name='data[Aqua][accessible]']:checked").val();
                    }
                    
                    if($("input[name='data[Aqua][data_collect]']").is(':checked'))
                    {
                        $("input[name='data[Aqua][data_collect]']").removeClass('rad_error');
                        data_collect  = $("input[name='data[Aqua][data_collect]']:checked").val();
                    }
                    break;
          case 4: if($("input[name='data[Residous][accessible]']").is(':checked'))
                    {
                        $("input[name='data[Residous][accessible]']").removeClass('rad_error');
                        accessible    = $("input[name='data[Residous][accessible]']:checked").val();
                    }
                    
                    if($("input[name='data[Residous][data_collect]']").is(':checked'))
                    {
                        $("input[name='data[Residous][accessible]']").removeClass('data_collect');
                        data_collect  = $("input[name='data[Residous][data_collect]']:checked").val();
                    }
                    break;          
        }
       
        var avg_day_before= $('#round_avg_day_before_'+type).val();
        var avg_day_after = $('#round_avg_day_after_'+type).val();
        var diference_day = $('#round_avg_day_family_'+type).val();
        $.ajax({
           url:"<?php echo $this->Html->url('/Instructors/fraceData');?>",
           type:'post',
           data:{type:type,accessible:accessible,data_collect:data_collect,avg_day_before:avg_day_before,avg_day_after:avg_day_after,diference_day:diference_day}, 
           success: function(data)
           {
               $("#frase_data_"+type).html(data);
           } 
        });
    }
    function loadContador(type)
    {
        var result=$("#environment_"+type).val();
        $("#contador_"+type).val(result.length);
    }
    /* Gas evaluation */
    function changePointGas()
    {
    	var recognite_before ='';
        if($("input[name='data[Gas][recognite_before]']").is(":checked"))
        {
            $("input[name='data[Gas][recognite_before]']").removeClass('rad_error');
            recognite_before = $("input[name='data[Gas][recognite_before]']:checked").val();
        }
         
    	var plan = '';
        if($("input[name='data[Gas][plan]']").is(":checked"))
        {
            $("input[name='data[Gas][plan]']").removeClass('rad_error');
            plan = $("input[name='data[Gas][plan]']:checked").val();
        }
        var recognite_after = '';
        if($("input[name='data[Gas][recognite_after]']").is(":checked"))
        {
            $("input[name='data[Gas][recognite_after]']").removeClass('rad_error');
            recognite_after = $("input[name='data[Gas][recognite_after]']:checked").val();
    
        }
        
    	var compare_result = '';
        if($("input[name='data[Gas][compare_result]']").is(":checked"))
        {
            $("input[name='data[Gas][compare_result]']").removeClass('rad_error');
            var compare_result = $("input[name='data[Gas][compare_result]']:checked").val();
        }
    	var result = '';
        if($("input[name='data[Gas][result]']").is(":checked"))
        {
          $("input[name='data[Gas][result]']").removeClass('rad_error');
          result =  $("input[name='data[Gas][result]']:checked").val();
        }
    	
        //alert(recognite_before+"---"+plan+"---"+recognite_after+"---"+compare_result+"----"+result);
    	$.ajax({
    	   url:"<?php echo $this->Html->url('/Instructors/evalueManager');?>",
    	   type:'post',
    	   data:{recognite_before:recognite_before,plan:plan,recognite_after:recognite_after,compare_result:compare_result,result:result}, 
    	   success: function(data)
    	   {
    		   $("#evalue_manage_gas").html(data);
    	   } 
    	});
    }
    /* Aqua evaluation */
    function changePointAqua()
    {
    	var recognite_before ='';
        if($("input[name='data[Aqua][recognite_before]']").is(":checked"))
        {
            $("input[name='data[Aqua][recognite_before]']").removeClass('rad_error');
            recognite_before = $("input[name='data[Aqua][recognite_before]']:checked").val();
        }
         
    	var plan = '';
        if($("input[name='data[Aqua][plan]']").is(":checked"))
        {
            $("input[name='data[Aqua][plan]']").removeClass('rad_error');
            plan = $("input[name='data[Aqua][plan]']:checked").val();
        }
        var recognite_after = '';
        if($("input[name='data[Aqua][recognite_after]']").is(":checked"))
        {
            $("input[name='data[Aqua][recognite_after]']").removeClass('rad_error');
            recognite_after = $("input[name='data[Aqua][recognite_after]']:checked").val();
    
        }
        
    	var compare_result = '';
        if($("input[name='data[Aqua][compare_result]']").is(":checked"))
        {
            $("input[name='data[Aqua][compare_result]']").removeClass('rad_error');
            compare_result = $("input[name='data[Aqua][compare_result]']:checked").val();
        }
    	var result = '';
        if($("input[name='data[Aqua][result]']").is(":checked"))
        {
            $("input[name='data[Aqua][result]']").removeClass('rad_error');
            result =  $("input[name='data[Aqua][result]']:checked").val();
        }
    	
        //alert(recognite_before+"---"+plan+"---"+recognite_after+"---"+compare_result+"----"+result);
    	$.ajax({
    	   url:"<?php echo $this->Html->url('/Instructors/evalueManager');?>",
    	   type:'post',
    	   data:{recognite_before:recognite_before,plan:plan,recognite_after:recognite_after,compare_result:compare_result,result:result}, 
    	   success: function(data)
    	   {
    		    $("#evalue_manage_aqua").html(data);
    	   } 
    	});
    }
    /* Residous evalution */
    function changePointResidous()
    {
    	var recognite_before ='';
        if($("input[name='data[Residous][recognite_before]']").is(":checked"))
        {
            $("input[name='data[Residous][recognite_before]']").removeClass('rad_error');
            recognite_before = $("input[name='data[Residous][recognite_before]']:checked").val();
        }
         
    	var plan = '';
        if($("input[name='data[Residous][plan]']").is(":checked"))
        {
            $("input[name='data[Residous][plan]']").removeClass('rad_error');
            plan = $("input[name='data[Residous][plan]']:checked").val();
        }
        var recognite_after = '';
        if($("input[name='data[Residous][recognite_after]']").is(":checked"))
        {
            $("input[name='data[Residous][recognite_after]']").removeClass('rad_error');
            recognite_after = $("input[name='data[Residous][recognite_after]']:checked").val();
    
        }
        
    	var compare_result = '';
        if($("input[name='data[Residous][compare_result]']").is(":checked"))
        {
            $("input[name='data[Residous][compare_result]']").removeClass('rad_error');
            compare_result = $("input[name='data[Residous][compare_result]']:checked").val();
        }
    	var result = '';
        if($("input[name='data[Residous][result]']").is(":checked"))
        { 
           $("input[name='data[Residous][result]']").removeClass('rad_error');
           result =  $("input[name='data[Residous][result]']:checked").val();
        }
    	
        //alert(recognite_before+"---"+plan+"---"+recognite_after+"---"+compare_result+"----"+result);
    	$.ajax({
    	   url:"<?php echo $this->Html->url('/Instructors/evalueManager');?>",
    	   type:'post',
    	   data:{recognite_before:recognite_before,plan:plan,recognite_after:recognite_after,compare_result:compare_result,result:result}, 
    	   success: function(data)
    	   {
    		    $("#evalue_manage_residous").html(data);
    	   } 
    	});
    }
    function validate()
    {
        var tab_elecitricity = true;
        var tab_gas = true;
        var tab_aqua = true;
        var tab_residous = true;
        var error = '';
        /* Validate Electricity */
        $("#data_record_mode_1").removeClass('slt_error');
        $("#data_analysis_mode_1").removeClass('slt_error');
        if(!$("input[name='data[Electricid][recognite_before]']").is(":checked"))
        {
            $("input[name='data[Electricid][recognite_before]']").addClass('rad_error');
            tab_elecitricity=false;
        }
        if(!$("input[name='data[Electricid][plan]']").is(":checked"))
        {
            $("input[name='data[Electricid][plan]']").addClass('rad_error');
            tab_elecitricity=false;
        }
        if(!$("input[name='data[Electricid][recognite_after]']").is(":checked"))
        {
            $("input[name='data[Electricid][recognite_after]']").addClass('rad_error');
            tab_elecitricity=false;
    
        }
        if(!$("input[name='data[Electricid][compare_result]']").is(":checked"))
        {
            $("input[name='data[Electricid][compare_result]']").addClass('rad_error');
            tab_elecitricity=false;
        }
        if(!$("input[name='data[Electricid][result]']").is(":checked"))
        {
           $("input[name='data[Electricid][result]']").addClass('rad_error');
           tab_elecitricity=false;
        }
        if(!$("input[name='data[Electricid][accessible]']").is(':checked'))
        {
            $("input[name='data[Electricid][accessible]']").addClass('rad_error');
            tab_elecitricity=false;
        }
        
        if(!$("input[name='data[Electricid][data_collect]']").is(':checked'))
        {
            $("input[name='data[Electricid][data_collect]']").addClass('rad_error');
            tab_elecitricity=false;
        }
        if($("#data_record_mode_1").val()==0)
        {
            $("#data_record_mode_1").addClass('slt_error');
            tab_elecitricity=false;
        }
        if($("#data_analysis_mode_1").val()==0)
        {
            tab_elecitricity=false;
            $("#data_analysis_mode_1").addClass('slt_error');
        }
        /* Validate Gas */
        $("#data_record_mode_2").removeClass('slt_error');
        $("#data_analysis_mode_2").removeClass('slt_error');
        
        if(!$("input[name='data[Gas][recognite_before]']").is(":checked"))
        {
            $("input[name='data[Gas][recognite_before]']").addClass('rad_error');
            tab_gas=false;
        }
        if(!$("input[name='data[Gas][plan]']").is(":checked"))
        {
            $("input[name='data[Gas][plan]']").addClass('rad_error');
            tab_gas=false;
        }
        if(!$("input[name='data[Gas][recognite_after]']").is(":checked"))
        {
            $("input[name='data[Gas][recognite_after]']").addClass('rad_error');
            tab_gas=false;
    
        }
        if(!$("input[name='data[Gas][compare_result]']").is(":checked"))
        {
            $("input[name='data[Gas][compare_result]']").addClass('rad_error');
            tab_gas=false;
        }
        if(!$("input[name='data[Gas][result]']").is(":checked"))
        {
           $("input[name='data[Gas][result]']").addClass('rad_error');
           tab_gas=false;
        }
        if(!$("input[name='data[Gas][accessible]']").is(':checked'))
        {
            $("input[name='data[Gas][accessible]']").addClass('rad_error');
            tab_gas=false;
        }
        
        if(!$("input[name='data[Gas][data_collect]']").is(':checked'))
        {
            $("input[name='data[Gas][data_collect]']").addClass('rad_error');
            tab_gas=false;
        }
        if($("#data_record_mode_2").val()==0)
        {
            $("#data_record_mode_2").addClass('slt_error');
            tab_gas=false;
        }
        if($("#data_analysis_mode_2").val()==0)
        {
            tab_gas=false;
            $("#data_analysis_mode_2").addClass('slt_error');
        }
        /* Validate Aqua */
        $("#data_record_mode_3").removeClass('slt_error');
        $("#data_analysis_mode_3").removeClass('slt_error');
        if(!$("input[name='data[Aqua][recognite_before]']").is(":checked"))
        {
            $("input[name='data[Aqua][recognite_before]']").addClass('rad_error');
            tab_aqua=false;
        }
        if(!$("input[name='data[Aqua][plan]']").is(":checked"))
        {
            $("input[name='data[Aqua][plan]']").addClass('rad_error');
            tab_aqua=false;
        }
        if(!$("input[name='data[Aqua][recognite_after]']").is(":checked"))
        {
            $("input[name='data[Aqua][recognite_after]']").addClass('rad_error');
            tab_aqua=false;
    
        }
        if(!$("input[name='data[Aqua][compare_result]']").is(":checked"))
        {
            $("input[name='data[Aqua][compare_result]']").addClass('rad_error');
            tab_aqua=false;
        }
        if(!$("input[name='data[Aqua][result]']").is(":checked"))
        {
           $("input[name='data[Aqua][result]']").addClass('rad_error');
           tab_aqua=false;
        }
        if(!$("input[name='data[Aqua][accessible]']").is(':checked'))
        {
            $("input[name='data[Aqua][accessible]']").addClass('rad_error');
            tab_aqua=false;
        }
        
        if(!$("input[name='data[Aqua][data_collect]']").is(':checked'))
        {
            $("input[name='data[Aqua][data_collect]']").addClass('rad_error');
            tab_aqua=false;
        }
        if($("#data_record_mode_3").val()==0)
        {
            $("#data_record_mode_3").addClass('slt_error');
            tab_aqua=false;
        }
        if($("#data_analysis_mode_3").val()==0)
        {
            tab_aqua=false;
            $("#data_analysis_mode_3").addClass('slt_error');
        }
        /* Validate Residous */
        $("#data_record_mode_4").removeClass('slt_error');
        $("#data_analysis_mode_4").removeClass('slt_error');
         if(!$("input[name='data[Residous][recognite_before]']").is(":checked"))
        {
            $("input[name='data[Residous][recognite_before]']").addClass('rad_error');
            tab_residous=false;
        }
        if(!$("input[name='data[Residous][plan]']").is(":checked"))
        {
            $("input[name='data[Residous][plan]']").addClass('rad_error');
            tab_residous=false;
        }
        if(!$("input[name='data[Residous][recognite_after]']").is(":checked"))
        {
            $("input[name='data[Residous][recognite_after]']").addClass('rad_error');
            tab_residous=false;
    
        }
        if(!$("input[name='data[Residous][compare_result]']").is(":checked"))
        {
            $("input[name='data[Residous][compare_result]']").addClass('rad_error');
            tab_residous=false;
        }
        if(!$("input[name='data[Residous][result]']").is(":checked"))
        {
           $("input[name='data[Residous][result]']").addClass('rad_error');
           tab_residous=false;
        }
        if(!$("input[name='data[Residous][accessible]']").is(':checked'))
        {
           $("input[name='data[Residous][accessible]']").addClass('rad_error');
           tab_residous=false;
        }
        
        if(!$("input[name='data[Residous][data_collect]']").is(':checked'))
        {
            $("input[name='data[Residous][data_collect]']").addClass('rad_error');
            tab_residous=false;
        }
        if($("#data_record_mode_4").val()==0)
        {
            $("#data_record_mode_4").addClass('slt_error');
            tab_residous=false;
        }
        if($("#data_analysis_mode_4").val()==0)
        {
            tab_residous=false;
            $("#data_analysis_mode_4").addClass('slt_error');
        }
        /*==========================*/
        if(!tab_elecitricity)
        {
            error += "<?php echo ERROR_EVALUE_ELECTRICID.'<br/>' ?>";
        }
        if(!tab_gas)
        {
            error += "<?php echo ERROR_EVALUE_GAS.'gas<br/>' ?>";
        }
        if(!tab_aqua)
        {
            error += "<?php echo  ERROR_EVALUE_AQUA.'<br/>' ?>";
        }
        if(!tab_residous)
        {
            error += "<?php echo  ERROR_EVALUE_RESIDOUS.'<br/>' ?>";
        } 
        if(error)
        {
            $('#add-subadmin-modal').animate({ scrollTop: 0 }, 'slow');
        }
        $("#error").html(error);
        return tab_elecitricity && tab_aqua && tab_gas && tab_residous;
    }
    /* PDCA DETAIL */
    function pdca_electricid(pdca_id,pupil_name)
    {
        $("#alert_message").css('display','none');
        $("#pupil_name_pdca").html(pupil_name);
           $.ajax({
           url:'<?php echo $this->Html->url('/Instructors/pdcaElectric');?>',
           type:'POST',
           data:{pdca_id:pdca_id},
           async:false,
           update: '#pdca-modal',
           beforeSend: function() {
           //     $('#result').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
           },
           success:function (data)
           {
               $("#pdca-modal-body").html(data);
           }
            
        });
    }
    function loadPdcaGas(pdca_id)
    {
       $.ajax({
           url:'<?php echo $this->Html->url('/Instructors/pdcaGas');?>',
           type:'POST',
           data:{pdca_id:pdca_id},
           async:false,
           beforeSend: function() {
           //     $('#result').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
           },
           success:function (data)
           {
                $("#pdca_gas").html(data);
           }
            
        });
        
      
    }
    function loadPdcaAqua(pdca_id)
    {
       $.ajax({
           url:'<?php echo $this->Html->url('/Instructors/pdcaAqua');?>',
           type:'POST',
           data:{pdca_id:pdca_id},
           async:false,
           beforeSend: function() {
           //     $('#result').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
           },
           success:function (data)
           {
                $("#pdca_aqua").html(data);
           }
            
        });
        
      
    }
    function loadPdcaResidous(pdca_id)
    {
       $.ajax({
           url:'<?php echo $this->Html->url('/Instructors/pdcaResidous');?>',
           type:'POST',
           data:{pdca_id:pdca_id},
           async:false,
           beforeSend: function() {
           //     $('#result').html('<?php echo $this->Html->image('images/ajax-loader.gif', array('style' => 'margin-top:10px; margin-left:500px;')); ?>');
           },
           success:function (data)
           {
               $("#pdca_residuos").html(data);
           }
            
        });
        
      
    }
    function removeError(id)
    {
        $("#"+id).removeClass('slt_error');
    }
</script>
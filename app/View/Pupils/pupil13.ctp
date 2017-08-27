<script type="text/javascript">
    jQuery(function ($){
       $("body").attr("class","bg_pink"); 
       $("div.footer").find("div.wrapper").eq(0).html("");
    });
</script>
<div class="container">
	<div class="wrapper">
    	<div class="content">
        	<div class="body_content">
            	<div class="box_content">
                	<div class="center">
                    <h2><img src="<?php echo $this->webroot ?>img/images/meo.png"> Actividad ahorro de energía eléctrica</h2>
                    </div>
                	<h3 class="fonth3 nobg">
                    <img src="<?php echo $this->webroot ?>img/images/p.png"> Para el ahorro de la energía eléctrica
                    </h3>
                    <h2>Hoja de estrategia para el ahorro de energía eléctrica </h2>
                    
                    <div class="txt1_13">
                    	<h3 class="fonth3">Te presentamos ahora algunas estrategias que otros chicos como vos pensaron para el ahorro de energía:</h3>
                        <p>«Hasta ahora yo dejaba todas las noches prendido el velador en la habitación donde duermo, pero de ahora en más, entiendo que no es necesario, más que nada en primavera y verano que amanece más temprano».</p>
                        <p>«Yo quiero tener más cuidado con la cantidad de veces que abro y cierro la heladera. Especialmente cuando estamos aburridos, abrimos la heladera sin necesidad».</p>
                        <p>«Hay días que en casa miramos la tele en varios ambientes a la vez. Podríamos ponernos de acuerdo y mirar algo que nos interese a todos en una sola TV».</p>
                        <div class="moc13">
                        	<img src="<?php echo $this->webroot ?>img/images/moc13.png">
                        </div>
                    </div>
                    <div class="txt2_13">
                    	<h4 class="fonth4">Escribí aquí las estrategias que pensaste</h4>
                        <textarea class="arena_13" name="plan_content"><?php echo $plan_content;?></textarea>
                    </div>
                    
                    <br><br>
                        <h3 class="fonth3"><img src="<?php echo $this->webroot ?>img/images/d.png"> Hacer (Do)</h3>
                        <h4 class="fonth4">Chequeo del medidor de electricidad (durante la estrategia)</h4>
                        <p>Mientras llevás a cabo tus estrategias, chequeá nuevamente el medidor. </p>
                	
                    <table cellpadding="0" cellspacing="0" class="tab11">
                    <tbody><tr>
                    <th>Fecha <br>
Día/Mes</th>
                    <?php                     
                    if(is_array($items)&&count($items)>0){
                        $i=0;
                        foreach ($items as $item) {                             
                            if($i==0){
                                $str='';
                            }
                            else{
                                $str=$i;
                            }
                            ?>
                            <th>                                
                                <input type="text" class="w50 w8em format-d-m-y highlight-days-67 range-low-today" name="after_date[]" id="sd<?php echo $str;?>" value="<?php echo FunctionCommon::convert_date_from_db_for_view($item['pdca_measurement']['date_after']);?>" maxlength="10"><a href="#" class="date-picker-control" title="" id="fd-but-sd<?php echo $str;?>"><span>&nbsp;</span></a>                                                                    
                                <input type="hidden" name="pdca_measurement_id[]" value="<?php echo $item['pdca_measurement']['id'];?>"/>
                                
                            </th> 
                    <?php    
                        $i++;
                        }
                    }
                    ?>                    
                    </tr>
                    <tr>
                    <th>Días de <br>
la semana</th>
                    <th class="bg_orange">
                    <select class="w50s">
                    <option>Dom</option>
                    <option>Lun</option>
                    <option>Mar</option>
                    <option>Mier</option>
                    <option>Jue</option>
                    <option>Vie</option>
                    <option>Sab</option>
                    <option>Feriado</option>
                    </select>
                    </th>
                    <th class="bg_orange"><select class="w50s">
                    <option>Dom</option>
                    <option>Lun</option>
                    <option>Mar</option>
                    <option>Mier</option>
                    <option>Jue</option>
                    <option>Vie</option>
                    <option>Sab</option>
                    <option>Feriado</option>
                    </select></th>
                    <th class="bg_orange"><select class="w50s">
                    <option>Dom</option>
                    <option>Lun</option>
                    <option>Mar</option>
                    <option>Mier</option>
                    <option>Jue</option>
                    <option>Vie</option>
                    <option>Sab</option>
                    <option>Feriado</option>
                    </select></th>
                    <th class="bg_orange"><select class="w50s">
                    <option>Dom</option>
                    <option>Lun</option>
                    <option>Mar</option>
                    <option>Mier</option>
                    <option>Jue</option>
                    <option>Vie</option>
                    <option>Sab</option>
                    <option>Feriado</option>
                    </select></th>
                    <th class="bg_orange"><select class="w50s">
                    <option>Dom</option>
                    <option>Lun</option>
                    <option>Mar</option>
                    <option>Mier</option>
                    <option>Jue</option>
                    <option>Vie</option>
                    <option>Sab</option>
                    <option>Feriado</option>
                    </select></th>
                    <th class="bg_orange"><select class="w50s">
                    <option>Dom</option>
                    <option>Lun</option>
                    <option>Mar</option>
                    <option>Mier</option>
                    <option>Jue</option>
                    <option>Vie</option>
                    <option>Sab</option>
                    <option>Feriado</option>
                    </select></th>
                    <th class="bg_orange"><select class="w50s">
                    <option>Dom</option>
                    <option>Lun</option>
                    <option>Mar</option>
                    <option>Mier</option>
                    <option>Jue</option>
                    <option>Vie</option>
                    <option>Sab</option>
                    <option>Feriado</option>
                    </select></th>
                    <th class="bg_orange"><select class="w50s">
                    <option>Dom</option>
                    <option>Lun</option>
                    <option>Mar</option>
                    <option>Mier</option>
                    <option>Jue</option>
                    <option>Vie</option>
                    <option>Sab</option>
                    <option>Feriado</option>
                    </select></th>
                    </tr>
                    <tr>
                    <td class="bg_pink">Números <br>del medido</td>
                    <?php                    
                    if(is_array($items)&&count($items)>0){
                        $tmp_arr = array('①', '②', '③', '④', '⑤', '⑥', '⑦', '⑧');
                        $num = array();
                        $index = 0;
                        foreach($items as $key=>$item) {
                            $num[$key] = $tmp_arr[$index++];
                        }
                        foreach ($items as $key=>$item) {
                            ?>
                            <td>
                            <div class="number_11">
                            <p><?php echo $num[$key]; ?></p>
                            <input type="text" class="input_11" name="after_value[]" value="<?php if(trim($item['pdca_measurement']['date_after'])!="") echo $item['pdca_measurement']['value_after'];?>"/>
                            <br>kWh
                            </div>
                            </td>                           
                    <?php        
                        }
                    }
                    ?>
                    </tr>
                    <tr>
                    <td class="bg_pink">Consumo <br>de 1 día</td>
                    <td class="yellow">
                    <div class="number_11">
                    <p>② - ①</p>
                    <input type="text" class="input_11">
                    <br>kWh
                    </div>
                    </td>
                    <td class="yellow">
                    <div class="number_11">
                    <p>③ - ②</p>
                    <input type="text" class="input_11">
                    <br>kWh
                    </div>
                    </td>
                    <td class="yellow">
                    <div class="number_11">
                    <p>④ - ③</p>
                    <input type="text" class="input_11">
                    <br>kWh
                    </div>
                    </td>
                    <td class="yellow">
                    <div class="number_11">
                    <p>⑤ - ④</p>
                    <input type="text" class="input_11">
                    <br>kWh
                    </div>
                    </td>
                    <td class="yellow">
                    <div class="number_11">
                    <p>⑥ - ⑤</p>
                    <input type="text" class="input_11">
                    <br>kWh
                    </div>
                    </td>
                    <td class="yellow">
                    <div class="number_11">
                    <p>⑦ - ⑥</p>
                    <input type="text" class="input_11">
                    <br>kWh
                    </div>
                    </td>
                    <td class="yellow">
                    <div class="number_11">
                    <p>⑧ - ⑦</p>
                    <input type="text" class="input_11">
                    <br>kWh
                    </div>
                    </td>
                    <td>
                    
                    </td>
                    </tr>
                    </tbody></table>
                    <p class="note11"><img src="<?php echo $this->webroot ?>img/images/note1.png"> Copiá los valores de este cuadro en la página 15.</p>
                </div>
                <div class="clear"></div>
                <div class="btn_home">
                	<a href="12.html" class="but_footer"><?php echo PREVIOUS;?></a>
                        <a href="#" class="but_footer but_footer_save"><?php echo SAVE;?></a>
                	<a class="but_footer but_footer_next"><?php echo NEXT;?></a>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="sidebar">
        	<div class="banner_right">
            	<a href="#"><img src="<?php echo $this->webroot ?>img/images/banner300.png" alt="banner"></a>
            </div>
            <div class="banner_right">
            	<a href="#"><img src="<?php echo $this->webroot ?>img/images/banner3001.png" alt="banner"></a>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<input type="hidden" name="pdca_id" value="<?php echo $pdca_id;?>"/>    

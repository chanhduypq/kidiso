<script type="text/javascript">
    jQuery(function ($){
       $("body").attr("class","bg_green"); 
       $("div.footer").find("div.wrapper").eq(0).html("");
    });
</script>
<div class="container">
	<div class="wrapper">
    	<div class="content">
        	<div class="body_content">
            	<div class="box_content">
                	<div class="center">
                    <h2><img src="<?php echo $this->webroot ?>img/images/43.png"> Actividad para los residuos</h2>
                    </div>
                	<h3 class="fonth3 nobg">
                    <img src="<?php echo $this->webroot ?>img/images/p_green.png"> Planificar (Plan)
                    </h3>
                    <h2 class="bg_gas">Hoja de estrategia para los residuos</h2>
                    
                    <div class="txt1_13">
                    	<h3 class="fonth3 nobg">Te presentamos ahora algunas estrategias que pensaron algunos
chicos como vos para el tratamiento de la basura: 
</h3>
                        <p>«En mi casa más que papel, la basura que más sale es de nylon. Creo que esto no es bueno. Todo lo que proviene del árbol, por ejemplo los escarbadientes, el papel tisú, los palitos, etcétera, son cosas pequeñas, pero que tenemos que cuidar»</p>
                        <p>«Las fotocopias que nos den en el colegio y que ya no utilicemos, no las voy a tirar y... las utilizaré del lado reverso para dibujar en casa».</p>
                        <p>«Voy a utilizar las cajas grandes de cartón, como recipientes para clasificar la basura. Para latas vacías, botellas de vidrio, botellas de plástico, envases de papel, bandejas de los comestibles, etc. Me las ingeniaré para que esté bien visible y que toda la familia se sume a ello».</p>
                        <div class="moc13">
                        	<img src="<?php echo $this->webroot ?>img/images/moc43.png">
                        </div>
                    </div>
                    <div class="txt2_13">
                    	<h4 class="fonth4">Escribí aquí las estrategias que pensaste</h4>
                        <textarea class="arena_13" name="plan_content"><?php echo $plan_content;?></textarea>
                        
                    </div>
                    <br><br>
                    <h3 class="fonth3 nobg"><img src="<?php echo $this->webroot ?>img/images/d_green.png"> Hacer (Do)</h3>
                        <h4 class="fonth4 black">Chequeo de los residuos (durante la estrategia)</h4>
                        <p>Mientras llevás a cabo tus estrategias, chequeá nuevamente la cantidad de basura. </p>
                	
                  <table cellpadding="0" cellspacing="0" class="tab11 date">
                    <tbody><tr>
                    <th>Fecha <br>
Día/Mes</th>
                    <?php
                    $waste_type='';
                    if(is_array($items)&&count($items)>0){
                        $i=0;
                        foreach ($items as $item) {
                            if($waste_type==''){
                                $waste_type=$item['pdca_measurement']['waste_type']; 
                            }    
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
                                <input type="hidden" name="value[]"/>

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
                    <?php
                    if($waste_type=='1'){?>
                    <tr>
                    <td class="bg_green">Cantidad
de bolsas
de basura</td>
                    <?php
                        for ($i=0;$i<7;$i++) {
                            $item=$items[$i];
                            ?>
                            <td>
                            <div class="number_11">
                            
                            <input type="text" class="input_11" name="before_value[]" value="<?php if(trim($item['pdca_measurement']['date_after'])!="") echo $item['pdca_measurement']['value_after'];?>"/>
                            </div>
                            </td>
                    <?php
                        }
                        ?>
                    </tr>
                            <tr>
                                <td class="bg_green">Peso de
            la basura</td>
                                <td class="yellow">
                                <div class="number_11">
                                <input type="text" class="input_11">
                                <br>kg
                                </div>
                                </td>
                                <td class="yellow">
                                <div class="number_11">
                                <input type="text" class="input_11">
                                <br>kg
                                </div>
                                </td>
                                <td class="yellow">
                                <div class="number_11">
                                <input type="text" class="input_11">
                                <br>kg
                                </div>
                                </td>
                                <td class="yellow">
                                <div class="number_11">
                                <input type="text" class="input_11">
                                <br>kg
                                </div>
                                </td>
                                <td class="yellow">
                                <div class="number_11">
                                <input type="text" class="input_11">
                                <br>kg
                                </div>
                                </td>
                                <td class="yellow">
                                <div class="number_11">
                                <input type="text" class="input_11">
                                <br>kg
                                </div>
                                </td>
                                <td class="yellow">
                                <div class="number_11">
                                <input type="text" class="input_11">
                                <br>kg
                                </div>
                                </td>
                                </tr>
                    <?php    
                    }
                    else if($waste_type=='2'){?>
                                                    <tr>
                    <td class="bg_green">Cantidad
de bolsas
de basura</td>
                                <td>
                    <div class="number_11">
                    
                    <input type="text" class="input_11">
                   
                    </div>
                    </td>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11">
                    </div>
                    </td>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11">
                    </div>
                    </td>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11">
                    </div>
                    </td>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11">
                    
                    </div>
                    </td>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11">
                    </div>
                    </td>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11">
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td class="bg_green">Peso de
la basura</td>
                       <?php 
                        for ($i=0;$i<7;$i++) {
                            $item=$items[$i];
                            ?>
                            <td>
                            <div class="number_11">
                            
                            <input type="text" class="input_11" name="before_value[]" value="<?php if(trim($item['pdca_measurement']['date_after'])!="") echo $item['pdca_measurement']['value_after'];?>"/>
                            <br>kWh
                            </div>
                            </td>
                    <?php
                        }
                        ?>
                    </tr>
                        <?php
                    }
                    else{
                                            
                        
                   
                    ?>
                                                <tr>
                    <td class="bg_green">Cantidad
de bolsas
de basura</td>
                    <td>
                    <div class="number_11">
                    
                    <input type="text" class="input_11">
                   
                    </div>
                    </td>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11">
                    </div>
                    </td>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11">
                    </div>
                    </td>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11">
                    </div>
                    </td>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11">
                    
                    </div>
                    </td>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11">
                    </div>
                    </td>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11">
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td class="bg_green">Peso de
la basura</td>
                    <td class="yellow">
                    <div class="number_11">
                    <input type="text" class="input_11">
                    <br>kg
                    </div>
                    </td>
                    <td class="yellow">
                    <div class="number_11">
                    <input type="text" class="input_11">
                    <br>kg
                    </div>
                    </td>
                    <td class="yellow">
                    <div class="number_11">
                    <input type="text" class="input_11">
                    <br>kg
                    </div>
                    </td>
                    <td class="yellow">
                    <div class="number_11">
                    <input type="text" class="input_11">
                    <br>kg
                    </div>
                    </td>
                    <td class="yellow">
                    <div class="number_11">
                    <input type="text" class="input_11">
                    <br>kg
                    </div>
                    </td>
                    <td class="yellow">
                    <div class="number_11">
                    <input type="text" class="input_11">
                    <br>kg
                    </div>
                    </td>
                    <td class="yellow">
                    <div class="number_11">
                    <input type="text" class="input_11">
                    <br>kg
                    </div>
                    </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody></table>
                    <p class="note11"><img src="<?php echo $this->webroot ?>img/images/note1.png"> Copiá los valores de este cuadro en la página 45.</p>
                </div>
                <div class="clear"></div>
                <div class="btn_home">
                	<a href="42.html" class="but_footer"><?php echo PREVIOUS;?></a>
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
<input type="hidden" name="waste_type" value="<?php echo $waste_type;?>"/>
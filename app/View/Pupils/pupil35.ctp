<script type="text/javascript">
    jQuery(function ($){
       $("body").attr("class","bg_blue"); 
       $("div.footer").find("div.wrapper").eq(0).html("");
    });
</script>
<?php
$is_input=(count($before_value_array)>0)?true:FALSE;
?>
<div class="container">
	<div class="wrapper">
    	<div class="content">
        	<div class="body_content">
            	<div class="box_content">
                	<h2 class="fonth2">
                    Vamos a comparar los
resultados de la estrategia
                  </h2>
                	<h3 class="fonth3 nobg"><img src="<?php echo $this->webroot ?>img/images/c_yellow.png"> Verificar (Check)</h3>
                    <h3>Reconocimiento de la situación en el hogar (Hoja de análisis)</h3>
                  <p>Puntaje total</p>
                    <div class="table_form">
                    	<table cellpadding="0" cellspacing="0" class="tab">
                        <tbody><tr>
                        <th>Antes de la estrategia</th>
                        <th>Después de la estrategia</th>
                        </tr>
                        <tr>
                        <td class="pink"><input type="text" value="<?php if($before_value_sum_measurement_type2>0) echo $before_value_sum_measurement_type2;?>"></td>
                        <td class="violet"><input type="text" value="<?php if($after_value_sum_measurement_type2>0) echo $after_value_sum_measurement_type2;?>"></td>
                        </tr>
                        </tbody></table>
                      <p class="txt_tab">Copiá los valores de las páginas 30 y 34</p>
                    </div>
                    <table cellpadding="0" cellspacing="0" width="100%">
                    <tbody><tr>
                    <td width="80%">
                    	<h2>Compará los valores antes y durante la estrategia</h2>
                    </td>
                    <td rowspan="2"><div class="center"><img src="<?php echo $this->webroot ?>img/images/mt_blue.png"></div></td>
                    </tr>
                    <tr>
                    <td><p>Podrás comprobar en números lo efectiva que fue la estrategia que implementaste. Cuanto más grande sea la diferencia en los valores, más éxito habrás tenido en ella. (Cuando termines de escribirlo, acordate de mostrárselo a tu familia).</p></td>
                    
                    </tr>
                    </tbody></table>
                    <p></p>
                    <p></p>
                  <h3 class="fonth3 nobg">Medidor de agua</h3>
                  
                  <table cellpadding="0" cellspacing="0" class="tab11">
                    <tbody><tr>
                    <th></th>
                    <th>1.<sup>er</sup> día</th>
                    <th>2.<sup>er</sup> día</th>
                    <th>3.<sup>er</sup> día</th>
                    <th>4.<sup>er</sup> día</th>
                    <th>5.<sup>er</sup> día</th>
                    <th>6.<sup>er</sup> día</th>
                    <th>7.<sup>er</sup> día</th>
                    <th><b>Total</b></th>	
                    </tr>
                   <tr>
                    <td class="bg_blue">Consumo
por día, 
antes de la 
estrategia 
<div class="center"><img src="<?php echo $this->webroot ?>img/images/1.png"></div>
</td>
                    <?php
                    $before_yes_count=count($before_value_array);
                    $before_no_count=7-$before_yes_count;
                    for($i=0;$i<$before_yes_count;$i++){?>
                        <td>
                        <div class="number_11">
                            <input type="text" class="input_11" value="<?php echo $before_value_array[$i];?>">
                        <br>m<sup>3</sup>
                        </div>
                        </td>
                    <?php
                    }
                    for($i=0;$i<$before_no_count;$i++){?>
                        <td>
                        <div class="number_11">
                            <input type="text" class="input_11">
                        <br>m<sup>3</sup>
                        </div>
                        </td>
                    <?php
                    }
                    ?>
                    <td class="yellow">
                    <div class="number_11">
                    <input type="text" class="input_11" value="<?php if($is_input) echo $before_value_sum_measurement_type1;?>">
                    <br>m<sup>3</sup>
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td class="bg_blue">Consumo
por día 
durante la 
estrategia
<div class="center"><img src="<?php echo $this->webroot ?>img/images/2.png"></div>
</td>
                    <?php
                    $hieu_value_array=array();
                    $after_yes_count=count($after_value_array);
                    $after_no_count=7-$after_yes_count;
                    for($i=0;$i<$after_yes_count;$i++){
                        $hieu_value_array[]=$after_value_array[$i]-$before_value_array[$i];
                        ?>
                        <td>
                        <div class="number_11">
                            <input type="text" class="input_11" value="<?php echo $after_value_array[$i];?>">
                        <br>m<sup>3</sup>
                        </div>
                        </td>
                    <?php
                    }
                    for($i=0;$i<$after_no_count;$i++){?>
                        <td>
                        <div class="number_11">
                            <input type="text" class="input_11">
                        <br>m<sup>3</sup>
                        </div>
                        </td>
                    <?php
                    }
                    ?>
                    <td class="green">
                    <div class="number_11">
                    <input type="text" class="input_11" value="<?php if($is_input) echo $after_value_sum_measurement_type1;?>">
                    <br>m<sup>3</sup>
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td class="bg_blue">Diferencia de
valores de
consumo
<div class="center"><img src="<?php echo $this->webroot ?>img/images/2.png"> - <img src="<?php echo $this->webroot ?>img/images/1.png"></div>
</td>
                    <?php
                    $hieu_yes_count=count($hieu_value_array);
                    $hieu_no_count=7-$hieu_yes_count;
                    for($i=0;$i<$hieu_yes_count;$i++){?>
                        <td>
                        <div class="number_11">
                            <input type="text" class="input_11" value="<?php echo $hieu_value_array[$i];?>">
                        <br>m<sup>3</sup>
                        </div>
                        </td>
                    <?php
                    }
                    for($i=0;$i<$hieu_no_count;$i++){?>
                        <td>
                        <div class="number_11">
                            <input type="text" class="input_11">
                        <br>m<sup>3</sup>
                        </div>
                        </td>
                    <?php
                    }
                    ?>
                    <td>
                    <div class="number_11">
                    <input type="text" class="input_11" value="<?php if($is_input) echo $after_value_sum_measurement_type1-$before_value_sum_measurement_type1;?>">
                    <br>m<sup>3</sup>
                    </div>
                    </td>
                    </tr>
                    </tbody></table>
                    <p class="txt_tab">
                    	Copiá los valores de las páginas 31 y 33
                    </p>
                    <p></p>
                    <div class="right">
                    <img src="<?php echo $this->webroot ?>img/images/meo15.png">
                    </div>
                    <table cellpadding="0" cellspacing="0" class="tab">
                        <tbody><tr>
                        <th colspan="5">Cantidad de consumo en tu casa</th>
                       
                        </tr>
                        <tr>
                        <th></th>
                        <th>
                        	<table class="border_none">
                            <tbody><tr>
                            <td><img src="<?php echo $this->webroot ?>img/images/1.png"></td>
                            <td>Cantidad de 
consumo total 
en los 7 días</td>
                            </tr>
                            </tbody></table>
                         </th>
                        <th>
                        	<table class="border_none">
                            <tbody><tr>
                            <td><img src="<?php echo $this->webroot ?>img/images/2.png"></td>
                            <td>Promedio de 
consumo por 
día <br>( <img src="<?php echo $this->webroot ?>img/images/1.png" width="13"> ÷ 7 )
							</td>
                            </tr>
                            </tbody></table>
                       </th>
                        <th>
                        
                        
                        Valor por persona, 
por día  <br>(<img src="<?php echo $this->webroot ?>img/images/2.png" width="13"> ÷ <img src="<?php echo $this->webroot ?>img/images/3.png" width="13"> )


                        </th><th>
                        
                        <table class="border_none">
                            <tbody><tr>
                            <td><img src="<?php echo $this->webroot ?>img/images/3.png"></td>
                            <td>Número de 
integrantes
de la familia</td>
                            </tr>
                            </tbody></table>
                        </th>
                        </tr>
                        <tr>
                        <td>Antes de
la estrategia</td>
						<td class="yellow">
                        <div class="number_11">
                        <input type="text" class="input_11" value="<?php if($is_input) echo $before_value_sum_measurement_type1;?>">
                        <br>m<sup>3</sup>
                        </div>
                        </td>
                        <td>
                        <div class="number_11">
                        <input type="text" class="input_11" value="<?php if($is_input) echo round($before_value_sum_measurement_type1/7,2);?>">
                        <br>m<sup>3</sup>
                        </div>
                        </td>
                        <td>
                        <div class="number_11">
                        <input type="text" class="input_11" value="<?php if($is_input) echo round($before_value_sum_measurement_type1/(7*$family_member_no),2);?>">
                        <br>m<sup>3</sup>
                        </div>
                        </td>
                        <td rowspan="2">
                        <div class="center">
                        <input type="text" class="input_11" value="<?php echo $family_member_no;?>">
                        
                        </div>
                        </td>
                        </tr>
                        <tr>
                        <td>Durante la
estrategia</td>
						<td class="green"><div class="number_11">
                        <input type="text" class="input_11" value="<?php if($is_input) echo $after_value_sum_measurement_type1;?>">
                        <br>m<sup>3</sup>
                        </div></td>
                        <td><div class="number_11">
                        <input type="text" class="input_11" value="<?php if($is_input) echo round($after_value_sum_measurement_type1/7,2);?>">
                        <br>m<sup>3</sup>
                        </div></td>
                        <td><div class="number_11">
                        <input type="text" class="input_11" value="<?php if($is_input) echo round($after_value_sum_measurement_type1/(7*$family_member_no),2);?>">
                        <br>m<sup>3</sup>
                        </div></td>
                        </tr>
                        </tbody></table>
              </div>
                <div class="clear"></div>
                <div class="btn_home">
                	<a href="34.html" class="but_footer"><?php echo PREVIOUS;?></a>
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
<script type="text/javascript">
    jQuery(function ($){
       $("body").attr("class","bg_blue"); 
       $("div.footer").find("div.wrapper").eq(0).html("");
    });
</script>
<div class="container">
	<div class="wrapper">
    	<div class="content">
        	<div class="body_content">
            	<div class="box_content">
                	<h2 class="fonth2">
                    Estrategia para reducir el consumo del agua
                    </h2>
                	<h3 class="fonth3 nobg">Reconocimiento de la situación ① (Después de la estrategia)</h3>
                    <h4 class="fonth4 black">Hoja de análisis para el hogar</h4>
                    <p>Luego de haber llevado a cabo tu estrategia, revisá nuevamente cómo está la situación en tu hogar.</p>
                    <div class="table_form">
                    	<p style="text-align:center"><img src="<?php echo $this->webroot ?>img/images/30.png"></p>
                        <table cellpadding="0" cellspacing="0" class="tab">
                        <tbody><tr>
                        <th width="75%">Ítem </th>
                        <th>Antes de la <br>estrategia</th>
                        </tr>
                        <?php
                        $sum=0;                           
                        if(is_array($items)&&count($items)>0){
                            foreach ($items as $item) {
                                $sum+=$item['pdca_measurement']['value_after'];
                                ?>
                                <tr>
                                    <td><?php echo $item['item']['item_name'];?></td>
                                    <td>
                                        <input type="text" class="input_123" name="after_value[]" value="<?php if($item['pdca_measurement']['value_after']!='0') echo $item['pdca_measurement']['value_after'];?>"/>
                                        <input type="hidden" name="item_id[]" value="<?php echo $item['item']['id'];?>"/>
                                        <input type="hidden" name="pdca_measurement_id[]" value="<?php echo $item['pdca_measurement']['id'];?>"/>
                                    </td>
                                </tr> 
                        <?php        
                            }
                        }
                        ?>
                        <tr>
                        <td></td>
                        <td></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        </tr>
                        <tr>
                        <td><b>Puntaje Total</b></td>
                        <td>
                        <input type="text" class="input_123" value="<?php if($sum>0) echo $sum;?>">
                        </td></tr>
                        </tbody></table>
                    </div>
                    <p class="txt_tab">Tachá con una línea los ítems que no concuerden con los hábitos de tu casa, y agregá en los espacios vacíos aquellos que quieras mencionar.</p>
                </div>
                <div class="clear"></div>
                <div class="btn_home">
                	<a href="33.html" class="but_footer"><?php echo PREVIOUS;?></a>
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

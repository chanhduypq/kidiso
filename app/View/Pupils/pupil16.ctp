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
                	<table cellpadding="0" cellspacing="0" width="100%">
                    <tbody><tr>
                    <td width="80%">
                    	<h3 class="fonth3"><img src="<?php echo $this->webroot ?>img/images/a.png"> Actuar (Act)</h3>
                        <h2 class="fonth2">Luego de haber terminado tu estrategia</h2>
                        <h4 class="fonth4 fz14 black">¿Qúe te pareció la experiencia que realizaste?<br>
Escribí cuáles fueron tus logros a partir de las estrategias
que pensaste y qué cosas no pudiste mejorar.</h4>
                    </td>
                    <td>
                    <img src="<?php echo $this->webroot ?>img/images/16_img.png">
                    </td>
                    </tr>
                    </tbody></table>
                    <p></p>
                    <p class="fz14">Pude lograr:</p>
                    <textarea class="arena_13" name="pupil_achieve"><?php echo $pupil_achieve;?></textarea>
                    <p></p>
                    <p></p>
                    <p class="fz14">No pude mejorar:</p>
                    <textarea class="arena_13" name="pupil_improve"><?php echo $pupil_improve;?></textarea>
                    <p></p>
                    <p></p>
                    <p class="fz14">Mis comentarios:</p>
                    <textarea class="arena_13" name="pupil_comment"><?php echo $pupil_comment;?></textarea>
                    <input type="hidden" value="<?php echo $pdca_id;?>" name="pdca_id"/>
                    <input type="hidden" value="<?php echo $pdca_comment_id; ?>" name="pdca_comment_id"/>
              
                </div>
                <div class="clear"></div>
                <div class="btn_home">
                	<a href="15.html" class="but_footer"><?php echo PREVIOUS;?></a>
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
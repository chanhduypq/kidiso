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
                	<h2 class="fonth2">Este espacio es para que tus padres o algún miembro 
de la familia te escriban un mensaje.</h2>
					<p></p>
                    <p></p>
                    <textarea class="arena_17" name="family_comment"><?php echo $family_comment;?></textarea>
                    <input type="hidden" value="<?php echo $pdca_id;?>" name="pdca_id"/>
                    <input type="hidden" value="<?php echo $pdca_comment_id; ?>" name="pdca_comment_id"/>
            
                </div>
                <div class="clear"></div>
                <div class="btn_home">
                	<a href="16.html" class="but_footer"><?php echo PREVIOUS;?></a>
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
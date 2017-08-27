jQuery(function($) {
    /**
     * form.validate_input_123
     */
    function validate_input_123(inputs){              
        for (i = 0; i < inputs.length; i++) {
            if ($.trim($(inputs[i]).val()) != "1" && $.trim($(inputs[i]).val()) != "2" && $.trim($(inputs[i]).val()) != "3") {                                
                return false;
            }
        }
        return true;
    } 
    /**
     * form.validate_input_text
     */
    function validate_input_text(inputs){          
        for (i = 0; i < inputs.length; i++) {
            if ($.trim(inputs[i].value).length == 0) {                                
                return false;
            }
        }
        return true;
    }       
    /**
     * form.validate_input_date
     */
    function validate_input_date(inputs){                
        for (i = 0; i < inputs.length; i++) {
            if ($.trim($(inputs[i]).val()) == ""){                
                return false;
            }
        }
        return true;
    }
    function validate_input_date_new(inputs){                
        for (i = 0; i < inputs.length; i++) {
            if ($.trim($(inputs[i]).val()) != ""){                
                return true;
            }
        }
        return false;
    }
    /**
     * form.validate_input_number
     */
    function validate_input_number(inputs){     
        
        for (i = 0; i < inputs.length; i++) {
            if ($.trim($(inputs[i]).val()) == ""||!isFinite($.trim($(inputs[i]).val()))){                
                return false;
            }
        }
        return true;
    }
    function validate_input_number_integer(inputs){     
        
        for (i = 0; i < inputs.length; i++) {
            var value=$.trim($(inputs[i]).val());
            if (value != ""&&!isFinite(value)){                
                return false;
            }
        }
        return true;
    }
    function validate_input_number_new(inputs){     
        
        for (i = 0; i < inputs.length; i++) {
            if ($.trim($(inputs[i]).val()) != ""&&!isFinite($.trim($(inputs[i]).val()))){                
                return false;
            }
        }
        return true;
    }
    
    $("form").submit(function() {
        var isValid;
        if($(this).hasClass('validate_input_123')){
            isValid=validate_input_123($("input.input_123").not("input#total_input_123"));
            if(isValid==false){
                $( "div#error_input_123" ).dialog({
                            height: 200,    			
                                            width:800,                                            
                                            show: {effect: "slide", duration: 500},
                                            hide: {effect: "slide", duration: 500},
                                            modal: true
                           });
                return false;           
            }
        }        
        if($(this).hasClass('validate_input_date')){
            isValid=validate_input_date_new($("input.highlight-days-67"));
            if(isValid==false){
                $( "div#error_input_date" ).dialog({
                            height: 200,    			
                                            width:800,                                            
                                            show: {effect: "slide", duration: 500},
                                            hide: {effect: "slide", duration: 500},
                                            modal: true
                           });
                return false;           
            }
        }
        if($(this).hasClass('validate_input_number')){               
            isValid=validate_input_number_new($("table.disable_input_on_last_row tr").eq(2).find("input.input_11"));
            if(isValid==false){
                $( "div#error_input_number" ).dialog({
                            height: 200,    			
                                            width:800,                                            
                                            show: {effect: "slide", duration: 500},
                                            hide: {effect: "slide", duration: 500},
                                            modal: true
                           });
                return false;           
            }
        }
        if($(this).hasClass('validate_input_number_integer')){               
            isValid=validate_input_number_integer($("table.process_last_two_row").find("input.input_11"));
            if(isValid==false){
                $( "div#error_input_number" ).dialog({
                            height: 200,    			
                                            width:800,                                            
                                            show: {effect: "slide", duration: 500},
                                            hide: {effect: "slide", duration: 500},
                                            modal: true
                           });
                return false;           
            }
            tr=$("table.process_last_two_row tr").eq(2);
            input=$(tr).find("input.input_11").eq(0);
            if($(input).attr("disabled")=="disabled"||$(input).attr("disabled")==true){
                tr=$("table.process_last_two_row tr").eq(3);
                $("input[name='waste_type']").val('2');
            }
            else{
                $("input[name='waste_type']").val('1');
            }
            inputHiddens=$("input[name='value[]']");            
            inputs=$(tr).find("input.input_11");
            for(i=0;i<inputs.length;i++){
                $(inputHiddens[i]).val($(inputs[i]).val());
            }
            $(inputHiddens[7]).val('0');
            
            
        }
        if($(this).hasClass('validate_input_text')){            
            isValid=validate_input_text($('textarea'));
            if(isValid==false){
                $( "div#error_input_text" ).dialog({
                            height: 200,                
                                            width:800,                                            
                                            show: {effect: "slide", duration: 500},
                                            hide: {effect: "slide", duration: 500},
                                            modal: true
                           });
                return false;           
            }
        }
        return true;
        
    });
    
    
});

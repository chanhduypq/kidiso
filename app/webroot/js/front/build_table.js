jQuery(function($) {
    var weekday = new Array(7);
        weekday[0] = "Dom";
        weekday[1] = "Lun";
        weekday[2] = "Mar";
        weekday[3] = "Mier";
        weekday[4] = "Jue";
        weekday[5] = "Vie";
        weekday[6] = "Sab"; 
    /**
     * table.process_last_two_row     
     */    
    waste_type=$("input[name='waste_type']").eq(0);
    if(waste_type.length>0){
        waste_type=$(waste_type).val();        
        if(waste_type=='1'){
            $("table.process_last_two_row tr").eq(3).find("input.input_11").attr("disabled","disabled");
        }
        else if(waste_type=='2'){
            $("table.process_last_two_row tr").eq(2).find("input.input_11").attr("disabled","disabled");
        }
    }
    /**
     * table.form_input_123     
     */
    var inputs1 = $("table.form_input_123 input.input_123");
    if (inputs1.length > 0) {
        var id = $(inputs1[inputs1.length - 1]).attr("id");
        if (id == undefined || id == "") {
            $(inputs1[inputs1.length - 1]).attr("id", "total_input_123");
            $(inputs1[inputs1.length - 1]).attr('disabled', 'disabled');

        }
    }
    $("input.input_123").keyup(function() {
        $("input#total_input_123").val(sumValue());
    });
    function sumValue() {
        var sum = 0;
        var inputs = $("input.input_123").not("input#total_input_123");
        for (i = 0; i < inputs.length; i++) {
            if ($.trim($(inputs[i]).val()) != "" && isFinite($.trim($(inputs[i]).val()))) {
                sum += parseFloat($(inputs[i]).val());
            }
        }
        return sum;
    }
    /**
     * table.date    
     */
    var indexInput = 0;
    var options = $("table.date select.w50s option");
    for (i = 0, n = options.length; i < n; i++) {
        $(options[i]).attr("value", $.trim($(options[i]).html()));
    }
    //
    $("table.date select.w50s").attr("disabled", true);
    //
    $("table.date a.date-picker-control").click(function() {
        ths = $(this).parent().parent().find("th");
        for (i = 0, n = ths.length; i < n; i++) {
            if ($(this).attr("id") == $(ths[i]).find("a").eq(0).attr("id")) {
                indexInput = i;
                break;
            }
        }
    });
    //
    var inputHighlightDate = $("table.date input.highlight-days-67").eq(0);
    if (inputHighlightDate.length > 0) {
        var inputDateClassName = $("table.date input.highlight-days-67").eq(0).attr("class");
        inputDateClassNameeArray = inputDateClassName.split(" ");
        for (i = 0, n = inputDateClassNameeArray.length; i < n; i++) {
            if (inputDateClassNameeArray[i].indexOf("format-") != -1) {
                $("table.date input.highlight-days-67").removeClass(inputDateClassNameeArray[i]);
                break;
            }
        }
        $("table.date input.highlight-days-67").addClass(dateFormatForView);
    }

    //
    $("table.date input.highlight-days-67").click(function() {
        ths = $(this).parent().parent().find("th");
        for (i = 0, n = ths.length; i < n; i++) {
            if ($(this).attr("id") == $(ths[i]).find("input").eq(0).attr("id")) {
                indexInput = i;
                break;
            }
        }
    });
    $("table.date input.highlight-days-67").keyup(function(event) {
        if (event.keyCode != 37 && event.keyCode != 39) {
            $(this).val("");
        }
    });
    //
    var dateInputs=$("table.date input.highlight-days-67");
    for (i = 0; i < dateInputs.length; i++) {
        if ($.trim($(dateInputs[i]).val()) != "") {
            var dateString = $.trim($(dateInputs[i]).val());
            dateString=dateString.split("/");
            var day1 = parseInt(dateString[0]);
            var month1 = parseInt(dateString[1]);
            var year1 = parseInt(dateString[2]);
            var d1 = new Date();
            d1.setFullYear(year1, month1 - 1, day1);                      
            var n1 = weekday[d1.getDay()];
            initSelects = $("select.w50s");
            $(initSelects[i]).val(n1);
        }
    }   
    //
    $("body").delegate("div.datePicker td", "click", function() {
        var day = parseInt($.trim($(this).html()));
        var month = $.trim($("div.datePicker th span.month-display").eq(0).html());
        month = month.split("&nbsp;");
        month = month[0];
        month = month.toLowerCase();
        if (month == 'enero') {
            month = 1;
        }
        else if (month == 'febrero') {
            month = 2;
        }
        else if (month == 'marzo') {
            month = 3;
        }
        else if (month == 'abril') {
            month = 4;
        }
        else if (month == 'coser') {
            month = 5;
        }
        else if (month == 'junio') {
            month = 6;
        }
        else if (month == 'julio') {
            month = 7;
        }
        else if (month == 'agosto') {
            month = 8;
        }
        else if (month == 'septiembre') {
            month = 9;
        }
        else if (month == 'octubre') {
            month = 10;
        }
        else if (month == 'noviembre') {
            month = 11;
        }
        else if (month == 'diciembre') {
            month = 12;
        }
        var year = parseInt($.trim($("div.datePicker th span.year-display").eq(0).html()));

        var d = new Date();
        d.setFullYear(year, month - 1, day);
        
        var n = weekday[d.getDay()];
        selects = $("select.w50s");
        if (indexInput > 0) {
            $(selects[indexInput - 1]).val(n);
        }
        inputs = $("table.disable_input_on_last_row tr").eq(2).find("input.input_11");
        if($.trim($(inputs[indexInput - 1]).val())==""){            
            $(inputs[indexInput - 1]).toggleClass("input_11_red");
        }
        else{            
            $(inputs[indexInput - 1]).toggleClass("input_11_red");            
        }
        
    });
    /**
     * table.disable_input_on_last_row
     */
    //
    trs = $("table.disable_input_on_last_row tr");    
    if (trs.length > 0) {
        $(trs[trs.length - 1]).find("input.input_11").attr("disabled", true);
        inputs = $(trs[trs.length - 2]).find("input.input_11");
        for (i = 0, n = inputs.length - 1; i < n; i++) {
            value1=$.trim($(inputs[i]).val());
            value2=$.trim($(inputs[i + 1]).val());
            if(value1==""){
                value1=0;
            }
            if(value2==""){
                value2=0;
            }
            hieu = parseFloat(value2 - value1);
            $(trs[trs.length - 1]).find("input.input_11").eq(i).val(hieu);
//            if ($.trim($(inputs[i]).val()) != "" && isFinite($.trim($(inputs[i]).val())) && $.trim($(inputs[i + 1]).val()) != "" && isFinite($.trim($(inputs[i + 1]).val()))) {
//                hieu = parseFloat($(inputs[i + 1]).val() - $(inputs[i]).val());
//                $(trs[trs.length - 1]).find("input.input_11").eq(i).val(hieu);
//            }
//            else {
//                $(trs[trs.length - 1]).find("input.input_11").eq(i).val("");
//            }
        }
    }
    //
    $("table.disable_input_on_last_row tr td input.input_11").keyup(function() {
        if(!isFinite($.trim($(this).val()))){
            $(this).val('');
        }
        trs = $("table.disable_input_on_last_row tr");
        inputs = $(trs[trs.length - 2]).find("input.input_11");
        for (i = 0, n = inputs.length - 1; i < n; i++) {            
            value1=$.trim($(inputs[i]).val());
            value2=$.trim($(inputs[i + 1]).val());
            if(value1==""){
                value1=0;
            }
            if(value2==""){
                value2=0;
            }
            hieu = parseFloat(value2 - value1);
            $(trs[trs.length - 1]).find("input.input_11").eq(i).val(hieu);
//            if ($.trim($(inputs[i]).val()) != "" && isFinite($.trim($(inputs[i]).val())) && $.trim($(inputs[i + 1]).val()) != "" && isFinite($.trim($(inputs[i + 1]).val()))) {
//                hieu = parseFloat($(inputs[i + 1]).val() - $(inputs[i]).val());
//                $(trs[trs.length - 1]).find("input.input_11").eq(i).val(hieu);
//            }
//            else {
//                $(trs[trs.length - 1]).find("input.input_11").eq(i).val("");
//            }
        }
        if($.trim($(this).val())!=""&&$(this).hasClass('input_11_red')){            
            $(this).removeClass("input_11_red");
        }       
    });
    /**
     * table.process_last_two_row
     */
    $("table.process_last_two_row tr td input.input_11").keyup(function() {
        tr=$(this).parent().parent().parent();
        var isEmpty=true;
        inputs=$(tr).find('input.input_11');
        for (i = 0; i < inputs.length; i++) {
            if ($.trim($(inputs[i]).val()) != ""){                
                isEmpty=false;
            }
        }
        trPrev=$(tr).prev();
        if($(trPrev).find("select").length>0){
            if(isEmpty==false){
                $(this).parent().parent().parent().next().find("input.input_11").attr("disabled","disabled");
            }
            else{
                $(this).parent().parent().parent().next().find("input.input_11").removeAttr("disabled");
            }
            
        }
        else{
            if(isEmpty==false){
                $(this).parent().parent().parent().prev().find("input.input_11").attr("disabled","disabled");
            }       
            else{
                $(this).parent().parent().parent().prev().find("input.input_11").removeAttr("disabled");
            }
        }        
    });
});
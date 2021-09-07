$("#form").hide("fade",{},1);

$("#findRFQ").click(function() {
    qNumber = $("#qNumber").val();
    $.post(
        "findRFQ.php",
        {"qNumber": qNumber},
        function(data){
            if(data == 1) {
                $("#qNumber").prop("disabled",true);
                $("#findRFQ").prop("disabled",true);
                $("#form").show("slide",{},500);
                qNumber = qNumber.charAt(0).toUpperCase() + qNumber.slice(1);
                $("#selected").html("Selected Q Number: " + qNumber);
                $.post(
                    "RFQEntryCheck.php",
                    {"qNumber": qNumber},
                    function(data){
                        if(data == 1){
                            $.post(
                                "RFQDataDump.php",
                                {"qNumber": qNumber},
                                function(data){
                                    row = data.split(" | ");
                                    $("#ClosingDate").val(row[9]);
                                    $("#Supplier1").attr("value",row[10]);
                                    if(row[11] == 1){
                                        $("#Quote1").attr("checked",true);
                                    }
                                    $("#Supplier2").attr("value",row[12]);
                                    if(row[13] == 1){
                                        $("#Quote2").attr("checked",true);
                                    }
                                    $("#Supplier3").attr("value",row[14]);
                                    if(row[15] == 1){
                                        $("#Quote3").attr("checked",true);
                                    }
                                }
                            )
                        }
                    }
                )
            }
        }
    )
})

$("#ClosingDate").val(new Date().toISOString().substring(0, 10))

$("#submit").click(function(){
    data = {
        "qNumber": qNumber,
        "ClosingDate": $("#ClosingDate").val(),
        "Supplier1": $("#Supplier1").val(),
        "Quoted1": $("#Quote1").is(':checked'),
        "Supplier2": $("#Supplier2").val(),
        "Quoted2": $("#Quote2").is(':checked'),
        "Supplier3": $("#Supplier3").val(),
        "Quoted3": $("#Quote3").is(':checked')
    }

    for (const record in data) {    //Changes booleans to bits for SQL
        if (data[record] == true) {
            data[record] = 1
        }
        if (data[record] == false) {
            data[record] = 0
        }
    }
    
    $.post(
        "addrfq.php",
        data,
        function(message){
            alert(message)
        }
    )
})
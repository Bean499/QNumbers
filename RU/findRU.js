$("#form").hide("fade",{},1);

$("#findRU").click(function() {
    qNumber = $("#qNumber").val();
    $.post(
        "findRU.php",
        {"qNumber": qNumber},
        function(data){
            if(data == 1) {
                $("#qNumber").prop("disabled",true);
                $("#findRU").prop("disabled",true);
                $("#form").show("slide",{},500);
                qNumber = qNumber.charAt(0).toUpperCase() + qNumber.slice(1);
                $("#selected").html("Selected Q Number: " + qNumber);
                $.post(
                    "RUEntryCheck.php",
                    {"qNumber": qNumber},
                    function(data){
                        if(data == 1){
                            $.post(
                                "RUDataDump.php",
                                {"qNumber": qNumber},
                                function(data){
                                    row = data.split(" | ");
                                    $("#type").val(row[9]);
                                    $("#ReturnNumber").attr("value",row[10]);
                                    $("#DefectCode").attr("value",row[11]);
                                    $("#Status").attr("value",row[12]);
                                    $("#QuantityAccepted").attr("value",row[14]);
                                    $("#QuantityRejected").attr("value",row[15]);
                                    $("#RejectNote").attr("value",row[16]);
                                    $("#DebitNote").attr("value",row[17]);
                                    $("#ClaimValue").attr("value",row[18]);
                                    $("#ScrapDate").val(row[19]);
                                    $("#Notes").attr("value",row[20]);
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
        "Type": $("#type").val(),
        "ReturnNumber": $("#ReturnNumber").val(),
        "DefectCode": $("#DefectCode").val(),
        "Status": $("#Status").val(),
        "QuantityAccepted": $("#QuantityAccepted").val(),
        "QuantityRejected": $("#QuantityRejected").val(),
        "RejectNote": $("#RejectNote").val(),
        "DebitNote": $("#DebitNote").val(),
        "ClaimValue": $("#ClaimValue").val(),
        "ScrapDate": $("#ScrapDate").val(),
        "Notes": $("#Notes").val(),
    }
    
    $.post(
        "addRU.php",
        data,
        function(message){
            alert(message)
        }
    )
})
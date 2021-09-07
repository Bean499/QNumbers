$("#form").hide("fade",{},1);

$("#find8D").click(function() {
    qNumber = $("#qNumber").val();
    $.post(
        "find8D.php",
        {"qNumber": qNumber},
        function(data){
            if(data == 1) {
                $("#qNumber").prop("disabled",true);
                $("#find8D").prop("disabled",true);
                $("#form").show("slide",{},500);
                qNumber = qNumber.charAt(0).toUpperCase() + qNumber.slice(1);
                $("#selected").html("Selected Q Number: " + qNumber);
                $.post(
                    "8DEntryCheck.php",
                    {"qNumber": qNumber},
                    function(data){
                        if(data == 1){
                            $.post(
                                "8DDataDump.php",
                                {"qNumber": qNumber},
                                function(data){
                                    row = data.split(" | ");
                                    $("#DateClosed").val(row[9]);
                                    $("#QuantityRejected").attr("value",row[11]);
                                    $("#PRSSent").val(row[12]);
                                    $("#PRSReceived").attr("value",row[13]);
                                    $("#RejectNote").attr("value",row[14]);
                                    $("#DefectCode").attr("value",row[15]);
                                    $("#QualityConcern").attr("value",row[16]);
                                    $("#Status").attr("value",row[17]);
                                    $("#DebitNote").attr("value",row[18]);
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

$("#submit").click(function(){
    data = {
        "qNumber": qNumber,
        "DateClosed": $("#DateClosed").val(),
        "QuantityRejected": $("#QuantityRejected").val(),
        "PRSSendDate": $("#PRSSent").val(),
        "PRSReceived": $("#PRSReceived").val(),
        "RejectNote": $("#RejectNote").val(),
        "DefectCode": $("#DefectCode").val(),
        "QualityConcern": $("#QualityConcern").val(),
        "Status": $("#Status").val(),
        "DebitNote": $("#DebitNote").val(),
        "ScrapDate": $("#ScrapDate").val(),
        "Notes": $("#Notes").val()
    }
    
    $.post(
        "add8D.php",
        data,
        function(message){
            alert(message)
        }
    )
})
$("#form").hide("fade",{},1);

$("#findQNumber").click(function() {
    qNumber = $("#qNumber").val();
    $.post(
        "entryCheck.php",
        {"qNumber": qNumber},
        function(data){
            if(data == 1) {
                $("#qNumber").prop("disabled",true);
                $("#findQNumber").prop("disabled",true);
                $("#form").show("slide",{},500);
		$("#submit").show("slide",{},500);
                qNumber = qNumber.charAt(0).toUpperCase() + qNumber.slice(1);
                $("#selected").html("Selected Q Number: " + qNumber);
                $.post(
                    "datadump.php",
                    {"qNumber": qNumber},
                    function(data){
                        row = data.split(" | ");
                        for (i=0; i < row.length; i++){
                            if (i > 8) {
                                if (row[i] == 1) {
                                    row[i] = true
                                }
                                else {
                                    row[i] = false
                                }
                            }
                        }
                        console.log(row);
                        $("#PartNumber").attr("value",row[1]);
                        $("#DrawingNumber").attr("value",row[2]);
                        $("#Originator").attr("value",row[3]);
                        $("#Customer").attr("value",row[4]);
                        $("#SerialNumber").attr("value",row[5]);
                        $("#SalesNumber").attr("value",row[6]);
                        $("#Description").attr("value",row[7]);
                        $("#RU").attr("checked",row[9]);
                        $("#CU").attr("checked",row[10]);
                        $("#8D").attr("checked",row[11]);
                        $("#CN").attr("checked",row[12]);
                        $("#ECNDR").attr("checked",row[13]);
                        $("#ISIR").attr("checked",row[14]);
                        $("#PSW").attr("checked",row[15]);
                        $("#ELV").attr("checked",row[16]);
                        $("#RFQ").attr("checked",row[17]);
                        $("#NPI").attr("checked",row[18]);
                        $("#CofC").attr("checked",row[19]);
                        $("#TestCert").attr("checked",row[20]);
                        $("#Concession").attr("checked",row[21]);
                        $("#DesignReview").attr("checked",row[22]);
                        $("#StockFreeze").attr("checked",row[23]);
                        $("#RejectNote").attr("checked",row[24]);
                        $("#StopNote").attr("checked",row[25]);
                        $("#QualityAlert").attr("checked",row[26]);
                        $("#DebitNote").attr("checked",row[27]);
                        $("#ASME").attr("checked",row[28]);
                        $("#Other").attr("checked",row[29]);
                    }
                )
            }
            
        }
    )
})

$("#DateClosed").val(new Date().toISOString().substring(0, 10))

$("#submit").click(function(){
    data = {
        "QNumber": qNumber,
        "PartNumber": $("#PartNumber").val(),
        "DrawingNumber": $("#DrawingNumber").val(),
        "Originator": $("#Originator").val(),
        "Customer": $("#Customer").val(),
        "SalesNumber": $("#SalesNumber").val(),
        "SerialNumber": $("#SerialNumber").val(),
        "Description": $("#Description").val(),
        "RU": $("#RU").is(':checked'),
        "CU": $("#CU").is(':checked'),
        "D8": $("#8D").is(':checked'),    //Var cannot be called 8D, so is D8
        "CN": $("#CN").is(':checked'),
        "ECNDR": $("#ECNDR").is(':checked'),
        "ISIR": $("#ISIR").is(':checked'),
        "PSW": $("#PSW").is(':checked'),
        "ELV": $("#ELV").is(':checked'),
        "RFQ": $("#RFQ").is(':checked'),
        "NPI": $("#NPI").is(':checked'),
        "CofC": $("#CofC").is(':checked'),
        "TestCert": $("#TestCert").is(':checked'),
        "Concession": $("#Concession").is(':checked'),
        "DesignReview": $("#DesignReview").is(':checked'),
        "StockFreeze": $("#StockFreeze").is(':checked'),
        "RejectNote": $("#RejectNote").is(':checked'),
        "StopNote": $("#StopNote").is(':checked'),
        "QualityAlert": $("#QualityAlert").is(':checked'),
        "DebitNote": $("#DebitNote").is(':checked'),
        "ASME": $("#ASME").is(':checked'),
        "Other": $("#Other").is(':checked'),
    }
    
    if (data["PartNumber"] == "" ||
        data["DrawingNumber"] == "" ||
        data["Originator"] == "" ||
        data["Customer"] == ""
    ){
        alert("You have left a compulsory text field empty!")
    }
    else {
        for (const record in data) {    //Changes booleans to bits for SQL
            if (data[record] == true) {
                data[record] = 1
            }
            if (data[record] == false) {
                data[record] = 0
            }
        }

        $.post(
            "editQNumber.php",
            data,
            function(message){
                //alert(message)
            }
        )
    }
})
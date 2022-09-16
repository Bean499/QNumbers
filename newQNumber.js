$("#newQNumber").click( function() {
    console.log("I know that the button has been pressed.");

    //now = new Date()

    //month = now.getMonth().toString();
    //if (month.length == 1) {
    //    month = "0" + month
    //}

    //day = now.getDay().toString();
    //if (day.length == 1) {
    //    day = "0" + day
    //}

    //date = now.getFullYear().toString() + "-" + month + "-" + day;
    
    date = new Date().toISOString().slice(0, 10);
    currentYear = date.substring(2,4);
    console.log(date)
    //I'm so sorry, this block of an object literal is disgusting to look at
    data = {
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
        "PR": $("#PR").is(':checked'),
        "Other": $("#Other").is(':checked'),

        "Date": date,
        "CurrentYear": currentYear
    }

    console.log(data);

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

        console.log(data);

        $.post(
            "newQNumber.php",
            data,
            function(message){
                alert(message)
            });
    }
})

$("#selected").hide("fade",{},1);

$("#findQNumber").click(function() {
    qNumber = $("#qNumber").val();
    $.post(
        "entryCheck.php",
        {"qNumber": qNumber},
        function(data){
            if(data == 1) {
                $("#qNumber").prop("disabled",true);
                $("#findQNumber").prop("disabled",true);
                $("#selected").show("slide",{},500);
				$("#submit").show("slide",{},500);
                qNumber = qNumber.charAt(0).toUpperCase() + qNumber.slice(1);
                $("#confirmmsg").html(qNumber);
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
                        $("#q").html("Q Number: " + row[0]);
                        $("#PartNumber").html("Part Number: " + row[1]);
                        $("#DrawingNumber").html("Drawing Number: " + row[2]);
                        $("#Originator").html("Originator: " + row[3]);
                        $("#Customer").html("Customer: " + row[4]);
                        $("#SerialNumber").html("Serial Number" + row[5]);
                        $("#SalesNumber").html("Sales Number: " + row[6]);
                        $("#Description").html("Description: " + row[7]);

						values = [
							"RU",
							"CU",
							"8D",
							"CN",
							"ECNDR",
							"ISIR",
							"PSW",
							"ELV",
							"RFQ",
							"NPI",
							"CofC",
							"TestCert",
							"Concession",
							"Design Review",
							"Stock Freeze",
							"Reject Note",
							"Stop Note",
							"Quality Alert",
							"Debit Note",
							"ASME",
							"Other"
						]
						for (i = 9; i <= 29; i++) {
							if (row[i] == true) {
								if ($("#types").innerHTML != "") {
									$("#types").append("," + values[i - 9])
								}
								else {
									$("#types").append(values[i - 9])
								}
							}
						}
                    }
                )
            }
            
        }
    )
})

$("#deletebutton").click(function() {
	qNumber = $("#confirmmsg").innerHTML
	$.post(
		"deleteQNumber.php",
		{"qNumber": qNumber},
		function(message) {
			alert(message)
		}
	)
})

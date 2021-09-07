$("#form").hide("fade",{},1);

$("#findCN").click(function() {
    qNumber = $("#qNumber").val();
    $.post(
        "findCN.php",
        {"qNumber": qNumber},
        function(data){
            if(data == 1) {
                $("#qNumber").prop("disabled",true);
                $("#findCN").prop("disabled",true);
                $("#form").show("slide",{},500);
                qNumber = qNumber.charAt(0).toUpperCase() + qNumber.slice(1);
                $("#selected").html("Selected Q Number: " + qNumber);
                $.post(
                    "CNEntryCheck.php",
                    {"qNumber": qNumber},
                    function(data){
                        if(data == 1){
                            $.post(
                                "CNDataDump.php",
                                {"qNumber": qNumber},
                                function(data){
                                    row = data.split(" | ");
                                    $("#DateClosed").val(row[9]);
                                    $("#ClosedBy").attr("value",row[11]);
                                }
                            )
                        }
                    }
                )
            }
        }
    )
})

$("#DateClosed").val(new Date().toISOString().substring(0, 10))

$("#submit").click(function(){
    data = {
        "qNumber": qNumber,
        "DateClosed": $("#DateClosed").val(),
        "ClosedBy": $("#ClosedBy").val()
    }
    
    $.post(
        "addCN.php",
        data,
        function(message){
            alert(message)
        }
    )
})
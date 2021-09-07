$("#partSearch").click(function(){
    partNumber = $("#partNumber").val();
    $.post(
        "partSearch.php",
        {"partNumber": partNumber},
        data => {
            if(data == "") {
                $("#results").append("No results found for part number " + partNumber);
            }
            else {
                results = data.split(" | ");
                $("#results").empty();
                $("#results").append("<br>Q Numbers with part number " + partNumber + ":<ul>")
                for(i=0; i < results.length-1; i++){
                    $("#results").append("<li>" + results[i] + "</li>");
                };
                $("#results").append("</ul>");
            }
        }
    )
})

$("#drawingSearch").click(function(){
    drawingNumber = $("#drawingNumber").val();
    $.post(
        "drawingSearch.php",
        {"drawingNumber": drawingNumber},
        data => {
            if(data == "") {
                $("#results").append("No results found for drawing number " + drawingNumber);
            }
            else {
                results = data.split(" | ");
                $("#results").empty();
                $("#results").append("<br>Q Numbers with drawing number " + drawingNumber + ":<ul>")
                for(i=0; i < results.length-1; i++){
                    $("#results").append("<li>" + results[i] + "</li>");
                };
                $("#results").append("</ul>");
            }
        }
    )
})

$("#dateSearch").click(function(){
    strDate1 = $("#rangeStart").val();
    strDate2 = $("#rangeEnd").val();

    date1 = new Date(strDate1);
    date2 = new Date(strDate2);

    console.log(strDate1);
    console.log(date1);
    console.log(strDate2);
    console.log(date2);

    if (date1 < date2) {
        rangeStart = strDate1;
        rangeEnd = strDate2;
    }
    else {
        rangeEnd = strDate1;
        rangeStart = strDate2;
    }

    $.post(
        "dateSearch.php",
        {
            "rangeStart": rangeStart,
            "rangeEnd": rangeEnd
        },
        data => {
            if(data == "") {
                $("#results").empty();
                $("#results").append("No results found created between " + rangeStart + " and " + rangeEnd);
            }
            else {
                results = data.split(" | ");
                $("#results").empty();
                $("#results").append("<br>Q Numbers with created between " + rangeStart + " and " + rangeEnd + ":<ul>")
                for(i=0; i < results.length-1; i++){
                    $("#results").append("<li>" + results[i] + "</li>");
                };
                $("#results").append("</ul>");
            }
        }
    )
})
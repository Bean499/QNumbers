function listSplit(data, type) {
    list = data.split(" % ");
    list.splice(list.length-1,1);
    for(i=0; i < list.length; i++){
        list[i] = list[i].split(" | ")
        list[i].splice(list[i].length-1,1);
        if(type == "main") {
            for(ii=0; ii < list[i].length; ii++) {
                if (ii < 30 && ii > 7) {
                    if (list[i][ii] == 1) {
                        list[i][ii] = "✓"
                    }
                    if (list[i][ii] == 0) {
                        list[i][ii] = ""
                    }
                }
            }
        }
        else if(type == "rfq") {
            for(ii=0; ii < list[i].length; ii++) {
                if (ii == 11 || ii == 13 || ii == 15) {
                    if (list[i][ii] == 1) {
                        list[i][ii] = "✓"
                    }
                    if (list[i][ii] == 0) {
                        list[i][ii] = ""
                    }
                }
            }
        }
    }
    return list
}

function tableString(list,string) {
    gray = true;
    table = string;
    for (i=0; i < list.length; i++) {
        gray = !gray;
        if (gray) {
            table = table+"<tr class='gray'>";
        }
        else {
            table = table+"<tr>";
        }
        for (ii=0; ii < list[i].length; ii++) {
            table = table+"<td> "+list[i][ii]+" </td>";
        }
        table = table+"</tr>";
    }
    table = table+"</table>";
    return table
}
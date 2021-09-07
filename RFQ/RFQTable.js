$.post(
    "getRFQTable.php",
    {"a": "a"},
    data => {
        $("#table").append("<h1>RFQ Table</h1>")
        list = listSplit(data, "rfq");
        table = "<br><table> <tr class='gray'> <th> Q Number </th> <th> Part Number </th> <th> Drawing Number </th> <th> Originator </th> <th> Customer </th> <th> Serial Number </th> <th> Sales Number </th> <th> Description </th> <th> Date Added </th> <th> Closing Date </th> <th> Supplier 1 </th> <th> Quoted? </th> <th> Supplier 2 </th> <th> Quoted? </th> <th> Supplier 3 </th> <th> Quoted? </th> </tr>";
        table = tableString(list, table);
        $("#table").append(table);
    }
)
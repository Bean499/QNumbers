$.post(
    "get8DTable.php",
    {"a": "a"},
    data => {
        $("#table").append("<h1>8D Table</h1>")
        list = listSplit(data, "8d");
        table = "<br><table> <tr class='gray'> <th> Q Number </th> <th> Part Number </th> <th> Drawing Number </th> <th> Originator </th> <th> Customer </th> <th> Serial Number </th> <th> Sales Number </th> <th> Description </th> <th> Date Added </th> <th> Date Closed </th> <th> Network Days </th> <th> Quantity Rejected </th> <th> PRS Send Date </th> <th> PRS Received </th> <th> Reject Note </th> <th> Defect Code </th> <th> Quality Concern </th> <th> Status </th> <th> Debit Note </th> <th> Scrap Date </th> <th> Notes </th> </tr>";
        table = tableString(list, table);
        $("#table").append(table);
    }
)
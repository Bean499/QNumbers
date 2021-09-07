$.post(
    "getRUTable.php",
    {"a": "a"},
    data => {
        $("#table").append("<h1>RU Table</h1>")
        list = listSplit(data, "ru");
        table = "<br><table> <tr class='gray'> <th> Q Number </th> <th> Part Number </th> <th> Drawing Number </th> <th> Originator </th> <th> Customer </th> <th> Serial Number </th> <th> Sales Number </th> <th> Description </th> <th> Date Added </th> <th> Type </th> <th> Return Number </th> <th> Defect Code </th> <th> Status </th> <th> Total Quantity </th> <th> Quantity Accepted </th> <th> Quantity Rejected </th> <th> Reject Note </th> <th> Debit Note </th> <th> Claim Value </th> <th> Scrap Date </th> <th> Notes </th> </tr>";
        table = tableString(list, table);
        $("#table").append(table);
    }
)
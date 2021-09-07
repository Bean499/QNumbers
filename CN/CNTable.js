$.post(
    "getCNTable.php",
    {"a": "a"},
    data => {
        $("#table").append("<h1>CN Table</h1>")
        list = listSplit(data, "cn");
        table = "<br><table> <tr class='gray'> <th> Q Number </th> <th> Part Number </th> <th> Drawing Number </th> <th> Originator </th> <th> Customer </th> <th> Serial Number </th> <th> Sales Number </th> <th> Description </th> <th> Date Added </th> <th> Date Closed </th> <th> Live Days </th> <th> Closed By </th> </tr>";
        table = tableString(list, table);
        $("#table").append(table);
    }
)
$.post(
    "getMainTable.php",
    {"a": "a"},
    data => {
        $("#table").append("<h1>Main Table</h1>");
        list = listSplit(data, "main");
        table = "<br><table> <tr class='gray'> <th> Q Number </th> <th> Part Number </th> <th> Drawing Number </th> <th> Originator </th> <th> Customer </th> <th> Serial Number </th> <th> Sales Number </th> <th> Description </th> <th> Date Added </th> <th> RU </th> <th> CU </th> <th> 8D </th> <th> CN </th> <th> ECNDR </th> <th> ISIR </th> <th> PSW </th> <th> ELV </th> <th> RFQ </th> <th> NPI </th> <th> CofC </th> <th> TestCert </th> <th> Concession </th> <th> Design Review </th> <th> Stock Freeze </th> <th> Reject Note </th> <th> Stop Note </th> <th> Quality Alert </th> <th> Debit Note </th> <th> ASME </th> <th> Other </th> </tr>";
        table = tableString(list, table);
        $("#table").append(table);
    }
)
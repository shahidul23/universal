<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
/* table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
} */

td, th {
  /* border: 1px solid #dddddd; */
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  /* background-color: rgba(150, 212, 212, 0.4); */
  background-color: #dddddd;
}

/* th:nth-child(even),td:nth-child(even) {
  background-color: rgba(150, 212, 212, 0.4);
} */
</style>
</head>
<body>

<h2>All Corporate</h2>

<table>
  <tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Contact Person</th>
    <th>Contact Person Phone</th>
    <th>Industry Type</th>    
    <th>Agreement Validity Date</th>    
    <th>Status</th>    
  </tr>
  @foreach ($corporates as $corporate)
    <tr>
        <td>{{ $corporate->name }} </td>
        <td>{{ $corporate->phone }}</td>
        <td>{{ $corporate->contact_person_name }}</td>
        <td>{{ $corporate->contact_person_phone }}</td>
        <td>{{ $corporate->industry_type }}</td>                                     
        <td>{{ $corporate->agreement_validity_date }}</td>                                     
        <td>{{ $corporate->status }}</td>                                     
    </tr>
  @endforeach

</table>

</body>
</html>


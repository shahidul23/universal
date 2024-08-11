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

<h2>All patient</h2>

<table>
  <tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Address</th>
    <th>Department</th>    
    <th>Consultant</th>    
  </tr>
  @foreach ($patients as $patient)
    <tr>
        <td>{{ $patient->name }} </td>
        <td>{{ $patient->phone }}</td>
        <td>{{ $patient->email }}</td>
        <td>{{ $patient->address }}</td>
        <td>{{ $patient->department }}</td>                                     
        <td>{{ $patient->consultant_name }} %</td>                                     
    </tr>
  @endforeach

</table>

</body>
</html>


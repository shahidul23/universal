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

<h2>All query</h2>

<table>
  <tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Query Type</th>
    <th>Status</th>    
    <th>Created By</th>    
  </tr>
  @foreach ($queries as $query)
    <tr>
        <td>{{ $query->name }} </td>
        <td>{{ $query->phone }}</td>
        <td>{{ $query->address }}</td>
        <td>{{ $query->query_type }}</td>
        <td>{{ $query->status }}</td>                                     
        <td>{{ $query->created_by }}</td>                                     
    </tr>
  @endforeach

</table>

</body>
</html>


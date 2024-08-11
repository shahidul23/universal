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

<h2>All Booking</h2>

<table>
  <tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Service Type</th>
    <th>Service Title</th>
    <th>Availed</th>    
    <th>Discount</th>    
  </tr>
  @foreach ($bookings as $booking)
    <tr>
        <td>{{ $booking->name }} </td>
        <td>{{ $booking->phone }}</td>
        <td>{{ $booking->service_type }}</td>
        <td>{{ $booking->service_title }}</td>
        <td>{{ $booking->availed }}</td>                                     
        <td>{{ $booking->discount }} %</td>                                     
    </tr>
  @endforeach

</table>

</body>
</html>


<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:#b6d4ca;
  color: black;
}
</style>
</head>
<body>

@if($typesearch != '')
<table id="customers">
  <tr style="text-align: left;">  
  <th>No</th>
  <th>Organization</th>
  <th>Remarks</th>
  <th>Year</th>
  </tr>
  <tbody>
  <?php $id=1; ?>
  @foreach($typesearch as $searchs)
    <tr>
    <td>{{$id++}}</td> 
    <td><?php echo $na = App\tbl_agency::where('id', $searchs->host)->value('agency'); ?></td>
    <td>{{ $searchs->remarks }}</td>
    <td>{{ $searchs->created_at }}</td>
    </tr>         
  @endforeach  
  </tbody>
</table>

@endif



</table>
</body>
</html>




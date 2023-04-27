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
  <th><h3>ཨང༌།</h3></th>
  <th><h3>ཆོས་ཚོགས་ཀྱི་མཚན།</h3></th>
  <th><h3>མཛད་རིམ་མིང༌།</h3></th>
  <th><h3>ས་གནས།</h3></th>
  <th><h3>འགོ་བཙུགསཔ་ཚེས།</h3></th>
  <th><h3>རྫོགས་ཚེས།</h3></th>
  <th><h3>རྩིས་ལོ།</h3></th>
  </tr>
  <tbody>
  <?php $id=1; ?>
  @foreach($typesearch as $searchs)
    <tr>
    <td>{{$id++}}</td> 
    <td><?php echo $na = App\tbl_agency::where('id', $searchs->host)->value('agency'); ?></td>
    <td>{{ $searchs->event_name }}</td> 
    <td>{{ $searchs->venue }}</td>
    <td>{{ $searchs->startdate }}</td>
    <td>{{ $searchs->enddate }}</td>
    <td>{{ $searchs->created_at }}</td>
    </tr>         
  @endforeach  
  </tbody>
</table>

@endif



</table>
</body>
</html>




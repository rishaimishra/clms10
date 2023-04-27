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
  <th>Subsidiary/Branch</th>
  <th>Type</th>
  <th>Dzongkhag</th>
  <th>Gewog</th>
  <th>Village</th>
  <th>Year</th>
  </tr>
  <tbody>
  <?php $id=1; ?>
  @foreach($typesearch as $searchs)
    <tr>
    <td>{{$id++}}</td> 
    <td><?php echo $na = App\tbl_agency::where('id', $searchs->host)->value('agency'); ?></td>
    <td>{{ $searchs->chapter_name }}</td> 
    <td><?php if($searchs->branchtype == '1')
                  {echo 'Drubdey';}
                  elseif($searchs->branchtype == '2')
                  {echo 'Shedra';}
                  elseif($searchs->branchtype == '3')
                  {echo 'Lobdra';}
                  elseif($searchs->branchtype == '4')
                  {echo 'Gomdey';}
                  elseif($searchs->branchtype == '5')
                  {echo 'Gyendra';}
                  elseif($searchs->branchtype == '6')
                  {echo 'Others';}?></td>
    <td><?php echo $c = App\dzongkhag::where('dzongkhag_id', $searchs->dzongkhag)->value('dzongkhag_name'); ?></td>
    <td><?php echo $c = App\gewog::where('gewog_id', $searchs->gewog)->value('gewog_name'); ?></td>
    <td><?php echo $c = App\village::where('village_id', $searchs->village)->value('village_name'); ?></td>
    <td>{{ $searchs->created_at }}</td>
    </tr>         
  @endforeach  
  </tbody>
</table>

@endif



</table>
</body>
</html>




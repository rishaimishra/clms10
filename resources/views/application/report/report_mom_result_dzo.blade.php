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
  <th><h3>ས་གནས།</h3></th>
  <th><h3>སྤྱི་ཚེས</h3></th>
  <th><h3>དབྱེ་བ།</h3></th>
  <th><h3>རྩིས་ལོ།</h3></th>
  </tr>
  <tbody>
  <?php $id=1; ?>
  @foreach($typesearch as $searchs)
    <tr>
    <td>{{$id++}}</td> 
    <td><?php echo $na = App\tbl_agency::where('id', $searchs->host)->value('agency'); ?></td>
    <td>{{ $searchs->venue }}</td> 
    <td>{{ $searchs->date }}</td>
    <td><?php 
                      if($searchs->type == '1' )
                      {
                        echo 'ལོ་བསྟར་སྤྱིར་བཏང༌ཞལ་འཛོམས།';
                      }
                      elseif($searchs->type == '2' )
                      {
                        echo 'བཀོད་ཚོགས་ཞལ་འཛོམས།';
                      }
                      elseif($searchs->type == '3' )
                      {
                        echo 'ཚོགས་ཆུང༌ཞལ་འཛོམས།';
                      }
                      ?></td>
    <td>{{ $searchs->year }}</td>
    </tr>         
  @endforeach  
  </tbody>
</table>

@endif



</table>
</body>
</html>




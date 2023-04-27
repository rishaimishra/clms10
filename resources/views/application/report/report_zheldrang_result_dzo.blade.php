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
  <th><h3>ལག་ཁྱེར་ཨང་།</h3></th>
  <th><h3>མིང་།</h3></th>
  <th><h3>རྫོང་ཁག།</h3></th>
  <th><h3>རྒེད་འོག།</h3></th>
  <th><h3>གཡུས།</h3></th>
  <th><h3>གོ་གནས།</h3></th>
  <th><h3>ཆོས་ལུགས།</h3></th>
  <th><h3>རྩིས་ལོ།</h3></th> 
  </tr>
  <tbody>
  <?php $id=1; ?>
  @foreach($typesearch as $searchs)
    <tr>
    <td>{{$id++}}</td> 
    <td><?php echo $na = App\tbl_agency::where('id', $searchs->host)->value('agency'); ?></td>
    <td>{{ $searchs->cid }}</td>
    <td>{{ $searchs->name }}</td>
    <td><?php echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', $searchs->dzongkhag)->value('dzongkhag_name');?></td>
    <td><?php echo $dzo = App\gewog_dzo::where('gewog_id', $searchs->gewog)->value('gewog_name');?></td>
    <td><?php echo $dzo = App\village_dzo::where('village_id', $searchs->village)->value('village_name');?></td>
    <td><?php echo $dzo = App\tbl_designation::where('id', $searchs->designation)->value('designation_dzo');?></td>
    <td>{{ $searchs->religion }}</td> 
    <td>{{ $searchs->created_at }}</td>
    </tr>         
  @endforeach  
  </tbody>
</table>

@elseif($typesearch1 != '')
<table id="customers">
  <tr style="text-align: left;">  
  <th><h3>ཨང༌།</h3></th>
  <th><h3>ཆོས་ཚོགས་ཀྱི་མཚན།</h3></th>
  <th><h3>ལག་ཁྱེར་ཨང་།</h3></th>
  <th><h3>མིང་།</h3></th>
  <th><h3>རྫོང་ཁག།</h3></th>
  <th><h3>རྒེད་འོག།</h3></th>
  <th><h3>གཡུས།</h3></th>
  <th><h3>གོ་གནས།</h3></th>
  <th><h3>ཆོས་ལུགས།</h3></th>
  <th><h3>རྩིས་ལོ།</h3></th>
  </tr>
  <tbody>
  <?php $id=1; ?>
  @foreach($typesearch1 as $searchs)
    <tr>
    <td>{{$id++}}</td> 
    <td><?php echo $na = App\tbl_agency::where('id', $searchs->host)->value('agency'); ?></td>
    <td>{{ $searchs->cid }}</td>
    <td>{{ $searchs->name }}</td>
     <td><?php echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', $searchs->dzongkhag)->value('dzongkhag_name');?></td>
    <td><?php echo $dzo = App\gewog_dzo::where('gewog_id', $searchs->gewog)->value('gewog_name');?></td>
    <td><?php echo $dzo = App\village_dzo::where('village_id', $searchs->village)->value('village_name');?></td>
    <td><?php echo $dzo = App\tbl_designation::where('id', $searchs->designation)->value('designation_dzo');?></td>
    <td>{{ $searchs->religion }}</td> 
    <td>{{ $searchs->created_at }}</td>
    </tr>         
  @endforeach  
  </tbody>
</table>

@elseif($typesearch2 != '')
<table id="customers">
  <tr style="text-align: left;">  
  <th><h3>ཨང༌།</h3></th>
  <th><h3>ཆོས་ཚོགས་ཀྱི་མཚན།</h3></th>
  <th><h3>ལག་ཁྱེར་ཨང་།</h3></th>
  <th><h3>མིང་།</h3></th>
  <th><h3>རྫོང་ཁག།</h3></th>
  <th><h3>རྒེད་འོག།</h3></th>
  <th><h3>གཡུས།</h3></th>
  <th><h3>གོ་གནས།</h3></th>
  <th><h3>ཆོས་ལུགས།</h3></th>
  <th><h3>རྩིས་ལོ།</h3></th>
  </tr>
  <tbody>
  <?php $id=1; ?>
  @foreach($typesearch2 as $searchs)
    <tr>
    <td>{{$id++}}</td> 
    <td><?php echo $na = App\tbl_agency::where('id', $searchs->host)->value('agency'); ?></td>
    <td>{{ $searchs->cid }}</td>
    <td>{{ $searchs->name }}</td>
    <td><?php echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', $searchs->dzongkhag)->value('dzongkhag_name');?></td>
    <td><?php echo $dzo = App\gewog_dzo::where('gewog_id', $searchs->gewog)->value('gewog_name');?></td>
    <td><?php echo $dzo = App\village_dzo::where('village_id', $searchs->village)->value('village_name');?></td>
    <td><?php echo $dzo = App\tbl_designation::where('id', $searchs->designation)->value('designation_dzo');?></td>
    <td>{{ $searchs->religion }}</td> 
    <td>{{ $searchs->created_at }}</td>
    </tr>         
  @endforeach  
  </tbody>
</table>

@endif



</table>
</body>
</html>




<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 15px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>


<table id="customers">
  <tr>
   <td><h2>
 {{--  <?php $image_path = '/uploads/easyschool.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100"> --}}</br>
      Hostel Managemnt System
    </h2></td>
     <td><h2> Hostel Managemnt System</h2>
     <p> Address : Thakurgaon , Govindanagor</p>
     <p>Phone : 343434343434</p>
     <p>Email : hosteladmin@gmail.com</p>
  <h4>Border Registration Page</h4>
    </td> 
  </tr>
  
   
</table>



<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Border Information</th>
    <th width="45%">Border Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Registration No.</b></td>
    <td>{{ $laundrys->reg_no }}</td>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Room No.</b></td>
    <td>{{ $laundrys['room']['room_no'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Room Seater</b></td>
    <td>{{ $laundrys['room']['seater'] }}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>Fees Per month</b></td>
    <td>{{  $laundrys['room']['fees']  }}</td>
  </tr>



  



</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>
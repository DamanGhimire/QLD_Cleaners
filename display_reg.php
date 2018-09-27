<?php
  include("functions/db.php");
  $sql ="SELECT * FROM shiny_works";
  $result = mysql_query($sql);
  $row=mysql_num_rows($result);
  if(!$row)
  {
    echo "<div id='no_records'>
            <div class='row'>
              <div class='col-md-6 col-md-offset-3'><button type='button' class='btn btn-default btn-lg btn-block'>
              <span class='glyphicon glyphicon-info-sign' aria-hidden='true'> </span>Sorry, no records...</button></div>
            </div>
          </div>";
  }
  else
  {
  	include_once("adminheader.php");
  ?>
    <table width="100%" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>Sl.No.</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Service Date</th>
        <th>Property Type</th>       
        <th>No. of Bedrooms</th>
        <th>No. of Bathrooms</th>
        <th>Best Contact</th>
        <th>Message</th>
      </tr>
      </thead>
      <tbody>
      
      <?php
      $count=1;
      while($row=mysql_fetch_array($result))
    {
      $property_type=$row['property_type'];
      $no_bedroom=$row['no_bedroom']; 
      $no_bathroom=$row['no_bathroom'];
      $email=$row['email'];
      $service_date=$row['service_date'];
      $name=$row['name'];
      $phone=$row['phone'];
      $best_contact=$row['best_contact'];
      $address=$row['address'];
      $message=$row['message'];
      $status=$row['status'];

      echo "
        <tr>
        <td>$count</td>
          <td>$name</td>
          <td>$phone</td>
          <td>$email</td>          
          <td>$address</td> 
          <td>$service_date</td>
          <td>$property_type</td>          
          <td>$no_bedroom</td> 
          <td>$no_bathroom</td> 
          <td>$best_contact</td> 
          <td>$message</td>

        </tr>";
        $count++;
      }
  }
      
        ?>
        </tbody>
        
      </table>
<?php
include_once("footer.php");
?>
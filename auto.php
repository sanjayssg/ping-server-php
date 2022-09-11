<?php
require "db.php";
require 'phpmailer/PHPMailerAutoload.php';

/*-------Function for testing the PING command start here----- */
function ping($host)
{
	//exec(sprintf('ping -n 2 -w 5 %s',escapeshellarg($host)),$res,$rval);//for windows
	exec(sprintf('ping -c 5  %s',escapeshellarg($host)),$res,$rval);//for mac
	return $rval === 0;
}
/*--------Function for testing the PING command end here------*/

/*getting list of IP-Address from Database */

	$query="select server_name,location,ip_address from ip_list";
	$result=mysqli_query($connect,$query);
	$ping_id=rand();
		while($row=mysqli_fetch_array($result))
		{
			$website= $row['ip_address'];
			$servername= $row['server_name'];
			$location=$row['location'];
			$date= date('d-M-Y h:i A');
			

				if(!ping($website))
					{
						$ins="INSERT INTO result(server_name,location,server_ip,result,ping_id,ping_date) VALUES ('$servername','$location','$website','Down','$ping_id','$date')";
						$run=mysqli_query($connect,$ins);
					}
				else{
						$ins="INSERT INTO result(server_name,location,server_ip,result,ping_id,ping_date) VALUES ('$servername','$location','$website','Up','$ping_id','$date')";
						$run=mysqli_query($connect,$ins);
					}
		}

/*----- Mailing Function start here ------*/

$mail= new PHPMailer;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';
$mail->Username='your mail id here';$mail->Password='your password here';
$rand_ping_id=$ping_id;
$mail->setFrom('from your mail id','Team');
$mail->addAddress("to mail id","Person name");
$get_asset_id="select * from result where ping_id='$rand_ping_id'";
$run_asset_id=mysqli_query($connect,$get_asset_id);

$msg="
<h4 style='font-family:tahoma;color:black'>Hi Team, Daily Checklist as on $date </h4><br>
<table cellpadding='10px'  cellspacing='0px' style='font-family:tahoma;border-collapse:collapse;border-left:1px solid #ccc;border-right:1px solid #ccc;border-top:1px solid #ccc'>";
$msg .="
<tr  '>
<th colspan='4' style='background-color:#f0f0f0;border-bottom:3px solid #ccc;text-align:left;font-size:30px;padding:10px 150px 10px 10px;color:black'>IS  |  Daily Checklist</th></tr>
<tr style='border-bottom:1px solid #ccc; background-color:#f5f5f5; color:black;text-align:left'>
			<th>Servername</th>
            <th>Location</th>
            <th>IP Address</th>
			<th>Result</th>
		</tr>";
			while($row_asset_id=mysqli_fetch_array($run_asset_id))
			{
				$serverip =$row_asset_id['server_ip'];
				$servername=$row_asset_id['server_name'];
				$location=$row_asset_id['location'];
				$result =$row_asset_id['result'];
$msg .="<tr>
			<td style='color:black'> {$servername} </td>
			<td style='color:black'> {$location} </td>
			<td style='color:black'> {$serverip} </td>";
			if($result == "Up")
				{
					$msg .="<td style='background-color:#98fb98;color:black;text-align:center'>{$result}</td></tr>";
				}
			else 
				{
					$msg .="<td style='background-color:red;color:white;text-align:center'>{$result}</td></tr>";
				}
			}
$msg .="<tr><td colspan='4' style='border-bottom:1px solid #ddd;background-color:#f0f0f0;padding:3px;'></td></tr>
</table><br><br>
<h4 style='font-family:tahoma;color:black'>Regards & Thanks,<br>TEAM</h4>";


//$email->addReplyTo('');

$mail->isHTML(true);
$mail->Subject='Daily Checklist';
$mail->Body=$msg;	
if(!$mail->send()){
    echo "  ('Message could not sent') ";

}
else{
    echo "  ('Message sent') ";

}




?>
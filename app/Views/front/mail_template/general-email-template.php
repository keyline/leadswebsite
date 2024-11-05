<?php 
$db = \Config\Database::connect();
$site_setting = $db->query("SELECT * FROM `sms_site_settings`")->getRow();
//print_r($site_setting);die;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Email Templete</title>
	<style type="text/css">
		body {
			font-family: Arial;
		}
		.left-side {
			/*background-image: linear-gradient(45deg,#53b2fe,#065af3);*/
		    padding: 17px;
		    color: #000;
		    font-size: 12px;
		    text-align: center;
		    /*border: 1px solid #065af3;*/
		}
		.logo {
			text-align: center;
		}
		table td {
		    /*border: 1px solid #19181824;*/
		}
		table {
		    /*border: 2px solid #186ef5;*/
		    border-collapse: collapse;
		    border-spacing: 0;
		}
	</style>
</head>
<body>
	<table border="1" align="center" cellpadding="5" cellspacing="3" style="width: 900px;">		
		<tr>
			<td colspan="2" class="logo">
				<img src="<?php echo base_url('material/'); ?>/front/img/mail-logo.jpg" style="width: 241px; text-align: center;">
			</td>			
		</tr>
		<!-- <tr class="left-side">
			<td colspan="2">
				<?php echo $email_header; ?>
			</td>
		</tr> -->
		<tr class="left-side">
			<td colspan="2">
				<?php echo $particulars; ?>
			</td>
		</tr>
		<tr>
			<td style="text-align: left; font-size: 9px;">
				Best Regards,<br>
				J2N Service<br>
				West Bengal, India 

			</td>
			<td style="text-align: right; font-size: 9px;">
				Reach us,<br>
				j2nindia@gmail.com<br>
				www.j2nservice.com
			</td>
		</tr>		
	</table>
</body>
</html>
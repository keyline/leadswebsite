<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Us Templete</title>
	<style type="text/css">
		body {
			font-family: Arial;
		}
		.left-side {
			background-image: linear-gradient(45deg,#53b2fe,#065af3);
		    padding: 17px;
		    color: #000;
		    font-size: 12px;
		}
		.logo {
			text-align: center;
		}
		table td {
		    border: 1px solid #19181824;
		}
		table {
		    border: 2px solid #186ef5;
		    border-collapse: collapse;
		    border-spacing: 0;
		}
	</style>
</head>
<body>
	<table border="1" align="center" cellpadding="5" cellspacing="3" style="width: 900px;">		
		<tr>
			<td colspan="2" class="logo">
				<!-- <img src="<?php echo base_url('uploads/'.$site_setting->site_logo); ?>" style="width: 241px; text-align: center;"> -->
				<h1><?=$site_setting->site_name?></h1>
			</td>			
		</tr>
		<tr>
			<td class="left-side">Name</td>
			<td><?php echo $name; ?></td>
		</tr>
		<tr>
			<td class="left-side">Email</td>
			<td><?php echo $email; ?></td>
		</tr>
		<tr>
			<td class="left-side">Phone</td>
			<td><?php echo $phone; ?></td>
		</tr>
		<tr>
			<td class="left-side">Comment</td>
			<td>
				<?php echo $comment; ?>
			</td>
		</tr>
		<tr>
			<td style="text-align: left; font-size: 9px;">
				Best Regards,<br>
				<?=$site_setting->site_name?><br>
				<?=$site_setting->site_email?>
			</td>
			<td style="text-align: right; font-size: 9px;">
				Reach us,<br>
				<?=$site_setting->site_phone?><br>
				<?=$site_setting->site_url?>
			</td>
		</tr>		
	</table>
</body>
</html>
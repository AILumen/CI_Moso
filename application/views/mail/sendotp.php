<html lang="en">
<head>
  <title>More Social</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/images/logo.png">
  
  <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto; min-width:320px; max-width:600px; border:2px solid #4373ba;" width="100%">
  <tr style="background-color:rgba(245, 245, 245, 0.61);; padding:5px;">
      <td align="center" style="padding: 20px;"><a href="javascript:void(0)"><img style="width: 150px;" src="<?php echo base_url(); ?>public/images/logo.png" alt="More Social" ></a></td>
  </tr>
  
  <tr><td>&nbsp; </td> </tr>
  <tr><td>&nbsp; </td> </tr>
  <tr><td>&nbsp; </td> </tr>
  
  <tr>
  <td style="   color: #383636;
    font-family: arial;
    font-size: 20px;
    padding: 0 35px;">Hi <?=(isset($username) &&  !empty($username)) ? $username : 'User'?>, </td>
  </tr>
  
    <tr>
  <td style="color: #404652;
    font-family: arial;
    font-size: 16px;
    line-height: 26px;
    padding: 35px"> 
      Your One Time Password is <?=$otp?>. This OTP is valid for <?=$expireTime?> seconds. Do not share this OTP to anyone for security reasons.
    </td>
  </tr>
  
  
    <tr>
  <td style="color: #363636;
    font-family: arial;
    font-size: 16px;
    line-height: 26px;
    padding: 35px"><strong>Warm Regards,<br> 
    Team More Social</strong>
  </td>
  </tr>  
  
  
  </table>
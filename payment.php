<?php
//initialize the session
session_start();
//if session variable is not set it will reirect it to the login page
if(!isset($_SESSION['username'])|| empty($_SESSION['username'])){
    header("location: login.php");
    exit;
  require_once ('config.php');
}
?>
<?php

require_once('header.php');
?>
<div>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="FC9XMHUD3Z84Y">
<table>
<tr><td><input type="hidden" name="on0" value="Parcels">Parcels</td></tr><tr><td><select name="os0">
    <option value="1-7 kgs">1-7 kgs $2.50 USD</option>
    <option value="8-10 kgs">8-10 kgs $3.00 USD</option>
    <option value="11-15 kgs">11-15 kgs $3.50 USD</option>
    <option value="16-19 kgs">16-19 kgs $4.00 USD</option>
    <option value="20-25 kgs">20-25 kgs $5.00 USD</option>
</select> </td></tr>

</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

</div>
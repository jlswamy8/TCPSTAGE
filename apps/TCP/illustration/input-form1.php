<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/apps/TCP/css/cap-w3.css">
<title>Illustration Request</title>
</head>
<body>
<div class="w3-container">
<div class="w3-left-align"><h3> Illustration Request </h3></div>
<form action="/apps/TCP/illustration/create-ill.php" method = "post">
<div class="w3-responsive" >
<table class="w3-table w3-border " style="width:80%">
<tr>
<td><label> Requestor Name </label><input class = "w3-input w3-border" name = "requestor_name" type="text" /></td>
<td><label> Requestor Email </label><input class = "w3-input w3-border" name = "requestor_email" type="email" /></td>
<!-- <td><label> Date of Request </label> <input class = "w3-input w3-border" name = "date_of_request" type="date" /></td> -->
<td><label> When Required </label><input class="w3-input w3-border" name = "date_when_required" type="date" /></td>
<td><label> Capital Raise Name </label> <input class = "w3-input w3-border" name = "cap_raise_name" type="text" /></td> 
</tr>
</table>
<div class="w3-left-align"><h3> Subscriber Information </h3></div>
<table class="w3-table w3-border" style="width:80%">
<tr>
<td><label>Type of Subscriber:</label> <input class="w3-radio" type="radio" name = "subscriber_type" value = "Individual" checked >  <label>Individual</label> <input class="w3-radio" type = "radio" name = "subscriber_type" value = "Organization">  <label> Organization</label></td>
<td><label> Investment Tax Status:</label> <input class="w3-radio" type="radio" name="tax_status" value = "Non-Qualified" checked><label>Non-Qualified</label> <input class="w3-radio" type="radio" name = "tax_status" value ="Qualified"><label>Qualified</label></td>
</tr>
<tr>
<tr><td></td><td></td></tr>
<td><label>Name on Illustration Header:<input class="w3-input w3-border"  name = "illustration_header_name" type="text" /></td>
<td><label> Amount of Investment:</label><input class="w3-input w3-border" name = " investment_amount" type="text"</td>
</tr>
<tr>
<td><label>Subscriber Full  Name :</label><input class= "w3-input w3-border" name = "subscriber_full_name" type="text" /></td>
<!-- <td><label>Subscriber Last Name :</label><input class= "w3-input w3-border" name = "subscriber_last_name" type="text" /></td> -->
<!--</tr> -->
<!--<tr> -->
<td> <label>Year of Birth/Incorporation:</label><input class="w3-input w3-border" tme = "year_born" ype="date" /></td>
<td></td>
</tr>
<tr>
<td><label>Street Address:</label><input class="w3-input w3-border" name= "street_address" type="text" /></td>
<td><label>City:</label><input class="w3-input w3-border" name = "city" type="text"/></td>
</tr>
<tr>
<td><label> State:</label><input class="w3-input w3-border" name = "state" type="text"/>
<td><label> Zip:</label><input class="w3-input w3-border" name = "zip" type="text"/>
</tr>
<tr>
<td><label>Phone:</label><input class="w3-input w3-border" name = "phone" type="text"/></td>
<td><label>Email:</label><input class="w3-input w3-border" name = "email" type="text"/><td>
</tr>
<tr>
<td></td>
<td><button class="w3-button w3-blue-grey" type="submit">Submit</button></td>
</tr> 
</table>
</div>
</div>
</form>
</body>
</html>

<?php

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

session_start();

include("header.php");
include("dbconnect.php");

if(isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
	$sql="select * from user where user_email= '$email'";
}
else
{
	header("Location: ../../index.php");
}
$result=mysql_query($sql) or die ("<BR>Error in retrieving data");
$rows=mysql_num_rows($result);


?>

<FORM action="processupdateProfile.php" METHOD="POST" name="edit_user" onsubmit="return validate('edit_user');" enctype="multipart/form-data">

	<table cellspacing=0 cellpadding=0 border=0 width=731 height=54 align=center class=main_form>
		<tr>
			<td height=15></td>
		</tr>
		<tr>
			<td width=77></td>
			<td colspan=6 class=f13><FONT COLOR="#E30102">Fields marked with <FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">(*)</FONT> are required. This information is a must for successful account creation.</FONT></td>
		</tr>
				<tr>
			<td height=17></td>
		</tr>
		<tr>
			<td width=77></td>
			<td width=17 class=f13 valign=middle><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
			<td width=160 class=f13>Name</td>
			<td width=14 class=f13><B>:</B></td>
			<td width=190><INPUT TYPE="text" NAME="name" value="<?php echo mysql_result($result,0,'first_name');?>" style="width:185px;" maxlength="61"></td>
			<td width=1></td>
			<td width=272><FONT CLASS=f12 COLOR="#868686"> &nbsp;e.g. Kapil Gupta</FONT></td>
		</tr>
<!--		<tr >

			<td><INPUT TYPE="text" NAME="login" value="<?php echo $_SESSION['username']; ?>"  style="display:none"></td>

		</tr> -->

		<tr>
			<td></td>
			<td><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
			<td class=f13>Last Name</td>
			<td class=f13><B>:</B></td>
			<td colspan=3>
			<INPUT TYPE="text" NAME="lname" value="<?php echo mysql_result($result,0,'last_name');?>" style="width:185px;" maxlength="31">
			</td>
	     </tr>
		<tr>
			<td></td>
			<td colspan=6  height=8  align="left" valign="middle"><div class=divcss id="check_availability" valign="middle" style='display:none;position:relative; visibility: hidden;'></div></td>
		</tr>
		
			

		<tr>
			<td></td>
			<td><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
			<td class=f13>Password</td>
			<td class=f13><B>:</B></td>
			<td><INPUT TYPE="password" NAME="passwd" value="" style="width:185px;" maxlength="12"></td>
			<td></td>
			<td>
				<table cellspacing=0 cellpadding=0 border=0>
					<tr>
						
						<td valign=top>&nbsp;<FONT CLASS=f12 COLOR="#868686">Minimum 6 characters</FONT></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height=8></td>
		</tr>
		<tr>
			<td></td>
			<td width=17><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
			<td class=f13>Confirm your Password</td>
			<td class=f13><B>:</B></td>
			<td>
			<INPUT TYPE="password" NAME="confirm_passwd" value=""  maxlength="12" size="25"></td>
		</tr>
		<tr>
			<td height=8></td>
		</tr>
		<tr>
          <td></td>
          <td class=f13 valign=middle></td>
          <td class=f13>Email Address </td>
          <td class=f13><B>:</B></td>
          <td><INPUT TYPE="text" NAME="email" value="<?php echo mysql_result($result,0,'user_email');?>" style="width:185px;" maxlength="61" readonly="readonly"></td>
          <td></td>
          <td>&nbsp;</td>
	  </tr>
	  <tr>
			<td height=8></td>
		</tr>

	  <tr>
			<td height=8></td>
		</tr>
		<tr>
			<td colspan=7></td>
		</tr>
				<tr>
			<td height=8></td>
		</tr>
		<tr>

			<?php 
				$dob_year = mysql_result($result,0,'dob_year'); 
				$dob_month = mysql_result($result,0,'dob_month'); 
				$dob_day = mysql_result($result,0,'dob_day'); 
			
			?>
			<td></td>
			<td><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
			<td class=f13>Date of Birth</td>
			<td class=f13><B>:</B></td>
			<td colspan=3>
			<SELECT NAME="DOB_Month"><option label="Month" value="">Month</option>
<option label="Jan" value="1" <?php if($dob_month==1) echo 'selected="selected" '; ?> >Jan</option>
<option label="Feb" value="2" <?php if($dob_month==2) echo 'selected="selected" '; ?> >Feb</option>
<option label="Mar" value="3" <?php if($dob_month==3) echo 'selected="selected" '; ?> >Mar</option>
<option label="Apr" value="4" <?php if($dob_month==4) echo 'selected="selected" '; ?> >Apr</option>
<option label="May" value="5" <?php if($dob_month==5) echo 'selected="selected" '; ?> >May</option>
<option label="Jun" value="6" <?php if($dob_month==6) echo 'selected="selected" '; ?> >Jun</option>
<option label="Jul" value="7" <?php if($dob_month==7) echo 'selected="selected" '; ?> >Jul</option>
<option label="Aug" value="8" <?php if($dob_month==8) echo 'selected="selected" '; ?> >Aug</option>
<option label="Sep" value="9" <?php if($dob_month==9) echo 'selected="selected" '; ?> >Sep</option>
<option label="Oct" value="10" <?php if($dob_month==10) echo 'selected="selected" '; ?> >Oct</option>
<option label="Nov" value="11" <?php if($dob_month==11) echo 'selected="selected" '; ?> >Nov</option>
<option label="Dec" value="12" <?php if($dob_month==12) echo 'selected="selected" '; ?> >Dec</option>
</SELECT>
			<INPUT TYPE="text" NAME="DOB_Day" maxlength="2" style="width:25px;" value="<?php  echo $dob_day ?>" >
			<INPUT TYPE="text" NAME="DOB_Year" maxlength="4" style="width:37px;" value="<?php  echo  $dob_year ?>" >
			</td>
		</tr>
		<tr>
			<td height=8></td>
		</tr>
		<tr>
			<td></td>
			<td><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
			<td class=f13>Gender</td>
			<td class=f13><B>:</B></td>
			<td colspan=3>
			<?php $gender = mysql_result($result,0,'gender') ?>
			<SELECT NAME="gender" > 
			<Option value="f" <?php if($gender=="f") echo 'selected="selected" '; ?> >Female</Option>
			<Option value="m"  <?php if($gender=="m") echo 'selected="selected" '; ?> >Male</Option></SELECT>
		</td>
		</tr>
		<tr>
			<td height=8></td>
		</tr>
		<tr>
          <td></td>
          <td><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
          <td class=f13>Country</td>
          <td class=f13><B>:</B></td>
		  <?php $country = mysql_result($result,0,'user_location') ?>
          <td colspan=3><SELECT NAME="country" style="width:183px;" >
             <option label="China" value="China"  <?php if($country=="China") echo 'selected="selected" '; ?> >China</option>
			  <option label="India" value="India" <?php if($country=="India") echo 'selected="selected" '; ?> >India</option>
              <option label="United States" value="United States" <?php if($country=="United States") echo 'selected="selected" '; ?> >United States</option>
              <option label="United Kingdom" value="United Kingdom" <?php if($country=="United Kingdom") echo 'selected="selected" '; ?> >United Kingdom</option>
              <option label="Canada" value="Canada" <?php if($country=="Canada") echo 'selected="selected" '; ?> >Canada</option>
              <option label="Singapore" value="Singapore" <?php if($country=="Singapore") echo 'selected="selected" '; ?> >Singapore</option>
              <option label="Malaysia" value="Malaysia" <?php if($country=="Malaysia") echo 'selected="selected" '; ?> >Malaysia</option>
              <option label="Australia" value="Australia" <?php if($country=="Australia") echo 'selected="selected" '; ?> >Australia</option>
              <option label="Saudia Arabia" value="Saudia Arabia" <?php if($country=="Saudia Arabia") echo 'selected="selected" '; ?> >Saudia Arabia</option>
              <option label="South Africa" value="South Africa" <?php if($country=="South Africa") echo 'selected="selected" '; ?> >South Africa</option>
          </SELECT></td>
	  </tr>

		<tr>
			<td height=8></td>
		</tr>
	  		<tr>
			<td></td>
			 <td><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102"></FONT></td>
			<td class=f13>Profile Image</td>
			<td class=f13><B>:</B></td>
			<td colspan=1>
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			
				<input name="userfile" type="file" id="userfile" >
			</td>
		</tr>

		<tr>
			<td height=8></td>
		</tr>
		<tr>
			<td height=15></td>
		</tr>
		<tr>
			<td colspan=7 align=center class=f13>I agree to the terms and conditions and the privacy policy</TD>
		</TR>
		<tr>
			<td height=15></td>
		</tr>
		<tr>
			<td colspan=4></td>
			<td colspan=3><input type='hidden' name='FormName' value=''><input type='hidden' name='service' value=''>
			<INPUT TYPE="submit" name="Register" value="Update"  style="border-style: outset; border-width: 3px">&nbsp;&nbsp;
			<input type="button" name="Cancel" value="Cancel" onclick="window.location = '../../index.php' " style="border-style: outset; border-width: 3px" />
			
			</TD>
			
		</tr>
		<tr>
			<td height=5></td>
		</tr>
		<tr>
			<td></td>
			<td colspan=6>
			<FONT FACE="Verdana" SIZE =-2 COLOR="#797979">*</FONT>&nbsp;<FONT CLASS=f10 COLOR="#868686">We'll be sending you the system notifications and promotional mailers based on the interest you declare while registration.</FONT>
			</td>
		</tr>
		<tr>
			<td height=15></td>
		</tr>
	</table>
</FORM>

<!--Footer begins-->
<?php include("footer.php");?>
<!--Footer ends-->
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

session_start();

include("header.php");
if(isset($_SESSION['fail_reg']) && $_SESSION['fail_reg']==1)
{
echo "<FONT COLOR='#E30102' >Email ID already taken up</font>";
$_SESSION['fail_reg']=0;
}
if(isset($_SESSION['fail_reg']) && $_SESSION['fail_reg']==2)
{
echo "<FONT COLOR='#E30102' >Image text doesn't matched</font>";
$_SESSION['fail_reg']=0;
}
?>

<FORM action="processsignup.php" METHOD="POST" name="register_user" onsubmit="return validate('register_user');" enctype="multipart/form-data">

<!--TOP BAR BEGINS-->
	<table cellspacing=0 cellpadding=0 border=0 width=731 height=44 align=center class=top_bar>
		<tr height=44>
			<td width=16></td>
			<td width=300 class=f15><B>New user? Register for WhingIt</B></td> 
			<td align=right class=f15 width=415>Already registered? <B><A HREF="../../index.php">Sign in</A></B>&nbsp;&nbsp;&nbsp;</td>
		</tr>
	</table>
	<br>
<!--TOP BAR ENDS-->

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
			<td width=160 class=f13>First Name</td>
			<td width=14 class=f13><B>:</B></td>
			<td width=190><INPUT TYPE="text" NAME="name" value="" style="width:185px;" maxlength="61"></td>
			<td width=1></td>
			<td width=272><FONT CLASS=f12 COLOR="#868686"> &nbsp;e.g. Kapil</FONT></td>
		</tr>

		<tr>
			<td></td>
			<td><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
			<td class=f13>Last Name</td>
			<td class=f13><B>:</B></td>
			<td colspan=3>
			<INPUT TYPE="text" NAME="lname" value="" style="width:185px;" maxlength="31">
			</td>
	     </tr>

		<tr>
			<td></td>
			<td colspan=6  height=8  align="left" valign="middle"><div class=divcss id="check_availability" valign="middle" style='display:none;position:relative; visibility: hidden;'></div></td>
		</tr>
		<tr><td height=5></td></tr>
<!--		<tr>
			<td></td>
			<td valign=middle><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
			<td class=f13>Choose your ID</td>
			<td class=f13><B>:</B></td>
			<td><INPUT TYPE="text" NAME="login" value=""  style="width:185px;" maxlength="30" ></td>
			<td></td>
			<td>&nbsp;</td>
		</tr> -->
				<tr>
			<td height=8></td>
		</tr>
		<tr>
			<td height=8 colspan=7 align="center"><span id="recommend_text" valign="center"></span></td></tr>
		<tr>
			<td></td>
			<td><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
			<td class=f13>Choose Password</td>
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
			<td><INPUT TYPE="password" NAME="confirm_passwd" value="" style="width:185px;" maxlength="12"></td>
		</tr>
		<tr>
			<td height=8></td>
		</tr>
		<tr>
          <td></td>
          <td class=f13 valign=middle><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
          <td class=f13>Email Address </td>
          <td class=f13><B>:</B></td>
          <td><INPUT TYPE="text" NAME="email" value="" style="width:185px;" maxlength="61"></td>
          <td></td>
          <td>&nbsp;</td>
	  </tr>
	  <tr>
			<td height=8></td>
		</tr>

		<tr>
			<td colspan=7></td>
		</tr>
		<TR>
			<td colspan=7><div id="div_hintQS" style="visibility:hidden;display:none;">
					<table cellspacing=0 cellpadding=0 border=0>
						<tr>
							<td height=6></td>
						</tr>
						<tr>
							
						</tr>
						<tr>
							<td height=8></td>
						</tr>
						<tr>


						</tr>
						<tr>
							<td height=8></td></tr>
						<tr>

						</tr>
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<td height=8></td>
		</tr>
		<tr>
			<td></td>
			<td><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
			<td class=f13>Date of Birth</td>
			<td class=f13><B>:</B></td>
			<td colspan=3>
			<SELECT NAME="DOB_Month"><option label="Month" value="">Month</option>
<option label="Jan" value="1">Jan</option>
<option label="Feb" value="2">Feb</option>
<option label="Mar" value="3">Mar</option>
<option label="Apr" value="4">Apr</option>
<option label="May" value="5">May</option>
<option label="Jun" value="6">Jun</option>
<option label="Jul" value="7">Jul</option>
<option label="Aug" value="8">Aug</option>
<option label="Sep" value="9">Sep</option>
<option label="Oct" value="10">Oct</option>
<option label="Nov" value="11">Nov</option>
<option label="Dec" value="12">Dec</option>
</SELECT>
			<INPUT TYPE="text" NAME="DOB_Day" maxlength="2" style="width:25px;" value="dd" onFocus="Javascript : if(this.value=='dd') this.value='';">
			<INPUT TYPE="text" NAME="DOB_Year" maxlength="4" style="width:37px;" value="yyyy" onFocus="Javascript : if(this.value=='yyyy') this.value='';">
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
			<SELECT NAME="gender"><Option value="m"  >Male<Option value="f" >Female</SELECT>
		</td>
		</tr>
		<tr>
			<td height=8></td>
		</tr>

		
		</tr>
		<tr>
			<td height=8></td>
		</tr>

				<tr>
			<td></td>
			<td><FONT FACE="Verdana" SIZE =-2 COLOR="#E30102">*</FONT></td>
			<td class=f13>City</td>
			<td class=f13><B>:</B></td>
			<td colspan=3>
			<input NAME="city" value="" style="width:185px;" maxlength="31">
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
          <td colspan=3><SELECT NAME="country" style="width:183px;">
              <option label="United States" value="United States">United States</option>
			  <option label="China" value="China">China</option>
			  <option label="India" value="India">India</option>
              <option label="United Kingdom" value="United Kingdom">United Kingdom</option>
              <option label="Canada" value="Canada">Canada</option>
              <option label="Singapore" value="Singapore">Singapore</option>
              <option label="Malaysia" value="Malaysia">Malaysia</option>
              <option label="Australia" value="Australia">Australia</option>
              <option label="Saudia Arabia" value="Saudia Arabia">Saudia Arabia</option>
              <option label="United Arab Emirates" value="United Arab Emirates">United Arab Emirates</option>
              <option label="South Africa" value="South Africa">South Africa</option>
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
			<td height=15></td>
		</tr>
		<tr>
			<td height=8></td>
		</tr>
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
			<td colspan=3><input type='hidden' name='FormName' value=''><input type='hidden' name='service' value=''><INPUT TYPE="submit" name="Register" value="Register Me" style="border-style: outset; border-width: 3px" >&nbsp;&nbsp;
			<input type="button" name="Cancel" value="Cancel" onclick="window.location = '../../index.php' " style="border-style: outset; border-width: 3px" />

			</TD>
		</tr>
		<tr>
			<td height=5></td>
		</tr>
		<tr>
			<td></td>
			<td colspan=6>
			<!-- <FONT FACE="Verdana" SIZE =-2 COLOR="#797979">*</FONT>&nbsp;<FONT CLASS=f10 COLOR="#868686">We will be sending you the system notifications and promotional mailers based on the interest you declare while registration.</FONT> -->
			</td>
		</tr>
		<tr>
			<td height=15></td>
		</tr>
	</table>
</FORM>
</div>
<?php include("footer.php"); 
				?>
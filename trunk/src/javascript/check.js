function isFullName()	{
	var name1 = document.forms[0].name.value;
	var regex_for_name	= /^[A-Za-z]+ [A-Za-z]+$/
	var alt_regex_for_name	= /^[A-Za-z]+$/
	if(   (name1.search(regex_for_name) != -1)  || (name1.search(alt_regex_for_name) != -1 ) ) {
			return true;
	} else {
		alert("First name format is invalid. Please use alphabets only.");
		document.forms[0].name.focus();
		return	false;	
	}

	var name1 = document.forms[0].lname.value;
	var regex_for_name	= /^[A-Za-z]+ [A-Za-z]+$/
	var alt_regex_for_name	= /^[A-Za-z]+$/
	if(   (name1.search(regex_for_name) != -1)  || (name1.search(alt_regex_for_name) != -1 ) ) {
			return true;
	} else {
		alert("Last name format is invalid. Please use alphabets only.");
		document.forms[0].lname.focus();
		return	false;	
	}

}

function isPass()	{
	
	var str = document.forms[0].passwd.value;
	if ((str == "") || (str.length < 6))
	{
		alert("\nThe password field is either empty or less than 6 chars.\n\nPlease enter your password.")
		document.forms[0].passwd.focus();
		return false;
	}
	if(document.forms[0].confirm_passwd)
	{
	  var str2 = document.forms[0].confirm_passwd.value;
	   if (str != str2)
	   {
		alert("Passwords typed do not match, please re-enter your passwords.\n\n");
	  	return false;
	  }
	  return true;
	}
}
 

function ValidateAltEmail() {

	var emailID=document.forms[0].email;

	if(emailID.value == "" || emailID.value.length < 1) {
		alert("Invalid email");
		return false;	
	}

	if (echeck(emailID.value)==false) {
			emailID.focus()
			return false
	}
	
	return true;
 }

function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid Email address")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid Email address")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid Email address")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid Email address")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid Email address")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid Email address")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid Email address")
		    return false
		 }
		
 		 return true					
	}

function isLogin()	{
	var str = document.forms[0].login.value;

	if (str == "")	{	// is not null
			alert("\ID cannot be blank, please enter your desired ID")
			document.forms[0].login.focus();
			return false;
	}
	
	for (var i = 1; i < str.length; i++)	{ // shud contain only alphanumeric values and shud _ and .
		var ch = str.substring(i, i + 1);
		if ( ((ch < "a" || "z" < ch) && (ch < "A" || "Z" < ch)) && (ch < "0" || "9" < ch) && (ch != '_') && (ch != '.'))
		{
			alert("\nThe ID field  accepts letters,numbers & underscore.\n\nPlease re-enter your ID.");
			document.forms[0].login.select();
			document.forms[0].login.focus();
			return false;
		}
	}
	
	var regex_login_end		= /[A-Za-z0-9]$/ ;
	var	regex_login_start	= /^[A-za-z]/;

	if(  document.forms[0].login.value.search(regex_login_start) == -1 ) {
		alert("ID should begin with an alphabetic character");
		document.forms[0].login.focus;
		return false;
	}

	if(  document.forms[0].login.value.search(regex_login_end) == -1 ) {
		alert("ID should not end with special characters");
		document.forms[0].login.focus;
		return false;

	}

//
	return true;
}


function isPass()	{
	var str = document.forms[0].passwd.value;
	if ((str == "") || (str.length < 6))
	{
		alert("\nThe password field is either empty or less than 6 chars.\n\nPlease enter your password.")
		document.forms[0].passwd.focus();
		return false;
	}
	var str2 = document.forms[0].confirm_passwd.value;
	if (str != str2)
	{
		alert("Passwords typed do not match, please re-enter your passwords.\n\n");
		return false;
	}
	return true;
}



function isDate()	{
	var yy,mm,dd;
	var im,id,iy;
	var present_date = new Date();
	yy = 1900 + present_date.getYear();
	if (yy > 3000)	{
		yy = yy - 1900;
	}
	mm = present_date.getMonth();
	mm = mm + 1;
	dd = present_date.getDate();
	im = document.forms[0].DOB_Month.selectedIndex;
	var entered_month = document.forms[0].DOB_Month.options[im].value;
	var invalid_month = document.forms[0].DOB_Month.options[im].value-1;
	var entered_day = document.forms[0].DOB_Day.value;
	var entered_year = document.forms[0].DOB_Year.value;
	if ( (entered_day == 0) || (entered_month == 0) || (entered_year == 0) )	{
		alert("Please enter your birthday");
		return false;
	}
	if ( is_valid_day(invalid_month,entered_day,entered_year) )	{
		return true;
	}
	return false;
}

function is_valid_day(entered_month,entered_day,entered_year)	{
	
	if ((entered_year % 4) == 0)
	{
		var days_in_month = "312931303130313130313031";
 	}
 	else	{

		var days_in_month = "312831303130313130313031";
 	}
	if (entered_month != -1)
	{
		if ( parseInt(entered_day) > parseInt(days_in_month.substring(2*entered_month,2*entered_month+2)) )
		{
			alert ("The birthday field is entered wrongly (the day field value exceeds the number of days for the month entered).");
			return false;
		}
	}
	return true;
}
function checkPass()
{

	var str = document.forms[0].Passwd.value;
	if ((str == "") || (str.length < 1))
	{
		alert("\nPlease enter your password.")
		document.forms[0].Passwd.focus();
		return false;
	}
	return true;
}
function checkEmail()
{

	var str = document.forms[0].Email.value;
	if ((str == "") || (str.length < 1))
	{
		alert("\nPlease enter your email.")
		document.forms[0].Email.focus();
		return false;
	}
	return true;
}


function validateLogin(FormName)	{

 // check altemail Address
		if(!checkEmail()) {
			return false;
	}
	if (checkPass() == false)	{	// Checks the password and Confirm Password
		return false;
	}
}

function validate(FormName)	{

	if ( isFullName() == false )	{	 // Checks the First Name and Last Name
		return false;			
	} // End of check first and Last Name

	
	//if((isLogin() == false) )	{	// Checks the Login Id
//			return false;
//		}

	if (isPass() == false)	{	// Checks the password and Confirm Password
		return false;
	}

 // check altemail Address
		if(!ValidateAltEmail()) {
			return false;
	}



	if(document.forms[0].DOB_Month.value == "")
	{
		alert("Select a month of birth");
		document.forms[0].DOB_Month.focus();
		return false;	
	}
	if(isNaN(document.forms[0].DOB_Day.value))
	{
		alert("Enter a valid date of birth");
		document.forms[0].DOB_Day.value="";
		document.forms[0].DOB_Day.focus();
		return false;
	}
	if(document.forms[0].DOB_Day.value <= 0 || document.forms[0].DOB_Day.value > 31 )
	{
		alert("Enter a valid date of birth");
		document.forms[0].DOB_Day.value="";
		document.forms[0].DOB_Day.focus();
		return false;
	}
	if(isNaN(document.forms[0].DOB_Year.value))
	{
		alert("Enter a valid year of birth");
		document.forms[0].DOB_Year.value="";
		document.forms[0].DOB_Year.focus();
		return false;
	}
	var present_date = new Date();
	curr_year	= 1900 + present_date.getYear();
        if (curr_year > 3000)  {
                curr_year = curr_year - 1900;
        }
	if(document.forms[0].DOB_Year.value <= 1900 || document.forms[0].DOB_Year.value > curr_year )
	{
		alert("Enter a valid year of birth");
		document.forms[0].DOB_Year.value="";
		document.forms[0].DOB_Year.focus();
		return false;
	}


	if (isDate() == false)	{	// Checks the Date of Birth
		return false;
	}

	if(document.forms[0].gender.value=="")	{
		alert("Please select gender.");
		document.forms[0].gender.focus();
		return false;
	}
//alert(document.forms[0].city.value);

	if(document.forms[0].city.value=="")	{
		alert("Please enter city.");
		document.forms[0].city.focus();
		return false;
	}

	if(document.forms[0].streetAddress.value=="")	{
		alert("Please enter street address.");
		document.forms[0].streetAddress.focus();
		return false;
	}

	if(document.forms[0].country.value=="")	{
		alert("Please select country.");
		document.forms[0].country.focus();
		return false;
	}

	if(document.forms[0].imagetext.value == "" || document.forms[0].imagetext.value == "Enter the code in the image") {
		alert("To confirm your registration, please enter the number as shown in the box");
		document.forms[0].imagetext.focus();
		return false;
	}
	if(radio_login_value != '')	{
		if(radio_login_value == document.forms[0].passwd.value){
			alert("ID cannot be same as password ");
			return false;
		}
	} else {
		if(document.forms[0].login.value == document.forms[0].passwd.value){
			alert("ID cannot be same as password ");
			document.forms[0].passwd.focus;
			return false;
		}		
	}

	if(radio_login_value != '') {
		document.forms[0].login.value = radio_login_value;
	}
	
	document.forms[0].Register.value		= 'Registering..';
	document.forms[0].Register.disabled		= true;
	document.forms[0].Cancel.disabled		= true;
	
	document.forms[0].FormName.value	= FormName;
	document.forms[0].submit();
	return true;

} // End of Function Validate

<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
}
?>
<html>
<body  >

<?php include('header.php'); 

						   $flg=0;
						   if(isset($_GET['flg'])){ $flg=$_GET['flg']; }
						  
					
							if($flg==1)
							 {
								 echo '<table cellpadding="1" cellspacing="0" align="center" border="0" > 
                              <tr> <td colspan="2" align="center">  <b>  
								<font size="4" color="#993333" >  "Error in Login. Try Again" </font></b></td> </tr></table>';
							 }
							?>
	<br>
 

<div  id="show1">

 <table border="0" cellpadding="0" cellspacing="0" width="907" height="187" id="table1">
	<!-- MSTableType="nolayout" -->
	<tr>
	  <td width="779">
       <table width="100%" align=center cellpadding=5 cellspacing=1>
       <tr>
        <td valign=top>

        <!-- login box -->
         <form action="getin.php" method="post" >
        <div align="center">
        <table class=form-noindent cellspacing=3 cellpadding=5 width="52%" border=1 bordercolordark=#0000FF bgcolor=#E8EEFA>
          <tr bgcolor=#E8EEFA>
            <td valign=top style=text-align:center nowrap=nowrap>

						<div id=login>
                         <div id="gaia_loginbox" class="body">
                             <table cellpadding="1" cellspacing="0" align="center" border="0" id="gaia_table"> 
                              <tr> <td colspan="2" align="center">  <b>  
								<font size="4">  Sign In</font></b></td> </tr>
 
                               <tr> <td nowrap> <div align="right"> <b> <span class="gaia le lbl"> Email: </span> 
								</b> </div> </td> 
                                    <td>     
                                         <input name="email" class="gaia le val" id="Email" size="18" style="font-weight: 700"><b>
											</b>  
                                       
                                    </td> 
                                </tr> 
                                <tr> <td align="left">  </td> </tr> 
                                <tr> <td align="right"> 
									<p align="left"><b> <span class="gaia le lbl"> Password: </span> 
									</b> </td> 
                                     <td> 
                                          <input type="password" name="password" class="gaia le val" id="Passwd" size="18" style="font-weight: 700"><b>
											</b>
                                          
                                     </td> 
                                </tr>
                                <tr> <td align="right" valign="top">      
                                      <b>&nbsp; </b> </td>
                                      <td align="right" valign="top">      
                                      <b>&nbsp; 
										</b> </td>  </tr>      
                                     <tr> <td></td> <td align="left"> 
                                  
                                       <p align="center"> 
                                  
                                       <input type="submit" name="signin" value="Sign In" class="gaia le button" style="border-style: outset; border-width: 3px" ><b>
										</b>
                                       </td> </tr>     
                                     <tr>
										<td align="center" height="33.0" valign="bottom" nowrap class="gaia le fpwd"> 
										<p align="left"><b>New User:&nbsp; </b></td> 
										<td align="center" height="33.0" valign="bottom" nowrap class="gaia le fpwd">  
										<B><a href="register.php"><font size="4">Sign Up</font></a></B></td> 
								</tr>
                              </table>
                           
                           </div>    
						</div>
					</td>
				</tr>
        </table>
        </div>
        </form>
		</td>
	</tr>
	</table>
	</td>
	</tr>
</table>
 </div>

 </div>
<?php include("footer.php"); 
?>
</body>
<?
if(isset($HTTP_POST_VARS['signin']))
{

        if(!get_magic_quotes_gpc())
        {
                $username=addslashes($username);
                $password=addslashes($password);
        }
}
?>
</html>
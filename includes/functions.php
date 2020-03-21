<?php /*
 this is the store for functions
*/
function validate_form(array $fields){
	$errors=array();
	foreach($fields as $field_name){
		 if(!isset($_POST['{$field_name}'])|| empty($_POST['{$field_name}'])){
			 $errors[]='{$field_name}';//this adds an entry to the end of the array
	if(!empty($errors)){
	 redirect_to("new_subject.php");
			 }
		 }
	}
}
function mysql_prep($value){
	$magic_quotes_active=get_magic_quotes_gpc();
	$new_enough_php=function_exists("mysql_real_escape_string");//i.e. PHP >= v4.3.0
	if($new_enough_php){//PHP v4.3.0 or higher
	//undo any magic quote effects so mysql_real_escape_string can do the work
	if($magic_quotes_active){$value=stripslashes($value);}
	$value=mysql_real_escape_string($value);
	}
	else{//before PHP v4.3.0
	//if magic quotes aren't already on then add slashes manually
	if(!$magic_quotes_aactive){$value=addslashes($value);}
	//if magic quotes are active,then the slashes already exist
	}
	return $value;
	
}

function redirect_to($location=NULL){
	if($location !=NULL){
	header("Location: {$location}");
	exit;	
	}
	}
function confirm_query($result_set)
{
	global $connection;
	if(!$result_set){
	die("Database selection confirm_query failed:".mysqli_error($connection));
}
}
function login($args_username,$args_password)
{
	global $connection;
	$query= 'SELECT*
			FROM officer
            where username="'.$args_username.'" AND password="'.$args_password.'"';
	$query.=' LIMIT 1';
	$rep_set =mysqli_query($connection,$query); 
    confirm_query($rep_set);
	$rows=array();
	 while($r=mysqli_fetch_assoc($rep_set))
	 {
           $rows[]=$r;
	 }
	 
   		
	return $rows;
}
function echo_participants()
{
	global $connection;
	$query= 'SELECT*
			FROM participants
			ORDER BY id DESC';
           
	
	$order_set =mysqli_query($connection,$query); 
    confirm_query($order_set);
	$rows=array();
	 while($r=mysqli_fetch_assoc($order_set))
	 {
           $rows[]=$r;
	 }
	  echo json_encode($rows);
}
function echo_pictures()
{
	global $connection;
	$query= 'SELECT*
			FROM picture
			ORDER BY id DESC';
           
	
	$order_set =mysqli_query($connection,$query); 
    confirm_query($order_set);
	$rows=array();
	 while($r=mysqli_fetch_assoc($order_set))
	 {
           $rows[]=$r;
	 }
	  echo json_encode($rows);
}
function echo_pixcat()
{
	global $connection;
	$query= 'SELECT*
			FROM pixcat
			ORDER BY id DESC';
           
	
	$order_set =mysqli_query($connection,$query); 
    confirm_query($order_set);
	$rows=array();
	 while($r=mysqli_fetch_assoc($order_set))
	 {
           $rows[]=$r;
	 }
	  echo json_encode($rows);
}
function echo_news()
 {
global $connection;
	$query= 'SELECT*
			FROM news
			ORDER BY id DESC
            ';
	
	$order_set =mysqli_query($connection,$query); 
    confirm_query($order_set);
	$rows=array();
	 while($r=mysqli_fetch_assoc($order_set))
	 {
           $rows[]=$r;
	 }
	  echo json_encode($rows);
 }
 function  echo_calendarItems()
 {
global $connection;
	$query= 'SELECT*
			FROM calendar
			ORDER BY id DESC
            ';
	
	$order_set =mysqli_query($connection,$query); 
    confirm_query($order_set);
	$rows=array();
	 while($r=mysqli_fetch_assoc($order_set))
	 {
           $rows[]=$r;
	 }
	  echo json_encode($rows);
 }
 function echo_officers()
 {
global $connection;
	$query= 'SELECT*
			FROM officer
			ORDER BY id DESC
            ';
	
	$order_set =mysqli_query($connection,$query); 
    confirm_query($order_set);
	$rows=array();
	 while($r=mysqli_fetch_assoc($order_set))
	 {
           $rows[]=$r;
	 }
	  echo json_encode($rows);
 }
 function echo_messages()
 {
global $connection;
	$query= 'SELECT*
			FROM visitor
            ';
	
	$order_set =mysqli_query($connection,$query); 
    confirm_query($order_set);
	$rows=array();
	 while($r=mysqli_fetch_assoc($order_set))
	 {
           $rows[]=$r;
	 }
	  echo json_encode($rows);
 }
function get_last_calendar()
{
	global $connection;
	$query= "SELECT*
			FROM calendar	
			ORDER BY id DESC		
            ";
	$query.=" LIMIT 1";
	$staff_set =mysqli_query($connection,$query); 
    confirm_query($staff_set);
	$db_field=mysqli_fetch_assoc($staff_set);
	
		
	return $db_field;
	}
	function get_last_officer()
{
	global $connection;
	$query= "SELECT*
			FROM officer	
			ORDER BY id DESC		
            ";
	$query.=" LIMIT 1";
	$staff_set =mysqli_query($connection,$query); 
    confirm_query($staff_set);
	$db_field=mysqli_fetch_assoc($staff_set);
	
		
	return $db_field;
	}
	function get_last_message()
{
	global $connection;
	$query= "SELECT*
			FROM message	
			ORDER BY id DESC		
            ";
	$query.=" LIMIT 1";
	$staff_set =mysqli_query($connection,$query); 
    confirm_query($staff_set);
	$db_field=mysqli_fetch_assoc($staff_set);
	
		
	return $db_field;
	}

	function get_last_news()
{
	global $connection;
	$query= "SELECT*
			FROM news
			ORDER BY id DESC		
            ";
	$query.=" LIMIT 1";
	$staff_set =mysqli_query($connection,$query); 
    confirm_query($staff_set);
	$db_field=mysqli_fetch_assoc($staff_set);
	
		
	return $db_field;
	}
function get_last_picture()
{
global $connection;
	$query= "SELECT*
			FROM picture
			ORDER BY id DESC		
            ";
	$query.=" LIMIT 1";
	$staff_set =mysqli_query($connection,$query); 
    confirm_query($staff_set);
	$db_field=mysqli_fetch_assoc($staff_set);
	
		
	return $db_field;
}
function get_last_pixcat()
{
global $connection;
	$query= "SELECT*
			FROM pixcat
			ORDER BY id DESC		
            ";
	$query.=" LIMIT 1";
	$staff_set =mysqli_query($connection,$query); 
    confirm_query($staff_set);
	$db_field=mysqli_fetch_assoc($staff_set);
	
		
	return $db_field;
}

function get_pixcat_by_id($cat_id)
{
global $connection;
	$query= 'SELECT*
			FROM pixcat
			WHERE id = '.$cat_id.'';
	$query.=" LIMIT 1";
	$staff_set =mysqli_query($connection,$query); 
    confirm_query($staff_set);
	$db_field=mysqli_fetch_assoc($staff_set);
	
		
	return $db_field;
}
function editCalendarItemlist($data)
{
	global $connection;
   foreach ($data as $key => $value) {
   $query= 'UPDATE calendar SET  day = \''.$value["day"].'\', month = \''.$value["month"].'\', event = \''.$value["event"].'\', venue = \''.$value["venue"].'\'
	            where id = '.$value["id"].'';
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
   }
}
function editOfficerlist($data)
{
	global $connection;
   foreach ($data as $key => $value) {
   $query= 'UPDATE officer SET  first_name = \''.$value["first_name"].'\', last_name = \''.$value["last_name"].'\', middle_name = \''.$value["middle_name"].'\', username = \''.$value["username"].'\',password = \''.$value["password"].'\'
	            where id = '.$value["id"].'';
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
   }
}
function editMessagelist($data)
{
	global $connection;
   foreach ($data as $key => $value) {
   $query= 'UPDATE visitor SET  session_name = \''.$value["session_name"].'\'
	            where id = '.$value["id"].'';
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
   }
}
function editNewslist($data)
{

	global $connection;
   foreach ($data as $key => $value) {
   $query= 'UPDATE news SET  news_type = \''.$value["news_type"].'\',image = \''."news_image/".$value["id"].".png".'\',description = \''.$value["description"].'\',short_detail = \''.$value["short_detail"].'\',body = \''.$value["body"].'\',priority = \''.$value["priority"].'\',published_date = \''.$value["published_date"].'\',last_body_number = \''.$value["last_body_number"].'\'
	            where id = '.$value["id"].'';
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
   }
}
function editPicturelist($data)
{

	global $connection;
   foreach ($data as $key => $value) {
   $query= 'UPDATE picture SET  description = \''.$value["description"].'\'
	            where id = '.$value["id"].'';
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
   }
}function editPixCatlist($data)
{

	global $connection;
   foreach ($data as $key => $value) {
   $query= 'UPDATE pixcat SET  name = \''.$value["name"].'\'
	            where id = '.$value["id"].'';
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
   }
}
function deleteCalendarItemlist($data)
{
global $connection;
 foreach ($data as $key => $value) {
	$query="DELETE FROM calendar WHERE id = '".$value["id"]."'";
	$update_values =mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	}
}
}
function deleteOfficerlist($data)
{
global $connection;
 foreach ($data as $key => $value) {
	$query="DELETE FROM officer WHERE id = '".$value["id"]."'";
	$update_values =mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	}
}
}
function deleteMessagelist($data)
{
global $connection;
 foreach ($data as $key => $value) {
	$query="DELETE FROM visitor WHERE id = '".$value["id"]."'";
	$update_values =mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	}
}
}
function deleteNewslist($data)
{
global $connection;
 foreach ($data as $key => $value) {
	$query="DELETE FROM news WHERE id = '".$value["id"]."'";
	$update_values =mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	}
}
}
function deletePicturelist($data)
{
global $connection;
 foreach ($data as $key => $value) {
	$query="DELETE FROM picture WHERE id = '".$value["id"]."'";
	$update_values =mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	}
	decreasePixCat($value["cat_id"]);
}
}
function deletePixCatlist($data)
{
global $connection;
 foreach ($data as $key => $value) {
 	$query2="DELETE FROM picture WHERE cat_id = '".$value["id"]."'";
	$update_values2 =mysqli_query($connection,$query2); 
    if(!$update_values2){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	}
	$query="DELETE FROM pixcat WHERE id = '".$value["id"]."'";
	$update_values =mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	}
}
}

function newOfficerlist($data)
{
	global $connection;
	$last_officer=get_last_officer();	
	
	if((int)$last_officer['id']>=1)
	{
	$id=(int)$last_officer['id']+1;

	}
	else
	{
		$id=1;
		}
		foreach ($data as $key => $value) {
	   $query=	"INSERT INTO officer(id,first_name,last_name,middle_name,username,password) VALUES ('$id','".$value["first_name"]."','".$value["last_name"]."','".$value["middle_name"]."','".$value["username"]."','".$value["password"]."')";
  
   	
		
 $id++;
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
}
  echo json_encode(get_last_officer());
}
function newCalendarItemlist($data)
{
	global $connection;
	$last_caledar=get_last_calendar();	
	
	if((int)$last_caledar['id']>=1)
	{
	$id=(int)$last_caledar['id']+1;

	}
	else
	{
		$id=1;
		}
		foreach ($data as $key => $value) {
	   $query=	"INSERT INTO calendar(id,day,month,event,venue) VALUES ('$id','".$value["day"]."','".$value["month"]."','".$value["event"]."','".$value["venue"]."')";
  
   	
		
 $id++;
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
}
  echo json_encode(get_last_officer());
}
function newMessagelist($data)
{
	global $connection;
	$last_session=get_last_message();	
	
	if((int)$last_session['id']>=1)
	{
	$id=(int)$last_session['id']+1;

	}
	else
	{
		$id=1;
		}
		foreach ($data as $key => $value) {
	   $query=	"INSERT INTO visitor(id,session_name) VALUES ('$id','".$value["session_name"]."')";
  
   	
		
 $id++;
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
}
  echo json_encode(get_last_message());
}
function newNewslist($value)
{
	global $connection;
	$last_class=get_last_news();	
	
	if((int)$last_class['id']>=1)
	{
	$id=(int)$last_class['id']+1;

	}
	else
	{
		$id=1;
		}

		
		$image='../news_image/'.$id.'.png';
	
	   $query=	"INSERT INTO news(id,news_type,image,description,short_detail,body,priority,published_date,last_body_number) VALUES ('$id','".$value["news_type"]."','".$image."','".$value["description"]."','".$value["short_detail"]."','".$value["body"]."','".$value["priority"]."','".$value["published_date"]."','".$value["last_body_number"]."')";
  
   	
		
 $id++;
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}

  echo json_encode(get_last_news());
}
function newPixCatlist($data)
{
	global $connection;
	$last_officer=get_last_pixcat();	
	
	if((int)$last_officer['id']>=1)
	{
	$id=(int)$last_officer['id']+1;

	}
	else
	{
		$id=1;
		}
		foreach ($data as $key => $value) {
	   $query=	"INSERT INTO pixcat(id,name,count) VALUES ('$id','".$value["name"]."','0')";
  
   	
		
 $id++;
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
}
  echo json_encode(get_last_pixcat());
}
function newPicturelist($data)
{
	global $connection;
	$last_class=get_last_picture();	
	
	if((int)$last_class['id']>=1)
	{
	$id=(int)$last_class['id']+1;

	}
	else
	{
		$id=1;
		}
		foreach ($data as $key => $value) {
		
		$url='gallery_image/'.$id.'.png';
	
	   $query=	"INSERT INTO picture(id,cat_id,url,description) VALUES ('$id','".$value["cat_id"]."','".$url."','".$value["description"]."')";
  
   	 $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
increasePixCat($value["cat_id"]);
		
 $id++;
}
	           
  echo json_encode(get_last_picture());
}
function increasePixCat($id)
{
	global $connection;
	$category=get_pixcat_by_id($id);
  $count=(int)$category['count']+1;
	 $query= 'UPDATE pixcat SET  count = \''.$count.'\'
	            where id = '.$id.'';
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
	            
}
function decreasePixCat($id)
{
	global $connection;
	$category=get_pixcat_by_id($id);
  $count=(int)$category['count']-1;
	 $query= 'UPDATE pixcat SET  count = \''.$count.'\'
	            where id = '.$id.'';
	            $update_values=mysqli_query($connection,$query); 
    if(!$update_values){
		   //redirect_to("contact-us.php?action=failed");
	die("Database selection failed:".mysql_error());
	
	}
	            
}
function insert_picture($data)
{
	if($data['id']=="new")
	{
		global $connection;
	$last_class=get_last_news();	
	
	if((int)$last_class['id']>=1)
	{
	$id=(int)$last_class['id']+1;

	}
	else
	{
		$id=1;
		}
	}
	else $id=$data["id"];
	$param_upload_file="../news_image/".$id.".png";
		$path=upload_student_image($data["image"],$param_upload_file);  
	   if(!$path){
		   echo'its not succesful';
	
	}
	else
	{
		 echo $path;
		}
}
function insert_gallery_picture($data)
{
	if($data['id']=="new")
	{
		global $connection;
	$last_class=get_last_picture();	
	
	if((int)$last_class['id']>=1)
	{
	$id=(int)$last_class['id']+1;

	}
	else
	{
		$id=1;
		}
	}
	else $id=$data["id"];
	$param_upload_file="../gallery_image/".$id.".png";
		$path=upload_student_image($data["image"],$param_upload_file);  
	   if(!$path){
		   echo'its not succesful';
	
	}
	else
	{
		 echo $path;
		}
}
function upload_student_image($submit_name,$sent_upload_file)
{
	
	$imageFileType=pathinfo($upload_file,PATHINFO_EXTENSION);
		
		if(move_uploaded_file($_FILES['image']['tmp_name'],$sent_upload_file))
		{
			return true;
		}else{
			return false;
		}
	}

function insert_message($email,$name, $phone, $message,$placeholder)
{
	$last_message=get_last_message();
			
			if((int)$last_message['id']>=1)
	{
	$id=(int)$last_message['id']+1;

	}
	else
	{
		$id=1;
		}
		        $date= date('F d, Y');
                $time = date('H:i');
	global $connection;
	$query= "INSERT INTO message(id, email, name, phone, message, placeholder, date_sent, time_sent) VALUES ('{$id}', '{$email}','{$name}', '{$phone}', '{$message}', '{$placeholder}', '{$date}', '{$time}')";
        $insert_values=mysqli_query($connection,$query);   
	   if(!$insert_values){
		   redirect_to("contact-us.php?action=failed");
	die("Database query failed:".mysqli_error($connection));
	}
	if($placeholder=="Quick Contact")
	{
		$subject="Acknowlegdement!!!";
		$from="SKYF Info Desk <info@skyfoundation.org.ng>";
		$headers="MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1".PHP_EOL;
		$headers.='From: '.$from.PHP_EOL.'Reply-To: '.$from.PHP_EOL.'X-Mailer: PHP/'.phpversion();
		$outbox='<html>
<body>
	<A style="margin-left: 100px;" href="www.skyfoundation.org.ng"><IMG 
 src="images/logo.png"><!--<img src="img/logo2.png" alt="All in 1">--></A>
 <p>Dear ';
 $outbox .=$name;
 $outbox.='</p>
 <p> Thank you for contacting us</p>
 <p>You will be notified when a response is made by email.</p>
 <p>…… <br> SKYF </p>
</body>
</html>';
mail($email,$subject,$outbox,$headers);
send_email_to_company($placeholder,$email,$name, $phone, $message);
	}
	else if($placeholder="Application")
	{
	$subject="Application Confirmation!!!";
		$from=" Folton Charis Info Desk <info@foltoncharisschool.org.ng>";
		$headers="MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1".PHP_EOL;
		$headers.='From: '.$from.PHP_EOL.'Reply-To: '.$from.PHP_EOL.'X-Mailer: PHP/'.phpversion();
		$outbox='<html>
<body>
	<A style="margin-left: 100px;" href="www.foltoncharisschool.org.ng"><IMG 
 src="images/logo.png"><!--<img src="img/logo2.png" alt="All in 1">--></A>
 <p>Dear ';
 $outbox .=$name;
 $outbox.='</p>
 <p> Thank you for Applying to work with us. A support ticket has now been opened for your application</p>
 <p>You will be notified when a response is made by email.</p>
 <p>…… <br> FCIS </p>
</body>
</html>';
mail($email,$subject,$outbox,$headers);	
send_email_to_company($placeholder,$email,$name, $phone, $message);
	}
	else if($placeholder="Order Confirmation!!!")
	{
	$subject="Order Confirmation!!!";
		$from=" JESOFT Customer Service Desk <support@jesoftnig.com>";
		$headers="MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1".PHP_EOL;
		$headers.='From: '.$from.PHP_EOL.'Reply-To: '.$from.PHP_EOL.'X-Mailer: PHP/'.phpversion();
		$outbox='<html>
<body>
	<A style="margin-left: 100px;" href="www.jesoftnig.com"><IMG 
 src="images/logo.png"><!--<img src="img/logo2.png" alt="All in 1">--></A>
 <p>Dear ';
 $outbox .=$name;
 $outbox.='</p>
 <p> Thank you for Applying to train with us. A support ticket has now been opened for your application</p>
 <p>You will be notified when a response is made by email.</p>
 <p>…… <br> JESOFT </p>
</body>
</html>';
mail($email,$subject,$outbox,$headers);	
send_email_to_company($placeholder,$email,$name, $phone, $message);
	}
	else if($placeholder="website")
	{
	$subject="Application Confirmation!!!";
		$from=" JESOFT Customer Service Desk <support@jesoftnig.com>";
		$headers="MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1".PHP_EOL;
		$headers.='From: '.$from.PHP_EOL.'Reply-To: '.$from.PHP_EOL.'X-Mailer: PHP/'.phpversion();
		$outbox='<html>
<body>
	<A style="margin-left: 100px;" href="www.jesoftnig.com"><IMG 
 src="images/logo.png"><!--<img src="img/logo2.png" alt="All in 1">--></A>
 <p>Dear ';
 $outbox .=$name;
 $outbox.='</p>
 <p> Thank you for contacting us. A support ticket has now been opened for your request</p>
 <p>You will be notified when a response is made by email.</p>
 <p>…… <br> JESOFT </p>
</body>
</html>';
mail($email,$subject,$outbox,$headers);	
send_email_to_company("Request for website",$email,$name, $phone, $message);
	}
return $id;		
		
}
function send_email_to_company($title,$email,$name, $phone, $message)
{
	$date= date('F d, Y');
                $time = date('H:i');
	$subject="AutoGenerated!!!";
		$from=$title."<info@skyfoundation.org.ng>";
		$headers="MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1".PHP_EOL;
		$headers.='From: '.$from.PHP_EOL.'Reply-To: '.$from.PHP_EOL.'X-Mailer: PHP/'.phpversion();
		$outbox='<html>
<body>
	<A style="margin-left: 100px;" href="skyfoundation.org.ng"><IMG 
 src="images/logo.png"><!--<img src="img/logo2.png" alt="All in 1">--></A>
 <p>Hi,</p><p>';
 $outbox .=$name;
 $outbox.=' just sent a mail from skyfoundation.org.ng on '.$date.' at '.$time.'</p>
 <p>check below for further details;</p>
 <p>Email:  '.$email.'<br>Phone:  '.$phone.'<br>Message:  '.$message.' </p>
 <p> please reply ASAP</p>
 <p>…… <br> SKYF </p>
</body>
</html>';
mail("skyfoundation2015@gmail.com",$subject,$outbox,$headers);	
}

?>
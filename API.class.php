<?php
require ('includes/functions.php'); 
require("includes/connection.php");
abstract class API
 { 
 	/** * Property: method * The HTTP method this request was made in, either GET, POST, PUT or DELETE */
 	 protected $method = ''; 
 	 /** * Property: endpoint * The Model requested in the URI. eg: /files */
 	  protected $endpoint = ''; 
 	  /** * Property: verb * An optional additional descriptor about the endpoint, used for things that can * not be handled by the basic methods. eg: /files/process */ protected $verb = '';
 	   /** * Property: args * Any additional URI components after the endpoint and verb have been removed, in our * case, an integer ID for the resource. eg: /<endpoint>/<verb>/<arg0>/<arg1> * or /<endpoint>/<arg0> */
 	    protected $args = Array(); 
 	    /** * Property: file * Stores the input of the PUT request */ 
 	    protected $file = Null; 
 	    /** * Constructor: __construct * Allow for CORS, assemble and pre-process the data */ 

 	    public function __construct($request) 
 	    { 
 	    	header("Access-Control-Allow-Orgin: *");
 	    	 header("Access-Control-Allow-Methods: ","GET, POST, DELETE, PUT, OPTIONS, HEAD");
 	    	  header("Content-Type: application/json");
           header("Content-Type: application/form-data");
 	    	   $this->args = explode('/', rtrim($request, '/')); 
 	    	   $this->endpoint = array_shift($this->args); 
 	    	   if (array_key_exists(0, $this->args) && !is_numeric($this->args[0]))
 	    	    {
 	    	     $this->verb = array_shift($this->args); 
 	    	 } 
 	    	 $this->method = $_SERVER['REQUEST_METHOD']; 
 	    	 if ($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER)) 
 	    	 	{
 	    	 	 if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'DELETE') 
 	    	 	 	{
 	    	 	 	 $this->method = 'DELETE'; 
 	    	 	 	} 
 	    	 	 else if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'PUT')
 	    	 	  {
 	    	 	   $this->method = 'PUT';
 	    	 	    }
 	    	 	     else
 	    	 	      {
 	    	 	       throw new Exception("Unexpected Header"); 
 	    	 	   } 
 	    	 	} 
 	    	 	switch($this->method)
 	    	 	 {
 	    	 	  case 'DELETE': 
 	    	 	  case 'POST': $this->request = $this->_cleanInputs($_POST);
 	    	 	   break;
 	    	 	    case 'GET': $this->request = $this->_cleanInputs($_GET); 
 	    	 	    break; 
 	    	 	    case 'PUT': $this->request = $this->_cleanInputs($_GET); 
 	    	 	    $this->file = file_get_contents("php://input");
 	    	 	     break;
 	    	 	      default: $this->_response('Invalid Method', 405); 
 	    	 	      break; 
 	    	 	  }
 	    	 	   }

  public function processAPI()
  { 
    if($this->method=='PUT' && $this->endpoint=='contact')
    {
     $output= json_decode($this->file, true);
     insert_message($output['email'],$output['name'], $output['phone'], $output['message'], $output['placeholder']);

    }
    if($this->method=='POST'&& $this->endpoint=='changeImage')
    {

        insert_picture($_POST);
    }
    if($this->method=='POST'&& $this->endpoint=='changeGalleryImage')
    {

        insert_gallery_picture($_POST);
    }
    
     if($this->method=='GET'&& $this->endpoint=='officers')
    {
         echo_officers();
    }
     if($this->method=='GET'&& $this->endpoint=='calendarItems')
    {
         echo_calendarItems();
    }
    if($this->method=='GET'&& $this->endpoint=='messages')
    {
         echo_messages();
    }

     if($this->method=='GET'&& $this->endpoint=='pictures')
    {
         echo_pictures();
    }
    if($this->method=='GET'&& $this->endpoint=='pixcat')
    {
         echo_pixcat();
    }
    if($this->method=='GET'&& $this->endpoint=='news')
    {
         echo_news();
    }
   
     if($this->method=='PUT' && $this->endpoint=='login')
    {
      $output= json_decode($this->file, true);
      echo(json_encode(login($output['username'],$output['password'])));   
       }
    if($this->method=='PUT' && $this->endpoint=='newCalendarItem')
    {
     $output= json_decode($this->file, true);
     newCalendarItemlist($output);

    }
    
     if($this->method=='PUT' && $this->endpoint=='newMessage')
    {
     $output= json_decode($this->file, true);
     newMessagelist($output);

    }
    if($this->method=='PUT' && $this->endpoint=='newPixCat')
    {
     $output= json_decode($this->file, true);
     newPixCatlist($output);

    }
    if($this->method=='PUT' && $this->endpoint=='newPicture')
    {
     $output= json_decode($this->file, true);
     newPicturelist($output);

    }
     if($this->method=='POST' && $this->endpoint=='newNews')
    {
     
     newNewslist($_POST);

    }

     if($this->method=='PUT' && $this->endpoint=='newOfficer')
    {
     $output= json_decode($this->file, true);
     newOfficerlist($output);

    }

    if($this->method=='PUT' && $this->endpoint=='editCalendarItem')
    {
     $output= json_decode($this->file, true);
     editCalendarItemlist($output);

    }
  
    if($this->method=='PUT' && $this->endpoint=='editMessage')
    {
     $output= json_decode($this->file, true);
     editMessagelist($output);

    }
     if($this->method=='PUT' && $this->endpoint=='editNews')
    {
     $output= json_decode($this->file, true);
     editNewslist($output);

    }
    if($this->method=='PUT' && $this->endpoint=='editPicture')
    {
     $output= json_decode($this->file, true);
     editPicturelist($output);

    } if($this->method=='PUT' && $this->endpoint=='editPixCat')
    {
     $output= json_decode($this->file, true);
     editPixCatlist($output);

    }
    if($this->method=='PUT' && $this->endpoint=='editOfficer')
    {
     $output= json_decode($this->file, true);
     editOfficerlist($output);

    }
      if($this->method=='PUT' && $this->endpoint=='deleteCalendarItem')
    {
     $output= json_decode($this->file, true);
     deleteCalendarItemlist($output);

    }
    if($this->method=='PUT' && $this->endpoint=='deleteMessage')
    {
     $output= json_decode($this->file, true);
     deleteMessagelist($output);

    }
     if($this->method=='PUT' && $this->endpoint=='deleteNews')
    {
     $output= json_decode($this->file, true);
     deleteNewslist($output);

    }
     if($this->method=='PUT' && $this->endpoint=='deletePicture')
    {
     $output= json_decode($this->file, true);
     deletePicturelist($output);

    }
     if($this->method=='PUT' && $this->endpoint=='deletePixCat')
    {
     $output= json_decode($this->file, true);
     deletePixCatlist($output);

    }
     if($this->method=='PUT' && $this->endpoint=='deleteOfficer')
    {
     $output= json_decode($this->file, true);
     deleteofficerlist($output);

    }
  	/*if (method_exists($this, $this->endpoint))
   { 
   	return $this->_response($this->{$this->endpoint
   	}($this->args));

    } return $this->_response("No Endpoint: $this->endpoint", 404);
     } 

     private function _response($data, $status = 200)
      { 
      	header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
       return json_encode($data);*/ 
   } 
   private function _cleanInputs($data) 
   { 
   	$clean_input = Array(); if (is_array($data)) 
   	{ foreach ($data as $k => $v) { $clean_input[$k] = $this->_cleanInputs($v);
   	 }
   	  } 
   	  else 
   	  	{
   	  	 $clean_input = trim(strip_tags($data)); 
   	  	} 
   	  	return $clean_input; 
   	  } 
   	  private function _requestStatus($code)
   	   {
   	    $status = array( 200 => 'OK', 404 => 'Not Found', 405 => 'Method Not Allowed', 500 => 'Internal Server Error', );
   	     return ($status[$code])?$status[$code]:$status[500];
   	      } 
        }
?>
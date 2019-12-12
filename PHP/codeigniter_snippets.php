//CODEIGNITER URI SEGMENT 
==========================
$this->uri->segment(4);



//GET SESSION VALUE 
==========================
$this->session->userdata('pid');



//redirect to page 
redirect(base_url()."cm/home/cms-view-pages");


//GET SINGLE ROW FIELD VALUE
$table_wallet = "wallet";
$old_amount = $this->db->query("SELECT * FROM {$table_wallet} WHERE pid = '$pid_user'")->row()->amount;


//PULL USER RECORD
$tablex = "users";
$query = $this->db->query("SELECT * FROM {$tablex} WHERE username = '$member_email'");
$group_user_records = $query->result_array(); //Generate Database result in array


//CHECK IF RECORD ALREADY EXISTS
$tablex3 = "wallet";
$query3 = $this->db->query("SELECT * FROM {$tablex3} WHERE pid ='$pid_user'"); //Query Database
if($query3->num_rows() == 1)
{
//DO ACTION
}

//form
<?php echo form_open_multipart(base_url().'ne/functionx');?>


//MULTIDIMENSIONAL ARRAY//
//========================

$data2 = array(     
		'admin'=>$this->session->userdata('pid'),
		'admin_last'=>$this->session->userdata('pid'),
		'status'=>"pending",
		'date_updated'=>time()
		); 


$data = array(
		'data2'=> $data2,
		'pid_supplier'=>$this->input->post('pid_supplier'),
		'status'=>"pending",
		'date_updated'=>time()
		); 

echo $data["data2"]["admin"];exit;


******CONTROLLER SECTION******
//CODEIGNITER FORM HEADER//
//============================================================
<?php echo form_open_multipart(base_url().'ps/bank-payment-procurement-and-shipping');?>
 <!-- FORM CONTENT -->
</form>


******MODEL SECTION******
//GET USER DETAILS
$table_users = "affiliates";
$query = $this->db->query("SELECT * FROM {$table_users} WHERE pid_user='$this->pid_userx'"); //Query Database
$data_user = $query->result_array(); //Generate Database result in array
$this->full_name = $data_user[0]['first_name']." ".$data_user[0]['last_name'];
$this->user_email = $data_user[0]['email'];




******CONTROLLER SECTION******
//alert message reporting with flashdata & Dismissable Alert//
//============================================================

$message = " Record was successfully saved";
$block = '
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>'.$message.'
</div>
';
//set flash data
$this->session->set_flashdata('message', $block);
//$this->session->flashdata('message'); //stores error message for view page



******VIEW SECTION******
<!-- ALERT MESSAGE -->
<?php echo $this->session->flashdata('message'); //stores error message ?>


<script>
	//ALERT DISPLAY TIMER / FADE-OUT (Place at the footer area section of the page)
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>






//UPDATE RECORD BLOCK WITH ALERT//
==================================
		//update record
		if($this->db->update('pay_supplier'))
		{
			//alert message reporting with flashdata
 			$message = " Action was successfully";
			$block = '
			<div class="alert alert-success" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Success!</strong>'.$message.'
			</div>
			';

			$this->session->set_flashdata('message', $block);
			//$this->session->flashdata('message'); //stores error message
			
			//redirect to page
        	redirect(base_url()."ps/home/pay-supplier-list/pending"); 
		}else{
			//alert message reporting with flashdata
 			$message = " Action was unsuccessfully";
			$block = '
			<div class="alert alert-danger" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Failed!</strong>'.$message.'
			</div>
			';

			$this->session->set_flashdata('message', $block);
			//$this->session->flashdata('message'); //stores error message
			
			//redirect to page
        	redirect(base_url()."ps/home/pay-supplier-list/pending"); 	
		}
		
		
		
		
		
		
//RECORD UPDATE//
=============================================

	public function bank_payment_approved_pay_supplier($data)  
    {   
		//Load database
		$this->load->database();
		 
		$this->db->set($data["data2"]);
        $this->db->where('pid_supplier', $data["pid_supplier"]);
		 
		
		//update record
		if($this->db->update('pay_supplier'))
		{
			//alert message reporting with flashdata
 			$message = " Action was successfully";
			$block = '
			<div class="alert alert-success" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Success!</strong>'.$message.'
			</div>
			';

			$this->session->set_flashdata('message', $block);
			//$this->session->flashdata('message'); //stores error message
			
			//redirect to page
        	redirect(base_url()."ps/home/pay-supplier-list/pending"); 
		}else{
			//alert message reporting with flashdata
 			$message = " Action was unsuccessfully";
			$block = '
			<div class="alert alert-danger" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Failed!</strong>'.$message.'
			</div>
			';

			$this->session->set_flashdata('message', $block);
			//$this->session->flashdata('message'); //stores error message
			
			//redirect to page
        	redirect(base_url()."ps/home/pay-supplier-list/pending"); 	
		}
		
		 
	}		
	
	
	
// EDIT CMS RECORD
============================

********CONTROLLER SECTION********
//this array is used to get fetch data from form view page.  
        	$data["update_data"] = array(  
						'title'=>$this->security->xss_clean($this->input->post('title')),
						'content'=>$this->security->xss_clean($this->input->post('content')),
						'video_id'=>$this->security->xss_clean($this->input->post('video_id')),
						'admin' => $this->security->xss_clean($this->session->userdata('pid')),
                        'date' => time()
						);    
			 $data["pid_cms"] = $this->security->xss_clean($this->input->post('pid_cms'));
			//print_r($data);exit();
			
			
**********MODEL SECTION**************
	// EDIT CMS RECORD
	public function cms_edit_pages($data)  
    {  
		//Load database
		$this->load->database();

		$this->db->set($data["update_data"]);
        $this->db->where('pid_cms', $data["pid_cms"]);
		
		if($this->db->update('cms')){
			
			$message = " Record was successfully saved";
			$block = '
			<div class="alert alert-success" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Success!</strong>'.$message.'
			</div>
			';
			//set flash data
			$this->session->set_flashdata('message', $block);
			
		//redirect to page 
        redirect(base_url()."cm/home/cms-view-pages"); 
		}
	}
	
	
	
	
	
	
	
USING LIBARIES IN CODEIGNITER
==============================
	
	//Create a class in the library folder 
	
	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_library extends CI_Model {

		//DECLARE ARRAY VARIABLE PROTECTED
		protected $params;
	
	
	
		//CONSTRUCTOR
		public function __construct($params)
        {
            // Do something with $params
			$this->params = $params;
        }
	 
	
	
		//ACCOUNT TOTAL CREDIT BALANCE
        public function credit_balance()
        {
			//credit balance
			$total_credit = $this->my_library->total_credit();
			
			//return balance
			return $total_balance;
        } 
		
			//ACCOUNT TOTAL CREDIT
        public function total_credit()
        {
			
			//Load database
			$this->load->database();
			
			$data = $this->params;
			
			//ASSIGN ARRAY VALUES
			$table_tx = $data["table"];
			$pid_user = $data["pid_user"];
			$pid_account = $data["pid_account"];
			
			$query_credit = $this->db->query("SELECT * FROM {$table_tx} WHERE pid_account ='$pid_account' AND pid_user = '$pid_user' AND transaction_type = 'CREDIT'");
			
			//CREDIT CALCULATIONS
			$a = array();//declare array
			$a[] = 0;//initialize array	
			$tx_credit = $query_credit->result_array(); 
			foreach ($tx_credit as $col1): 
					 $total1 = $col1['amount'];
					 $a[] = $total1;						
			endforeach;                           
			$total_credit = array_sum($a);//sum up array
			
			return $total_credit;
        } 
	}
	
	
	
	
	//Pass variables through a custom class via library an get result back from the class after processing
	========================================================================================================
		//1-ACCOUNT BALANCE CALCULATION (FROM-account A)
		$params_from = array(
						'table' => $table_tx, 
						'pid_user' => $this->pid_userx,
						'pid_account' => $pid_account_from
					   );
		$this->load->library('account_balance', $params_from);
		//account result
		$total_balance_from = $this->account_balance->credit_balance();
		$total_credit_from = $this->account_balance->total_credit();
		$total_debit_from = $this->account_balance->total_debit();
		
		
		
	Total sum of record 
	============================================
	$table_tx = "table_name";
	$query_credit = $this->db->query("SELECT * FROM {$table_tx} WHERE pid_account ='$pid_account' AND pid_user = '$pid_user' AND transaction_type = 'CREDIT'");
			
	//CREDIT CALCULATIONS
	$a = array();//declare array
	$a[] = 0;//initialize array	
	$tx_credit = $query_credit->result_array(); 
	foreach ($tx_credit as $col1): 
			 $total1 = $col1['amount'];
			 $a[] = $total1;						
	endforeach;                           
	$total_credit = array_sum($a);//sum up array
	
	
	
	
	<!-- LOOPING BLOCK -->	
	<?php //foreach ($category_records as $value): ?>
					<?php echo $value["username"]; ?>
					<?php include('components/card-list-block.php'); ?>				
	<?php //endforeach; ?>		
		
	
	
	
	//SQL SEARCH Query
	    $query = "SELECT * FROM {$tablex} WHERE {$search_by} like '%" . $aKeyword[0] . "%'";
		   for($i = 1; $i < count($aKeyword); $i++) 
			   {
				if(!empty($aKeyword[$i])) 
					{
						$query .= " OR username like '%" . $aKeyword[$i] . "%'";
						$query .= " OR first_name like '%" . $aKeyword[$i] . "%'";
						$query .= " OR last_name like '%" . $aKeyword[$i] . "%'";
					}
			   }
		$query = $this->db->query($query);
		
		
		
		
**************XSS SECURITIY****************

$username = $this->security->xss_clean(addslashes($this->input->post('username')));

$this->security->xss_clean(DATA-FOR-CLEANING)
$password = mysqli_real_escape_string($password);



**************READ MULTIPLE RECORD****************
//READ RECORDS (MULTIPLE RECORDS)
   public function read_faq_questions_records(){

	   	//Load database
		$this->load->database();
	   
	    //Assign SQL Variable Parameters Variables
	    $tablex = "faq";
	     
	    //SQL Query
	    $query = $this->db->query("SELECT * FROM {$tablex}"); 
	   
	    //Render records into array format
		$data = $query->result_array(); //Generate Database result in array
		return $data;
	}
	

**************READ SINGLE RECORDS ****************
 //READ RECORD (SINGLE RECORD)
   public function read_faq_questions_record(){

	   	//Load database
		$this->load->database();
	   
	    //Assign SQL Variable Parameters Variables
		$uri_value = $this->uri->segment(4);
	    $tablex = "faq";
	     
	    //SQL Query
	    $query = $this->db->query("SELECT * FROM {$tablex} WHERE pid_cms = '$uri_value'"); 
	   
	    //Render records into array format
		$data = $query->result_array(); //Generate Database result in array
		return $data;
	}






************** ACCESS LEVEL 2 **************
<!-- ########## ACCESS LEVEL START BLOCK ########## -->
<?php 
$accessx = $this->session->userdata('authorization_level');

////////// DENY ACCESS //////////
$d0 = "X"; $d1 = "L2"; $d2 = "L3"; $d3 = "x";

if($accessx == $d0 || $accessx == $d1 || $accessx == $d2 || $accessx == $d3){}
else{
?>
<!-- ########## ACCESS LEVEL START BLOCK ########## -->	


 
...Secured content goes here...	



<!-- ########## ACCESS LEVEL END BLOCK ########## -->
<?php } ?>
<!-- ########## ACCESS LEVEL END BLOCK ########## -->	











************** ACCESS LEVEL 2 **************

<!-- ########## ACCESS LEVEL START BLOCK ########## -->
<?php 
$accessx = $this->session->userdata('authorization_level');
////////// GRANT ACCESS //////////
$g0 = "L0"; $g1 = "x"; $g2 = "x"; $g3 = "x";

////////// DENY ACCESS //////////
$d0 = "L1"; $d1 = "L2"; $d2 = "L3"; $d3 = "x";

if($accessx == $d0 || $accessx == $d1 || $accessx == $d2 || $accessx == $d3){}
else{
if($accessx == $g0 || $accessx == $g1 || $accessx == $g2 || $accessx == $g3){
?>
<!-- ########## ACCESS LEVEL START BLOCK ########## -->	
 

			 
...Secured content goes here...	 



<!-- ########## ACCESS LEVEL END BLOCK ########## -->
<?php }} ?>
<!-- ########## ACCESS LEVEL END BLOCK ########## -->







************** PASSWORD HASHING **************
<?php
/**
 * We just want to hash our password using the current DEFAULT algorithm.
 * This is presently BCRYPT, and will produce a 60 character result.
 *
 * Beware that DEFAULT may change over time, so you would want to prepare
 * By allowing your storage to expand past 60 characters (255 would be good)
 */
echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
?>


	



************** PAGE REDIRECT **************
<?php
//REDIRECT TO MAIN HOME PAGE
function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

Redirect('https://www.naijaecards.com/ne/home/cards', false);

?>
	
	
************** LOAD USERS SPECIFIC DATA **************
<!--LOAD USERS DATA-->
	<?php foreach ($users_records as $value2): ?>
		<?php if($value2['pid_user'] == $value['pid_user']){?> 
				<?= $value2['first_name']; ?> <?= $value2['last_name']; ?>
		<?php } ?>	
	<?php  endforeach; ?> 	
	
	
	
************** COUNT NUMBER OF ROWS IN A RECORD **************
<!--LOAD USERS DATA-->	
<?php  $users_count=0; ?>
	<?php foreach ($users_records as $value5): ?>
			<?php if(($value5['ref_id'] == $affiliate_id)){?>								<?php $users_count = $users_count + 1; ?>		
			<?php } ?>	
	<?php  endforeach; ?>
<?php echo number_format($users_count); ?>	
	
	

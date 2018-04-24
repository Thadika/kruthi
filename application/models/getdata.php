<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
class getdata extends CI_Model
{
	
	
	function search_purchases_by_date($pagination_data,$q){
		$income_date = $q;
		
		if($income_date==1){
			//Today
			
	
			$query        = $this->db->query("Select books.name_en as bookname_en, users.first_name as user_name , purchases.device_id,purchases.payment_ref,purchases.msisdn,purchases.amount,purchases.net_amount,purchases.fee, DATE_FORMAT(purchases.date, '%Y-%m-%d'),purchases.date ,purchases.id from ((purchases INNER join books on purchases.book_id =books.id ) INNER join users on purchases.user_id =users.id ) where DATE_FORMAT(purchases.date, '%Y-%m-%d') = CURDATE()
			ORDER BY `purchases`.`id` DESC  ");
			
			//row convating to tmd fromat and also chaking CURDATE()
		}elseif($income_date==2){
			
			$query        = $this->db->query("Select books.name_en as bookname_en, users.first_name as user_name , purchases.device_id,purchases.payment_ref,purchases.msisdn,purchases.amount,purchases.net_amount,purchases.fee, DATE_FORMAT(purchases.date, '%Y-%m-%d'),purchases.date ,purchases.id from ((purchases INNER join books on purchases.book_id =books.id ) INNER join users on purchases.user_id =users.id ) where purchases.date >= CURDATE() - INTERVAL 1 DAY
  AND purchases.date < CURDATE()
			ORDER BY `purchases`.`id` ASC ");//
			
		}elseif($income_date==3){
			//Last 7 days
			
			$query        = $this->db->query("Select books.name_en as bookname_en, users.first_name as user_name , purchases.device_id,purchases.payment_ref,purchases.msisdn,purchases.amount,purchases.net_amount,purchases.fee, DATE_FORMAT(purchases.date, '%Y-%m-%d'),purchases.date ,purchases.id from ((purchases INNER join books on purchases.book_id =books.id ) INNER join users on purchases.user_id =users.id ) WHERE purchases.date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
			ORDER BY `purchases`.`id` ASC ");
		}elseif($income_date==4){
			//Last 30 days
			
			$query        = $this->db->query("Select books.name_en as bookname_en, users.first_name as user_name , purchases.device_id,purchases.payment_ref,purchases.msisdn,purchases.amount,purchases.net_amount,purchases.fee, DATE_FORMAT(purchases.date, '%Y-%m-%d'),purchases.date ,purchases.id from ((purchases INNER join books on purchases.book_id =books.id ) INNER join users on purchases.user_id =users.id ) WHERE purchases.date >= curdate() - INTERVAL DAYOFWEEK(curdate())+30 DAY
			ORDER BY `purchases`.`id` ASC ");
		}elseif($income_date==5){
			//This month
			
				$query        = $this->db->query("Select books.name_en as bookname_en, users.first_name as user_name , purchases.device_id,purchases.payment_ref,purchases.msisdn,purchases.amount,purchases.net_amount,purchases.fee,purchases.date ,purchases.id from ((purchases INNER join books on purchases.book_id =books.id ) INNER join users on purchases.user_id =users.id ) WHERE YEAR(purchases.date ) = YEAR(NOW()) AND MONTH(purchases.date )=MONTH(NOW())
			ORDER BY `purchases`.`id` ASC  ");
			
		}elseif($income_date==6){
			//Last month
			$query        = $this->db->query("Select books.name_en as bookname_en, users.first_name as user_name , purchases.device_id,purchases.payment_ref,purchases.msisdn,purchases.amount,purchases.net_amount,purchases.fee,purchases.date ,purchases.id from ((purchases INNER join books on purchases.book_id =books.id ) INNER join users on purchases.user_id =users.id ) WHERE YEAR(purchases.date ) = YEAR(NOW()) AND MONTH(purchases.date )=MONTH(NOW())-1
			ORDER BY `purchases`.`id` ASC  ");
		}elseif($income_date==7){
			//This year
			$query        = $this->db->query("Select books.name_en as bookname_en, users.first_name as user_name , purchases.device_id,purchases.payment_ref,purchases.msisdn,purchases.amount,purchases.net_amount,purchases.fee,purchases.date ,purchases.id from ((purchases INNER join books on purchases.book_id =books.id ) INNER join users on purchases.user_id =users.id ) WHERE YEAR(purchases.date ) = YEAR(NOW())
			ORDER BY `purchases`.`id` ASC ");
		}else{
			
			$query   = $this->db->query("Select books.name_en as bookname_en, users.first_name as user_name , purchases.device_id,purchases.payment_ref,purchases.msisdn,purchases.amount,purchases.net_amount,purchases.fee,purchases.date ,purchases.id from ((purchases INNER join books on purchases.book_id =books.id ) INNER join users on purchases.user_id =users.id ) 
			ORDER BY `purchases`.`id` ASC ");
		}
		
		
	
		
		$tableCollect = array();
		foreach ($query->result() as $row) {
		$tableData           		 = array();
		$tableData['id']      		 = $row->id;
		$tableData['bookname_en']    = $row->bookname_en;
		$tableData['user_name']    	 = $row->user_name;
		$tableData['device_id']      = $row->device_id;
		$tableData['payment_ref']    = $row->payment_ref;
		$tableData['msisdn']    	 = $row->msisdn;
		$tableData['amount']    	 = $row->amount;
		$tableData['net_amount']     = $row->net_amount;
		$tableData['fee']    	 	 = $row->fee;
		$tableData['date']    	 	 = $row->date;
		
		
		array_push($tableCollect, $tableData);
		}
			return $tableCollect;
		
		
		
		
		
		
	}
	
	
	
	
	function search_purchases($q){
		
		
		
		$query        = $this->db->query("Select books.name_en as bookname_en, users.first_name as user_name , purchases.device_id,purchases.payment_ref,purchases.msisdn,purchases.amount,purchases.net_amount,purchases.fee,purchases.date ,purchases.id from ((purchases INNER join books on purchases.book_id =books.id ) INNER join users on purchases.user_id =users.id ) where books.name_en LIKE '$q%'
		ORDER BY `purchases`.`id` DESC LIMIT 10 ");
		
		$tableCollect = array();
		foreach ($query->result() as $row) {
		$tableData           		 = array();
		$tableData['id']      		 = $row->id;
		$tableData['bookname_en']    = $row->bookname_en;
		$tableData['user_name']    	 = $row->user_name;
		$tableData['device_id']      = $row->device_id;
		$tableData['payment_ref']    = $row->payment_ref;
		$tableData['msisdn']    	 = $row->msisdn;
		$tableData['amount']    	 = $row->amount;
		$tableData['net_amount']     = $row->net_amount;
		$tableData['fee']    	 	 = $row->fee;
		$tableData['date']    	 	 = $row->date;
		
		
		array_push($tableCollect, $tableData);
		}
			return $tableCollect;
		
		
		
		
		
	}
	
	function search_books($q){
		
		$query        = $this->db->query("(Select books.id as book_id ,books.name_en as bookname_en,books.name_si as bookname_si, books.name_ta as bookname_ta ,  books.cover_photo, books.price,books.pdf_file_name as pdfbook,books.encrypted_file_name as encryptedfile , categories.name_en as cat_name_en ,categories.id as cat_id, publishers.name_en as publishers_name, publishers.id as publishers_id from ((books INNER join categories on books.cat_id =categories.id ) INNER join publishers on books.publisher_id =publishers.id )
		where books.name_en LIKE '$q%' ORDER BY `books`.`id` DESC LIMIT 10)
		
		UNION
		
		(Select books.id as book_id ,books.name_en as bookname_en,books.name_si as bookname_si, books.name_ta as bookname_ta ,  books.cover_photo, books.price,books.pdf_file_name as pdfbook,books.encrypted_file_name as encryptedfile , categories.name_en as cat_name_en ,categories.id as cat_id, publishers.name_en as publishers_name, publishers.id as publishers_id from ((books INNER join categories on books.cat_id =categories.id ) INNER join publishers on books.publisher_id =publishers.id )
		where categories.name_en LIKE '$q%' ORDER BY `books`.`id` DESC LIMIT 10)
		
		
		
		");
		
		$tableCollect = array();
		foreach ($query->result() as $row) {
		$tableData           		 	= array();
		$tableData['id']      		 	= $row->book_id;
		$tableData['name_en']    	 	= $row->bookname_en;
		$tableData['name_si']    	 	= $row->bookname_si;
		$tableData['name_ta']    	 	= $row->bookname_ta;
		$tableData['cover_photo']    	= $row->cover_photo;
		$tableData['price']   		 	= $row->price;	
		$tableData['publishers_id']   	= $row->publishers_id;	
		$tableData['cat_id']   			= $row->cat_id;
		$tableData['publishers_name']   = $row->publishers_name;	
		$tableData['cat_name_en']   	= $row->cat_name_en;
		$tableData['pdfbook']   		= $row->pdfbook;	
		$tableData['encryptedfile']   	= $row->encryptedfile;
		
		array_push($tableCollect, $tableData);
		}
			return $tableCollect;
	}
		
	function allbook($pagination_data)
	{
		
		
		$query        = $this->db->query('Select books.id as book_id ,books.name_en as bookname_en,books.name_si as bookname_si, books.name_ta as bookname_ta ,  books.cover_photo, books.price,books.pdf_file_name as pdfbook,books.encrypted_file_name as encryptedfile , categories.name_en as cat_name_en ,categories.id as cat_id, publishers.name_en as publishers_name, publishers.id as publishers_id from ((books INNER join categories on books.cat_id =categories.id ) INNER join publishers on books.publisher_id =publishers.id )
		ORDER BY `books`.`id` DESC LIMIT ' . $pagination_data['limit'].' OFFSET '. $pagination_data['offset']);
		$tableCollect = array();
		foreach ($query->result() as $row) {
		$tableData           		 	= array();
		$tableData['id']      		 	= $row->book_id;
		$tableData['name_en']    	 	= $row->bookname_en;
		$tableData['name_si']    	 	= $row->bookname_si;
		$tableData['name_ta']    	 	= $row->bookname_ta;
		$tableData['cover_photo']    	= $row->cover_photo;
		$tableData['price']   		 	= $row->price;	
		$tableData['publishers_id']   	= $row->publishers_id;	
		$tableData['cat_id']   			= $row->cat_id;
		$tableData['publishers_name']   = $row->publishers_name;	
		$tableData['cat_name_en']   	= $row->cat_name_en;
		$tableData['pdfbook']   		= $row->pdfbook;	
		$tableData['encryptedfile']   	= $row->encryptedfile;
		
		array_push($tableCollect, $tableData);
		}
			return $tableCollect;
    }
	
	
	
	
	
	function purchases($pagination_data){
		
		
		$query        = $this->db->query('Select books.name_en as bookname_en, users.first_name as user_name , purchases.device_id,purchases.payment_ref,purchases.msisdn,purchases.amount,purchases.net_amount,purchases.fee,purchases.date ,purchases.id from ((purchases INNER join books on purchases.book_id =books.id ) INNER join users on purchases.user_id =users.id )
		ORDER BY `purchases`.`id` DESC LIMIT ' . $pagination_data['limit'].' OFFSET '. $pagination_data['offset']);
		
		$tableCollect = array();
		foreach ($query->result() as $row) {
		$tableData           		 = array();
		$tableData['id']      		 = $row->id;
		$tableData['bookname_en']    = $row->bookname_en;
		$tableData['user_name']    	 = $row->user_name;
		$tableData['device_id']      = $row->device_id;
		$tableData['payment_ref']    = $row->payment_ref;
		$tableData['msisdn']    	 = $row->msisdn;
		$tableData['amount']    	 = $row->amount;
		$tableData['net_amount']     = $row->net_amount;
		$tableData['fee']    	 	 = $row->fee;
		$tableData['date']    	 	 = $row->date;
		
		
		array_push($tableCollect, $tableData);
		}
			return $tableCollect;
		
		
		
	}
	
	
	
	function addbook()
	{
			$name_en 			= $_POST['name_en'];
			$name_si 			= $_POST['name_si'];
			$name_ta 			= $_POST['name_ta'];
			$price 				= $_POST['price'];
			$publishers 		= $_POST['pub_id'];
			$categories 		= $_POST['cat_id'];
		
		//cover image
			$config['upload_path']          = './assest/uploads/cover/';
			$config['allowed_types']        = 'jpg|png';
			$file_path_cover 				="cover".time();
			$config['file_name']            = $file_path_cover;
			$this->load->library('upload', $config);
			
		
			if ( ! $this->upload->do_upload('cover_photo'))
			{
				$error = array('error' => $this->upload->display_errors());
				$scess_cover_data=false;
				
			}
			else
			{
				
				$scess_cover_data=true;
				$data =  $this->upload->data();
				$cover_name =$data['file_name'];
				//print_r($cover_name);
				
			}
		
		
		//PDF BOOK
		
			$config3['upload_path']          = './assest/uploads/pdf/';
			$config3['allowed_types']        = 'pdf';
			$file_path_pdf_data="pdf".time();
			$config3['file_name']           = $file_path_pdf_data;
			
			$this->upload->initialize($config3);
		
		if ( ! $this->upload->do_upload('pdfbook'))
		{
			$error = array('error' => $this->upload->display_errors());
			$scess_encrypt_data=false;
			
			print_r($error);
			
		}
			else
			{
				$scess_encrypt_data=true;
				$data =  $this->upload->data();
				$pdf_name =$data['file_name'];
				
				
				
			}
		
		//encrypt book
		
			$config3['upload_path']          = './assest/uploads/data_encrypt/';
			$config3['allowed_types']        = '*';
			$file_path_encrypt_data="encrypt".time();
			$config3['file_name']           = $file_path_encrypt_data;
			
			$this->upload->initialize($config3);
		
		if ( ! $this->upload->do_upload('encryptbook'))
		{
			$error = array('error' => $this->upload->display_errors());
			$scess_encrypt_data=false;
			
		}
			else
			{
				$scess_encrypt_data=true;
				$data =  $this->upload->data();
				$encrypt_name =$data['file_name'];
				
				
			}
		
		
				$data = array(
				'cover_photo'			=> $cover_name,
				'encrypted_file_name'	=> $encrypt_name,
				'pdf_file_name'			=> $pdf_name,
        		'name_en' 				=> $name_en,
        		'name_si' 				=> $name_si,
				'name_ta' 				=> $name_ta,
        		'price' 				=> $price,
				'publisher_id' 			=> $publishers,
        		'cat_id' 				=> $categories
        		
				
							 );

				$this->db->insert('books', $data);
			

				
	}
	
	
	
	function categories(){
		
		$query        = $this->db->query('SELECT id, name_en FROM categories');
		$tableCollect = array();
		foreach ($query->result() as $row) {
		$tableData           		 	= array();
		$tableData['id']      		= $row->id;
		$tableData['name_en']    	= $row->name_en;
		
		array_push($tableCollect, $tableData);
		}
			return $tableCollect;
		
		
	}
	
	function publishers(){
		
		$query        = $this->db->query('SELECT id, name_en FROM publishers');
		$tableCollect = array();
		foreach ($query->result() as $row) {
		$tableData           		 	= array();
		$tableData['id']      		= $row->id;
		$tableData['name_en']    	= $row->name_en;
		
		array_push($tableCollect, $tableData);
		}
			return $tableCollect;
		
		
	}
	
function updatebookfile(){
	
			$bookid 			= $_POST['edit_file_id'];
			$name_en 			= $_POST['name_en'];
			$name_si 			= $_POST['name_si'];
			$name_ta 			= $_POST['name_ta'];
			$price 				= $_POST['price'];
			$publishers 		= $_POST['publishers_id'];
			$categories 		= $_POST['cat_id'];
	
	
			$data=array(
				'name_en'=>$name_en,
				'name_si'=>$name_si,
				'name_ta'=>$name_ta,
				'price'=>$price,
				'publisher_id'=>$publishers,
				'cat_id'=>$categories,
				
			);
	
			$this->db->where('id',$bookid);
			$this->db->update('books',$data);
	
	//cover image
			try{
			$config['upload_path']          = './assest/uploads/cover/';
			$config['allowed_types']        = 'jpg|png';
			$file_path_cover 				="cover".time();
			$config['file_name']            = $file_path_cover;
			$this->load->library('upload', $config);
			
		
	
			if ( ! $this->upload->do_upload('cover_photo'))
			{
				$error = array('error' => $this->upload->display_errors());
				$scess_cover_data=false;
				
			}
			else
			{
				
				$scess_cover_data=true;
				$data =  $this->upload->data();
				$cover_name =$data['file_name'];
				//print_r($cover_name);
				
				$this->db->where('id',$bookid);
				$this->db->update('books',array( 'cover_photo' =>$cover_name));
				
			}
			}catch(Exception $e){$scess_cover_data=false;
				}
		
		
		//PDF BOOK
			try{
			$config3['upload_path']          = './assest/uploads/pdf/';
			$config3['allowed_types']        = 'pdf';
			$file_path_pdf_data="pdf".time();
			$config3['file_name']           = $file_path_pdf_data;
			
			$this->upload->initialize($config3);
		
		if ( ! $this->upload->do_upload('pdfbook'))
		{
			$error = array('error' => $this->upload->display_errors());
			$scess_pdf_data=false;
			
			print_r($error);
			
		}
			else
			{
				$scess_pdf_data=true;
				$data =  $this->upload->data();
				$pdf_name =$data['file_name'];
				
				$this->db->where('id',$bookid);
				$this->db->update('books',array( 'pdf_file_name' =>$pdf_name));
				
				
				
			}
		}catch(Exception $e){$scess_pdf_data=false;}
		//encrypt book
		try{
			$config3['upload_path']          = './assest/uploads/data_encrypt/';
			$config3['allowed_types']        = '*';
			$file_path_encrypt_data="encrypt".time();
			$config3['file_name']           = $file_path_encrypt_data;
			
			$this->upload->initialize($config3);
		
		if ( ! $this->upload->do_upload('encryptbook'))
		{
			$error = array('error' => $this->upload->display_errors());
			$scess_encrypt_data=false;
			
		}
			else
			{
				$scess_encrypt_data=true;
				$data =  $this->upload->data();
				$encrypt_name =$data['file_name'];
				
				$this->db->where('id',$bookid);
				$this->db->update('books',array( 'encrypted_file_name' =>$encrypt_name));
				
				
			}
			}catch(Exception $e){$scess_encrypt_data=false;}
		
	
	
	/*
		if($scess_cover_data){
			$data['cover_photo'] =$cover_name;
			
			
		}
		if($scess_pdf_data){
				$data['pdf_file_name'] =$pdf_name;
			}
		if($scess_encrypt_data){
				$data['encrypted_file_name'] =$encrypt_name;
			}*/
	
		
			
	

			
			
			
		
			
			
		}
	
	
	
	
	
	
}
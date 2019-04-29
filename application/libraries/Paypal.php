<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Paypal {
	
	public $CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	public function paypal_make_payment($invoicenumber, $price, $productname,$discount=0,$member_id,$applications_id=0,$payment_track_id=0,$advanceto='')
	{ 
			$order_id = str_replace("INV-", '', $invoicenumber);
			
			$this->CI->load->library('paypal_class');  
			$buyNow =  $this->CI->paypal_class;
			//$this->CI->paypal_class->testing();
			$buyNow->addVar('business','hardikbiz@2webdesign.com');	/* Payment Email */
			$buyNow->addVar('cmd','_xclick');
			$buyNow->addVar('cmd','_cart');
			$buyNow->addVar('upload','1');
			

			
			$buyNow->addVar('item_name_1',$productname);
			$buyNow->addVar('amount_1',$price);
			$buyNow->addVar('quantity_1','1');
                        if(!empty($applications_id) && empty($advanceto)){
                            $buyNow->addVar('return',urlencode($this->CI->config->site_url()) .'payment%2Fpaypalsuccess%2F'.$order_id.'%2F'.$member_id.'%2F'.$applications_id);
                        }else if(!empty($advanceto)){
                            $buyNow->addVar('return',urlencode($this->CI->config->site_url()) .'member%2Fadvanctosucces%2F'.$order_id.'%2F'.$member_id.'%2F'.$applications_id.'%2F'.$payment_track_id);
                        }
                        else{
                            $buyNow->addVar('return',urlencode($this->CI->config->site_url()) .'member%2Frenewsuccess%2F'.$order_id.'%2F'.$member_id.'%2F'.$payment_track_id);
                        }
			

			$buyNow->addVar('discount_amount_1',$discount);
			$buyNow->addVar('invoice',$invoicenumber);
//			$buyNow->addVar('tax_1',(round(round((($price-$discount)* 0.1),2),2)));			
			$buyNow->addVar('currency_code','CAD');		
			$buyNow->addVar('rm','2');			
			
			/* Paypal IPN URL - MUST BE URL ENCODED */
			$buyNow->addVar('notify_url',urlencode($this->CI->config->site_url()) .'ajax%2Fipn_validate');	
			Header("Location:".$buyNow->getLink());
			echo '<a href="'.$buyNow->getLink().'">Click Here if you are not redirected to paypal</a>';
	}
        
        public function paypal_make_payment_meeting($invoicenumber, $event_reg_id,$order_id,$gst=0)
	{
             $ticket_info=$this->CI->model_account->select_row('meeting_reg_tek',array('event_reg_id'=>$event_reg_id));

			//$order_id = str_replace("INV-", '', $invoicenumber);
                       
			$tot_gst=$gst/100;
			$this->CI->load->library('paypal_class');
			$buyNow =  $this->CI->paypal_class;
			//$this->CI->paypal_class->testing();
			$buyNow->addVar('business','hardikbiz@2webdesign.com');	/* Payment Email */
			$buyNow->addVar('cmd','_xclick');
			$buyNow->addVar('cmd','_cart');
			$buyNow->addVar('upload','1');
			
                        if(!empty($ticket_info)){
                            $i=1;
                            foreach($ticket_info as $list){
                                $ticket_dtls=$this->CI->model_account->selectOne('meeting_tickets',array('id'=>$list->ticketid));
                                //pre($ticket_dtls);
                                $buyNow->addVar('item_name_'.$i,$ticket_dtls->title);
                                $buyNow->addVar('amount_'.$i,$list->price);
                                $buyNow->addVar('quantity_'.$i,$list->noof_guest);
                                $i++;
                            }
                        }
			
//			$buyNow->addVar('item_name_1',$productname);
//			$buyNow->addVar('amount_1',$price);
//                        $buyNow->addVar('quantity_1',1);
            //$buyNow->addVar('coupon','soumya');

			$buyNow->addVar('return',urlencode($this->CI->config->site_url()) .'meetings%2Fsuccessregistration%2F'.$order_id );
			

			//$buyNow->addVar('discount_amount_1',$discount);
			$buyNow->addVar('invoice',$invoicenumber);
                        //$buyNow->addVar('tax_1',(round(round((($price)*$tot_gst),2),2)));
			$buyNow->addVar('currency_code','CAD');		
			$buyNow->addVar('rm','2');			
			//$buyNow->addVar('coupon','soumya');
			
			/* Paypal IPN URL - MUST BE URL ENCODED */
			$buyNow->addVar('notify_url',urlencode($this->CI->config->site_url()) .'ajax%2Fipn_validate');	
			Header("Location:".$buyNow->getLink());
			echo '<a href="'.$buyNow->getLink().'">Click Here if you are not redirected to paypal</a>';
	}
        public function paypal_make_payment_event($invoicenumber, $event_reg_id,$order_id,$gst=0)
	{
                      //echo $event_reg_id;
			//$order_id = str_replace("INV-", '', $invoicenumber);
                        $ticket_info=$this->CI->model_account->select_row('meeting_reg_tek',array('event_reg_id'=>$event_reg_id));
                        
			$tot_gst=$gst/100;
			$this->CI->load->library('paypal_class');
			$buyNow =  $this->CI->paypal_class;
			//$this->CI->paypal_class->testing();
			$buyNow->addVar('business','hardikbiz@2webdesign.com');	/* Payment Email */
			$buyNow->addVar('cmd','_xclick');
			$buyNow->addVar('cmd','_cart');
			$buyNow->addVar('upload','1');
                        if(!empty($ticket_info)){
                            $i=1;
                            foreach($ticket_info as $list){
                                $ticket_dtls=$this->CI->model_account->selectOne('meeting_tickets',array('id'=>$list->ticketid));
                                //pre($ticket_dtls);
                                $buyNow->addVar('item_name_'.$i,$ticket_dtls->title);
                                $buyNow->addVar('amount_'.$i,$list->price);
                                $buyNow->addVar('quantity_'.$i,$list->noof_guest);
                                $i++;
                            }
                        }
                        //exit;
//			$buyNow->addVar('item_name_1',$productname);
//			$buyNow->addVar('amount_1',$price);
//                        $buyNow->addVar('quantity_1',1);
//			$buyNow->addVar('item_name_2','aaa');
//			$buyNow->addVar('amount_2',100);
//                        $buyNow->addVar('quantity_2',5);
            //$buyNow->addVar('coupon','soumya');

			$buyNow->addVar('return',urlencode($this->CI->config->site_url()) .'events%2Fsuccessregistration%2F'.$order_id );
			

			//$buyNow->addVar('discount_amount_1',$discount);
			$buyNow->addVar('invoice',$invoicenumber);
                        //$buyNow->addVar('tax_1',(round(round((($price)*$tot_gst),2),2)));
                        //$buyNow->addVar('tax_rate',5);
			$buyNow->addVar('currency_code','CAD');		
			$buyNow->addVar('rm','2');			
			//$buyNow->addVar('coupon','soumya');
			
			/* Paypal IPN URL - MUST BE URL ENCODED */
			$buyNow->addVar('notify_url',urlencode($this->CI->config->site_url()) .'ajax%2Fipn_validate');	
			Header("Location:".$buyNow->getLink());
			echo '<a href="'.$buyNow->getLink().'">Click Here if you are not redirected to paypal</a>';
	}
        public function paypal_make_payment_member($invoicenumber, $event_reg_id,$order_id,$gst=0)
	{
                      #echo 'asasasaaaaaaaaaaaaa'; exit;
                        //$ticket_info=$this->CI->model_account->select_row('meeting_reg_tek',array('event_reg_id'=>$event_reg_id));
                        $cart_list=$this->CI->model_cart->select_row('cart',array('cart_id'=>$event_reg_id));
                        //pre($cart_list); exit;
			$tot_gst=$gst/100;
			$this->CI->load->library('paypal_class');
			$buyNow =  $this->CI->paypal_class;
			//$buyNow->addVar('business','hardikbiz@2webdesign.com');	/* Payment Email */
			$buyNow->addVar('business','admin@idseed.org');	/* Payment Email */
			$buyNow->addVar('cmd','_xclick');
			$buyNow->addVar('cmd','_cart');
			$buyNow->addVar('upload','1');
                        if(!empty($cart_list)){
                            $i=1;
                            foreach($cart_list as $list){
                                $ticket_dtls=$this->CI->model_cart->selectOne('membership',array('id'=>$list->pid));
                                $buyNow->addVar('item_name_'.$i,$ticket_dtls->title);
                                $buyNow->addVar('amount_'.$i,$ticket_dtls->price);
                                $buyNow->addVar('quantity_'.$i,$list->qty);
                                $i++;
                            }
                        }
                        //exit;
//			$buyNow->addVar('item_name_1',$productname);
//			$buyNow->addVar('amount_1',$price);
//                        $buyNow->addVar('quantity_1',1);
//			$buyNow->addVar('item_name_2','aaa');
//			$buyNow->addVar('amount_2',100);
//                        $buyNow->addVar('quantity_2',5);
            //$buyNow->addVar('coupon','soumya');

			$buyNow->addVar('return',urlencode($this->CI->config->site_url()) .'cart%2Fsuccesspayment%2F'.$order_id );
			

			//$buyNow->addVar('discount_amount_1',$discount);
			$buyNow->addVar('invoice',$invoicenumber);
                        //$buyNow->addVar('tax_1',(round(round((($price)*$tot_gst),2),2)));
                        //$buyNow->addVar('tax_rate',5);
			$buyNow->addVar('currency_code','CAD');		
			$buyNow->addVar('rm','2');			
			//$buyNow->addVar('coupon','soumya');
			
			/* Paypal IPN URL - MUST BE URL ENCODED */
			$buyNow->addVar('notify_url',urlencode($this->CI->config->site_url()) .'pages%2Fpayment_cancel');	
			Header("Location:".$buyNow->getLink());
			echo '<a href="'.$buyNow->getLink().'">Click Here if you are not redirected to paypal</a>';
	}
	public function generatepaypallink($invoicenumber, $price, $productname,$discount=0)
	{
	$order_id = str_replace("INV-", '', $invoicenumber);
				
			$this->CI->load->library('paypal_class');
			$buyNow =  $this->CI->paypal_class;
			//$this->CI->paypal_class->testing();
			$buyNow->addVar('business',PAYPAL_EMAIL_ADDRESS);	/* Payment Email */
			$buyNow->addVar('cmd','_xclick');
			$buyNow->addVar('cmd','_cart');
			$buyNow->addVar('upload','1');
			

			
			$buyNow->addVar('item_name_1',$productname);
			$buyNow->addVar('amount_1',$price);
			$buyNow->addVar('quantity_1','1');

			$buyNow->addVar('return',urlencode($this->CI->config->site_url()) .'quote%2Fprosesorder%2F'.$order_id );
			

			$buyNow->addVar('discount_amount_1',$discount);
			$buyNow->addVar('invoice',$invoicenumber);
			$buyNow->addVar('tax_1',(round(round((($price-$discount)* 0.1),2),2)));			
			$buyNow->addVar('currency_code','AUD');		
			$buyNow->addVar('rm','2');			
			
			/* Paypal IPN URL - MUST BE URL ENCODED */
			$buyNow->addVar('notify_url',urlencode($this->CI->config->site_url()) .'payment%2Fipn_validate');
			
			return $buyNow->getLink();

	}
	


}
?>

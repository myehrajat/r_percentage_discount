<?php
/**
 * @package RentIt_Percentage_Discount
 * @version 1.0
 */
/*
Plugin Name: RentIt Percentage Discount
Plugin URI: https://wordpress.org/plugins/hello-dolly/
Description: this can register new method to Rent_It_Class
Version: 1.0
Author URI: https://ma.tt/
Text Domain: RentIt_Percentage_Discount
*/
include_once( 'show_options.php' );
include_once( 'save_options.php' );

function RentIt_Percentage_Discount_return_price($product_id,$sale_cost,$base_price) {
	$percentage_discount = get_post_meta( $product_id, "_rentit_month_percentage_discount", true );
	//if(function_exists())
	//var_dump($_GET);
	
	//die;
	//RentIt_Date_Changer_jalali_to_gregorian_reserve_format();
	if(isset($_GET['gregorian_start_date'])){
		$start_date = $_GET['gregorian_start_date'];
	}elseif(isset($_POST['gregorian_dropin_date'])){
		$start_date = $_POST['gregorian_dropin_date'];
	}elseif($_SESSION['gregorian_dropin_date']){
		$start_date = $_SESSION['gregorian_dropin_date'];
	}else{
		$start_date = $_COOKIE['gregorian_dropin_date'];
	}
	
	if(isset($_GET['gregorian_end_date'])){
		$end_date = $_GET['gregorian_end_date'];
	}elseif(isset($_POST['gregorian_dropoff_date'])){
		$end_date = $_POST['gregorian_dropoff_date'];
	}elseif($_SESSION['gregorian_dropoff_date']){
		$end_date = $_SESSION['gregorian_dropoff_date'];
	}else{
		$end_date = $_COOKIE['gregorian_dropoff_date'];
	}
	$days = rentit_DateDiff( 'd', strtotime( $start_date ), strtotime( $end_date ) );
	$hour = rentit_DateDiff( 'h', strtotime( $start_date ), strtotime( $end_date ) );
	if($days>30){$days = 30;}//maximum of discount is for 30 days
	$per_day_discount = ( $percentage_discount / 29 ) * ( $days - 1 );
	if ( isset( $sale_cost {
			0
		} ) && $sale_cost < $base_price ) {
		$precise_price = $sale_cost - ( $sale_cost * $per_day_discount / 100 );

	} elseif ( isset( $base_price {
			0
		} ) ) {
		$precise_price = $base_price - ( $base_price * $per_day_discount / 100 );
	} else {
		$precise_price = 0;
	}
	$round_price = ceil( $precise_price / 10000 ) * 10000;
	if($round_price<0){
		$round_price = $round_price*(-1);
	}
	//var_dump($round_price);
	//apply_filters( 'raw_woocommerce_price', $round_price );
	return $round_price;
}
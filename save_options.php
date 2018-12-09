<?php

function RentIt_Percentage_Discount_save_options($post_id) {
	//var_dump( $_POST[ '_rentit_enable_month_percentage_discount' ] );
	//var_dump( $_POST[ '_rentit_month_percentage_discount' ] );
	//die;
	if ( isset( $_POST[ '_rentit_enable_month_percentage_discount' ] ) ) {
		update_post_meta( $post_id, '_rentit_enable_month_percentage_discount', wc_clean( $_POST[ '_rentit_enable_month_percentage_discount' ] ) );
	}
	if ( isset( $_POST[ '_rentit_month_percentage_discount' ] ) ) {
		update_post_meta( $post_id, '_rentit_month_percentage_discount', wc_clean( $_POST[ '_rentit_month_percentage_discount' ] ) );
	}
}
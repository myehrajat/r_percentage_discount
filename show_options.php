<?php
function RentIt_Percentage_Discount_show_options() {
	// I add this part to add month discount functionality its data saved on postmeta
	woocommerce_wp_checkbox( array(
		'id' => '_rentit_enable_month_percentage_discount',
		'label' => __( 'Enable Month Percentage Discount', 'rentit' ),
		'description' => __( 'Enable this cause upper part discount dont work and use the such discount mechanism.', 'rentit' ),
		'desc_tip' => true ) );

	woocommerce_wp_text_input(
		array(
			'id' => '_rentit_month_percentage_discount',
			'label' => esc_html__( 'Month Percentage Discount', "rentit" ),
			'data_type' => 'text',
			'desc_tip' => 'true',
			'description' => esc_html__( 'Month percentage discount used to make the price value lower until one month full', 'rentit' )
		)
	);
}
@extends('frontend.default.layouts.app')

@section('styles')
    <style>
        /* line 1, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area {
            display: grid;
            grid-template-columns: auto 825px;
        }

        @media only screen and (min-width: 991px) and (max-width: 1200px) {

            /* line 1, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
            .checkout_v3_area {
                grid-template-columns: auto 480px;
            }
        }

        @media only screen and (min-width: 1200px) and (max-width: 1440px) {

            /* line 1, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
            .checkout_v3_area {
                grid-template-columns: auto 580px;
            }
        }

        @media (max-width: 991px) {

            /* line 1, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
            .checkout_v3_area {
                display: block;
            }
        }

        /* line 13, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_inner {
            max-width: 810px;
        }

        @media (max-width: 991px) {

            /* line 13, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
            .checkout_v3_area .checkout_v3_inner {
                max-width: 100%;
            }
        }

        /* line 19, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left {
            padding: 80px 30px 100px 30px;
            background: #ffffff;
        }

        @media (max-width: 991px) {

            /* line 19, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
            .checkout_v3_area .checkout_v3_left {
                padding: 20px;
            }
        }

        /* line 26, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_head {
            background: #fafafa;
            display: flex;
            grid-gap: 15px;
            flex-wrap: wrap;
            border-top: 2px solid #fd0027;
            padding: 15px 30px;
            align-items: center;
            margin-bottom: 20px;
            border-radius: 0 0 3px 3px;
        }

        /* line 36, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_head i {
            font-size: 16px;
            color: #676e8b;
        }

        /* line 40, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_head p {
            font-size: 14px;
            font-weight: 500;
            color: #222222;
            margin-bottom: 0;
        }

        /* line 45, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_head p a {
            color: #fd0027;
        }

        /* line 50, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_head_title {
            background: #fafafa;
            border-radius: 3px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        /* line 55, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_head_title span {
            font-size: 14px;
            color: #222222;
            font-weight: 600;
            text-transform: uppercase;
            padding: 20px 30px;
        }

        @media (max-width: 575px) {

            /* line 55, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
            .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_head_title span {
                padding: 20px 18px;
            }
        }

        /* line 66, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checkout_shiped_box {
            border: 1px solid #eef0f4;
        }

        /* line 68, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checkout_shiped_box .checout_shiped_head {
            padding: 17px 30px;
            border-bottom: 1px solid #eef0f4;
        }

        /* line 71, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checkout_shiped_box .checout_shiped_head .package_text {
            font-size: 16px;
            color: #222222;
            font-weight: 600;
        }

        /* line 76, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checkout_shiped_box .checout_shiped_head p {
            margin-bottom: 0;
            display: flex;
            grid-gap: 10px;
            align-items: center;
        }

        /* line 81, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checkout_shiped_box .checout_shiped_head p .Shipped_text {
            font-size: 14px;
            font-weight: 400;
            color: #222222;
        }

        /* line 86, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checkout_shiped_box .checout_shiped_head p .name_text {
            font-size: 14px;
            font-weight: 500;
            color: #222222;
            text-transform: uppercase;
        }

        /* line 94, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checkout_shiped_box .delevery_box {
            background-color: #fafafa;
            border: 1px solid #2196f3;
            padding: 25px 25px 22px 25px;
            border-radius: 5px;
            display: flex;
            grid-gap: 15px;
            max-width: 336px;
            margin: 20px 30px;
        }

        /* line 103, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checkout_shiped_box .delevery_box .check_icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #2196f3;
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 20px 0 0;
        }

        /* line 115, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checkout_shiped_box .delevery_box .delevery_box_text h5 {
            font-size: 16px;
            font-weight: 400;
            color: #222222;
            margin-bottom: 0;
        }

        /* line 121, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checkout_shiped_box .delevery_box .delevery_box_text h4 {
            font-size: 14px;
            font-weight: 500;
            color: #8f8f8f;
            margin: 10px 0 2px 0;
        }

        /* line 127, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checkout_shiped_box .delevery_box .delevery_box_text p {
            font-size: 14px;
            color: #8f8f8f;
            font-weight: 400;
            margin-bottom: 0;
        }

        /* line 136, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products {
            display: flex;
            flex-direction: column;
            grid-gap: 10px;
            padding: 0 10px 10px 10px;
        }

        /* line 141, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product {
            border: 1px solid #eef0f4;
            padding: 20px;
            grid-gap: 40px;
            flex-wrap: wrap;
        }

        @media (max-width: 991px) {

            /* line 141, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
            .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product {
                grid-gap: 20px;
            }
        }

        /* line 149, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product .product_information {
            grid-gap: 20px;
        }

        /* line 151, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product .product_information .thumb {
            max-width: 100px;
        }

        /* line 153, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product .product_information .thumb img {
            width: 100%;
        }

        /* line 158, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product .product_information .product_content p {
            font-size: 16px;
            color: #222222;
            font-weight: 600;
            margin-bottom: 0px;
        }

        /* line 164, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product .product_information .product_content span {
            font-size: 14px;
            color: #8f8f8f;
            display: block;
            font-weight: 400;
        }

        /* line 172, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product .offer_prise {
            display: inline-flex;
            grid-gap: 10px;
        }

        /* line 175, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product .offer_prise .prise_offer {
            font-size: 14px;
            font-weight: 400;
            background: #29c489;
            color: #fff;
            display: inline-flex;
            border-radius: 3px;
            min-width: 52px;
            height: 25px;
            align-items: center;
            justify-content: center;
        }

        /* line 187, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product .offer_prise .prise {
            font-size: 16px;
            color: #8f8f8f;
            font-weight: 500;
            text-decoration: line-through;
        }

        /* line 195, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product .quentity span {
            font-size: 16px;
            font-weight: 500;
            color: #222222;
        }

        /* line 201, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product .total_prise {
            grid-gap: 10px;
        }

        /* line 203, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .checout_shiped_products .single_checkout_shiped_product .total_prise span {
            font-size: 16px;
            font-weight: 600;
            color: #222222;
        }

        /* line 211, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .shiping_address_box {
            border: 1px solid #eef0f4;
            padding: 60px;
            margin-top: 20px !important;
        }

        @media (max-width: 991px) {

            /* line 211, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
            .checkout_v3_area .checkout_v3_left .checkout_v3_inner .shiping_address_box {
                padding: 20px;
            }
        }

        /* line 218, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_left .checkout_v3_inner .shiping_address_box .billing_address .product_ceck {
            margin-top: 5px;
        }

        /* line 224, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_v3_area .checkout_v3_right {
            background-color: #f4f4f4;
        }

        /* line 229, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .check_v3_btns {
            grid-gap: 20px;
            padding-top: 5px;
        }

        /* line 232, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .check_v3_btns .return_text {
            font-size: 14px;
            color: #fd0027;
            text-transform: uppercase;
            font-weight: 600;
        }

        /* line 240, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .order_sumery_box {
            padding: 80px 0 60px 60px;
            max-width: 470px;
        }

        @media (max-width: 991px) {

            /* line 240, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
            .order_sumery_box {
                padding: 30px;
            }
        }

        @media (max-width: 991px) {

            /* line 240, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
            .order_sumery_box {
                max-width: 100%;
            }
        }

        @media only screen and (min-width: 991px) and (max-width: 1200px) {

            /* line 240, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
            .order_sumery_box {
                padding: 80px 0 30px 30px;
            }
        }

        /* line 254, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .order_sumery_box .subtotal_lists .single_total_list {
            margin-bottom: 20px;
        }

        /* line 257, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .order_sumery_box .subtotal_lists .single_total_list .single_total_left h4 {
            font-size: 16px;
            font-weight: 500;
            color: #222;
            margin-bottom: 0;
        }

        /* line 263, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .order_sumery_box .subtotal_lists .single_total_list .single_total_left p {
            font-size: 12px;
            font-weight: 400;
            color: #8f8f8f;
            text-transform: uppercase;
            margin-bottom: 0;
        }

        /* line 272, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .order_sumery_box .subtotal_lists .single_total_list .single_total_right span {
            font-size: 14px;
            font-weight: 400;
            color: #8f8f8f;
        }

        /* line 279, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .order_sumery_box .subtotal_lists .total_amount {
            border-top: 1px solid #d6d6d6;
            padding-top: 19px;
        }

        /* line 282, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .order_sumery_box .subtotal_lists .total_amount .total_text {
            font-size: 14px;
            font-weight: 600;
            color: #8f8f8f;
        }

        /* line 286, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .order_sumery_box .subtotal_lists .total_amount .total_text span {
            font-size: 20px;
            color: #222;
        }

        /* line 294, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .check_v3_title {
            font-size: 24px;
            font-weight: 600;
            color: #222;
        }

        /* line 299, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .check_v3_title2 {
            font-size: 20px;
            font-weight: 600;
            color: #222;
        }

        /* line 306, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .singleVendor_product_lists {
            border-bottom: 1px solid #d6d6d6;
            margin-bottom: 17px;
        }

        /* line 309, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .singleVendor_product_lists .singleVendor_product_list {
            grid-gap: 30px;
            margin-bottom: 20px;
        }

        /* line 313, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .singleVendor_product_lists .singleVendor_product_list .thumb img {
            width: 100%;
        }

        /* line 318, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .singleVendor_product_lists .singleVendor_product_list .product_list_content h4 {
            margin-bottom: 9px;
        }

        /* line 320, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .singleVendor_product_lists .singleVendor_product_list .product_list_content h4 a {
            font-size: 16px;
            font-weight: 500;
            color: #222;
        }

        /* line 324, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .singleVendor_product_lists .singleVendor_product_list .product_list_content h4 a:hover {
            color: #fd0027;
        }

        /* line 329, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .singleVendor_product_lists .singleVendor_product_list .product_list_content h5 {
            font-size: 16px;
            font-weight: 500;
            color: #fd0027;
            grid-gap: 15px;
            margin-bottom: 0;
        }

        /* line 335, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .singleVendor_product_lists .singleVendor_product_list .product_list_content h5 .product_count_text {
            font-size: 16px;
            font-weight: 500;
            color: #222;
        }

        /* line 339, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .singleVendor_product_lists .singleVendor_product_list .product_list_content h5 .product_count_text span {
            display: inline-block;
            font-size: 14px;
            color: #222;
            margin-left: 5px;
            position: relative;
            top: -1px;
        }

        /* line 353, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .Contact_sVendor_box {
            grid-gap: 20px;
        }

        /* line 355, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .Contact_sVendor_box .thumb {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        /* line 359, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .Contact_sVendor_box .thumb img {
            border-radius: 50%;
        }

        /* line 364, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .Contact_sVendor_box .Contact_sVendor_info h5 {
            font-size: 16px;
            font-weight: 500;
            color: #222;
            margin-bottom: 7px;
        }

        /* line 369, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .Contact_sVendor_box .Contact_sVendor_info h5 span {
            font-size: 14px;
        }

        /* line 373, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .Contact_sVendor_box .Contact_sVendor_info .logout_text {
            font-size: 14px;
            color: #fd0027;
            font-weight: 500;
        }

        /* line 377, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .Contact_sVendor_box .Contact_sVendor_info .logout_text:hover {
            text-decoration: underline;
        }

        /* line 384, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .shipingV3_info {
            border: 1px solid #e3e3e3;
            border-radius: 3px;
            padding: 0 30px;
        }

        /* line 388, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .shipingV3_info .single_shipingV3_info {
            padding: 18px 0;
            flex-wrap: wrap;
            grid-gap: 30px;
        }

        /* line 391, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .shipingV3_info .single_shipingV3_info:not(:last-child) {
            border-bottom: 1px solid #e3e3e3;
        }

        /* line 395, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .shipingV3_info .single_shipingV3_info span {
            font-size: 14px;
            font-weight: 500;
            color: #8f8f8f;
        }

        /* line 400, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .shipingV3_info .single_shipingV3_info h5 {
            font-size: 14px;
            font-weight: 500;
            color: #222;
            line-height: 1.71;
        }

        /* line 406, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .shipingV3_info .single_shipingV3_info .edit_info_text {
            font-size: 14px;
            font-weight: 500;
            color: #fd0027;
        }

        /* line 414, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .standard_shiping_box {
            border: 1px solid #e3e3e3;
            border-radius: 3px;
            padding: 11px 20px;
        }

        /* line 419, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .standard_shiping_box .product_ceck a {
            font-size: 14px;
            font-weight: 500;
            color: #8f8f8f;
        }

        /* line 425, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .standard_shiping_box span {
            font-size: 14px;
            font-weight: 500;
            color: #222;
        }

        /* line 432, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .shekout_subTitle_text {
            font-size: 14px;
            color: #8f8f8f;
            text-transform: capitalize;
            font-weight: 400;
        }

        /* line 439, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_acc_style1 {
            border: 1px solid #e3e3e3;
            border-radius: 3px;
        }

        /* line 444, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_acc_style1 .card {
            border-radius: 0;
            border: 0;
        }

        /* line 447, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_acc_style1 .card:not(:last-child) {
            border: 0;
            border-bottom: 1px solid #e3e3e3;
            background: #fff;
        }

        /* line 452, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_acc_style1 .card .card-header {
            padding: 0;
            background: #fff;
            border-radius: 0;
            border: 0 !important;
        }

        /* line 457, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_acc_style1 .card .card-header h5 {
            margin: 0;
            display: block;
        }

        /* line 460, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_acc_style1 .card .card-header h5 button {
            padding: 0;
            display: flex;
            grid-gap: 10px;
            width: 100%;
            padding: 13.5px 20px;
            text-decoration: none !important;
        }

        /* line 469, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_acc_style1 .card .card-header h5 button>span {
            font-size: 14px;
            font-weight: 500;
            color: #222;
        }

        /* line 477, G:/laragon/www/365-Cartgo/365-Cartgo/Cartgo/scss/_checkout_v3.scss */
        .checkout_acc_style1 .card .card-body {
            background: #fcfcfc;
            border-top: 1px solid #e3e3e3;
            padding: 20px 20px 3px 20px;
        }

        .single_thumb {
            height: 80px;
            width: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .single_thumb img {
            max-height: 100%;
            max-width: 100%;
            width: auto !important;
        }
        .cursor_pointer{
            cursor: pointer;
        }
        .input-group {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            width: 100%;
        }
        .form-control {
            border-radius: 0;
            height: 50px;
            margin-bottom: 17px;
            color: #8f8f8f;
            font-weight: 300;
        }
        .input_group_text {
            background-color: #ff0027;
            border-radius: 0;
            border: 1px solid transparent;
            color: #fff;
            font-size: 13px;
            text-transform: capitalize;
            font-weight: 500;
            padding: 13px 30px;
            cursor: pointer;
        }
    </style>
@endsection
@section('breadcrumb')
    {{ __('Customer Information') }}
@endsection
@section('content')
    @include('frontend.default.partials._breadcrumb')
    <div id="mainDiv">
        @include('frontend.default.partials._checkout_details')
    </div>

@endsection

@push('scripts')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                

                $(document).on('submit', '#mainOrderForm', function(event){

                    let is_submit = 0;
                    $('#error_term_check').text('');
                    $('#error_name').text('');
                    $('#error_address').text('');
                    $('#error_email').text('');
                    $('#error_phone').text('');
                    $('#error_country').text('');
                    $('#error_state').text('');
                    $('#error_city').text('');
                    if(!$('#term_check').is(":checked")){
                        is_submit = 1;
                        $('#error_term_check').text('Please Agree With Terms');
                    }
                    if($('#name').val() == ''){
                        is_submit = 1;
                        $('#error_name').text('This Field Is Required');
                    }
                    if($('#address').val() == ''){
                        is_submit = 1;
                        $('#error_address').text('This Field Is Required');
                    }
                    if($('#email').val() == ''){
                        is_submit = 1;
                        $('#error_email').text('This Field Is Required');
                    }
                    if($('#phone').val() == ''){
                        is_submit = 1;
                        $('#error_phone').text('This Field Is Required');
                    }
                    if($('#country').val() == ''){
                        is_submit = 1;
                        $('#error_country').text('This Field Is Required');
                    }
                    if($('#state').val() == ''){
                        is_submit = 1;
                        $('#error_state').text('This Field Is Required');
                    }
                    if($('#city').val() == ''){
                        is_submit = 1;
                        $('#error_city').text('This Field Is Required');
                    }
                    if(is_submit === 1){
                        event.preventDefault();
                    }else{

                    }
                });

                $(document).on('change', '#address_id', function(event) {
                    let data = {
                        _token:"{{csrf_token()}}",
                        id: $(this).val() 
                    }
                    $('#pre-loader').show();
                    $.post("{{route('frontend.checkout.address.shipping')}}",data, function(res){
                        $('#mainDiv').html(res.MainCheckout);
                        $('select').niceSelect();
                        $('#pre-loader').hide();
                    });
                });

                $(document).on('click', '.coupon_apply_btn', function(event){
                    event.preventDefault();
                    let total = $(this).data('total');
                    couponApply(total);
                });

                function couponApply(total){
                    let coupon_code = $('#coupon_code').val();
                    if(coupon_code){
                        $('#pre-loader').show();

                        let formData = new FormData();
                        formData.append('_token', "{{ csrf_token() }}");
                        formData.append('coupon_code', coupon_code);
                        formData.append('shopping_amount', total);
                        $.ajax({
                            url: '{{route('frontend.checkout.coupon-apply')}}',
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            success: function (response) {
                                if(response.error){
                                    toastr.error(response.error,'Error');
                                    $('#pre-loader').hide();
                                }else{
                                    $('#mainDiv').html(response.MainCheckout);
                                    toastr.success("{{__('defaultTheme.coupon_applied_successfully')}}","{{__('common.success')}}");
                                    $('#pre-loader').hide();
                                }
                            },
                            error: function (response) {
                                toastr.error(response.responseJSON.errors.coupon_code)
                                $('#pre-loader').hide();
                            }
                        });
                    }else{
                        toastr.error("{{__('defaultTheme.coupon_field_is_required')}}","{{__('common.error')}}");
                    }
                }
                $(document).on('click', '#coupon_delete', function(event){
                    event.preventDefault();
                    couponDelete();
                });

                function couponDelete(){
                    $('#pre-loader').show();
                    let base_url = $('#url').val();
                    let url = base_url + '/checkout/coupon-delete';
                    $.get(url, function(response) {
                        $('#mainDiv').html(response.MainCheckout);
                        $('#pre-loader').hide();
                        toastr.success("{{__('defaultTheme.coupon_deleted_successfully')}}","{{__('common.success')}}");
                    });
                }

                $(document).on('change', '#country', function(event) {
                    let country = $('#country').val();
                    $('#pre-loader').show();
                    if (country) {
                        let base_url = $('#url').val();
                        let url = base_url + '/seller/profile/get-state?country_id=' + country;

                        $('#state').empty();

                        $('#state').append(
                            `<option value="">Select from options</option>`
                        );
                        $('#state').niceSelect('update');
                        $('#city').empty();
                        $('#city').append(
                            `<option value="">Select from options</option>`
                        );
                        $('#city').niceSelect('update');
                        $.get(url, function(data) {

                            $.each(data, function(index, stateObj) {
                                $('#state').append('<option value="' + stateObj
                                    .id + '">' + stateObj.name + '</option>');
                            });

                            $('#state').niceSelect('update');
                            $('#pre-loader').hide();
                        });
                    }
                });

                $(document).on('change', '#state', function(event){
                    let state = $('#state').val();
                    $('#pre-loader').show();
                    if(state){
                        let base_url = $('#url').val();
                        let url = base_url + '/seller/profile/get-city?state_id=' +state;


                        $('#city').empty();
                        $('#city').append(
                            `<option value="">Select from options</option>`
                        );
                        $.get(url, function(data){

                            $.each(data, function(index, cityObj) {
                                $('#city').append('<option value="'+ cityObj.id +'">'+ cityObj.name +'</option>');
                            });

                            $('#city').niceSelect('update');
                            $('#pre-loader').hide();
                        });
                    }
                });
                
            });
        })(jQuery);
    </script>
@endpush

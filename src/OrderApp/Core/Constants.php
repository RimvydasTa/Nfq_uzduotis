<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.9.11
 * Time: 20.41
 */

namespace OrderApp\Core;


 class Constants {

        public static $firstNameLength = 'Error: First name must be between 2 and 50 characters';
        public static $lastNameLength = 'Error: Last name must be between 2 and 50 characters';
        public static $emailWrongFormat  = 'Error: Wrong email format';
        public static $badAddressFormat = 'Error: Bad address format, example address: 15 Gordon St, 3121 Cremorne, Australia';
        public static $badPhoneFormat = 'Error: Wrong phone format. Example format: +3706xxxxxxx (no spaces)';
        public static $badQuantityFormat = 'Error: Quantity must an integer';
        public static $quantityTooLow = 'Error: Quantity must 1 or higher';
    }
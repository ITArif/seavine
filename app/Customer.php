<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $table = 'customers';

   protected $fillable = [
        'project_name', 'address', 'application_date', 'application_id', 'no_of_land_share', 'total_price', 'booking_payment', 'registration_cost', 'total_amount', 'checque_no', 'branch', 'made_of_payment', 'name', 'date', 'phone', 'office', 'mobile', 'email', 'emergency_phone', 'full_name', 'father_name', 'mother_name', 'spouse_name', 'date_of_birth', 'religion', 'occupation', 'nid_no', 'etin_no', 'passport_no', 'mailing_address', 'road_villege', 'parmenat_address', 'area_thana', 'district', 'post_code', 'nominee', 'relation', 'image', 'nationality', 'owner_id_no', 'land_share', 'no_of_installment', 'installment_amount', 'money_recipt_no', 'installment_date', 'reference_id_no', 'dealing_offer_id', 'special_remark'
    ];
}

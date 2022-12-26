<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = ['company_id', 'description', 'address', 'email', 'phone1', 'phone2', 
    'phone3','logo_header', 'logo_footer', 'logo_footer2', 'logo_footer3','youtube', 'facebook', 'instagram', 'linkedin'];

    public function company()
    {
        return $this->belongsTo (Company::class);
    }
}

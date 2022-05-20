<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

    class Vendor extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'vendor';

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];



         public static function total_vendor()
    {
         $counts = Vendor::count('name');
          return $counts;
     }

        public function result()
        {
            return $this->belongsTo(ExtraFacility::class,'id','product_id');
        }



    }

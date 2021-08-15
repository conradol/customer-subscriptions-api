<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['email', 'name', 'birthdate', 'gender'];
    
    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}
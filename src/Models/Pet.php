<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pet';
    protected $fillable = ['subscription_id', 'name', 'weight', 'gender', 'lifestage'];
    
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
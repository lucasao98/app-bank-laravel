<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'tbl_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bank_branch',
        'bank_account',
        'bank_amount',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function hasAmount() {
        if($this->bank_amount >= 0) {
            return true;
        }
        return false;
    }

    public function addAmount($value_add) {
        $this->bank_amount += $value_add;
    }

    public function removeAmount($value_remove) {
        $this->bank_amount -= $value_remove;
    }
}

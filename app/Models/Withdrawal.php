<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $table = 'tbl_withdrawal';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'amount_transaction',
        'status_transaction',
        'receiver_id',
        'sender_id'
    ];

    public function receiver(){
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }
}

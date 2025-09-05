<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['id_barang','id_user','tanggal','tipe_transaksi','jumlah'];

    public function item() {
        return $this->belongsTo(Item::class, 'id_barang');
    }
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}

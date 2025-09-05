<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['nama', 'kode', 'stok', 'lokasi_rak'];

    public function transactions() {
        return $this->belongsTo(Item::class, 'id_barang');
    }
}

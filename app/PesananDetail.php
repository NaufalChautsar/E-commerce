<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PesananDetail extends Model
{
    use Notifiable;
    // protected $guarded = ['id'];
    protected $fillable = ['id'];

    public function barang()
    {
        return $this->belongsTo('App\Barang', 'barang_id', 'id');
    }

    public function pesanan()
    {
        return $this->belongsTo('App\Pesanan', 'pesanan_id', 'id');
    }
}

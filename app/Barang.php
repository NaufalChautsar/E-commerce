<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Barang extends Model
{
    use Notifiable;
    protected $guarded = ['id'];

    public function pesanan_detail()
    {
        return $this->hasMany('App\PesananDetail', 'barang_id', 'id');
    }
}

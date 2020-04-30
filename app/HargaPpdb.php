<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HargaPpdb extends Model
{
    public function fmtHarga()
    {
        return 'Rp. ' . number_format($this->harga);
    }
}

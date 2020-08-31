<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    public function scopePublic() {
        return $this->actual()
            ->where('type', 'public');
    }

    public function scopeActual() {
        return $this->whereDate('expTime', '>', now())
            ->orWhereIsNull('expTime');
    }
}

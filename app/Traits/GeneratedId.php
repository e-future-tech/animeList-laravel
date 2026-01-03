<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GeneratedId
{
    public function generateCode()
    {
        $code1 = now()->format('Ymd');
        $code2 = Str::random(7);
        $code3 = Str::random(3);

        $code4 = $code1 . $code2 . $code3;

        return $code4;
    }

    public function createUserId()
    {
        $code1 = 'UID';
        $code2 = $this->generateCode();
        $finalCode = $code1 . $code2;

        return $finalCode;
    }

    public function createAdminId()
    {
        $code1 = 'ADMIN';
        $code2 = $this->generateCode();
        $finalCode = $code1 . $code2;

        return $finalCode;
    }
}

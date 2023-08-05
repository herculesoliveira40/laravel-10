<?php

namespace App\DTO;

use App\Http\Requests\StoreSupport;

class CreateSupportDTO
{
    public function __construct(
        public string $subject,
         public string $status,
          public string $body
        )
    {
        
    }

    public static function makeFromRequest(StoreSupport $request) : self
    {
        return new self(
            $request->subject,
            'a',
            $request->body
        );
    }

}
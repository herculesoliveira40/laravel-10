<?php

namespace App\DTO\Supports;

use App\Http\Requests\StoreSupport;

class UpdateSupportDTO
{
    public function __construct(
        public int $id,
        public string $subject,
        public string $status,
        public string $body
        )
    {
        
    }

    public static function makeFromRequest(StoreSupport $request) : self
    {
        return new self(
            $request->id, // :?
            $request->subject,
            'a',
            $request->body
        );
    }

}
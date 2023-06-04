<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NestOfKinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'IdCard' => $this->card_id,
            'Name' => $this->name,
            'Surname' => $this->surname,
            'ContactNumber1' => $this->contact_number_1,
            'ContactNumber2' => $this->contact_number_2,
        ];
    }
}

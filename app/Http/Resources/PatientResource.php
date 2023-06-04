<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Id' => $this->id,
            'IdCard' => $this->card_id,
            'Gender' => $this->gender,
            'Name' => $this->name,
            'Surname' => $this->name,
            'DateOfBirth' => $this->date_of_birth,
            'Address' => $this->address,
            'Postcode' => $this->post_code,
            'ContactNumber1' => $this->contact_number_1,
            'ContactNumber2' => $this->contact_number_2,
            'NextOfKin' => NestOfKinResource::collection($this->whenLoaded('next_of_kin')),
            'Medical' => [
                'Conditions' => ConditionResource::collection($this->whenLoaded('conditions')),
                'Alergies' => AllergyResource::collection($this->whenLoaded('alergies')),
                'Medication' => MedicationResource::collection($this->whenLoaded('medications')),
            ]
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'full_name' => $this->full_name,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'graduate_year' => $this->graduate_year,
            'is_admin' => $this->is_admin,
            'is_deleted' => $this->is_deleted,
        ];
    }
}

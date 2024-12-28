<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SatelliteResource extends JsonResource
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
            'description' => $this->description,
            'uf' => $this->uf,
            'avatar' => $this->avatar,
            'location' => $this->location,
            'active' => (bool) $this->active,
            'category' => $this->category,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}

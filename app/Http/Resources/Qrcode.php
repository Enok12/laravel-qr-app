<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Qrcode extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user_id'=> $this->user_id,
            'company_name'=> $this->company_name,
            'website'=> $this->website,
            'amount'=> $this->amount,
            'product_name'=> $this->product_name,
            'created_at'=> $this->created_at,
            'link'=> [
                'payment_page_link' => route('qrcodes.show',$this->id),
                'qrcode_link' => asset($this->qrcode_path)

            ]
        ];
            
    }
}

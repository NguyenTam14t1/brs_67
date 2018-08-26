<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ShowRate 
{
    public function showRate($rating)
    {
        $rate = '';
        for ($i = 0; $i < 5; $i++) {
            $rate .= '<span class="fa-stack stars">';
                $rate .= '<i class="fa fa-star fa-stack-1x"></i>';
                if($rating > 0.5) {
                    $rate .= '<i class="fa fa-star fa-stack-1x"></i>';
                } else if ($rating < 0.5 && $rating > 0) {
                    $rate .= '<i class="fa fa-star-half-o fa-stack-1x"></i>';
                } else {
                    $rate .= '<i class="fa fa-star fa-stack-1x fa-inverse"></i>';
                }
                $rating--; 
            $rate .= '</span>'; 
        }

        return $rate;
    }
}

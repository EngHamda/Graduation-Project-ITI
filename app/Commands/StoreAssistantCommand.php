<?php

namespace  App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Assistant_Details;


class StoreAssistantCommand extends command implements  SelfHandling
{

    public $clinic_id;
    public $user_id;


    public function __construct($clinic_id, $user_id)
    {

        $this->clinic_id = $clinic_id;
        $this->user_id = $user_id;
    }

    public function handle()
    {
        return Assistant_Details::create([
                'clinic_id' => $this->clinic_id,
                'user_id' => $this->user_id,

            ]
        );
    }
}

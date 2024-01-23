<?php

namespace App\DTO;

class FlightData
{
    public $from;
    public $to;
    public $depart;
    public $arrival;

    public function __construct($from, $to, $depart, $arrival)
    {
        $this->from = $from;
        $this->to = $to;
        $this->depart = $depart;
        $this->arrival = $arrival;
    }

    public function toArray()
    {
        return [
            'from' => $this->from,
            'to' => $this->to,
            'depart' => $this->depart,
            'arrival' => $this->arrival,
        ];
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['from'],
            $data['to'],
            $data['depart'],
            $data['arrival']
        );
    }
}

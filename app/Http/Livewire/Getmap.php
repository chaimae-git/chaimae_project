<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Getmap extends Component
{
    public $map, $ao_id;

    public function mount($ao_id){
        $this->ao_id = $ao_id;
    }

    public function getFeatureWithAdress(){
        $this->map =  DB::table('locations')->where('ao_id', $this->ao_id)->select('adresse', DB::raw("ST_AsGeoJSON(location) AS geojson"))->get();
        $jsonData = [];
        foreach($this->map as $map){
            array_push($jsonData, [
                'adresse'=>$map->adresse,
                'crs'=>json_encode(json_decode($map->geojson)->crs),
                'type'=>json_decode($map->geojson)->type,
                'coordinates'=>json_decode($map->geojson)->coordinates,

            ]);
        }
        $this->dispatchBrowserEvent('setMap', $jsonData);
    }

    public function render()
    {
        return view('livewire.getmap');
    }
}

<?php 
namespace App\Services;

use GeoIp2\Database\Reader;

interface GeoLocationServiceInterface
{
    public function getCityInfo($ip);
}
class GeoLocationService
{
    protected $reader;

    public function __construct()
    {
        $this->reader = new Reader(storage_path('app/GeoLite2-City.mmdb'));
    }

    

    public function getCityInfo($ip)
    {
        $record = $this->reader->city($ip);
        return [
            'timezone' => $record->location->timeZone,
            'region' => $record->mostSpecificSubdivision->name,
            'country' => $record->country->name,
            'city' => $record->city->name,
            'postal_code' => $record->postal->code,
            'isp' => $record->traits->isp,
        ];
    }
}



?>
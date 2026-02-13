<?php

namespace App\Services;

use App\Concerns\Position;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Fluent;
use Illuminate\Support\Uri;
use Override;
use Stevebauman\Location\Drivers\Driver;
use Stevebauman\Location\Drivers\HttpDriver;
use Stevebauman\Location\Position as LocationPosition;
use Stevebauman\Location\Request;

class GeoIpLocation extends HttpDriver
{
    /**
     * Get a position from the request.
     */
    #[Override]
    public function get(Request $request): LocationPosition|Position|false
    {
        return Cache::flexible(key: 'geoip-'.md5($request->getIp()), ttl: [15, 25], callback: function () use ($request) {
            $data = $this->process($request);

            $position = $this->makePosition();

            // Here we will ensure the location's data we received isn't empty.
            // Some IP location providers will return empty JSON. We want
            // to avoid this, so we can call the next fallback driver.
            if ($data instanceof Fluent && ! $this->isEmpty($data)) {
                $position = $this->hydrate($position, $data);

                $position->ip = $request->getIp();
                $position->driver = static::class;
            }

            if (! $position->isEmpty()) {
                return $position;
            }

            return $this->fallback ? $this->fallback->get($request) : false;
        });
    }

    /**
     * @param string $ip
     *
     * @return string
     */
    public function url(string $ip): string
    {
        return Uri::of('https://api.ipquery.io')
            ->withPath('/'.$ip)
            ->withQuery(['format' => 'json']);
    }

    /**
     * @param Position|LocationPosition $position
     * @param Fluent                    $location
     *
     * @return Position|LocationPosition
     */
    protected function hydrate(Position|LocationPosition $position, Fluent $location): Position|LocationPosition
    {
        $position->isp = filled($location->isp['isp']) ? $location->isp['isp'] : null;
        $position->countryName = filled($location->location['country']) ? $location->location['country'] : null;
        $position->countryCode = filled($location->location['country_code']) ? $location->location['country_code'] : null;
        $position->cityName = filled($location->location['city']) ? $location->location['city'] : null;
        $position->timezone = filled($location->location['timezone']) ? $location->location['timezone'] : null;
        $position->latitude = filled($location->location['latitude']) ? $location->location['latitude'] : null;
        $position->longitude = filled($location->location['longitude']) ? $location->location['longitude'] : null;

        return $position;
    }
}

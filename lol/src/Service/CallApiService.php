<?php 

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;


class CallApiService
{
    
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getFranceData(): array
    {
        $key = 'RGAPI-badc7753-7e82-4b42-8177-2391f48711bf';
        return $this->getApi('Guenole76?api_key=' . $key);
    }

    public function getShadollData(): array
    {
        $key = 'RGAPI-badc7753-7e82-4b42-8177-2391f48711bf';
        return $this->getApi('Shadoll76?api_key=' . $key );
    }

    public function getSummonerData($summoner): array
    {
        $key = 'RGAPI-badc7753-7e82-4b42-8177-2391f48711bf';
        return $this->getApi($summoner . '?api_key=' . $key );
    }

    private function getApi(string $var)
    {
        $response = $this->client->request(
            'GET',
            'https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/' . $var
        );
        return $response->toArray();
    }


    public function getChampionData($champion): array
    {
        $key = 'RGAPI-badc7753-7e82-4b42-8177-2391f48711bf';
        return $this->getApiChamp($champion . '.json' );
    }

    private function getApiChamp(string $var)
    {
        $response = $this->client->request(
            'GET',
            'http://ddragon.leagueoflegends.com/cdn/11.4.1/data/en_US/champion/' . $var
        );
        return $response->toArray();
    }


}
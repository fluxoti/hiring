<?php
/**
 * Created by PhpStorm.
 * User: Everton
 * Date: 15/04/2018
 * Time: 13:36
 */

namespace App;

use GuzzleHttp\Client;;

abstract class HackerNews
{
    /**
     * @return bool|mixed
     */
    static public function topStories($limit = 10, $offset = 0)
    {
        $newsIds = self::api("topstories");
        $result = [];
        for ($i = $offset; $i < $offset + $limit && isset($newsIds[$i]); $i++)
            $result['items'][] = self::getItem($newsIds[$i]);
        return $result;
    }

    /**
     * @return bool|mixed
     */
    static public function newStories($limit = 10, $offset = 0)
    {
        $newsIds = self::api("newstories");
        $result = [];
        for ($i = $offset; $i < $offset + $limit && isset($newsIds[$i]); $i++)
            $result['items'][] = self::getItem($newsIds[$i]);
        $result['count'] = count($newsIds);
        return $result;
    }

    /**
     * @return bool|mixed
     */
    static public function bestStories($limit = 10, $offset = 0)
    {
        $newsIds = self::api("beststories");
        $result = [];
        for ($i = $offset; $i < $offset + $limit && isset($newsIds[$i]); $i++)
            $result['items'][] = self::getItem($newsIds[$i]);
        $result['count'] = count($newsIds);
        return $result;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    static public function getItem($id)
    {
        return self::api("item/{$id}");
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    static public function getItemWithKids($id)
    {
        $result['data'] = self::api("item/{$id}");
        if (isset($result['data']['kids']) && $result['data']['kids'] > 0) {
            foreach ($result['data']['kids'] as $kid)
                $result['kids'][] = self::getItemWithKids($kid);
        }
        return $result;
    }


    /**
     * @param $path
     * @param string $method
     * @param array $params
     * @return bool|mixed
     */
    static private function api($path, $method = 'GET', $params = [])
    {
        try {
            $client = new Client();
            $result = $client->request(
                $method,
                config('hacker-news.api.url') . $path . ".json?" . http_build_query($params)
            );
            return \json_decode($result->getBody()->getContents(), true);
        } catch (ClientException $e) {
            Log::error($e);
            return [];
        }
    }

}
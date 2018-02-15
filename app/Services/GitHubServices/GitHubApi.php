<?php
/**
 * Created by PhpStorm.
 * User: Mindaugas
 * Date: 2018.02.13
 * Time: 11:09
 */

namespace App\Services\GitHubServices;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;


class GitHubApi implements GitHubServiceInterface
{
    private $client = null;

    public function __construct()
    {
        $token = config('services.github.token');

        if (!empty($token)) {
            try {
                $this->client = new Client([
                    'base_uri' => 'https://api.github.com',
                    'headers' => [
                        'Authorization' => 'Bearer ' . $token,
                    ],
                ]);
            } catch (ClientException $e) {
                throw new \Exception($e->getMessage());
            }
        } else {
            throw new \Exception('Add token');
        }
    }

    public function getResponse($url, array $params = [])
    {
        try {
            $repos = $this->client->get($url, ['query' => $params]);
            $response = json_decode($repos->getBody());

            return $response;
        } catch (ClientException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getRepos(array $params = [])
    {
        $response = $this->getResponse('/user/repos', $params);

        return $response;
    }

    public function getReposUser($user, $repos, array $params = [])
    {
        $response = $this->getResponse('/repos/' . rawurlencode($user) . '/' . rawurlencode($repos), $params);

        return $response;
    }

    public function getIssues($user, $repos, array $params = [])
    {
        $response = $this->getResponse('/repos/' . rawurlencode($user) . '/' . rawurlencode($repos) . '/issues', $params);

        return $response;
    }

    public function getIssue($user, $repos, $id, array $params = [])
    {
        $response = $this->getResponse('/repos/' . rawurlencode($user) . '/' . rawurlencode($repos) . '/issues/' . rawurlencode($id), $params);

        return $response;
    }

    public function getComments($user, $repos, $id, array $params = [])
    {
        $response = $this->getResponse('/repos/' . rawurlencode($user) . '/' . rawurlencode($repos) . '/issues/' . rawurlencode($id) . '/comments', $params);

        return $response;
    }
}
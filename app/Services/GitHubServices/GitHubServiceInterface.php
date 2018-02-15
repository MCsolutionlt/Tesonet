<?php
/**
 * Created by PhpStorm.
 * User: Mindaugas
 * Date: 2017.10.19
 * Time: 11:05
 */

namespace App\Services\GitHubServices;


interface GitHubServiceInterface
{
    public function getResponse($url, array $params = []);

    public function getRepos(array $params = []);

    public function getReposUser($user, $repos, array $params = []);

    public function getIssues($user, $repos, array $params = []);

    public function getIssue($user, $repos, $id, array $params = []);

    public function getComments($user, $repos, $id, array $params = []);
}
<?php

namespace App\Http\Controllers;

use App\Services\GitHubServices\GitHubServiceInterface;
use Illuminate\Http\Request;

/**
 * Class TesonetController
 * @package App\Http\Controllers
 */
class TesonetController extends Controller
{
    /**
     * Display all repository list
     *
     * @param GitHubServiceInterface $gitHubService
     * @return \Illuminate\Http\Response
     */
    public function index(GitHubServiceInterface $gitHubService)
    {
        $repository = $gitHubService->getRepos();

        return view('listRepos', compact('repository'));
    }

    /**
     * Display issues.
     *
     * @param GitHubServiceInterface $gitHubService
     * @param  string  $user
     * @param  string  $repos
     * @return \Illuminate\Http\Response
     */
    public function show($user, $repos, GitHubServiceInterface $gitHubService)
    {
        $repository = $gitHubService->getReposUser($user, $repos);
        $issues_closed = $gitHubService->getIssues($user, $repos, ['state' => 'closed']);
        $issues = $gitHubService->getIssues($user, $repos, ['state' => 'all', 'sort' => 'created_at']);
        $count_issues_closed = count($issues_closed);

        return view('reposInfo', compact('repository', 'count_issues_closed', 'issues'));
    }

    /**
     * Display issues and comments.
     *
     * @param GitHubServiceInterface $gitHubService
     * @param  string  $user
     * @param  string  $repos
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function issues($user, $repos, $id, GitHubServiceInterface $gitHubService)
    {
        $issues = $gitHubService->getIssue($user, $repos, $id);
        $comments = $gitHubService->getComments($user, $repos, $id, ['state' => 'all', 'sort' => 'created_at']);

        return view('issuesInfo', compact('issues', 'comments'));
    }
}

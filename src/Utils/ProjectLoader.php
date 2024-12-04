<?php

namespace App\Utils;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use App\Models\Projects;
use Illuminate\Database\Eloquent\Collection;

class ProjectLoader
{
    public static function post(string $key): ?array
    {
        if (isset($key)) {
            $api = $key;
            unset($key);
            try {
                $client = new Client();
                $responseData = json_decode($client->get($api)->getBody(), true);
                print_r($responseData);
                $projectName =  $responseData['project_name'];
                $description = $responseData['description'] ?? null;
                $project = Projects::where('project_name', $projectName)->first();
                if (!$project) {
                    $project = Projects::create([
                        'project_name' => $projectName,
                        'project_description' => $description
                    ])->get();

                    $projectData = [
                        'project_name' => $project->project_name,
                        'project_description' => $project->project_description,
                        // 'created_at' => $project->created_at
                    ];

                    return $projectData;
                }
                $projectData = [
                    'project_name' => $project->project_name,
                    'project_description' => $project->project_description,
                    // 'created_at' => $project->created_at
                ];
                return $projectData;
            } catch (ConnectException $e) {
                return null;
            }
        }
        return null;
    }
}

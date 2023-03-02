<?php

namespace App\Utils;
use StarkBank\Project;
use StarkBank\Settings;

class Starkbank
{
    public function setUser(): void
    {
        $privateKeyContent = env("PRIVATE_KEY");

        $project = new Project([
            "environment" => "sandbox",
            "id" => env("PROJECT_ID"),
            "privateKey" => $privateKeyContent
        ]);

        Settings::setUser($project);
    }
}

## Tesonet

Panaudotas Laravel framework'as
Aplikacija pasiekiama http://127.0.0.1:8000/tesonet jei naudosite php artisan serve

Nauji failai:
- \app\Services\GitHubServices\GitHubApi.php
- \app\Services\GitHubServices\GitHubServiceInterface.php
- \app\Providers\GitHubServiceProvider.php
- \app\Http\Controllers\TesonetController.php
- \resources\views kataloge view'ai

Pakoreguoti failai
- config kataloge app.php
- routes kataloge web.php

Norint paleisti aplikaciją reikia į \config\services.php prie github serviso įrašyti token
Token šiuo atveju tik gali būti Personal 



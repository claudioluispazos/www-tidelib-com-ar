<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeApiResource extends Command
{
    protected $signature = 'make:api-resource {name} {--model=}';
    protected $description = 'Genera un controlador, rutas y opcionalmente un modelo para un recurso API REST';

    public function handle()
    {
        $name = $this->argument('name');
        $modelName = $this->option('model') ?: ucfirst($name);
        $controllerName = "{$name}Controller";
        $controllerNamespace = "App\\Http\\Controllers\\Api\\{$controllerName}";

        // Verificar si el modelo existe
        $modelPath = app_path("Models/{$modelName}.php");
        if (!file_exists($modelPath)) {
            $this->info("El modelo {$modelName} no existe. Creándolo...");
            Artisan::call("make:model {$modelName}");
            $this->info(Artisan::output());
        } else {
            $this->info("El modelo {$modelName} ya existe. Usándolo...");
        }

        // Crear el controlador usando el stub
        $this->info("Creando controlador para {$name}...");
        $this->createController($controllerName, $modelName);

        // Agregar las rutas al archivo api.php
        $this->info("Agregando rutas al archivo api.php...");
        $this->addRoute($name, $controllerNamespace);

        $this->info("Recurso API REST para {$name} generado exitosamente.");
    }

    private function createController($controllerName, $modelName)
    {
        $stubPath = base_path('stubs/api-controller.stub');
        $controllerPath = app_path("Http/Controllers/Api/{$controllerName}.php");

        if (!file_exists($stubPath)) {
            $this->error("El archivo stub no existe en {$stubPath}");
            return;
        }

        // Leer el contenido del stub
        $stubContent = file_get_contents($stubPath);

        // Reemplazar las variables en el stub
        $stubContent = str_replace('{{ model }}', $modelName, $stubContent);
        $stubContent = str_replace('{{ class }}', $controllerName, $stubContent);
        $stubContent = str_replace('{{ base_class }}', 'BaseApiController', $stubContent);

        // Crear el archivo del controlador
        File::ensureDirectoryExists(dirname($controllerPath));
        file_put_contents($controllerPath, $stubContent);

        $this->info("Controlador creado en {$controllerPath}");
    }

    private function addRoute($name, $controllerNamespace)
    {
        $routesPath = base_path('routes/api.php');
        $routeDefinition = "Route::apiResource('" . strtolower($name) . "', {$controllerNamespace}::class);";

        $routesContent = file_get_contents($routesPath);

        // Verificar si la ruta ya existe
        if (Str::contains($routesContent, $routeDefinition)) {
            $this->info("La ruta para {$name} ya existe. No se agregó nuevamente.");
            return;
        }

        // Verificar si el `use` ya está presente
        $useStatement = "use {$controllerNamespace};";
        if (!Str::contains($routesContent, $useStatement)) {
            $routesContent = preg_replace('/<\?php\s+/', "<?php\n\n{$useStatement}\n", $routesContent, 1);
        }

        // Agregar la ruta al final del archivo
        File::put($routesPath, $routesContent . "\n" . $routeDefinition);
        $this->info("Ruta añadida:\n$routeDefinition");
    }
}
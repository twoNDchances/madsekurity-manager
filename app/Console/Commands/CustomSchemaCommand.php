<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class CustomSchemaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:schema {name} {--type=personal}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Schema class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $type = $this->option('type');

        switch ($type)
        {
            case 'general':
                $path      = App::path("Schemas/Generals/$name.php");
                $namespace = 'App\\Schemas\\Generals';

                if (File::exists($path))
                {
                    $this->error("{$path} already exist!");
                    return;
                }
                $content = <<<PHP
<?php

namespace $namespace;

trait $name
{
    //
}

PHP;
                break;
            case 'personal':
                $path      = App::path("Schemas/{$name}Schema.php");
                $namespace = 'App\\Schemas';

                if (File::exists($path))
                {
                    $this->error("{$path} already exist!");
                    return;
                }

                $content = <<<PHP
<?php

namespace $namespace;

class {$name}Schema
{
    //
}
PHP;
                break;
            default:
                $this->error('"--type" option must in ["personal", "general"]');
                return;
        }

        File::ensureDirectoryExists(File::dirname($path));
        File::put($path, $content);
    }
}

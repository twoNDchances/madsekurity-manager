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
    protected $signature = 'custom:schema {name}';

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
        $path = App::path("Schemas/{$name}Schema.php");

        if (File::exists($path))
        {
            $this->error("{$path} already exist!");
            return;
        }

        $content = <<<PHP
<?php

namespace App\Schemas;

class {$name}Schema
{
    //
}

PHP;
        File::ensureDirectoryExists(File::dirname($path));
        File::put($path, $content);
    }
}

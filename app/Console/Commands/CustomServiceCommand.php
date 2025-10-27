<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class CustomServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = App::path("Services/{$name}.php");

        if (File::exists($path))
        {
            $this->error("{$path} already exist!");
            return;
        }

        $content = <<<PHP
<?php

namespace App\Services;

class $name
{
    //
}

PHP;
        File::ensureDirectoryExists(File::dirname($path));
        File::put($path, $content);
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CustomObserverCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:observer {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an Observer class';

    /**
     * Namespace
     * 
     * @var string
     */
    private $namespace = 'App\Observers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = Str::ucfirst($this->argument('name'));

        if (!$this->validateExistPath($name))
        {
            return;
        }

        if (!$this->makeTemplate($name))
        {
            return;
        }
    }

    private function getTemplatePath($name)
    {
        $prefixPath = "Observers/{$name}Observers";
        return [
            'observer' => App::path("$prefixPath/{$name}Observer.php"),
            'before'   => App::path("$prefixPath/BeforeObserver.php"),
            'after'    => App::path("$prefixPath/AfterObserver.php"),
        ];
    }

    private function validateExistPath($name)
    {
        $paths = $this->getTemplatePath($name);
        foreach ($paths as $path)
        {
            if (File::exists($path))
            {
                $this->error("$path is already exists!");
                return false;
            }
        }
        return true;
    }

    private function buildObserverTemplate($name)
    {
        return <<<PHP
<?php

namespace $this->namespace\\{$name}Observers;

class {$name}Observer
{
    use BeforeObserver, AfterObserver;
}

PHP;
    }

    private function buildBeforeTemplate($name, $variableName)
    {
        return <<<PHP
<?php

namespace $this->namespace\\{$name}Observers;

use App\Models\\{$name};
use App\Services\IdentificationService;

trait BeforeObserver
{
    /**
     * Handle the $name "saving" event.
     */
    public function saving($name $variableName): void
    {
        //
    }

    /**
     * Handle the $name "creating" event.
     */
    public function creating($name $variableName): void
    {
        {$variableName}->user_id = IdentificationService::getId();
    }

    /**
     * Handle the $name "updating" event.
     */
    public function updating($name $variableName): void
    {
        //
    }

    /**
     * Handle the $name "deleting" event.
     */
    public function deleting($name $variableName): void
    {
        //
    }

    /**
     * Handle the $name "restoring" event.
     */
    public function restoring($name $variableName): void
    {
        //
    }

    /**
     * Handle the User "force deleting" event.
     */
    public function forceDeleting($name $variableName): void
    {
        //
    }
}

PHP;
    }

    private function buildAfterTemplate($name, $variableName)
    {
        return <<<PHP
<?php

namespace $this->namespace\\{$name}Observers;

use App\Models\\{$name};
use App\Services\BehaviorService;

trait AfterObserver
{
    /**
     * Handle the $name "saved" event.
     */
    public function saved($name $variableName): void
    {
        //
    }

    /**
     * Handle the $name "created" event.
     */
    public function created($name $variableName): void
    {
        BehaviorService::perform($variableName, 'Create');
    }

    /**
     * Handle the $name "updated" event.
     */
    public function updated($name $variableName): void
    {
        BehaviorService::perform($variableName, 'Update');
    }

    /**
     * Handle the $name "deleted" event.
     */
    public function deleted($name $variableName): void
    {
        BehaviorService::perform($variableName, 'Delete');
    }

    /**
     * Handle the $name "restored" event.
     */
    public function restored($name $variableName): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted($name $variableName): void
    {
        //
    }
}

PHP;
    }

    private function makeTemplate($name)
    {
        $templatePaths = $this->getTemplatePath($name);
        foreach ($templatePaths as $templatePath)
        {
            File::ensureDirectoryExists(File::dirname($templatePath));
        }

        $variableName  = '$' . Str::lower($name);
        if (File::put($templatePaths['before'], $this->buildBeforeTemplate($name, $variableName)) === false)
        {
            $this->error('Create BeforeObserver failed with unknow reason!');
            return false;
        }
        if (File::put($templatePaths['after'], $this->buildAfterTemplate($name, $variableName)) === false)
        {
            $this->error('Create AfterObserver failed with unknow reason!');
            return false;
        }
        if (File::put($templatePaths['observer'], $this->buildObserverTemplate($name)) === false)
        {
            $this->error("Create {$name}Observer failed with unknow reason!");
            return false;
        }
        return true;
    }
}

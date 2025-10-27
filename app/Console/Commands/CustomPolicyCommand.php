<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CustomPolicyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:policy {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Policy class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = App::path("Policies/{$name}Policy.php");

        if (File::exists($path))
        {
            $this->error("{$path} already exist!");
            return;
        }

        $modelName        = Str::ucfirst($name);
        $stringComparison = function () use ($modelName)
        {
            $result = strcmp("use App\Models\\{$modelName};", 'use App\Models\User;');
            if ($result < 0)
            {
                return <<<PHP

use App\Models\\{$modelName};
use App\Models\User;

PHP;
            }
            else if ($result > 0)
            {
                return <<<PHP

use App\Models\User;
use App\Models\\{$modelName};

PHP;
            }
            else
            {
                return <<<PHP

use App\Models\User;

PHP;
            }
        };
        $resourceName     = Str::lower($name);
        $condition        = Str::lower($modelName) != 'user';
        $variableName     = $condition ? "$$resourceName" : '$model';

        $content = <<<PHP
<?php

namespace App\Policies;

PHP . $stringComparison() . <<<PHP
use App\Services\IdentificationService;

class {$modelName}Policy
{
    private function getResource(User \$user, string \$action)
    {
        return IdentificationService::can(\$user, '$resourceName', \$action);
    }

    /**
     * Determine whether the user can use all models.
     */
    public function all(User \$user): bool
    {
        return \$this->getResource(\$user, 'all');
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User \$user): bool
    {
        return \$this->getResource(\$user, 'viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User \$user, $modelName $variableName): bool
    {
        return \$this->getResource(\$user, 'view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User \$user): bool
    {
        return \$this->getResource(\$user, 'create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User \$user, $modelName $variableName): bool
    {
        return \$this->getResource(\$user, 'update');
    }

    /**
     * Determine whether the user can delete any model.
     */
    public function deleteAny(User \$user): bool
    {
        return \$this->getResource(\$user, 'deleteAny');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User \$user, $modelName $variableName): bool
    {
        return \$this->getResource(\$user, 'delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User \$user, $modelName $variableName): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User \$user, $modelName $variableName): bool
    {
        return false;
    }
}

PHP;
        File::ensureDirectoryExists(File::dirname($path));
        File::put($path, $content);
    }
}

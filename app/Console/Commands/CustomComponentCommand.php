<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CustomComponentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:component {name} {--type=form}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Filament component with specific type';

    /**
     * Path of Forms
     * 
     * @var string
     */
    private $pathForm = 'Filament/Components/Forms';

    /**
     * Path of Preparations
     * 
     * @var string
     */
    private $pathPreparation = 'Filament/Components/Preparations';

    /**
     * Path of Tables
     * 
     * @var string
     */
    private $pathTable = 'Filament/Components/Tables';

    /**
     * Path of Actions
     * 
     * @var string
     */
    private $pathAction = "Filament/Components/Actions";

    /**
     * Namespace
     * 
     * @var string
     */
    private $namespace = 'App\Filament\Components';

    /**
     * Namespace of Forms
     * 
     * @var string
     */
    private $namespaceForm =  'App\Filament\Components\Forms';

    /**
     * Namespace of Preparation
     * 
     * @var string
     */
    private $namespacePreparation =  'App\Filament\Components\Preparations';

    /**
     * Namespace of Tables
     * 
     * @var string
     */
    private $namespaceTable = 'App\Filament\Components\Tables';

    /**
     * Namespace of Actions
     * 
     * @var string
     */
    private $namespaceAction = 'App\Filament\Components\Actions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $type = $this->option('type');
        if (!$this->validateInput($type))
        {
            return;
        }
        if (!$this->validateExistPath($name, $type))
        {
            return;
        }
        if (!$this->makeTemplate($name, $type))
        {
            return;
        }
    }

    private function validateInput(string $type): bool
    {
        $successFlag = true;
        if (!in_array($type, ['form', 'preparation', 'table', 'action']))
        {
            $successFlag = false;
            $this->error('"--type" option must in ["form", "preparation", "table", "action"]');
        }
        return $successFlag;
    }

    private function getTemplatePath(string $name, string $type, string $withAction): string
    {
        $name = match ($type)
        {
            'form' => match ($withAction)
            {
                'false' => "{$name}Form/{$name}Form",
                'true'  => "{$name}Form/{$name}Action",
            },
            'preparation' => match ($withAction)
            {
                'false' => "{$name}Preparation/CreatePreparation",
                'true'  => "{$name}Preparation/EditPreparation",
            },
            'table' => match ($withAction)
            {
                'false' => "{$name}Table/{$name}Table",
                'true'  => "{$name}Table/{$name}Action",
            },
            'action' => "{$name}Action",
        };

        return match ($type)
        {
            'form'        => App::path("{$this->pathForm}/{$name}"),
            'preparation' => App::path("{$this->pathPreparation}/{$name}"),
            'table'       => App::path("{$this->pathTable}/{$name}"),
            'action'      => App::path("{$this->pathAction}/{$name}"),
        };
    }

    private function validateExistPath(string $name, string $type): bool
    {
        $componentPath = $this->getTemplatePath($name, $type, 'false') . '.php';
        $componentActionPath = $this->getTemplatePath($name, $type, $type == 'action' ? 'false' : 'true') . '.php';
        $successFlag = true;
        if (File::exists($componentPath))
        {
            $successFlag = false;
            $this->error("$componentPath is already exists!");
        }
        if ($type != 'action' && File::exists($componentActionPath))
        {
            $successFlag = false;
            $this->error("$componentActionPath is already exists!");
        }
        return $successFlag;
    }

    private function buildFormTemplateWithAction(string $name): array
    {
        return [
<<<PHP
<?php

namespace {$this->namespaceForm}\\{$name}Form;

use {$this->namespace}\Generals\GeneralForm;

trait {$name}Form
{
    use GeneralForm, {$name}Action;

    //

}

PHP,
<<<PHP
<?php

namespace {$this->namespaceForm}\\{$name}Form;

use {$this->namespace}\Generals\GeneralAction;

trait {$name}Action
{
    use GeneralAction;

    //

}

PHP,
        ];
    }

    private function buildPreparationTemplate(string $name): array
    {
        return [
<<<PHP
<?php

namespace {$this->namespacePreparation}\\{$name}Preparation;

trait CreatePreparation
{
    protected function mutateFormDataBeforeCreate(array \$data): array
    {
        return \$data;
    }
}

PHP,
<<<PHP
<?php

namespace {$this->namespacePreparation}\\{$name}Preparation;

trait EditPreparation
{
    protected function mutateFormDataBeforeFill(array \$data): array
    {
        return \$data;
    }

    protected function mutateFormDataBeforeSave(array \$data): array
    {
        return \$data;
    }
}

PHP,
        ];
    }

    private function buildTableTemplateWithAction(string $name): array
    {
        return [
<<<PHP
<?php

namespace {$this->namespaceTable}\\{$name}Table;

use {$this->namespace}\Generals\GeneralTable;

trait {$name}Table
{
    use GeneralTable, {$name}Action;

    //

}

PHP,
<<<PHP
<?php

namespace {$this->namespaceTable}\\{$name}Table;

use {$this->namespace}\Generals\GeneralAction;

trait {$name}Action
{
    use GeneralAction;

    //

}

PHP,
        ];
    }

    private function buildActionTemplate(string $name): array
    {
        return [
<<<PHP
<?php

namespace {$this->namespaceAction};

use {$this->namespace}\Generals\GeneralAction;

trait {$name}Action
{
    use GeneralAction;

    //
}

PHP,
        ];
    }

    private function makeTemplate(string $name, string $type): bool
    {
        $componentPath = $this->getTemplatePath($name, $type, 'false') . '.php';
        File::ensureDirectoryExists(File::dirname($componentPath));

        $ok = match ($type)
        {
            'form' => [
                File::put($componentPath, $this->buildFormTemplateWithAction($name)[0]),
            ],
            'preparation' => [
                File::put($componentPath, $this->buildPreparationTemplate($name)[0]),
                File::put(
                    (function () use ($name, $type)
                    {
                        $componentActionPath = $this->getTemplatePath($name, $type, 'true') . '.php';
                        File::ensureDirectoryExists(File::dirname($componentActionPath));
                        return $componentActionPath;
                    })(),
                    $this->buildPreparationTemplate($name)[1],
                ),
            ],
            'table' => [
                File::put($componentPath, $this->buildTableTemplateWithAction($name)[0]),
            ],
            'action' => [
                File::put($componentPath, $this->buildActionTemplate($name)[0]),
            ]
        };
        if (!in_array($type, ['preparation', 'action']))
        {
            $componentActionPath = $this->getTemplatePath($name, $type, 'true') . '.php';
            File::ensureDirectoryExists(File::dirname($componentActionPath));
            $functionName = 'build' . Str::ucfirst($type) . 'TemplateWithAction';
            $ok[]         = File::put($componentActionPath, $this->$functionName($name)[1]);
        }
        $successFlag = true;
        if ($ok[0] === false)
        {
            $successFlag = false;
            $this->error("Create $componentPath failed with unknow reason!");
        }
        if (isset($ok[1]) && $ok[1] === false)
        {
            $successFlag = false;
            $this->error("Create $componentActionPath failed with unknow reason!");
        }
        return $successFlag;
    }
}

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
     * Namespace of Generals
     * 
     * @var string
     */
    private $namespaceGeneral = 'App\Filament\Components\Generals';

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
                'create' => "{$name}Preparation/Create{$name}Preparation",
                'edit'   => "{$name}Preparation/Edit{$name}Preparation",
                'list'   => "{$name}Preparation/List{$name}Preparation",
                'save'   => "{$name}Preparation/Save{$name}Preparation"
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
        $successFlag = true;
        switch ($type)
        {
            case 'preparation':
                $pathTypes = ['create', 'edit', 'list', 'save'];
                foreach ($pathTypes as $pathType)
                {
                    $path = $this->getTemplatePath($name, $type, $pathType) . '.php';
                    if (File::exists($path))
                    {
                        $successFlag = false;
                        $this->error("$path is already exists!");
                        break;
                    }
                }
                break;
            default:
                $componentPath = $this->getTemplatePath($name, $type, 'false') . '.php';
                $componentActionPath = $this->getTemplatePath($name, $type, $type == 'action' ? 'false' : 'true') . '.php';
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
                break;
        }
        return $successFlag;
    }

    private function buildFormTemplateWithAction(string $name): array
    {
        return [
<<<PHP
<?php

namespace {$this->namespaceForm}\\{$name}Form;

use {$this->namespaceGeneral}\GeneralForm;

trait {$name}Form
{
    use GeneralForm, {$name}Action;

    //

}

PHP,
<<<PHP
<?php

namespace {$this->namespaceForm}\\{$name}Form;

use {$this->namespaceGeneral}\GeneralAction;

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

use App\Filament\Components\Generals\GeneralPreparation;

trait Create{$name}Preparation
{
    use GeneralPreparation, Save{$name}Preparation;

    protected function mutateFormDataBeforeCreate(array \$data): array
    {
        return self::mutateFormDataBefore(\$data);
    }
}

PHP,
<<<PHP
<?php

namespace {$this->namespacePreparation}\\{$name}Preparation;

use App\Filament\Components\Generals\GeneralPreparation;

trait Edit{$name}Preparation
{
    use GeneralPreparation, Save{$name}Preparation;

    protected function getHeaderActions(): array
    {
        return [
            self::deleteAction(),
        ];
    }

    protected function mutateFormDataBeforeFill(array \$data): array
    {
        return \$data;
    }

    protected function mutateFormDataBeforeSave(array \$data): array
    {
        return self::mutateFormDataBefore(\$data);
    }
}

PHP,
<<<PHP
<?php

namespace {$this->namespacePreparation}\\{$name}Preparation;

use App\Filament\Components\Generals\GeneralAction;

trait List{$name}Preparation
{
    use GeneralAction;

    protected function getHeaderActions(): array
    {
        return [
            self::createAction(),
        ];
    }

    public function getTabs(): array
    {
        return [];
    }
}

PHP,
<<<PHP
<?php

namespace {$this->namespacePreparation}\\{$name}Preparation;

trait Save{$name}Preparation
{
    public static function mutateFormDataBefore(array \$data): array
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

use {$this->namespaceGeneral}\GeneralTable;

trait {$name}Table
{
    use GeneralTable, {$name}Action;

    //

}

PHP,
<<<PHP
<?php

namespace {$this->namespaceTable}\\{$name}Table;

use {$this->namespaceGeneral}\GeneralAction;

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

use {$this->namespaceGeneral}\GeneralAction;

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
        $successFlag = true;
        switch ($type)
        {
            case 'preparation':
                $pathTypes = ['create', 'edit', 'list', 'save'];
                foreach ($pathTypes as $index => $pathType)
                {
                    $path = $this->getTemplatePath($name, $type, $pathType) . '.php';
                    File::ensureDirectoryExists(File::dirname($path));
                    $ok = File::put($path, $this->buildPreparationTemplate($name)[$index]);
                    if ($ok === false)
                    {
                        $successFlag = false;
                        $this->error("Create $path failed with unknow reason!");
                        break;
                    }
                }
                break;
            default:
                $componentPath = $this->getTemplatePath($name, $type, 'false') . '.php';
                File::ensureDirectoryExists(File::dirname($componentPath));

                $ok = match ($type)
                {
                    'form' => [
                        File::put($componentPath, $this->buildFormTemplateWithAction($name)[0]),
                    ],
                    'table' => [
                        File::put($componentPath, $this->buildTableTemplateWithAction($name)[0]),
                    ],
                    'action' => [
                        File::put($componentPath, $this->buildActionTemplate($name)[0]),
                    ]
                };
                if ($type != 'action')
                {
                    $componentActionPath = $this->getTemplatePath($name, $type, 'true') . '.php';
                    File::ensureDirectoryExists(File::dirname($componentActionPath));
                    $functionName = 'build' . Str::ucfirst($type) . 'TemplateWithAction';
                    $ok[]         = File::put($componentActionPath, $this->$functionName($name)[1]);
                }
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
                break;
        }
        return $successFlag;
    }
}

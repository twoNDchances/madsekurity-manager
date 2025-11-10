<?php

namespace App\Filament\Components\Forms\ActionForm;

use App\Filament\Clusters\Initializations\Resources\Rules\Schemas\RuleForm;
use App\Filament\Components\Generals\GeneralForm;
use App\Filament\Resources\Contents\Schemas\ContentForm;
use App\Filament\Resources\Wordlists\Schemas\WordlistForm;
use App\Schemas\ActionSchema;
use App\Services\IdentificationService;
use Filament\Schemas\Components\Grid;

trait ActionForm
{
    use GeneralForm, ActionAction;

    public static function name()
    {
        return self::textInput('name', placeholder: 'Action Name')
        ->helperText('Simple name with kebab case about this Action.')
        ->unique(ignoreRecord: true)
        ->alphaDash()
        ->required();
    }

    public static function type()
    {
        return self::select('type')
        ->helperText(fn ($state, $get) => ActionSchema::$types['herlpTexts'][$state])
        ->options(fn ($get) => ActionSchema::$types['options'])
        ->selectablePlaceholder(false)
        ->default('allow')
        ->required()
        ->reactive();
    }

    private static function contentId($create = true)
    {
        return IdentificationService::use(
            self::select('content_id', 'Content')
            ->relationship('content', 'name'),
            fn () => ContentForm::main(),
            'content',
            'modal',
            $create,
        );
    }

    public static function wordlistId($create = true)
    {
        return IdentificationService::use(
            self::select('wordlist_id', 'Wordlist')
            ->relationship('wordlist', 'name'),
            fn () => WordlistForm::main(),
            'wordlist',
            'modal',
            $create,
        );
    }

    public static function denyStatus()
    {
        $condition = fn ($get) => $get('type') == 'deny';
        return self::select('deny_status', 'Status')
        ->helperText('https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml')
        ->disabled(fn ($get) => !$condition($get))
        ->options(ActionSchema::status())
        ->selectablePlaceholder(false)
        ->required($condition)
        ->visible($condition)
        ->default(403);
    }

    public static function denyBodyFromContentId($create = true)
    {
        $condition = fn ($get) => $get('type') == 'deny';
        return self::contentId($create)
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Body when refusing to serve HTTP.')
        ->relationship('content', 'name')
        ->visible($condition);
    }

    public static function logFormat()
    {
        $condition = fn ($get) => $get('type') == 'log';
        return self::textArea('log_format', 'Format', 'Action Log Format')
        ->default('[${time}] ${ip} | ${method} | ${path} | ${bytesSent} | ${bytesReceived} | ${error}')
        ->helperText('https://docs.gofiber.io/api/middleware/logger#constants')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition);
    }

    public static function logTimeZone()
    {
        $condition = fn ($get) => $get('type') == 'log';
        return self::select('log_time_zone', 'Time Zone')
        ->helperText('https://docs.gofiber.io/api/middleware/logger#config-1')
        ->disabled(fn ($get) => !$condition($get))
        ->options(ActionSchema::timezones())
        ->default('Asia/Ho_Chi_Minh')
        ->required($condition)
        ->visible($condition);
    }

    public static function logToConsole()
    {
        $condition = fn ($get) => $get('type') == 'log';
        return self::toggle('log_to_console', 'To Console')
        ->helperText('Enable/Disable console logging.')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->default(true);
    }

    public static function logToFile()
    {
        $condition = fn ($get) => $get('type') == 'log';
        return self::toggle('log_to_file', 'To File')
        ->helperText('Enable/Disable file logging.')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->default(true);
    }

    public static function requestUrl()
    {
        $condition = fn ($get) => $get('type') == 'request';
        return self::textInput('request_url', 'URL', 'Action Request URL')
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('URL of request.')
        ->required($condition)
        ->visible($condition)
        ->url();
    }

    public static function requestMethod()
    {
        $condition = fn ($get) => $get('type') == 'request';
        return self::toggleButtons('request_method', 'Method', ActionSchema::$methods)
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Method of request.')
        ->required($condition)
        ->visible($condition);
    }

    public static function requestHeaders()
    {
        $condition = fn ($get) => $get('type') == 'request';
        return self::repeater(
            'request_headers',
            'Headers',
            'key',
            [
                self::textInput('key', placeholder: 'Action Request Headers Key')
                ->required(),

                self::textArea('value', placeholder: 'Action Request Headers Value')
                ->required(),
            ],
        )
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Headers of request.')
        ->visible($condition);
    }

    public static function requestBodyFromContentId($create = true)
    {
        $condition = fn ($get) => $get('type') == 'request';
        return self::contentId($create)
        ->relationship('content', 'name', fn ($query) => $query->where('type', 'json'))
        ->helperText('Body of request, only supports JSON body.')
        ->disabled(fn ($get) => !$condition($get))
        ->visible($condition);
    }

    public static function requestCertificate()
    {
        $condition = fn ($get) => $get('type') == 'request';
        return self::textArea('request_certificate', 'Certificate', 'Action Request Certificate')
        ->helperText('Certificate of request, suitable for self-signed HTTPS.')
        ->disabled(fn ($get) => !$condition($get))
        ->visible($condition);
    }

    public static function suspectSeverity()
    {
        $condition = fn ($get) => $get('type') == 'suspect';
        return self::toggleButtons('suspect_severity', 'Severity', ActionSchema::$severities)
        ->helperText('The score will be decided in the Configurations -> Variables section.')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->default('notice');
    }

    public static function shareDirective()
    {
        $condition = fn ($get) => $get('type') == 'share';
        return self::toggleButtons('share_directive', colorsAndOptions: ActionSchema::$directives['share'])
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Set or unset variables.')
        ->required($condition)
        ->visible($condition)
        ->default('set')
        ->reactive();
    }

    public static function shareVariables()
    {
        $condition = fn ($get) => $get('type') == 'share' && $get('share_directive') == 'set';
        return self::repeater(
            'share_variables',
            'Variables',
            'key',
            [
                Grid::make(1)
                ->columnSpan(1)
                ->schema([
                    self::textInput('key', placeholder: 'Action Getter Key')
                    ->alphaDash()
                    ->required(),

                    self::toggleButtons('datatype', colorsAndOptions: ActionSchema::datatype())
                    ->default('string')
                    ->reactive()
                    ->required(),
                ]),

                self::textArea('value', placeholder: 'Action Getter Value')
                ->disabled(fn ($get) => $get('datatype') != 'string')
                ->visible(fn ($get) => $get('datatype') == 'string')
                ->required(fn ($get) => $get('datatype') == 'string'),

                self::textInput('value', placeholder: 'Action Getter Value')
                ->disabled(fn ($get) => $get('datatype') != 'number')
                ->visible(fn ($get) => $get('datatype') == 'number')
                ->required(fn ($get) => $get('datatype') == 'number')
                ->integer()
                ->numeric(),
            ],
        )
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Set multiple variables for an HTTP lifecycle.')
        ->required($condition)
        ->visible($condition);
    }

    public static function shareKeysFromWordlistId($create = true)
    {
        $condition = fn ($get) => $get('type') == 'share' && $get('share_directive') == 'unset';
        return self::wordlistId($create)
        ->helperText('Wordlist containing the key names will be deleted.')
        ->disabled(fn ($get) => !$condition($get))
        ->visible($condition);
    }

    public static function headerDirective()
    {
        $condition = fn ($get) => $get('type') == 'header';
        return self::toggleButtons('header_directive', colorsAndOptions: ActionSchema::$directives['header'])
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Set or unset headers.')
        ->required($condition)
        ->visible($condition)
        ->default('set')
        ->reactive();
    }

    public static function headerSets()
    {
        $condition = fn ($get) => $get('type') == 'header' && $get('header_directive') == 'set';
        return self::repeater(
            'header_sets',
            'Sets',
            'key',
            [
                self::textInput('key', placeholder: 'Action Header Key')
                ->alphaDash()
                ->required(),

                self::textArea('value', placeholder: 'Action Header Value')
                ->required(),
            ],
        )
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Modify multiple headers for an HTTP lifecycle.')
        ->required($condition)
        ->visible($condition);
    }

    public static function headerKeysFromWordlistId($create = true)
    {
        $condition = fn ($get) => $get('type') == 'header' && $get('header_directive') == 'unset';
        return self::wordlistId($create)
        ->helperText('Wordlist containing the key names will be deleted.')
        ->disabled(fn ($get) => !$condition($get))
        ->visible($condition);
    }

    public static function bodyDirective()
    {
        $condition = fn ($get) => $get('type') == 'body';
        return self::toggleButtons('body_directive', colorsAndOptions: ActionSchema::$directives['body'])
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Set or unset body.')
        ->required($condition)
        ->visible($condition)
        ->default('set')
        ->reactive();
    }

    public static function bodySets()
    {
        $condition = fn ($get) => $get('type') == 'body' && $get('body_directive') == 'set';
        return self::repeater(
            'body_sets',
            'Sets',
            'key',
            [
                self::toggleButtons('content_type', 'Content-Type', ActionSchema::$contentTypes)
                ->afterStateUpdated(fn ($get, $set) => match ($get('content_type'))
                {
                    'html' => $set('value_type', 'text/html'),
                    'json' => $set('value_type', 'application/json'),
                    'yaml' => $set('value_type', 'application/yaml'),
                    'xml'  => $set('value_type', 'application/xml'),
                })
                ->default('json')
                ->columnSpan(2)
                ->reactive()
                ->required(),

                self::toggleButtons('search_type', 'Search Type', ActionSchema::$searchTypes)
                ->default('equal')
                ->columnSpan(2)
                ->required(),

                self::textInput('value_type', 'Value Type', 'Action Body Value Type')
                ->default('application/json')
                ->columnSpan(2)
                ->required(),

                self::textInput('key', placeholder: 'Action Body Key')
                ->columnSpan(3)
                ->required(),

                self::textArea('value', placeholder: 'Action Body Value')
                ->columnSpan(3)
                ->required(),
            ],
        )
        ->helperText('Modify multiple body components for an HTTP lifecycle.')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->columns(6);
    }

    public static function bodyUnsets()
    {
        $condition = fn ($get) => $get('type') == 'body' && $get('body_directive') == 'unset';
        return self::repeater(
            'body_unsets',
            'Unsets',
            'key',
            [
                self::toggleButtons('content_type', 'Content-Type', ActionSchema::$contentTypes)
                ->afterStateUpdated(fn ($get, $set) => match ($get('content_type'))
                {
                    'html' => $set('value_type', 'text/html'),
                    'json' => $set('value_type', 'application/json'),
                    'yaml' => $set('value_type', 'application/yaml'),
                    'xml'  => $set('value_type', 'application/xml'),
                })
                ->default('json')
                ->reactive()
                ->required(),

                self::toggleButtons('search_type', 'Search Type', ActionSchema::$searchTypes)
                ->default('equal')
                ->required(),

                self::textInput('value_type', 'Value Type', 'Action Body Value Type')
                ->default('application/json')
                ->required(),

                self::textInput('key', placeholder: 'Action Body Key')
                ->required(),
            ],
        )
        ->helperText('Remove multiple body components by key names for an HTTP lifecycle.')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->columns(4);
    }

    public static function scoreDirective()
    {
        $condition = fn ($get) => $get('type') == 'score';
        return self::toggleButtons('score_directive', 'Directive', ActionSchema::$directives['score'])
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Hard change or use operator for modification total score.')
        ->required($condition)
        ->visible($condition)
        ->default('hard')
        ->reactive();
    }

    public static function scoreNumber()
    {
        $condition = fn ($get) => $get('type') == 'score';
        return self::textInput('score_number', 'Score', 'Action Score Number')
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Score number will be used.')
        ->required($condition)
        ->visible($condition)
        ->integer()
        ->numeric();
    }

    public static function scoreOperator()
    {
        $condition = fn ($get) => $get('type') == 'score' && $get('score_directive') == 'operator';
        return self::toggleButtons('score_operator', 'Operator', ActionSchema::$operators)
        ->helperText('Use the operator to increase/decrease the total score by the current total score.')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->default('+');
    }

    public static function levelDirective()
    {
        $condition = fn ($get) => $get('type') == 'level';
        return self::toggleButtons('level_directive', 'Directive', ActionSchema::$directives['level'])
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Hard change or use operator for modification level.')
        ->required($condition)
        ->visible($condition)
        ->default('hard')
        ->reactive();
    }

    public static function levelNumber()
    {
        $condition = fn ($get) => $get('type') == 'level';
        return self::textInput('level_number', 'Level', 'Action Level Number')
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('The level will be used.')
        ->required($condition)
        ->visible($condition)
        ->integer()
        ->numeric();
    }

    public static function levelOperator()
    {
        $condition = fn ($get) => $get('type') == 'level' && $get('level_directive') == 'operator';
        return self::toggleButtons('level_operator', 'Operator', ActionSchema::$operators)
        ->helperText('Use the operator to increase/decrease the level by the current level.')
        ->disabled(fn ($get) => !$condition($get))
        ->required($condition)
        ->visible($condition)
        ->default('+');
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Action...');
    }

    public static function rules($create = true)
    {
        return IdentificationService::use(
            self::select('rules')
            ->helperText('Select multiple Rules for Action Definition.')
            ->relationship('rules', 'name')
            ->multiple(),
            fn () => self::openRuleForm(),
            'rule',
            'open',
            $create,
        );
    }
}

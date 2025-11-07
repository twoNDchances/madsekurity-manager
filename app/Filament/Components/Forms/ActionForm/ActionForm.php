<?php

namespace App\Filament\Components\Forms\ActionForm;

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
            ContentForm::main(),
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
            WordlistForm::main(),
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
        ->helperText('Body of request, only supports API body.')
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

    public static function setterVariables()
    {
        $condition = fn ($get) => $get('type') == 'setter';
        return self::repeater(
            'setter_variables',
            'Variables',
            'key',
            [
                Grid::make(1)
                ->columnSpan(1)
                ->schema([
                    self::textInput('key', placeholder: 'Action Getter Key')
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
                ->integer(),
            ],
        )
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Set multiple variables for an HTTP lifecycle.')
        ->required($condition)
        ->visible($condition);
    }

    public static function headerDirective()
    {
        $condition = fn ($get) => $get('type') == 'header';
        return self::toggleButtons('header_directive', colorsAndOptions: ActionSchema::$directives['headers'])
        ->disabled(fn ($get) => !$condition($get))
        ->helperText('Set or unset headers.')
        ->required($condition)
        ->visible($condition)
        ->default('set')
        ->reactive();
    }

    public static function headerModifications()
    {
        $condition = fn ($get) => $get('type') == 'header' && $get('header_directive') == 'set';
        return self::repeater(
            'header_modifications',
            'Modification',
            'key',
            [
                self::textInput('key', placeholder: 'Action Header Key')
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

    public static function headerHeadersFromWordlistId($create = true)
    {
        $condition = fn ($get) => $get('type') == 'header' && $get('header_directive') == 'unset';
        return self::wordlistId($create)
        ->helperText('Wordlist containing the key names will be deleted.')
        ->disabled(fn ($get) => !$condition($get))
        ->visible($condition);
    }

    public static function description()
    {
        return self::textArea('description', placeholder: 'Some description about this Action...');
    }
}

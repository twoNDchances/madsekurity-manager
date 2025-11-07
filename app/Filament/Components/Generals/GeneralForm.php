<?php

namespace App\Filament\Components\Generals;

use App\Filament\Resources\Labels\Schemas\LabelForm;
use App\Services\IdentificationService;
use Filament\Forms\Components;

trait GeneralForm
{
    public static function textInput(string $name, $label = null, $placeholder = null)
    {
        return Components\TextInput::make($name)
        ->placeholder($placeholder)
        ->maxLength(255)
        ->label($label);
    }

    public static function textArea(string $name, $label = null, $placeholder = null)
    {
        return Components\Textarea::make($name)
        ->placeholder($placeholder)
        ->label($label)
        ->rows(6);
    }

    public static function toggle(string $name, $label = null)
    {
        return Components\Toggle::make($name)
        ->label($label);
    }

    public static function select(string $name, $label = null)
    {
        return Components\Select::make($name)
        ->label($label)
        ->searchable()
        ->preload();
    }

    public static function fileUpload(string $name, $label = null, $directory = null)
    {
        return Components\FileUpload::make($name)
        ->visibility('private')
        ->directory($directory)
        ->label($label);
    }

    public static function toggleButtons(string $name, $label = null, array $colorsAndOptions = ['colors' => [], 'options' => []])
    {
        return Components\ToggleButtons::make($name)
        ->options($colorsAndOptions['options'])
        ->colors($colorsAndOptions['colors'])
        ->label($label)
        ->inline();
    }

    public static function labels()
    {
        return IdentificationService::use(
            self::select('labels')
            ->helperText('Select multiple Labels for this resource.')
            ->relationship('labels', 'name')
            ->multiple(),
            fn() => LabelForm::main(),
            'label',
            'modal',
        );
    }

    public static function colorPicker(string $name, $label = null)
    {
        return Components\ColorPicker::make($name)
        ->default('#000000')
        ->label($label);
    }

    public static function repeater(string $name, $label = null, $key = 'key', $schema = [])
    {
        return Components\Repeater::make($name)
        ->itemLabel(fn(array $state) => $state[$key] ?? null)
        ->schema($schema)
        ->label($label)
        ->columns(2)
        ->collapsible()
        ->cloneable()
        ->collapsed();
    }

    public static function codeEditor(string $name, $label = null, $language = null)
    {
        return Components\CodeEditor::make($name)
        ->language($language)
        ->label($label);
    }
}

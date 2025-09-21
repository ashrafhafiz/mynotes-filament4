<?php

namespace App\Filament\Resources\Notes\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class NoteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                MarkdownEditor::make('content')
                    ->columnSpanFull(),
                Toggle::make('active')
                    ->required()
                    ->default(true),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                // Hidden::make('user_id')
                //     ->default(Auth::id()),
            ]);
    }
}

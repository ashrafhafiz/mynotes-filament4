<?php

namespace App\Filament\Resources\Notes\Schemas;

use App\Models\Note;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NoteInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('System Info')
                    ->inlineLabel()
                    ->description('System information about the note.')
                    ->schema([
                        TextEntry::make('deleted_at')
                            ->dateTime()
                            ->visible(fn(Note $record): bool => $record->trashed()),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ])
                    ->collapsible(),
                Section::make('Status Info')
                    ->inlineLabel()
                    ->description('Status information about the note.')
                    ->schema([
                        IconEntry::make('active')
                            ->boolean(),
                        TextEntry::make('user.name')
                            ->label('Author')
                            ->numeric(),
                    ])
                    ->collapsible(),
                Section::make('Note')
                    ->translateLabel()
                    ->description('Information about the note.')
                    ->schema([
                        TextEntry::make('title')
                            ->extraAttributes(['class' => 'text-2xl font-bold']),
                        TextEntry::make('content')
                            ->markdown()
                            ->placeholder('-')
                    ])
                    ->columnSpanFull()
                    ->collapsible(),
            ]);
    }
}

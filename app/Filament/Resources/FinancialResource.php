<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FinancialResource\Pages;
use App\Filament\Resources\FinancialResource\RelationManagers;
use App\Models\Financial;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Enums\TransactionTypes;

class FinancialResource extends Resource
{
    protected static ?string $model = Financial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('description'),
                TextInput::make('value'),
                Select::make('type')
                    ->label('Billing Type')
                    ->options([
                        'credit' => TransactionTypes::Credit->name,
                        'debit' => TransactionTypes::Debit->name,
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('description'),
                TextColumn::make('value')->searchable(),
                TextColumn::make('type'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFinancials::route('/'),
            'create' => Pages\CreateFinancial::route('/create'),
            'edit' => Pages\EditFinancial::route('/{record}/edit'),
        ];
    }
}

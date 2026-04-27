<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Text;
use Filament\Forms\Components\TextareaSelect;
use Filament\Forms\Components\TextSelect;

use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CreateTenantWizard extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationLabel = 'Create Company';
    protected static ?string $title = 'Create Company';
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole('super_admin');
    }
    public static function canAccess(): bool
    {
        return auth()->user()->hasRole('super_admin');
    }

    protected string $view = 'filament.pages.create-tenant-wizard';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Wizard::make([
                Step::make('Company')
                    ->schema([
                        Forms\Components\TextInput::make('team_name')
                            ->label('Company Name')
                            ->required(),
                    ]),

                Step::make('Admin User')
                    ->schema([
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\TextInput::make('email')->email()->required(),
                        Forms\Components\TextInput::make('password')->password()->required(),
                    ]),

                Step::make('Role')
                    ->schema([
                        Forms\Components\Select::make('role')
                            ->options([
                                'tenant_owner' => 'Owner',
                                'tenant_user' => 'User',
                            ])
                            ->required(),
                    ]),
            ])->statePath('data'),
        ];
    }

    public function create()
    {
        $state = $this->form->getState();
        $data = $state['data'] ?? $state;

        $team = Team::create([
            'name' => $data['team_name'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->teams()->attach($team->id);

        $user->assignRole($data['role']);

        \Filament\Notifications\Notification::make()
            ->title('Nursery Bed Company created successfully')
            ->success()
            ->send();

        return redirect('/super_admin');
    }
}
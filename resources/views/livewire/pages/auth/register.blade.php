<?php

use App\Models\User;
use App\Models\Teacher;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $nrc = '';
    public string $ts_number = '';
    public string $tcz_number = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'first_name'    => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'nrc'           => ['required', 'string', 'max:11'],
            'ts_number'     => ['required', 'string', 'max:11'],
            'tcz_number'    => ['required', 'string', 'max:11'],
            'password'      => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create([
            'first_name'    => $validated['first_name'],
            'last_name'     => $validated['last_name'],
            'email'         => $validated['email'],
            'password'      => $validated['password']
        ]);

        $userOBJ = User::where('email', $validated['email'])->first();

        $user = Teacher::create([
            'user_id'       => $userOBJ->id,
            'nrc'           => $validated['nrc'],
            'ts_number'     => $validated['ts_number'],
            'tcz_number'    => $validated['tcz_number'],
        ]);

        event(new Registered($userOBJ));

        Auth::login($userOBJ);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div>

    <form wire:submit="register">

        <div class="text-white text-center my-4">
            Teacher Sign up
        </div>

        <!-- First Name -->
        <div class="inputWrapper">
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input wire:model="first_name" id="first_name" class="block mt-1 w-full" type="text" name="first_name" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="inputWrapper">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input wire:model="last_name" id="last_name" class="block mt-1 w-full" type="text" name="last_name" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="inputWrapper">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- NRC -->
        <div class="inputWrapper">
            <x-input-label for="nrc" :value="__('NRC')" />
            <x-text-input wire:model="nrc" id="nrc" class="block mt-1 w-full" type="text" name="nrc" required autofocus autocomplete="nrc" />
            <x-input-error :messages="$errors->get('nrc')" class="mt-2" />
        </div>

        <!-- TS Number -->
        <div class="inputWrapper">
            <x-input-label for="ts_number" :value="__('TS Number')" />
            <x-text-input wire:model="ts_number" id="ts_number" class="block mt-1 w-full" type="text" name="ts_number" required autofocus autocomplete="ts_number" />
            <x-input-error :messages="$errors->get('ts_number')" class="mt-2" />
        </div>

        <!-- TCZ Number -->
        <div class="inputWrapper">
            <x-input-label for="tcz_number" :value="__('TCZ Number')" />
            <x-text-input wire:model="tcz_number" id="tcz_number" class="block mt-1 w-full" type="text" name="tcz_number" required autofocus autocomplete="tcz_number" />
            <x-input-error :messages="$errors->get('tcz_number')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="inputWrapper">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="inputWrapper">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">

            <x-primary-button class="block mx-auto">
                <i class="fa-solid fa-user-plus mr-1"></i>
                {{ __('Register') }}
            </x-primary-button>

            <a class="block mt-6 underline text-sm text-gray-400 dark:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

        </div>

    </form>
    
</div>

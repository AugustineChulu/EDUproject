<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $email = '';
    public ?string $phone = '';
    public ?string $dob = '';
    public ?string $gender = '';
    public ?string $current_address = '';
    public ?string $permanent_address = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $teacher = Auth::user()->Teacher()->first();
        
        $this->email = Auth::user()->email;

        $this->phone = $teacher->phone;
        $this->dob = $teacher->dateofbirth;
        $this->gender = $teacher->gender;
        $this->current_address = $teacher->current_address;
        $this->permanent_address = $teacher->permanent_address;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();
        $teacher = Auth::user()->Teacher()->first();

        $validated = $this->validate([
            'phone'                 => ['required', 'string', 'max:15'],
            'dob'                   => ['required', 'string'],
            'gender'                => ['required', 'string'],
            'current_address'       => ['required', 'string', 'max:255'],
            'permanent_address'     => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        // $teacher->fill($validated);
        $user->fill([
            'email'                 => $validated['email'],
        ]);

        $user->assignRole('admin');

        $teacher->fill([
            'phone'                 => $validated['phone'],
            'dateofbirth'           => $validated['dob'],
            'gender'                => $validated['gender'],
            'current_address'       => $validated['current_address'],
            'permanent_address'     => $validated['permanent_address'],
        ]);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();
        $teacher->save();

        $this->dispatch('profile-updated', name: $user->first_name);

        // Flash message to session
        // Redirect::to('dashboard')->with('status', 'Profile updated!');
        redirect()->to('dashboard')->with('status', 'Profile updated!');

    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: RouteServiceProvider::HOME);

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

}; ?>

<section>

    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">

        <div>
            {{-- <x-input-label for="name" :value="__('Name')" /> --}}
            <div class="mt-16 text-gray-500 text-center">{{ __('Phone') }}</div>
            <x-text-input wire:model="phone" id="phone" name="phone" type="text" class="mt-1 block w-full" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            
            <div class="mt-16 text-gray-500 text-center">{{ __('Gender') }}</div>

            <div>

                <div class="flex flex-row w-full items-center justify-center">

                    <label class="mx-4 block text-gray-500 font-bold">
                        <input name="gender" wire:model="gender" class="mx-1 leading-tight" type="radio" value="male" {{ ($gender == 'male') ? 'checked' : '' }}>
                        <span class="text-sm">Male</span>
                    </label>

                    <label class="mx-4 block text-gray-500 font-bold">
                        <input name="gender" wire:model="gender" class="mx-1 leading-tight" type="radio" value="female" {{ ($gender == 'female') ? 'checked' : '' }}>
                        <span class="text-sm">Female</span>
                    </label>
                    
                    <label class="mx-4 block text-gray-500 font-bold">
                        <input name="gender" wire:model="gender" class="mx-1 leading-tight" type="radio" value="other" {{ ($gender == 'other') ? 'checked' : '' }}>
                        <span class="text-sm">Other</span>
                    </label>

                </div>

                @error('gender')
                    <p class="mt-2 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                
            </div>

        </div>

        <div>
            {{-- <x-input-label for="name" :value="__('Name')" /> --}}
            <div class="mt-16 text-gray-500 text-center">{{ __('Date of Birth') }}</div>
            <x-text-input wire:model="dob" id="dob" name="dob" type="text" class="mt-1 block w-full" required autofocus autocomplete="dob" />
            <x-input-error class="mt-2" :messages="$errors->get('dob')" />
        </div>

        <div>
            {{-- <x-input-label for="name" :value="__('Name')" /> --}}
            <div class="mt-16 text-gray-500 text-center">{{ __('current_address') }}</div>
            <x-text-input wire:model="current_address" id="current_address" name="current_address" type="text" class="mt-1 block w-full" required autofocus autocomplete="current_address" />
            <x-input-error class="mt-2" :messages="$errors->get('current_address')" />
        </div>

        <div>
            {{-- <x-input-label for="name" :value="__('Name')" /> --}}
            <div class="mt-16 text-gray-500 text-center">{{ __('permanent_address') }}</div>
            <x-text-input wire:model="permanent_address" id="permanent_address" name="permanent_address" type="text" class="mt-1 block w-full" required autofocus autocomplete="permanent_address" />
            <x-input-error class="mt-2" :messages="$errors->get('permanent_address')" />
        </div>

        <div>

            <div class="mt-16 text-gray-500 text-center">{{ __('Email') }}</div>
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif

        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>

    </form>
    
</section>

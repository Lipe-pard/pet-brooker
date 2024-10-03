<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        if ($user->is_admin === 1) {
            $this->redirect(route('admin.dashboard', absolute: false), navigate: true);
        }else {
            $this->redirect(route('client.dashboard', absolute: false), navigate: true);
        }

    }
}; ?>


<div class="flex flex-col justify-center xl:flex-row h-screen xl:justify-around xl:px-20 px-5 xl:py-40 xl:gap-20">
    <div class="w-full xl:w-1/3 flex flex-col xl:gap-20  justify-start">
        <img src="{{ asset('img/logo.svg') }}" alt="" class="w-[2rem] mb-10 hidden xl:block">
        <div>
            <h1 class="text-5xl w-full xl:text-7xl font-bold xl:w-[90%]">Create New Account</h1>
            <p class="xl:w-[80%] mt-7 text-lg xl:text-2xl text-gray-500">Water is life. Water is a basic human need. In various lines of life, humans need water.</p>
        </div>
    </div>
    <div class="w-full space-y-10 xl:w-1/3 flex flex-col xl:gap-10">
        <h1 class="text-4xll w-full xl:text-7xl font-bold xl:w-[90%] hidden xl:block">Register</h1>
        <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="register" class="mt-6 space-y-10 w-full flex flex-col items-center">
        <div class="w-full">
            <div>
                <x-text-input wire:model="name" id="name"
                class="block mt-1 w-full py-4"
                type="text"
                placeholder="Full Name"
                name="name" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-text-input wire:model="email" id="email"
                class="block mt-1 w-full py-4"
                type="email"
                placeholder="Email"
                name="email" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-text-input wire:model="password" id="password"
                                class="block mt-1 w-full py-4"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full py-4"
                                type="password"
                                placeholder="Confirm Password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>
        <x-button class="w-3/4 mt-10">Register</x-button>
    </form>

        <p class="mx-auto">Have an account? <a href="{{ route('login') }}" class="text-indigo-500 font-bold hover:underline">Login</a></p>
    </div>
</div>

<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;
    public $authenticatedUser;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->authenticatedUser = Auth::user();

        if ($this->authenticatedUser->is_admin === 1) {
            $this->redirect(route('admin.dashboard', absolute: false), navigate: true);
        }else {
            $this->redirect(route('client.dashboard', absolute: false), navigate: true);
        }

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col justify-center xl:flex-row h-screen xl:justify-around xl:px-20 px-5 xl:py-40 xl:gap-20">
    <div class="w-full xl:w-1/3 flex flex-col xl:gap-20  justify-start">
        <img src="{{ asset('img/logo.svg') }}" alt="" class="w-[2rem] mb-10 hidden xl:block">
        <div>
            <h1 class="text-5xl w-full xl:text-7xl font-bold xl:w-[90%]">Hello,<br> Welcome Back!</h1>
            <p class="xl:w-[80%] mt-7 text-lg xl:text-2xl text-gray-500">Water is life. Water is a basic human need. In various lines of life, humans need water.</p>
        </div>
    </div>
    <div class="w-full space-y-10 xl:w-1/3 flex flex-col xl:gap-20">
        <h1 class="text-4xll w-full xl:text-7xl font-bold xl:w-[90%] hidden xl:block">Login</h1>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form wire:submit="login" class="mt-6 space-y-10 w-full flex flex-col items-center">
            <div class="w-full">
                <div>
                    {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                    <x-text-input wire:model="form.email" id="email"
                    class="block mt-1 w-full py-4"
                    type="email"
                    name="email"
                    required autofocus autocomplete="username"
                    placeholder="Email"
                    />
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                </div>
                <div class="mt-4">
                    {{-- <x-input-label for="password" :value="__('Password')" /> --}}

                    <x-text-input wire:model="form.password" id="password"
                                    class="block mt-1 w-full py-4"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password"
                                    placeholder="Password"
                                    />

                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" wire:navigate>
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                </div>
            </div>
            <x-button class="w-3/4 mt-10">Login</x-button>
        </form>

        <p class="mx-auto">Don’t have an account? <a href="{{ route('register') }}" class="text-indigo-500 font-bold hover:underline">Create Account</a></p>
    </div>
</div>

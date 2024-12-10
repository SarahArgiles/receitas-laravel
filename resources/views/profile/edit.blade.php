<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
        <!-- Se estiver em resources/views/profile.blade.php ou dashboard.blade.php -->

    <div class="flex justify-between">
        <div>
            <h2 class="text-xl font-semibold">{{ Auth::user()->name }}'s Profile</h2>
            <p>{{ Auth::user()->email }}</p>
        </div>

        <!-- Botão para adicionar uma receita -->
        <div>
            <a href="{{ route('receitas.create') }}" class="inline-block px-6 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                Postar uma Receita
            </a>
        </div>
    </div>

</x-app-layout>

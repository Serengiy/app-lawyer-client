<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Имя')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            </div>

{{--            <!-- SurName -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="name" :value="__('Фамилия')" />--}}

{{--                <x-input id="name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />--}}
{{--            </div>--}}

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Phone -->
{{--            <div class="mt-4">--}}
{{--                <x-label for="phone" :value="__('Телефон')" />--}}

{{--                <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" placeholder="123-45-678" :value="old('phone')" required />--}}
{{--                 pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"--}}
{{--            </div>--}}

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Пароль')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Подтверждение пароля')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mt-4">

                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Выбор роли</label>
                <select name="role_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block mt-1 w-full">
                    <option disabled selected>Выберете роль</option>
                    <option value="0">Client</option>
                    <option value="1">Lawyer</option>
                </select>
                <p class="text-red-600">*Представлено для ознакомления</p>
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Уже зарегистрированы?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Зарегистрироваться') }}
                </x-button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>

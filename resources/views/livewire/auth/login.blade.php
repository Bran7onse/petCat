<x-layouts.auth :title="__('Iniciar sesión — PetCare')">
    <div class="min-h-screen flex items-center justify-center px-4 py-12 relative overflow-hidden">

        {{-- blobs suaves --}}
        <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-secondary/10 blur-2xl"></div>
        <div class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full bg-primary/10 blur-2xl"></div>

        {{-- mascotas afuera del card (no encima) --}}
        <img src="{{ asset('icon/dog3d.png') }}"
            class="hidden lg:block pointer-events-none select-none absolute left-6 bottom-6 w-44 opacity-90 drop-shadow-lg z-0"
            alt="dog 3d">
        <img src="{{ asset('icon/cat3d.png') }}"
            class="hidden lg:block pointer-events-none select-none absolute right-6 top-10 w-40 opacity-90 drop-shadow-lg z-0"
            alt="cat 3d">

        {{-- CARD --}}
        <div class="w-full max-w-md bg-white/90 backdrop-blur rounded-3xl border border-black/5 shadow-xl overflow-hidden relative z-10">

            <div class="px-8 pt-10 pb-6 text-center">
                <div class="flex items-center justify-center gap-3">
                    <img src="{{ asset('icon/logo.png') }}"
                        class="h-12 w-12 object-contain drop-shadow"
                        alt="PetCare Logo">
                    <div class="text-3xl font-extrabold gradient-text">
                        🐾 PetCare
                    </div>
                </div>

                <p class="mt-3 text-sm text-gray-500">
                    El cuidado de tu mascota en un solo lugar
                </p>

                <h1 class="mt-6 text-2xl font-bold text-dark">
                    ¡Bienvenido de nuevo!
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    Ingresa tus credenciales para acceder
                </p>
            </div>

            <div class="px-8 pb-10">
                <x-auth-session-status class="text-center mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-dark mb-2">Correo electrónico</label>
                        <flux:input
                            name="email"
                            type="email"
                            required
                            autofocus
                            autocomplete="email"
                            placeholder="tu@correo.com"
                            class="!rounded-xl !border-gray-200 focus:!border-primary" />
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-sm font-semibold text-dark">Contraseña</label>

                            @if (Route::has('password.request'))
                            <flux:link
                                class="text-xs font-semibold !text-primary hover:!text-secondary transition-colors"
                                :href="route('password.request')"
                                wire:navigate>
                                ¿Olvidaste tu contraseña?
                            </flux:link>
                            @endif
                        </div>

                        <flux:input
                            name="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                            viewable
                            class="!rounded-xl !border-gray-200 focus:!border-primary" />
                    </div>

                    <div class="flex items-center justify-between gap-3">
                        <flux:checkbox name="remember" :label="__('Recuérdame')" :checked="old('remember')" />

                        <div class="text-xs text-gray-500 flex items-center gap-1">
                            <span class="material-icons-sharp text-base text-secondary">verified_user</span>
                            Acceso seguro
                        </div>
                    </div>

                    <flux:button
                        variant="primary"
                        type="submit"
                        class="w-full !rounded-full !py-6 !text-lg !font-bold !text-white
                               !bg-accent-orange hover:!bg-[#e65a2a]
                               shadow-lg shadow-orange-200/70
                               transition-all hover:-translate-y-0.5">
                        <span class="inline-flex items-center justify-center gap-2">
                            <span class="material-icons-sharp text-base">login</span>
                            Iniciar sesión
                        </span>
                    </flux:button>

                    @if (Route::has('register'))
                    <div class="text-sm text-center text-gray-600 pt-2">
                        ¿No tienes una cuenta?
                        <flux:link :href="route('register')" wire:navigate class="!font-bold !text-secondary hover:underline ml-1">
                            Regístrate
                        </flux:link>
                    </div>
                    @endif

                    <p class="text-center text-xs text-gray-500 mt-4">
                        © {{ date('Y') }} PetCare — Cuidando a tus mascotas con tecnología 💙
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layouts.auth>
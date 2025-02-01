<nav x-data="{ open: false, search: false, showModal: false }" class="bg-plumpPurple">
    <!-- Primary Navigation Menu -->
    <div class="sm:px-5 container mx-auto">
        <div class=" flex justify-between h-[70px] px-2">
            <div class="flex">
                <!-- Hamburger -->
                <div class="flex items-center 2xl:hidden mr-4">
                    <button @click="open = true;  search = false;" class="inline-flex items-center justify-center ">
                        <x-heroicon-c-bars-3 class=" size-8 fill-turquoise " />
                    </button>
                </div>

                <!-- logo -->
                <div class="flex items-center flex-col justify-center">
                    <p class=" font-bubblegum font-semibold  text-white text-3xl">
                        Manga<span class=" text-turquoise">verse</span>
                    </p>
                    <span class=" font-semibold text-turquoise text-sm">マンガバース</span>
                </div>
                {{-- Array de nav links --}}
                @php
                    $navLinks = [
                        ['href' => 'popular', 'name' => 'popular', 'text' => 'Populares'],
                        ['href' => 'trending', 'name' => 'trending', 'text' => 'Tendencias'],
                        ['href' => 'new', 'name' => 'new', 'text' => 'Nuevos'],
                        ['href' => 'categories', 'name' => 'categories', 'text' => 'Categorias'],
                        // ['href' => 'explore', 'name' => 'explore', 'text' => 'Explorar'],
                    ];
                @endphp
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 lg:flex items-center text-white">
                    @foreach ($navLinks as $link)
                        {{-- <a href="{{ route($link['href']) }}" :active="request() - > routeIs($link['name'])">
                            {{ __($link['text']) }}
                        </a> --}}
                        <a href="{{ route('popular') }}" class=" hover:text-turquoise"
                            :active="request() - > routeIs($link['name'])">
                            {{ __($link['text']) }}
                        </a>
                    @endforeach

                </div>
            </div>

            <div class="flex items-center gap-2">
                {{-- Search bar --}}
                <div :class="{ 'block': search, 'hidden': !search }"
                    class="fixed 2xl:static bg-plumpPurple top-[70px] inset-x-0 px-4 pb-2 2xl:p-0 2xl:block">
                    <div class="relative">
                        <a href=""
                            class=" uppercase absolute text-plumpPurpleDark bg-purple-200 rounded-[5px] px-2 py-1 text-xs top-1/2 left-2 transform -translate-y-1/2">
                            Filter
                        </a>
                        <input type="text" name="keyword"
                            class="rounded-[5px] h-10 w-full py-[6px] pl-16 pr-10 text-sm"
                            placeholder="Search manga...">
                        <button class="absolute top-1/2 right-2 transform -translate-y-1/2">
                            <x-heroicon-c-magnifying-glass class="size-6 fill-plumpPurpleDark" />
                        </button>
                    </div>
                </div>
                <!-- Teams Dropdown -->
                {{-- @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative ms-3">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif --}}


                <!-- Settings Dropdown -->
                {{-- <div class="relative ms-3">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                    <img class="object-cover rounded-full size-8"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div> --}}

                <div class="inline-flex gap-2">
                    <button @click=" search = ! search"
                        class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none 2xl:hidden">
                        <x-heroicon-c-magnifying-glass class=" size-8 fill-white" />
                    </button>
                    <button @click="showModal = true"
                        class="flex items-center gap-1 text-sm transition border-2 border-transparent rounded-full focus:outline-none">
                        <x-heroicon-m-user-circle class=" size-8 fill-white" />
                        <span class="hidden text-white 2xl:inline">Usuario</span>
                    </button>
                </div>



            </div>


        </div>
    </div>






    <!-- Responsive Navigation Menu -->
    {{-- <span x-show="open" @click="open = false" aria-hidden="true" class="fixed inset-0 bg-black/50">
    </span>
    <div :class="{ 'translate-x-0': open, '-translate-x-full': !open }"
        class="fixed bg-white w-[260px] inset-y-0 left-0 z-50 h-screen transition-all duration-100 ease-in-out">
        <div class="h-[70px] flex items-center ">
            <button @click="open = false" class=" bg-purple-200 rounded-full p-2 m-2">
                <x-heroicon-m-chevron-left class=" size-6 fill-plumpPurpleDark" />
            </button>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center px-4">
                @auth

                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="object-cover rounded-full size-10" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif
                    <div>
                        <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}
                        </div>
                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                @endauth

            </div>

            <div class="mt-3 space-y-1">
                @auth
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>


                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>

                @endauth

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <p>Si hay teams</p>
                @endif
            </div>
        </div>
    </div> --}}

    <x-side-menu trigger="open">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
    </x-side-menu>


    {{-- modal --}}
    <x-my-modal trigger="showModal" class="w-full max-w-[500px] px-2">
        <div class="bg-white px-5 py-8 rounded-[20px] flex flex-col items-center gap-4 relative overflow-hidden">
            <button @click="showModal = false" class="absolute top-0 right-0  p-2">
                <x-heroicon-c-x-mark class=" size-6 fill-plumpPurpleDark" />
            </button>
            <h5 class="text-xl font-semibold text-plumpPurpleDark">¡Bienvenido de nuevo!</h5>
            <form action="" method="post" class=" flex flex-col w-full gap-5 py-6">
                <div class="flex flex-col">
                    <x-label for="email">Username/Email</x-label>
                    <x-input type="text" id="email" name="email" placeholder="pedro@mail.com" />
                </div>
                <div class="flex flex-col">
                    <x-label for="password">Contraseña</x-label>
                    <x-input type="password" id="password" name="password" />
                </div>
                <div class="flex text-xs text-plumpPurpleDark justify-between ">
                    <div class="flex gap-2 items-center">
                        <input type="checkbox" class=" rounded border-plumpPurple text-plumpPurpleDark focus:ring-0"
                            name="remember" id="remember">
                        <label for="" class="uppercase">Recuerdame</label>
                    </div>
                    <a href="" class=" text-sm font-semibold">¿Olvidaste tu contraseña?</a>
                </div>
                <x-button>Iniciar session</x-button>
            </form>
            <div class=" text-plumpPurpleDark text-sm">
                ¿No tienes cuenta? <a href="" class=" font-semibold">Registrate</a>
            </div>
        </div>
    </x-my-modal>
</nav>

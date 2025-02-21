<style>
    div.menu {
        background-color: #133379;
        transition: width 0.5s ease-in-out;
        position: absolute;
        left: 0px;

        width: 110px;
        height: 100%;
    }
    div.menu:hover {
        width: 200px;
        z-index: 100;
    }

    div.link {
        margin-top: 100%;
        margin-left: 20%;
        transition: opacity 0.3s ease-in-out;
        div.menu:hover .link {
        opacity: 1;
}
    }

    div.link img {
    margin-right: 10px;
    }

    div.link span {
    display: none;
    color: white;
    font-size: 14px;
}

    div.menu:hover .link span {
    display: inline;
    }

    .logout {
        color: white;
        margin-left: 8px;
    }
    .profile-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 120px;
    padding-top: 20px;
    }

    .profile-img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 3px solid #ffffff;
        transition: border-color 0.3s ease-in-out;
    }

</style>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<nav x-data="{ open: false }" class="border-b border-blue-100 bg-blue ">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="flex justify-between h-16 menu">

            <div class="flex flex-col space-y-4">
                <!-- Navigation Links -->

                <div class="profile-container">
                    <a href="{{ route('profile.edit') }}">
                        @if (Auth::user()->profile_photo_url)
                            <img class="profile-img" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                        @elseif (Auth::user()->role == 'admin')
                            <img class="profile-img" src="{{ asset('images/admin-avatar.png') }}" alt="Admin">
                        @else
                            <img class="profile-img" src="{{ asset('assets/Gestor/gestor.png') }}" alt="Gestor">
                        @endif
                    </a>
                </div>

                @if (auth() -> user() -> cargo === 'administrativo')
                    <div class="hidden link sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('crearOrden')" :active="request()->routeIs('crearOrden')">
                            <img src="assets/Administrativo/crearOrden.svg">
                            <span>Crear Orden</span>
                        </x-nav-link>
                    </div>
                    <div class="hidden link sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('crearTurno')" :active="request()->routeIs('crearTurno')">
                            <img src="assets/Administrativo/crearTurno.svg">
                            <span>Crear Turno</span>
                        </x-nav-link>
                    </div>
                @endif
                @if (auth() -> user() -> cargo === 'gestor')
                    <div class="hidden link sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('crearUsuario')" :active="request()->routeIs('crearUsuario')">
                            <img src="assets/Gestor/usuariosCrearVer.svg">
                            <span>Crear Usuario</span>
                        </x-nav-link>
                    </div>
                    <div class="hidden link sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link >
                            <img src="assets/Gestor/usuarios.svg">
                            <span>Ver usuarios</span>
                        </x-nav-link>
                    </div>
                    <div class="hidden link sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('crearGrua')" :active="request()->routeIs('crearGrua')">
                            <img src="assets/Gestor/gruas.png">
                            <span>Crear Grua</span>
                        </x-nav-link>
                    </div>
                    <div class="hidden link sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('crearPatio')" :active="request()->routeIs('crearPatio')">
                            <img src="assets/Gestor/crearPatio.png">
                            <span>Crear Patio</span>
                        </x-nav-link>
                    </div>
                    <div class="hidden link sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link>
                            <img src="assets/Gestor/gestionarGruas.svg">
                            <span>Gestionar Gruas</span>
                        </x-nav-link>
                    </div>
                @endif
                <div class="hidden link sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link>
                        <img src="assets/Gestor/home.svg">
                    </x-nav-link>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="logout">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            </div>


            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:open">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

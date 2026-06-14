<!-- Bottom Navigation -->
<nav class="fixed bottom-0 left-0 right-0 bg-white/90 backdrop-blur-md border-t border-gray-100 flex justify-around items-center pb-safe pt-2 px-2 z-[9999] shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] rounded-t-2xl md:rounded-none">
    <!-- Home -->
    <a href="{{route('home')}}" class="relative flex flex-col items-center px-4 py-2 rounded-xl transition-all duration-300 {{ request()->routeIs('home') ? 'text-blue-600' : 'text-gray-400 hover:text-gray-600 hover:bg-gray-50' }} group">
        @if(request()->routeIs('home'))
            <span class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-blue-600 rounded-full"></span>
        @endif
        <i class="fas fa-house text-xl mb-1 transition-transform duration-300 group-hover:-translate-y-1"></i>
        <span class="text-[10px] sm:text-xs font-medium">Beranda</span>
    </a>
    
    <!-- My Reports -->
    <a href="{{route('lokasi.mylokasi', ['status' => 'pending'])}}" class="relative flex flex-col items-center px-4 py-2 rounded-xl transition-all duration-300 {{ request()->routeIs('lokasi.mylokasi') ? 'text-blue-600' : 'text-gray-400 hover:text-gray-600 hover:bg-gray-50' }} group">
        @if(request()->routeIs('lokasi.mylokasi'))
            <span class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-blue-600 rounded-full"></span>
        @endif
        <i class="fas fa-clipboard-list text-xl mb-1 transition-transform duration-300 group-hover:-translate-y-1"></i>
        <span class="text-[10px] sm:text-xs font-medium">Laporanmu</span>
    </a>
    
    <!-- Add Location -->
    <a href="{{route('lokasi.create')}}" class="relative flex flex-col items-center px-4 py-2 rounded-xl transition-all duration-300 {{ request()->routeIs('lokasi.create') ? 'text-blue-600' : 'text-gray-400 hover:text-gray-600 hover:bg-gray-50' }} group">
        @if(request()->routeIs('lokasi.create'))
            <span class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-blue-600 rounded-full"></span>
        @endif
        <i class="fas fa-map-marker-alt text-xl mb-1 transition-transform duration-300 group-hover:-translate-y-1"></i>
        <span class="text-[10px] sm:text-xs font-medium">Tambah</span>
    </a>
    
    <!-- Logistik -->
        <a href="{{ auth()->check() ? route('lokasi.index') : route('login') }}"
        class="relative flex flex-col items-center px-4 py-2 rounded-xl transition-all duration-300 {{ request()->routeIs('lokasi.index') ? 'text-blue-600' : 'text-gray-400 hover:text-gray-600 hover:bg-gray-50' }} group">

            @if(request()->routeIs('lokasi.index'))
            <span class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-blue-600 rounded-full"></span>
            @endif

            <i class="fas fa-warehouse text-xl mb-1 transition-transform duration-300 group-hover:-translate-y-1"></i>
            <span class="text-[10px] sm:text-xs font-medium">Logistik</span>
        </a>
    
    <!-- Profile/Auth -->
    @auth
        <a href="{{route('profile')}}" class="relative flex flex-col items-center px-4 py-2 rounded-xl transition-all duration-300 {{ request()->routeIs('profile') ? 'text-blue-600' : 'text-gray-400 hover:text-gray-600 hover:bg-gray-50' }} group">
            @if(request()->routeIs('profile'))
                <span class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-blue-600 rounded-full"></span>
            @endif
            <i class="fas fa-user text-xl mb-1 transition-transform duration-300 group-hover:-translate-y-1"></i>
            <span class="text-[10px] sm:text-xs font-medium">Profil</span>
        </a>
    @else
        <a href="{{route('register')}}" class="relative flex flex-col items-center px-4 py-2 rounded-xl transition-all duration-300 {{ request()->routeIs('register') || request()->routeIs('login') ? 'text-blue-600' : 'text-gray-400 hover:text-gray-600 hover:bg-gray-50' }} group">
            @if(request()->routeIs('register') || request()->routeIs('login'))
                <span class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-blue-600 rounded-full"></span>
            @endif
            <i class="fas fa-right-to-bracket text-xl mb-1 transition-transform duration-300 group-hover:-translate-y-1"></i>
            <span class="text-[10px] sm:text-xs font-medium">Masuk</span>
        </a>
    @endauth
</nav>
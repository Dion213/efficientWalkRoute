<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
    @include('partials.header')
</head>

<body class="h-full">
<div id="app">
    <div class="min-h-full">
        @include('partials.nav')
        <div class="md:pl-64 flex flex-col">
            <main class="flex-1">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900">
                            @yield('title')
                        </h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <div class="py-4">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@include('partials.scripts')
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
</body>

</html>

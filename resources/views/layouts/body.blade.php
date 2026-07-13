<body>

    <div id="app">

        @include('components.sidebar')

        <div class="main-wrapper">

            @include('components.navbar')

            <main class="main-content">

                @yield('content')

            </main>

        </div>

    </div>

</body>
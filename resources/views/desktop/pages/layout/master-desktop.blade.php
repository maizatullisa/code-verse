<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Desktop')</title>
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const sidebarModal = document.querySelector('.sidebarModal');
    const openButton = document.querySelector('.sidebarModalOpenButton'); // buat kamu panggil di UI
    const closeButton = document.querySelector('.sidebarModalCloseButton');

    if (openButton && sidebarModal) {
      openButton.addEventListener('click', () => {
        sidebarModal.classList.remove('hidden');
      });
    }

    if (closeButton && sidebarModal) {
      closeButton.addEventListener('click', () => {
        sidebarModal.classList.add('hidden');
      });
    }
  });
</script>

</head>
<body class="bg-white dark:bg-gray-900">

  @include('desktop.pages.layout.sidebar-desktop')

  <main class="ml-[250px] p-6">
    @yield('content')
  </main>

  @include('desktop.pages.layout.navbar-bawah-desktop')

</body>
</html>

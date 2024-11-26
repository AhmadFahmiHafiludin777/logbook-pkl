@if(session('success'))
        <div id="flash-message" class="bg-lime-400 text-white p-4  mb-4 transition-opacity opacity-100">
            <svg class="w-5 h-5 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
        <script>
            setTimeout(function() {
                var message = document.getElementById('flash-message');
                if (message) {
                    message.classList.remove('opacity-100');  // Menghapus opacity penuh
                    message.classList.add('opacity-0');       // Menambahkan opacity 0
                    setTimeout(function() {
                        message.style.display = 'none';  // Menyembunyikan elemen setelah transisi selesai
                    }, 300); // 300ms untuk transisi
                }
            }, 5000);  // 5000 ms = 5 detik
        </script>
    @endif

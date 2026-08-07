<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Pustaka Developer - Dokumentasi Pemrograman</title>

    <!-- Tailwind CSS & Lucide Icons CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Custom CSS Pattern & Animations -->
    <style>
        /* Background Tema Gelap (Slate-800) dengan Animasi Bintang Bergerak */
        .stars-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            background-color: #1e293b; /* Warna gelap Slate-800 */
            background-image: 
                radial-gradient(2px 2px at 20px 30px, #cbd5e1, rgba(0,0,0,0)),
                radial-gradient(2.5px 2.5px at 40px 70px, #ffffff, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 50px 160px, #94a3b8, rgba(0,0,0,0)),
                radial-gradient(1.5px 1.5px at 90px 40px, #ffffff, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 130px 80px, #e2e8f0, rgba(0,0,0,0)),
                radial-gradient(2.5px 2.5px at 160px 120px, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1.5px 1.5px at 200px 190px, #cbd5e1, rgba(0,0,0,0));
            background-repeat: repeat;
            background-size: 250px 250px;
            animation: starryNight 50s linear infinite;
        }

        @keyframes starryNight {
            from { background-position: 0 0; }
            to { background-position: -250px 500px; }
        }
        
        /* Utility class untuk bayangan tegas yang disesuaikan untuk tema gelap */
        .shadow-brutal {
            box-shadow: 4px 4px 0px 0px #020617; /* Slate-950 (hampir hitam) agar terlihat di bg gelap */
        }
    </style>
</head>
<body class="min-h-screen font-sans antialiased text-slate-900 pb-20 relative">
    
    <!-- Elemen Background Bintang Bergerak -->
    <div class="stars-bg"></div>

    <main class="max-w-md mx-auto pt-12 px-4 flex flex-col items-center relative z-10">

        <!-- Header / Profile Section -->
        <div class="relative mb-6">
            <!-- Dekorasi badge di atas avatar -->
            <div class="absolute -top-3 -right-3 bg-blue-600 text-white text-[10px] font-black px-3 py-1 rounded-full border-2 border-slate-900 shadow-brutal z-10 rotate-12">
                VERIFIED
            </div>
            <div class="w-28 h-28 rounded-[2rem] border-4 border-slate-900 overflow-hidden shadow-brutal bg-slate-100 p-1 flex justify-center items-center">
                <!-- Avatar disesuaikan dengan tema Pustaka/Buku/Kode -->
                <img src="{{ asset('images/avatar-profile.jpg') }}" alt="Pustaka Avatar" class="w-full h-full object-cover rounded-[1.5rem]">
            </div>
        </div>

        <h1 class="text-2xl font-black mb-1 text-center tracking-tight bg-slate-100 border-2 border-slate-900 px-4 py-1 rounded-xl shadow-[2px_2px_0px_0px_#020617]">
            @pustaka.dev
        </h1>

        <p class="text-center text-sm font-bold px-4 mt-4 mb-8 bg-slate-100 p-3 rounded-2xl border-2 border-slate-900 shadow-[3px_3px_0px_0px_#020617]">
            Kumpulan Referensi & Dokumentasi Belajar <br>
            <span class="text-blue-700 font-black">Frontend</span> •
            <span class="text-sky-700 font-black">Backend</span> •
            <span class="text-indigo-700 font-black">Database</span>
        </p>

        <!-- Links Container -->
        <div class="w-full space-y-5">

            <!-- Modal Trigger Card (Admin Contact) - Diperkecil 75% dan Centered -->
            <div class="flex justify-center w-full mb-6">
                <button onclick="openModal()" class="w-[75%] relative group text-left block">
                    <div class="absolute inset-0 bg-slate-950 rounded-[1.5rem] translate-y-1.5 translate-x-1.5 transition-transform group-hover:translate-y-2 group-hover:translate-x-2"></div>
                    <div class="relative w-full bg-blue-600 border-2 border-slate-900 rounded-[1.5rem] p-3 flex flex-row items-center justify-between transition-transform group-active:translate-y-1 group-active:translate-x-1">
                        <div class="flex flex-col pl-2">
                            <span class="font-black text-white text-base tracking-wide leading-tight">Hubungi Pustakawan</span>
                            <span class="text-[10px] font-bold text-blue-200 flex items-center gap-1 mt-0.5">
                                <i data-lucide="info" class="w-3 h-3"></i> Lapor Link & Saran
                            </span>
                        </div>
                        <div class="w-9 h-9 bg-white rounded-xl border-2 border-slate-900 flex items-center justify-center shrink-0 shadow-[2px_2px_0px_0px_#020617]">
                            <i data-lucide="headset" class="w-[18px] h-[18px] text-blue-600"></i>
                        </div>
                    </div>
                </button>
            </div>

            <!-- Divider -->
            <div class="flex items-center justify-center gap-3 my-2">
                <!-- Warna garis dan text diubah terang agar kontras dengan background gelap -->
                <div class="h-0.5 w-12 bg-slate-400 rounded-full"></div>
                <span class="text-xs font-black text-slate-200 tracking-widest uppercase shadow-sm">Daftar Pustaka</span>
                <div class="h-0.5 w-12 bg-slate-400 rounded-full"></div>
            </div>

            <!-- Dynamic Links Rendering Loop -->
            <!-- Rendering Daftar Tautan Publik -->

            @foreach($links as $link)
                <!-- INTEGRASI TRACKING: Ganti $link->url dengan endpoint perantara public.redirect -->
                <a href="{{ route('public.redirect', $link->id) }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="w-full block relative group">

                    <div class="absolute inset-0 bg-slate-950 rounded-3xl translate-y-1.5 translate-x-1.5 transition-transform group-hover:translate-y-2 group-hover:translate-x-2"></div>
                    <div class="relative w-full bg-slate-100 hover:bg-blue-50 border-2 border-slate-900 rounded-3xl p-4 flex items-center transition-transform group-active:translate-y-1.5 group-active:translate-x-1.5">

                        <!-- Render Logo / Placeholder Icon -->
                        @if($link->image)
                            <img src="{{ asset('storage/' . $link->image) }}"
                                 alt="{{ $link->title }}"
                                 class="w-12 h-12 object-cover rounded-[1rem] border-2 border-slate-900 absolute left-3 bg-white shadow-[2px_2px_0px_0px_#020617]">
                        @else
                            <div class="w-12 h-12 bg-blue-200 border-2 border-slate-900 rounded-[1rem] flex items-center justify-center absolute left-3 shadow-[2px_2px_0px_0px_#020617]">
                                <i data-lucide="book-open" class="w-6 h-6 text-slate-900 stroke-[2.5]"></i>
                            </div>
                        @endif

                        <span class="w-full text-left font-black text-slate-900 text-[15px] pl-14 pr-8 leading-tight truncate block">
                            {{ $link->title }}
                        </span>
                        
                        <div class="absolute right-4 w-8 h-8 bg-slate-900 rounded-full flex items-center justify-center group-hover:bg-blue-600 transition-colors">
                            <i data-lucide="arrow-up-right" class="w-4 h-4 text-white"></i>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        
        <!-- Pagination -->
        <div class="mt-8 w-full text-slate-200">
            @if($links->hasPages())
                {{ $links->links('vendor.pagination.custom-pagination') }}
            @endif
        </div>
    </main>

    <!-- Modal Component: Centered Layout -->
    <!-- Kelas flex items-center justify-center akan membuat modal berada persis di tengah -->
    <div id="contact-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300" aria-modal="true" role="dialog">

        <!-- Backdrop Blur Element -->
        <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm" onclick="closeModal()"></div>

        <!-- Modal Container (Diubah menjadi card melayang di tengah) -->
        <div id="modal-content" class="relative w-full max-w-sm bg-slate-50 border-4 border-slate-900 rounded-[2rem] p-6 max-h-[90vh] overflow-y-auto flex flex-col shadow-brutal scale-95 transition-transform duration-300">

            <div class="text-center mb-5 mt-2">
                <div class="inline-block bg-blue-100 border-2 border-slate-900 px-3 py-1 rounded-full mb-3 shadow-[2px_2px_0px_0px_#020617]">
                    <h2 class="text-xs font-black text-blue-700 uppercase tracking-wider">Help Desk</h2>
                </div>
                <h3 class="text-xl font-black text-slate-900 leading-tight">Admin Pustaka Dev</h3>
                <p class="text-xs font-bold text-slate-500 mt-1">Saran Dokumentasi & Laporan Tautan</p>
            </div>

            <!-- Detail Information Card -->
            <div class="bg-blue-100/50 border-2 border-slate-900 rounded-2xl p-4 mb-5 space-y-4 shadow-brutal">
                <div class="flex items-center gap-3 border-b-2 border-dashed border-slate-300 pb-3">
                    <div class="p-2 bg-blue-200 border-2 border-slate-900 rounded-xl shadow-[2px_2px_0px_0px_#020617]"><i data-lucide="mail" class="w-4 h-4 text-slate-900"></i></div>
                    <div>
                        <p class="font-extrabold text-sm truncate">pustaka.dev@kumpulan.id</p>
                        <p class="text-[10px] font-bold text-slate-500">Email Utama</p>
                    </div>
                </div>
                <!-- Nomor Kontak Diubah Sesuai Permintaan -->
                <div class="flex items-center gap-3 border-b-2 border-dashed border-slate-300 pb-3">
                    <div class="p-2 bg-emerald-200 border-2 border-slate-900 rounded-xl shadow-[2px_2px_0px_0px_#020617]"><i data-lucide="message-circle" class="w-4 h-4 text-slate-900"></i></div>
                    <div>
                        <p class="font-extrabold text-sm truncate">+62 856 9193 7528</p> 
                        <p class="text-[10px] font-bold text-slate-500">WhatsApp / Telegram</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="p-2 bg-amber-200 border-2 border-slate-900 rounded-xl shadow-[2px_2px_0px_0px_#020617] mt-0.5"><i data-lucide="clock" class="w-4 h-4 text-slate-900"></i></div>
                    <div>
                        <p class="font-extrabold text-sm">Respons: 1x24 Jam</p>
                        <p class="font-bold text-xs text-slate-500 mt-0.5">Senin - Jumat (09.00 - 17.00)</p>
                    </div>
                </div>
            </div>

            <!-- Disclaimer Banner -->
            <div class="bg-slate-200 border-2 border-slate-900 p-3 rounded-2xl flex gap-3 mb-6 shadow-[3px_3px_0px_0px_#020617]">
                <i data-lucide="info" class="w-5 h-5 shrink-0 mt-0.5 text-slate-700"></i>
                <p class="text-[11px] font-bold text-slate-700 leading-relaxed">
                    Punya request framework atau bahasa pemrograman tertentu? Silakan hubungi nomor kontak di atas.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="mt-auto flex gap-3">
                <button class="flex-1 bg-blue-600 text-white font-black py-3.5 rounded-2xl hover:bg-blue-700 hover:-translate-y-0.5 transition-all border-2 border-slate-900 shadow-brutal active:translate-y-1 active:shadow-none text-sm">
                    Simpan Kontak Admin
                </button>
                <button onclick="closeModal()" aria-label="Tutup Modal" class="w-12 h-12 shrink-0 bg-white border-2 border-slate-900 rounded-2xl flex items-center justify-center shadow-brutal hover:bg-rose-200 hover:-translate-y-0.5 transition-all active:translate-y-1 active:shadow-none">
                    <i data-lucide="x" class="w-5 h-5 stroke-[3] text-slate-900"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Controller Script -->
    <script>
        lucide.createIcons();

        const modal = document.getElementById('contact-modal');
        const modalContent = document.getElementById('modal-content');

        function openModal(){
            modal.classList.remove('hidden');
            // Menjadwalkan animasi transisi
            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');
                // Merubah efek scale agar modal membesar saat muncul
                modalContent.classList.remove('scale-95');
                modalContent.classList.add('scale-100');
            });
            document.body.style.overflow = 'hidden'; // Mengunci scroll halaman utama
        }

        function closeModal(){
            modal.classList.add('opacity-0');
            // Mengembalikan efek scale saat menutup
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');

            // Memberi jeda transisi sebelum menyembunyikan elemen modal sepenuhnya
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto'; // Mengaktifkan kembali scroll halaman
            }, 300);
        }
    </script>
</body>
</html>
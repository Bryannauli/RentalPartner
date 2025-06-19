@extends('layouts.app')

@section('content')


<div class="flex flex-col md:flex-row items-center justify-center min-h-screen bg-white text-black p-4">
    <div class="md:w-1/2 mb-6 md:mb-0"> 
        <img src="{{ asset('images/' . $car->image) }}" alt="{{ $car->name }}" class="rounded-xl"> 
    </div>

    <div class="md:w-1/2 md:ml-10 ">
        <div class="max-w-xl mx-auto bg-white rounded-3xl shadow-2xl border border-gray-200 overflow-hidden !pb-16 !px-10 ">
            <!-- Nama Mobil -->
            <h2 class="text-4xl font-bold mb-4">{{ $car->name }}</h2>

            <!-- Spesifikasi Singkat -->
            <div class="flex gap-6 text-sm mb-6">
                <div class="flex items-center gap-2 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z" />
                        <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3" />
                    </svg>
                    <span>{{ $car->transmission }}</span>
                </div>

                <div class="flex items-center gap-2 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                    </svg>
                    <span>{{ $car->year }}</span>
                </div>

                <div class="flex items-center gap-2 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    </svg>
                    <span>{{ $car->seat }} Seats</span>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-500 whitespace-pre-line">
                    {!! nl2br(e($car->description)) !!}
                </h3>
            </div>

            <!-- Harga -->
            <div class="mb-6">
                <div class="text-xl font-bold text-blue-600">
                    Rp {{ number_format($car->price, 0, ',', '.') }} / DAY
                </div>
            </div>

            <!-- Tombol Rent -->
            <a href="{{ route('payment.form', ['id' => $car->id]) }}" class="block bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 !text-white font-bold text-center py-4 rounded-xl transition duration-300 transform hover:scale-105 hover:shadow-l !mt-10 !mx-20">
                RENT NOW
            </a>
        </div>
    </div>
</div>

<h1 class="!ml-10 !mb-5">Contact Us : <i class="fas fa-phone-alt text-blue-600"></i>+62 811-659-0888
<br> <i class="fas fa-envelope text-blue-600 !ml-21"></i>info@rentalpartner.com</h1>

<div class="container mx-auto px-6">
    <!-- Tab Navigation -->
    <div class="border-b border-gray-700">
        <div class="flex items-center space-x-12" role="tablist">
            <button type="button" id="tab-specification" role="tab" aria-selected="true" class="text-blue-400 py-6 focus:outline-none transition duration-150 relative">
                Spesifikasi
                <div class="absolute bottom-[-1px] left-0 w-full h-[2px] bg-blue-500 tab-underline"></div>
            </button>
            <button type="button" id="tab-facilities" role="tab" aria-selected="false" class="text-gray-400 hover:text-gray-300 py-6 focus:outline-none transition duration-150 relative">
                Fasilitas
            </button>
            <button type="button" id="tab-settings" role="tab" aria-selected="false" class="text-gray-400 hover:text-gray-300 py-6 focus:outline-none transition duration-150 relative">
                Syarat dan Ketentuan
            </button>
            <button type="button" id="tab-reviews" role="tab" aria-selected="false" class="text-gray-400 hover:text-gray-300 py-6 focus:outline-none transition duration-150 relative">
                Review & Rating
            </button>
        </div>
    </div>

    <!-- Tab Panels -->
    <div class="py-6 pb-20">
        <!-- Spesifikasi Panel -->
        <div id="panel-specification" role="tabpanel" aria-labelledby="tab-specification" class="block ">
            <div class="text-left text-gray-500">
                <div class="grid grid-cols-2 gap-y-2 gap-x-4">
                    <div class="text-black">Mileage:</div>    <div>{{ $car->mileage }}</div>
                    <div class="text-black">Transmission:</div> <div>{{ $car->transmission }}</div>
                    <div class="text-black">Seats:</div>       <div>{{ $car->seat }}</div>
                    <div class="text-black">Baggage:</div>     <div>{{ $car->baggage }}</div>
                    <div class="text-black">Year:</div>        <div>{{ $car->year }}</div>
                    <div class="text-black">Type:</div>        <div>{{ $car->type }}</div>
                    <div class="text-black">Brand:</div>       <div>{{ $car->brand }}</div>
                    <div class="text-black">Location:</div>    <div>{{ $car->location }}</div>
                </div>
            </div>
        </div>

        <!-- Fasilitas Panel -->
        <div id="panel-facilities" role="tabpanel" aria-labelledby="tab-facilities" class="hidden">
            @php
                $facilities = explode("\n", $car->facilities);
            @endphp

            <ul class="list-disc list-inside text-gray-700 space-y-1 text-left">
                @foreach ($facilities as $facility)
                    @if (!empty($facility))
                        <li><i class="fas fa-check-circle"></i> {{ $facility }}</li>
                    @endif
                @endforeach
            </ul>
        </div>

        <!-- Syarat dan Ketentuan Panel -->
        <div id="panel-settings" role="tabpanel" aria-labelledby="tab-settings" class="hidden">
            <h3 class="!mt-0 !mb-0 !text-xl text-black font-bold !text-left">
                Syarat Menyewa Mobil di Rental Partner
            </h3>

            <div class="text-black text-left mt-0">
                <div>
                    <h3 class="font-semibold">✅ Dokumen yang Diperlukan:</h3>
                    <ul class="list-disc list-inside text-gray-700 ml-4 mt-0 mb-0">
                        <li>-Foto KTP</li>
                        <li>-Foto Wajah</li>
                        <li>-Bukti Pembayaran Paket Sewa H-1</li>
                    </ul>
                </div>

                <div>
                    <br>
                    <h3 class="font-semibold">📌 Ketentuan Biaya di Luar Harga Paket:</h3>
                    <ul class="list-disc list-inside text-gray-700 ml-4 space-y-1">
                        <li>-Pemesanan & pembayaran H-1, booking 10% dari total harga sewa</li>
                        <li>-Biaya overtime/jam: 10% dari total harga sewa</li>
                        <li>-Pemakaian maksimal jam 23.59 WIB</li>
                        <li>
                            <br>
                            Kondisi surcharge driver:
                            <ul class="list-disc list-inside ml-5">
                                <li>-Tanggal merah</li>
                                <li>-Perayaan hari besar seperti Idul Fitri, Natal, Tahun Baru</li>
                            </ul>
                        </li>
                        <li>Pemakaian luar kota ada tambahan biaya sesuai lokasi tujuan</li>
                        <li>Pemakaian luar Jabodetabek dikenakan tambahan biaya BBM sesuai jarak tempuh</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Review & Rating Panel -->
<div id="panel-reviews" role="tabpanel" aria-labelledby="tab-reviews" class="hidden !font-poppins !ml-10">

<div style="max-width: 600px; margin: 30px auto; ">
    {{-- Rating Umum --}}
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <h2 style="margin: 0; font-size: 24px;">5.0</h2>
        <div style="margin-left: 10px;">
            @for ($i = 1; $i <= 5; $i++)
                <span style="color: #ffcc00; font-size: 20px;">&#9733;</span>
            @endfor
            <span style="margin-left: 8px; font-size: 14px; color: #666;">(24)</span>
        </div>
    </div>

    {{-- Review List --}}
    @php
        $reviews = [
            [
                'name' => 'Zii Vapes',
                'date' => '3 ulasan',
                'star' => 5,
                'time_ago' => '29 menit lalu',
                'comment' => 'Ceritan pengalaman Anda',
                'likes' => 0,
                'dislikes' => 0,
            ],
            [
                'name' => 'Mbetz Ibanez',
                'date' => '3 ulasan',
                'star' => 5,
                'time_ago' => 'sebulan lalu',
                'comment' => 'Mantap bosku',
                'likes' => 2,
                'dislikes' => 0,
            ],
            [
                'name' => 'mr. rival ramadan',
                'date' => '1 ulasan',
                'star' => 5,
                'time_ago' => 'sebulan lalu',
                'comment' => 'Review singkat sesuai contoh',
                'likes' => 0,
                'dislikes' => 0,
            ],
        ];
    @endphp

    @foreach($reviews as $index => $review)
        <div style="background: #fff; padding: 12px; margin-bottom: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; align-items: center;">
                    <strong style="font-size: 14px; color: #333;">{{ $review['name'] }}</strong>
                    <span style="margin-left: 10px; font-size: 12px; color: #999;">{{ $review['date'] }}</span>
                </div>
                <div style="display: flex; align-items: center;">
                    {{-- Rating bintang interaktif --}}
                    <div class="stars" data-review-index="{{ $index }}" style="cursor: pointer;">
                        @for ($i = 1; $i <= 5; $i++)
                            <span style="color: {{ $i <= $review['star'] ? '#ffcc00' : '#ccc' }}; font-size: 16px;" data-star="{{ $i }}">&#9733;</span>
                        @endfor
                    </div>
                </div>
            </div>
            <p style="margin: 8px 0; font-size: 14px; color: #555;">{{ $review['comment'] }}</p>
            <div style="display: flex; gap: 10px; font-size: 14px;">
                <button class="like-btn" data-review-index="{{ $index }}" style="border: none; background: transparent; color: #3498db; cursor: pointer;">Membantu (<span class="like-count">{{ $review['likes'] }}</span>)</button>
                <button class="dislike-btn" data-review-index="{{ $index }}" style="border: none; background: transparent; color: #3498db; cursor: pointer;">Tidak Membantu (<span class="dislike-count">{{ $review['dislikes'] }}</span>)</button>
            </div>
            <div style="margin-top: 8px; font-size: 12px; color: #999;">{{ $review['time_ago'] }}</div>
        </div>
    @endforeach

    {{-- Form Tambah Review --}}
    <div style="margin-top: 30px;">
        <h3 style="text-align: center; color: #2c3e50;">Tinggalkan Review Anda</h3>
        <form action="#" method="POST" style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            @csrf
            {{-- Nama otomatis dari login --}}
            <input type="hidden" name="name" value="{{ auth()->user()->name ?? 'User' }}">
            {{-- Komentar --}}
            <div style="margin-bottom: 15px;">
                <label for="comment" style="display: block; margin-bottom: 5px; color: #34495e;">Komentar:</label>
                <textarea id="comment" name="comment" rows="4" required style="width: 100%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 4px;"></textarea>
            </div>
            {{-- Rating interaktif --}}
            <div style="margin-bottom: 15px; ">
                <label style="display: block; margin-bottom: 5px; color: #34495e;">Rating:</label>
                <div id="newRating" style="display: flex; gap: 5px; cursor: pointer;" class="!ml-57">
                    @for ($i = 1; $i <=5; $i++)
                        <span style="font-size: 20px; color: #ccc;" data-star="{{ $i }}">&#9733;</span>
                    @endfor
                </div>
                <input type="hidden" name="rating" id="ratingValue" required>
            </div>
            {{-- Submit --}}
            <div style="text-align: center;">
                <button type="submit" class="block bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 !text-white font-bold text-center py-4 !px-10 rounded-xl transition duration-300 transform hover:scale-105 hover:shadow-l !mt-10 !mx-20 !ml-50">Kirim Review</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Mengubah warna bintang saat diklik
    document.querySelectorAll('.stars span').forEach(star => {
        star.addEventListener('click', function() {
            const reviewIndex = this.parentElement.dataset.reviewIndex;
            const starNumber = parseInt(this.dataset.star);
            // Reset semua
            const allStars = this.parentElement.querySelectorAll('span');
            allStars.forEach(s => {
                s.style.color = s.dataset.star <= starNumber ? '#ffcc00' : '#ccc';
            });
            // Simpan nilai rating
            document.getElementById('ratingValue').value = starNumber;
        });
    });

    // Untuk rating baru di form
    document.getElementById('newRating').querySelectorAll('span').forEach(star => {
        star.addEventListener('click', function() {
            const starNumber = parseInt(this.dataset.star);
            const allStars = document.querySelectorAll('#newRating span');
            allStars.forEach(s => {
                s.style.color = s.dataset.star <= starNumber ? '#ffcc00' : '#ccc';
            });
            document.getElementById('ratingValue').value = starNumber;
        });
    });

    // Membantu dan Tidak Membantu klik
    document.querySelectorAll('.like-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const index = this.dataset.reviewIndex;
            const countSpan = this.querySelector('.like-count');
            let count = parseInt(countSpan.innerText);
            count += 1;
            countSpan.innerText = count;
            // Bisa tambahkan AJAX untuk simpan ke backend
        });
    });
    document.querySelectorAll('.dislike-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const index = this.dataset.reviewIndex;
            const countSpan = this.querySelector('.dislike-count');
            let count = parseInt(countSpan.innerText);
            count += 1;
            countSpan.innerText = count;
            // Bisa tambahkan AJAX untuk simpan ke backend
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Tab functionality
    const tabs = document.querySelectorAll('[role="tab"]');
    const panels = document.querySelectorAll('[role="tabpanel"]');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Deactivate all tabs
            tabs.forEach(t => {
                t.setAttribute('aria-selected', 'false');
                t.classList.remove('text-blue-400');
                t.classList.add('text-gray-400');
                const underline = t.querySelector('.tab-underline');
                if (underline) underline.remove();
            });

            // Activate clicked tab
            tab.setAttribute('aria-selected', 'true');
            tab.classList.remove('text-gray-400');
            tab.classList.add('text-blue-400');

            // Add underline
            const blueUnderline = document.createElement('div');
            blueUnderline.className = 'absolute bottom-[-1px] left-0 w-full h-[2px] bg-blue-500 tab-underline';
            tab.appendChild(blueUnderline);

            // Hide all panels
            panels.forEach(panel => {
                panel.classList.add('hidden');
                panel.classList.remove('block');
            });

            // Show corresponding panel
            const panelId = 'panel-' + tab.id.split('-')[1];
            const panel = document.getElementById(panelId);
            if (panel) {
                panel.classList.remove('hidden');
                panel.classList.add('block');
            }
        });
    });

    // Rating input functionality
    const ratingStars = document.querySelectorAll('.rating-star');
    const ratingValue = document.getElementById('rating-value');

    ratingStars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = parseInt(star.dataset.rating);
            ratingValue.value = rating;

            // Update star colors
            ratingStars.forEach((s, index) => {
                if (index < rating) {
                    s.classList.remove('text-gray-300');
                    s.classList.add('text-yellow-400');
                } else {
                    s.classList.remove('text-yellow-400');
                    s.classList.add('text-gray-300');
                }
            });
        });

        // Hover effect
        star.addEventListener('mouseenter', () => {
            const rating = parseInt(star.dataset.rating);
            ratingStars.forEach((s, index) => {
                if (index < rating) {
                    s.classList.add('text-yellow-400');
                } else {
                    s.classList.remove('text-yellow-400');
                }
            });
        });
    });

    // Reset stars on mouse leave
    const ratingContainer = document.getElementById('rating-input');
    if (ratingContainer) {
        ratingContainer.addEventListener('mouseleave', () => {
            const currentRating = parseInt(ratingValue.value) || 0;
            ratingStars.forEach((s, index) => {
                if (index < currentRating) {
                    s.classList.add('text-yellow-400');
                    s.classList.remove('text-gray-300');
                } else {
                    s.classList.remove('text-yellow-400');
                    s.classList.add('text-gray-300');
                }
            });
        });
    }
});
</script>
@endsection
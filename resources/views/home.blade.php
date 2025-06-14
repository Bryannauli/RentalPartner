@extends('layouts.app')

@section('content')
@include('landing.hero')
@include('landing.about')

<!-- Featured Cars Section -->
<section class="bg-gray-100 py-10 !mt-10" id="featured-cars">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-blue-600">Featured Cars</h2>
        </div>
        <div class="card grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-6xl mx-auto ">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col transform transition duration-500 hover:scale-105 hover:shadow-2xl hover:-translate-y-2">
                <img src="/images/Alphard.jpg" alt="Alphard" class="w-full h-[500px] md:h-[500px] object-cover">
                <div class="p-6 flex flex-col flex-grow !mt-25">
                    <h3 class="text-2xl font-bold mb-2 text-gray-800 text-center">Alphard</h3>
                    <p class="text-center text-blue-700 font-bold text-lg mb-4">Rp 2.500.000<span class="text-gray-600 font-normal text-sm">/ DAY</span></p>
                    <div class="flex justify-center space-x-4 text-gray-500 text-sm mb-6 mt-7">
                        <div class="flex items-center space-x-1">
                            <span><i class="fas fa-users"></i></span><span> &nbsp;7 Seat &nbsp;</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <span><i class="fas fa-tachometer-alt"></i></span><span> &nbsp; Automatic &nbsp;</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <span><i class="fas fa-calendar"></i></span><span>&nbsp;2023</span>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="#" class="book block bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 !text-white font-bold text-center py-5 rounded-xl transition duration-300 transform hover:scale-105 hover:shadow-lg">VIEW DETAILS</a>
                    </div>
                </div>
            </div>
            <!-- Card End -->
            <!-- Repeat for other cars -->
        </div>
    </div>
</section>

@include('landing.service')
@include('landing.review')
@include('layouts.footer')
@endsection
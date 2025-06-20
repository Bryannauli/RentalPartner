@extends('owner.layout')

@section('title', 'Review User')

@section('content')
<div class="bg-white p-6 rounded-lg  relative">
  <h2 class="text-4xl font-bold text-center mb-2 text-blue-600">Apa kata Mereka?</h2>
  <p class="text-center text-lg italic font-semibold text-black !mb-10">Rental Partner adalah Pilihan Tepat!</p>

  <div class="grid md:grid-cols-3 !gap-10 mt-10 !scroll-px-10 !mb-50">
    <!-- Testimoni 1 -->
    <div class="bg-gray-100 p-6 rounded-lg shadow-md relative transition-all duration-300 hover:scale-[1.02] hover:shadow-lg !ml-10 !py-5">
      <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-blue-600 w-12 h-12 flex items-center justify-center rounded-full">
        <span class="text-white text-2xl font-bold">“</span>
      </div>
      <p class="!mt-5 text-gray-700 text-center !px-5">Pelayanan yang sangat memuaskan! Mobilnya bersih dan terawat, harga sewa juga sangat terjangkau. Proses pemesanan cepat dan mudah. Sangat recommended!</p>
      <div class="flex justify-center mt-3 text-yellow-500 text-xl">
        ★★★★★
      </div>
      <div class="flex items-center justify-center mt-6">
        <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-blue-100 rounded-full mr-3">
          <span class="font-medium text-blue-600">A</span>
        </div>
        <div class="!ml-5">
          <p class="font-bold text-sm">Andi</p>
          <p class="text-gray-500 text-sm">Medan</p>
        </div>
      </div>
    </div>

    <!-- Testimoni 2 -->
    <div class="bg-gray-100 p-6 rounded-lg shadow-md relative transition-all duration-300 hover:scale-[1.02] hover:shadow-lg">
      <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-blue-600 w-12 h-12 flex items-center justify-center rounded-full">
        <span class="text-white text-2xl font-bold">“</span>
      </div>
      <p class="!mt-10 text-gray-700 text-center !px-5">Saya sering menggunakan jasa <b>Rental Partner</b> untuk perjalanan bisnis. Mobil selalu dalam kondisi prima, dan pelayanan pelanggan selalu ramah serta responsif. Terbaik!</p>
      <div class="flex justify-center mt-3 text-yellow-500 text-xl">
        ★★★★★
      </div>
      <div class="flex items-center justify-center mt-6">
        <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-blue-100 rounded-full mr-3">
          <span class="font-medium text-blue-600">B</span>
        </div>
        <div class="!ml-5">
          <p class="font-bold text-sm">Bryan</p>
          <p class="text-gray-500 text-sm">Jakarta</p>
        </div>
      </div>
    </div>

    <!-- Testimoni 3 -->
    <div class="bg-gray-100 p-6 rounded-lg shadow-md relative transition-all duration-300 hover:scale-[1.02] hover:shadow-lg !mr-10">
      <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-blue-600 w-12 h-12 flex items-center justify-center rounded-full">
        <span class="text-white text-2xl font-bold">“</span>
      </div>
      <p class="!mt-10 text-gray-700 text-center !px-5">Sewa mobil di <b>Rental Partner</b> sangat nyaman dan aman. Proses sewa cepat dan tanpa ribet, harga sesuai dengan kualitas. Terima kasih <b>Rental Partner!</b></p>
      <div class="flex justify-center mt-3 text-yellow-500 text-xl">
        ★★★★★
      </div>
      <div class="flex items-center justify-center mt-6">
        <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-blue-100 rounded-full mr-3">
          <span class="font-medium text-blue-600">AK</span>
        </div>
         <div class="!ml-5">
          <p class="font-bold text-sm">Agnes Ketaren</p>
          <p class="text-gray-500 text-sm">Medan</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
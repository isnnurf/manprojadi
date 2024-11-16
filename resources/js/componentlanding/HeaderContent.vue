<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';  // Import Link dari Inertia

const router = useRouter();
const isAdminLoggedIn = ref(false); // State untuk memeriksa apakah admin sedang login

// Fungsi untuk memeriksa status login (misalnya melalui token atau API)
function checkAdminStatus() {
  // Implementasi sesuai dengan autentikasi yang Anda gunakan
  isAdminLoggedIn.value = !!localStorage.getItem('admin_token'); // Misal cek token di local storage
}

// Fungsi untuk logout
async function logout() {
  try {
    await axios.post('/api/admin/logout'); // Pastikan URL ini sesuai dengan API logout Anda
    localStorage.removeItem('admin_token'); // Hapus token dari local storage
    isAdminLoggedIn.value = false;
    router.push('/'); // Arahkan ke halaman utama setelah logout
  } catch (error) {
    console.error('Logout gagal:', error);
  }
}

// Panggil fungsi checkAdminStatus() saat komponen di-mount
checkAdminStatus();
</script>

<template>
  <nav class="px-12 w-full h-[60px] bg-[#f5ebe2] flex items-center justify-between">
    <img 
      src="@/assets/images/mama_mika.png" 
      alt="makanan_bg" 
      :style="{ height: '150px', maxHeight: '100%' }" 
    />
    <ul class="flex gap-4">
      <!-- Link untuk semua pengguna -->
      <li>
        <Link href="/" class="text-black hover:text-x-yellow transition duration-150 ease-in-out">Home</Link>
      </li>
      <li>
        <Link href="/menu" class="text-black hover:text-x-yellow transition duration-150 ease-in-out">Menu</Link>
      </li>
      <li v-if="!isAdminLoggedIn">
        <Link href="/contact" class="text-black hover:text-x-yellow transition duration-150 ease-in-out">Contact Us</Link>
      </li>

      <!-- Link khusus untuk admin -->
      <li v-if="isAdminLoggedIn">
        <Link href="/add-menu" class="text-black hover:text-x-yellow transition duration-150 ease-in-out">Add Menu</Link>
      </li>
      <li v-if="isAdminLoggedIn">
        <Link href="/order-history" class="text-black hover:text-x-yellow transition duration-150 ease-in-out">Riwayat Pesanan</Link>
      </li>
    </ul>
    
    <!-- Tombol Login/Logout -->
    <Link v-if="!isAdminLoggedIn" href="/login" class="bg-red-200 px-4 py-2 rounded-full text-black hover:bg-x-yellow transition duration-150 ease-in-out">Login</Link>
    <button v-else @click="logout" class="bg-red-200 px-4 py-2 rounded-full text-black hover:bg-x-yellow transition duration-150 ease-in-out">Logout</button>
  </nav>
</template>

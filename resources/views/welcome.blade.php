<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan SYS</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <nav class="bg-white border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-center mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="logo.jpg" class="h-12" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap">Pengunjung Perpustakaan</span>
            </a>
        </div>
    </nav>

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <form action="{{ route('pengunjung.store') }}" method="POST">
                @csrf
                <div class="relative z-0 w-full mb-5 group">
                    <input list="userList" name="nim" id="nim"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="nim"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NIM/NIDN/NIK</label>
                    <datalist id="userList">
                        @foreach($users as $u)
                            <option value="{{ $u->nim_nik }}">{{ $u->nim_nik }} - {{ $u->name }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nama" id="nama"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="nama"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <select name="kategori" id="kategori"
                        class="block py-2.5 px-2 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option value="" disabled selected>Role</option>
                        <option value="Dosen">Dosen</option>
                        <option value="Karyawan">Karyawan</option>
                        <option value="Mahasiswa">Mahasiswa</option>
                    </select>
                    <label for="kategori"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kategori</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <select name="prodi" id="prodi"
                        class="block py-2.5 px-2 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option value="" disabled selected>Pilih Program Studi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Komputerisasi Akutansi">Komputerisasi Akutansi</option>
                        <option value="Desain Komunikasi dan Visual">Desain Komunikasi dan Visual</option>
                    </select>
                    <label for="prodi"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Program
                        Studi</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <select name="keperluan" id="keperluan"
                        class="block py-2.5 px-2 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option value="" disabled selected>Keperluan</option>
                        <option value="Membaca">Membaca</option>
                        <option value="Pinjam/Kembali">Pinjam/Kembali</option>
                        <option value="Belajar">Belajar</option>
                        <option value="Mengerjakan Tugas">Mengerjakan Tugas</option>
                        <option value="Menyerahkan Dokumen">Menyerahkan Dokumen</option>
                        <option value="Tamu">Tamu</option>
                    </select>
                    <label for="keperluan"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keperluan</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <textarea name="kritiksaran" id="kritiksaran"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" "></textarea>
                    <label for="kritiksaran"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kritik
                        dan Saran</label>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </div>

    <footer class="text-gray-600 body-font mt-8 bg-white rounded-lg">
        <div class="container px-5 py-4 mx-auto flex flex-col items-center">
          <a class="flex title-font font-medium items-center justify-center text-gray-900">
            <img src="logo.png" alt="Himpunan Mahasiswa Profesi Teknik Kimia" class="h-12 md:h-12 w-auto" />
            <span class="ml-3 text-xl">Perpustakaan SYS</span>
          </a>
          <p class="text-sm text-gray-500 mt-4 text-center">© 2025 Perpustakaan SYS | Developed by 
            <a href="https://www.instagram.com/gerson.m5/" class="text-gray-900 ml-1" rel="noopener noreferrer" target="_blank">@gerson.m5</a> | Open for website development projects & freelance work |
            <a href="https://wa.me/6285156106221" target="_blank" class="text-green-500 hover:underline">Contact via WhatsApp</a>
          </p>
        </div>
      </footer>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @if(session('success'))
                Swal.fire({
                    title: "Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            @endif
        });
    </script>
    <script>
        document.getElementById('nim').addEventListener('input', function () {
            let nimInput = this.value;
            let userList = @json($users);

            let selectedUser = userList.find(user => user.nim_nik == nimInput);

            if (selectedUser) {
                document.getElementById('nama').value = selectedUser.name;
                document.getElementById('kategori').value = selectedUser.kategori;
                document.getElementById('prodi').value = selectedUser.prodi;
            } else {
                document.getElementById('nama').value = '';
                document.getElementById('kategori').value = '';
                document.getElementById('prodi').value = '';
            }
        });
    </script>



</body>

</html>
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Daftar Kriteria</h1>
        <a href="{{ route('kriteria.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah</a>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="bg-green-500 text-white py-2 px-4 rounded mb-4 relative">
            {{ $message }}
            <button type="button" class="absolute top-0 right-0 mt-2 mr-2 text-green-700 focus:outline-none" onclick="this.parentElement.style.display='none';">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L15.586 3 17 4.414 11.414 10 17 15.586 15.586 17 10 11.414 4.414 17 3 15.586 8.586 10 3 4.414 4.414 3z"/></svg>
            </button>
        </div>
    @endif
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
            <thead class="bg-blue-100">
                <tr>
                    <th class="border border-gray-300 py-3 px-6 text-center">No</th>
                    <th class="border border-gray-300 py-3 px-6 text-center">Kode Kriteria</th>
                    <th class="border border-gray-300 py-3 px-6 text-center">Nama Kriteria</th>
                    <th class="border border-gray-300 py-3 px-6 text-center">Bobot</th>
                    <th class="border border-gray-300 py-3 px-6 text-center">Jenis</th>
                    <th class="border border-gray-300 py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriterias as $index => $kriteria)
                <tr class="hover:bg-blue-100">
                    <td class="border border-gray-300 py-3 px-6 text-center">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 py-3 px-6 text-center">{{ $kriteria->kode_kriteria }}</td>
                    <td class="border border-gray-300 py-3 px-6">{{ $kriteria->nama_kriteria }}</td>
                    <td class="border border-gray-300 py-3 px-6 text-center">{{ $kriteria->bobot }}</td>
                    <td class="border border-gray-300 py-3 px-6 text-center">{{ $kriteria->jenis }}</td>
                    <td class="border border-gray-300 py-3 px-6 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('kriteria.show', $kriteria->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                                <i class="fa fa-plus"></i>
                            </a>
                            <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                            <button onclick="showModal('{{ route('kriteria.destroy', $kriteria->id) }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Hapus</button>
                        </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-xl mb-4">Konfirmasi Penghapusan</h2>
        <p>Apakah Anda yakin ingin menghapus Mahasiswa ini?</p>
        <div class="flex justify-end mt-4">
            <button onclick="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
            <form id="delete-form" action="" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
    function showModal(action) {
        document.getElementById('delete-form').action = action;
        document.getElementById('delete-modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('delete-modal').classList.add('hidden');
    }

</script>

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@endsection

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-4">Tambah Penilaian Alternatif Kriteria</h2>

    @if ($message = Session::get('error'))
    <div class="bg-red-500 text-white py-2 px-4 rounded mb-4">
        {{ $message }}
        <button type="button" class="absolute top-0 right-0 mt-2 mr-2 text-red-700 focus:outline-none" onclick="this.parentElement.style.display='none';">
            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L15.586 3 17 4.414 11.414 10 17 15.586 15.586 17 10 11.414 4.414 17 3 15.586 8.586 10 3 4.414 4.414 3z"/></svg>
        </button>
    </div>
    @endif

    
    <form action="{{ route('alternatif_kriterias.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="alternatif_id" class="block text-gray-700">Nama Siswa:</label>
            <select name="alternatif_id" id="alternatif_id" class="w-full mt-2 p-2 border rounded">
                @foreach($alternatifs as $alternatif)
                    <option value="{{ $alternatif->id }}">{{ $alternatif->nama }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4 grid grid-cols-3 gap-4">
            @foreach($kriterias as $kriteria)
                <div>
                    <label class="block text-gray-700">{{ $kriteria->nama_kriteria }}</label>
                    <select name="penilaian[{{ $loop->index }}][crips_id]" class="w-full mt-2 p-2 border rounded">
                        <option value="">Pilih</option>
                        @foreach($kriteria->crips as $crip)
                            <option value="{{ $crip->id }}" data-nilai="{{ $crip->nilai }}">{{ $crip->nama }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="penilaian[{{ $loop->index }}][kriteria_id]" value="{{ $kriteria->id }}">
                </div>
            @endforeach
        </div>
        
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
    </form>
</div>
@endsection

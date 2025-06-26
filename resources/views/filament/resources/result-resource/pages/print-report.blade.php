<x-filament-panels::page>
    <div class="flex justify-end mb-4 gap-4 no-print">
        <x-filament::button icon="heroicon-o-printer" onclick="window.print()" size="sm">
            Cetak Laporan
        </x-filament::button>

    </div>
    

    <div class="bg-white dark:bg-black  p-6 print:p-5  " style="color: black;">
        <!-- Kop Surat -->
        <div class="border-b-2 border-gray-800 pb-4 mb-6 ">
            <div class="flex justify-between gap-4 mb-10">
                <div class="col-span-1 text-center">
                    <img src="{{ asset('image/labura.png') }}" alt="Logo Desa" class="w-20 h-20 mx-auto">
                </div>
                <div class="col-span-2 text-center">
                    <h1 class="text-xl font-bold uppercase">PEMERINTAH DESA BANDAR LAMA</h1>
                    <h2 class="text-lg">Kecamatan Bandar Pasir Mandoge</h2>
                    <h3 class="text-lg">Kabupaten Labuhan Batu Utara</h3>
                    <p class="text-sm mt-1"> Kode Pos: 21457</p>
                </div>
                <div class=""></div>
            </div>
            <hr class="my-10 print:my-10" style="margin:20px ;">
            <!-- Isi Laporan -->
            <div class="mt-5">
                <div class="text-center mt-5">
                    <h1 class="text-xl font-bold underline">LAPORAN Penerima BLT</h1>

                </div>

                <h3 class="font-bold mt-6 mb-4 text-lg">A. Hasil Penilaian</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border border-gray-400 print:text-xs">
                        <thead class="bg-gray-100">
                            <tr class="text-center">
                                <th class="border border-gray-400 px-3 py-2">No</th>
                                <th class="border border-gray-400 px-3 py-2">Nama Alternatif</th>
                                <th class="border border-gray-400 px-3 py-2">Poin</th>
                                <th class="border border-gray-400 px-3 py-2">Nilai</th>
                                <th class="border border-gray-400 px-3 py-2">Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->getReportData()['results'] as $index => $result)
                                <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="border border-gray-400 px-3 py-2 text-center">{{ $index + 1 }}</td>
                                    <td class="border border-gray-400 px-3 py-2">{{ $result->alternative->alternative_name }}</td>
                                    <td class="border border-gray-400 px-3 py-2 text-center">{{ $result->result }}</td>
                                    <td class="border border-gray-400 px-3 py-2 text-center">{{ $result->nilai }}</td>
                                    <td class="border border-gray-400 px-3 py-2 text-center">{{ $result->ranking }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="border border-gray-400 px-3 py-2 text-center italic text-gray-500">
                                        Tidak ada data hasil penilaian.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Tanda Tangan -->
                <div class="mt-12" style="margin-top: 50px;">
                    <div class="float-right text-center w-64">
                        <p>Bandar Lama, {{ $this->getReportData()['tanggal'] }}</p>
                        <p>Kepala Desa Bandar Lama</p>
                        <div class="mt-16 mb-4">
                            <p class="font-bold underline">{{ $this->getReportData()['kepala_desa'] }}</p>
                            <p>NIP. {{ $this->getReportData()['nip'] }}</p>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <style>
            @media print {

                /* Sembunyikan semua komponen Filament */
                .filament-header,
                .filament-sidebar,
                .filament-main-topbar,
                .no-print {
                    display: none !important;
                }

                /* Reset layout */


                /* Konten full width */
                /* .print-content {
                                        width: 100% !important;
                                        margin: 0 !important;
                                        padding: 0 !important;
                                    } */

                /* Style untuk tabel */
                table {
                    width: 100%;
                    border-collapse: collapse;
                }

                th,
                td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                }

                th {
                    background-color: #f2f2f2;
                }

                aside,
                header,
                nav,
                .fi-sidebar,
                .fi-topbar,
                .filament-sidebar-open {
                    display: none !important;
                }

            }
        </style>
    @endpush
</x-filament-panels::page>

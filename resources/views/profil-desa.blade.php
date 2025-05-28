<x-theme.theme-main>


    <!-- Hero Section Profil -->
    <section class="bg-green-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Profil Desa Bandar Lama</h1>
            <p class="text-lg">Mengenal lebih dekat sejarah, visi misi, dan potensi Desa Bandar Lama.</p>
        </div>
    </section>

    <!-- Sejarah Desa -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="{{ asset('image/kantor desa 2.jpg') }}" alt="Sejarah Desa" class="rounded-lg shadow-lg">
                </div>
                <div class="md:w-1/2 md:pl-12">
                    <h2 class="text-2xl font-bold text-green-800 mb-4">Sejarah Desa</h2>
                    <p class="text-gray-700 mb-4 text-justify indent-10">Desa Bandar Lama, adalah sebuah desa yang
                        terletak di Kecamatan Kualuh
                        Selatan, Kabupaten Labuhanbatu Utara, merupakan desa dengan topografi dataran rendah yang
                        didominasi oleh perkebunan sawit, karet, dan padi. Berdiri sejak September 1946, desa ini
                        memiliki arti historis sebagai lumbung penghasilan dari tanaman karet dan padi. Saat ini, Desa
                        Bandar Lama terdiri dari 10 dusun dan telah dipimpin oleh tujuh kepala desa dari masa ke masa.
                        Secara geografis, desa ini berbatasan dengan Desa Kuala Beringin di sebelah barat, Desa Damuli
                        Pekan di timur, Desa Sidua Dua di utara, dan Desa Damuli Kebun di selatan, dengan jarak sekitar
                        6 km dari ibu kota kecamatan yang dapat ditempuh dalam waktu 6 menit. </p>
                    <p class="text-gray-700 text-justify indent-10">Dengan jumlah penduduk sebanyak 3.538 jiwa yang
                        terbagi dalam 988 kepala
                        keluarga, mayoritas penduduknya beragama Islam, sementara sebagian lainnya beragama Kristen.
                        Dari segi pendidikan, tingkat pendidikan masyarakat masih cukup bervariasi, dengan jumlah
                        lulusan perguruan tinggi yang masih relatif rendah dibandingkan jumlah total penduduk, sementara
                        sarana pendidikan yang tersedia meliputi dua RA/TK dan tiga SD. Dalam aspek ekonomi, mayoritas
                        penduduk bekerja sebagai petani sawit, sementara profesi lainnya mencakup pedagang, PNS, sopir,
                        dan karyawan. Desa ini juga kaya akan keberagaman budaya dengan dominasi suku Batak, Jawa, dan
                        Mandailing yang tetap menjaga adat serta tradisi mereka melalui praktik musyawarah, gotong
                        royong, serta nilai-nilai kearifan lokal lainnya. Sarana ibadah di desa ini terdiri dari tujuh
                        masjid dan empat gereja yang mendukung aktivitas keagamaan masyarakat. Meskipun dalam hal
                        pendidikan masih tertinggal dibandingkan daerah perkotaan, masyarakat Desa Bandar Lama terus
                        berupaya meningkatkan kualitas hidup mereka melalui pendidikan dan pelestarian budaya yang telah
                        diwariskan turun-temurun.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi & Misi -->
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center text-green-800 mb-8">Visi & Misi Desa</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-green-700 mb-4">Visi</h3>
                    <p class="text-gray-700">"Mewujudkan Desa Bandar Lama yang Maju, Mandiri, Sejahtera, dan Berbudaya
                        dengan Berbasis Pertanian, Pendidikan, serta Kearifan Lokal."</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-green-700 mb-4">Misi</h3>
                    <ul class="list-disc pl-5 text-gray-700 space-y-2">
                        <li>Melalui pengembangan sektor pertanian, perkebunan, dan usaha mikro kecil menengah (UMKM)
                            berbasis potensi lokal. </li>
                        <li>Dengan mendorong akses pendidikan yang lebih baik serta meningkatkan keterampilan masyarakat
                            melalui pelatihan dan program pemberdayaan. </li>
                        <li>Guna mendukung mobilitas dan kesejahteraan masyarakat, termasuk perbaikan jalan, sarana air
                            bersih, dan fasilitas umum lainnya. </li>
                        <li>Dengan menerapkan tata kelola pemerintahan desa yang baik dan berbasis teknologi informasi.
                        </li>
                        <li>Dengan menjaga tradisi serta memperkuat nilai-nilai gotong royong, musyawarah, dan kearifan
                            lokal sebagai bagian dari identitas desa. </li>
                        <li>Melalui program kesehatan, penyediaan layanan medis yang memadai, serta peningkatan
                            kesadaran akan pola hidup sehat. </li>
                        <li>Dengan memperkuat kerja sama antara masyarakat dan aparatur desa dalam menciptakan
                            lingkungan yang aman dan harmonis</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur Pemerintahan -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center text-green-800 mb-8">Struktur Pemerintahan Desa</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-green-700 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">Jabatan</th>
                            <th class="py-3 px-4 text-left">Nama</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Desa</td>
                            <td class="py-3 px-4">ILHAM HIDAYAT </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Sekretaris Desa</td>
                            <td class="py-3 px-4">Ferbri Sanjaya Sitorus</td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Urusan Tata Usaha Dan Umum</td>
                            <td class="py-3 px-4">Yessy Tesya Ningsih</td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Urusan Keuangan </td>
                            <td class="py-3 px-4">Siti Fatimah </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Urusan Perencanaan </td>
                            <td class="py-3 px-4">Dahlia Hutapea </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Seksi Pemerintahan</td>
                            <td class="py-3 px-4">Wirya </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Dusun IA </td>
                            <td class="py-3 px-4">Dedi </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Dusun IB</td>
                            <td class="py-3 px-4">Dudi </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Dusun II</td>
                            <td class="py-3 px-4">Ahmad Bide</td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Dusun III</td>
                            <td class="py-3 px-4">Adi</td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Dusun IIIB</td>
                            <td class="py-3 px-4">Sariono</td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Dusun IV</td>
                            <td class="py-3 px-4">Ishaq</td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Dusun V</td>
                            <td class="py-3 px-4">Sriwahyuni</td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Dusun VI</td>
                            <td class="py-3 px-4">Aminuddin</td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Dusun VII</td>
                            <td class="py-3 px-4">Ilhamudin</td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">Kepala Dusun VIII</td>
                            <td class="py-3 px-4">Markus Sng</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Data Demografi -->
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center text-green-800 mb-8">Data Demografi</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Jumlah Penduduk</h3>
                    <p class="text-3xl font-bold">3.538 </p>
                    <p class="text-gray-600">Jiwa (2024)</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Kode Kamendagri</h3>
                    <p class="text-3xl font-bold">12.23.08.2008 </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Jumlah Dusun</h3>
                    <p class="text-3xl font-bold">10</p>
                    <p class="text-gray-600">Dusun</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Potensi Desa -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center text-green-800 mb-8">Potensi Desa</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                    <img src="{{ asset('image/kelapa-sawit.jpg') }}" alt="Pertanian"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-green-700 mb-2">Perkebunan Kelapa Sawit</h3>
                        <p class="text-gray-700">Kelapa Sawit</p>
                    </div>
                </div>
                {{-- <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/400x250" alt="Pertanian" class="w-full object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-green-700 mb-2">Perkebunan Karet</h3>
                        <p class="text-gray-700">Produksi kelapa karet.</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
</x-theme.theme-main>

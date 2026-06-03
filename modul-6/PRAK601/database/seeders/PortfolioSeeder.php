<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Experience;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'name' => 'Achmad Reihan Alfaiz',
            'nim' => '2410817210019',
            'major' => 'Teknologi Informasi',
            'hobbies' => 'Bermain Video Game, Membaca Manhwa, Menonton YouTube',
            'skills' => 'React, Tailwind, Git, CI/CD',
            'photo' => 'images/profile.jpg'
        ]);

        Experience::create([
            'title' => 'Mengikuti Lomba Catur VendIT',
            'time' => 'Akhir Semester 3',
            'impression' => 'Seru karena bisa bertanding catur secara offline.',
            'description' => 'Perlombaan catur yang diadakan oleh himpunan mahasiswa Teknologi Informasi dengan format single elimination bracket.',
            'image' => 'images/experience-catur-vendit.jpg'
        ]);

        Experience::create([
            'title' => 'Lolos Seleksi Google Student Ambassador',
            'time' => 'Semester 3',
            'impression' => 'Sangat senang karena bisa menjadi GSA.',
            'description' => 'Tim Google membuka pendaftaran untuk terpilih sebagai Google Student Ambassador di Universitas kamu.',
            'image' => 'images/experience-google-student-ambassador.jpg'
        ]);

        Experience::create([
            'title' => 'Nilai 100 UAS Pemrograman II',
            'time' => 'Semester 3',
            'impression' => 'Sangat senang karena tidak menyangka bisa mendapatkan nilai 100 pada UAS mata kuliah ini karena penilaian UAS sangat ketat yang membuat rata-rata nilai UAS kelas di ambang tidak lulus.',
            'description' => 'Presentasi akhir / UAS mata kuliah Pemrograman II yang diampu oleh dosen Pak Irham Maulani Abdul Gani S.Kom., M.Kom.',
            'image' => 'images/experience-java-pbo.png'
        ]);

        Experience::create([
            'title' => 'Mengikuti Seluruh Kelas Dosen Pak Fadliyanur',
            'time' => 'Semester 2, 3, dan 4',
            'impression' => 'Semua kelas dari mata kuliah yang diampu oleh pak dosen terasa seperti obat penenang dari intensnya kelas-kelas yang ada, walaupun seperti itu, ilmu yang beliau berikan sangat bermanfaat.',
            'description' => 'Mengikuti mata kuliah Kewarganegaraan saat semester 2, Agama saat semester 3, dan Bahasa Indonesia saat semester 4. Mata kuliah tersebut diampu oleh dosen Pak Fadliyanur S.Pd.I., M.Pd.',
            'image' => 'images/experience-fadliyanur.jpg'
        ]);
    }
}
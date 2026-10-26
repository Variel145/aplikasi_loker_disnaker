<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\JobField;
use App\Models\User;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Membuat 25 lowongan contoh dengan variasi:
     * - Kode Holland berbeda
     * - Bidang kerja berbeda
     * - Level pendidikan berbeda
     */
    public function run(): void
    {
        // Ambil admin user (atau buat jika tidak ada)
        $admin = User::where('role', 'admin')->first();
        if (!$admin) {
            $admin = User::create([
                'name' => 'Admin Disnaker',
                'email' => 'admin@disnaker.sleman.go.id',
                'password' => bcrypt('password123'),
                'role' => 'admin',
                'age_confirmed' => true,
                'data_consent_at' => now(),
                'email_verified_at' => now(),
            ]);
        }

        $fields = JobField::all()->keyBy('id');
        $fieldIds = $fields->keys()->toArray();

        $jobs = [
            // ===== REALISTIC (R) - Lowongan untuk tipe Realistik =====
            [
                'title' => 'Teknisi Mesin',
                'company_name' => 'PT Industri Maju Jaya',
                'location' => 'Sleman',
                'education_min' => 'SMK',
                'holland_code' => 'REC',
                'field_id' => $fieldIds[5] ?? null, // Manufaktur
                'description' => 'Kami mencari teknisi mesin berpengalaman untuk perawatan dan perbaikan mesin industri.',
                'contact_value' => 'jobs@industrimasjaya.com',
                'posted_at' => now()->subDays(5),
                'expires_at' => now()->addDays(25),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Tukang Bangunan',
                'company_name' => 'CV Konstruksi Sleman',
                'location' => 'Sleman',
                'education_min' => 'SMA/SMK',
                'holland_code' => 'RIS',
                'field_id' => $fieldIds[6] ?? null, // Konstruksi
                'description' => 'Dicari tukang bangunan untuk proyek perumahan di Sleman.',
                'contact_value' => '081234567890',
                'posted_at' => now()->subDays(3),
                'expires_at' => now()->addDays(27),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Driver Profesional',
                'company_name' => 'PT Logistik Cepat',
                'location' => 'Yogyakarta',
                'education_min' => 'SMA/SMK',
                'holland_code' => 'RES',
                'field_id' => $fieldIds[9] ?? null, // Transportasi & Logistik
                'description' => 'Cari driver berpengalaman untuk armada logistik Yogyakarta.',
                'contact_value' => 'hr@logistikcepat.com',
                'posted_at' => now()->subDays(1),
                'expires_at' => now()->addDays(29),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],

            // ===== INVESTIGATIVE (I) - Lowongan untuk tipe Investigatif =====
            [
                'title' => 'Software Developer',
                'company_name' => 'PT Teknologi Digital Sleman',
                'location' => 'Sleman',
                'education_min' => 'S1',
                'holland_code' => 'IER',
                'field_id' => $fieldIds[0] ?? null, // IT
                'description' => 'Dibutuhkan software developer dengan skill PHP/Laravel minimal 2 tahun.',
                'contact_value' => 'careers@tekdigital.co.id',
                'posted_at' => now()->subDays(7),
                'expires_at' => now()->addDays(23),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Data Analyst',
                'company_name' => 'PT Bank Sleman Digital',
                'location' => 'Sleman',
                'education_min' => 'S1',
                'holland_code' => 'IES',
                'field_id' => $fieldIds[3] ?? null, // Keuangan & Perbankan
                'description' => 'Analisis data untuk pengembangan produk bank digital.',
                'contact_value' => 'recruitment@banksleman.id',
                'posted_at' => now()->subDays(4),
                'expires_at' => now()->addDays(26),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Research Scientist',
                'company_name' => 'Universitas Gadjah Mada',
                'location' => 'Yogyakarta',
                'education_min' => 'S2',
                'holland_code' => 'IRA',
                'field_id' => $fieldIds[2] ?? null, // Pendidikan
                'description' => 'Peneliti untuk lab bioteknologi dengan fokus pertanian berkelanjutan.',
                'contact_value' => 'research@ugm.ac.id',
                'posted_at' => now()->subDays(6),
                'expires_at' => now()->addDays(24),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],

            // ===== ARTISTIC (A) - Lowongan untuk tipe Artistik =====
            [
                'title' => 'Graphic Designer',
                'company_name' => 'Studio Desain Kreatif',
                'location' => 'Sleman',
                'education_min' => 'SMA/SMK',
                'holland_code' => 'AES',
                'field_id' => $fieldIds[12] ?? null, // Seni & Desain
                'description' => 'Desainer grafis untuk project branding dan marketing materials.',
                'contact_value' => 'admin@studiokreatif.com',
                'posted_at' => now()->subDays(2),
                'expires_at' => now()->addDays(28),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Content Creator',
                'company_name' => 'PT Media Digital Sleman',
                'location' => 'Sleman',
                'education_min' => 'S1',
                'holland_code' => 'AEC',
                'field_id' => $fieldIds[12] ?? null, // Seni & Desain
                'description' => 'Pembuat konten untuk media sosial dan platform digital.',
                'contact_value' => 'jobs@mediadigital.com',
                'posted_at' => now()->subDays(0),
                'expires_at' => now()->addDays(30),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],

            // ===== SOCIAL (S) - Lowongan untuk tipe Sosial =====
            [
                'title' => 'Guru Sekolah Dasar',
                'company_name' => 'SD Negeri Sleman Jaya',
                'location' => 'Sleman',
                'education_min' => 'S1',
                'holland_code' => 'SIA',
                'field_id' => $fieldIds[2] ?? null, // Pendidikan
                'description' => 'Guru untuk kelas 4-6 dengan sertifikat pendidik.',
                'contact_value' => 'hrd@sdnslmnjaya.sch.id',
                'posted_at' => now()->subDays(8),
                'expires_at' => now()->addDays(22),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Perawat Kesehatan',
                'company_name' => 'Rumah Sakit Sleman Medika',
                'location' => 'Sleman',
                'education_min' => 'D3',
                'holland_code' => 'SER',
                'field_id' => $fieldIds[1] ?? null, // Kesehatan
                'description' => 'Perawat untuk unit rawat inap dengan pengalaman minimal 1 tahun.',
                'contact_value' => 'recruitment@rssleman.co.id',
                'posted_at' => now()->subDays(5),
                'expires_at' => now()->addDays(25),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Konselor Karir',
                'company_name' => 'Dinas Tenaga Kerja Sleman',
                'location' => 'Sleman',
                'education_min' => 'S1',
                'holland_code' => 'SEC',
                'field_id' => $fieldIds[15] ?? null, // Layanan Publik
                'description' => 'Konselor untuk memberikan bimbingan karir kepada pencari kerja.',
                'contact_value' => 'disnaker@slemankab.go.id',
                'posted_at' => now()->subDays(3),
                'expires_at' => now()->addDays(27),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],

            // ===== ENTERPRISING (E) - Lowongan untuk tipe Enterprising =====
            [
                'title' => 'Manager Marketing',
                'company_name' => 'PT Retail Modern Jaya',
                'location' => 'Sleman',
                'education_min' => 'S1',
                'holland_code' => 'ECS',
                'field_id' => $fieldIds[4] ?? null, // Pemasaran
                'description' => 'Manager untuk strategi pemasaran dan promosi produk.',
                'contact_value' => 'career@retailmodern.id',
                'posted_at' => now()->subDays(6),
                'expires_at' => now()->addDays(24),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Sales Executive',
                'company_name' => 'PT Fintech Solusi Digital',
                'location' => 'Yogyakarta',
                'education_min' => 'SMA/SMK',
                'holland_code' => 'ERS',
                'field_id' => $fieldIds[3] ?? null, // Keuangan & Perbankan
                'description' => 'Sales untuk produk fintech dengan target pencapaian KPI.',
                'contact_value' => 'recruitment@fintechsolusi.id',
                'posted_at' => now()->subDays(1),
                'expires_at' => now()->addDays(29),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Entrepreneur Support Officer',
                'company_name' => 'Inkubator Bisnis Sleman',
                'location' => 'Sleman',
                'education_min' => 'S1',
                'holland_code' => 'EIS',
                'field_id' => $fieldIds[0] ?? null, // IT (bisa juga entrepreneurship)
                'description' => 'Pendampingan startup dan UMKM di bidang teknologi.',
                'contact_value' => 'info@inkubasislm.org',
                'posted_at' => now()->subDays(4),
                'expires_at' => now()->addDays(26),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],

            // ===== CONVENTIONAL (C) - Lowongan untuk tipe Konvensional =====
            [
                'title' => 'Akuntan',
                'company_name' => 'PT Konsultan Bisnis Sleman',
                'location' => 'Sleman',
                'education_min' => 'S1',
                'holland_code' => 'CER',
                'field_id' => $fieldIds[3] ?? null, // Keuangan & Perbankan
                'description' => 'Akuntan untuk audit keuangan perusahaan.',
                'contact_value' => 'hr@konsilm.co.id',
                'posted_at' => now()->subDays(5),
                'expires_at' => now()->addDays(25),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Staff Administrasi',
                'company_name' => 'PT Distributor Barang Elektronik',
                'location' => 'Sleman',
                'education_min' => 'SMA/SMK',
                'holland_code' => 'CES',
                'field_id' => $fieldIds[7] ?? null, // Ritel & Perdagangan
                'description' => 'Staff admin untuk manajemen dokumen dan inventaris.',
                'contact_value' => 'recruitment@distribsleman.com',
                'posted_at' => now()->subDays(2),
                'expires_at' => now()->addDays(28),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Database Administrator',
                'company_name' => 'PT Bank Sleman Digital',
                'location' => 'Sleman',
                'education_min' => 'S1',
                'holland_code' => 'CIE',
                'field_id' => $fieldIds[0] ?? null, // IT
                'description' => 'Admin database untuk sistem perbankan.',
                'contact_value' => 'it-recruitment@banksleman.id',
                'posted_at' => now()->subDays(7),
                'expires_at' => now()->addDays(23),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],

            // ===== Mix Type - Kombinasi =====
            [
                'title' => 'Manajer Operasional',
                'company_name' => 'Hotel Sleman Jaya',
                'location' => 'Sleman',
                'education_min' => 'S1',
                'holland_code' => 'ESC',
                'field_id' => $fieldIds[8] ?? null, // Perhotelan & Pariwisata
                'description' => 'Manajer untuk operasional hotel dan customer service.',
                'contact_value' => 'hr@hotelslemanjaya.com',
                'posted_at' => now()->subDays(3),
                'expires_at' => now()->addDays(27),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Field Officer Survei',
                'company_name' => 'Lembaga Penelitian Terapan',
                'location' => 'Yogyakarta',
                'education_min' => 'S1',
                'holland_code' => 'RIS',
                'field_id' => $fieldIds[2] ?? null, // Pendidikan/Riset
                'description' => 'Surveyor untuk riset lapangan di kawasan Sleman-Yogyakarta.',
                'contact_value' => 'recruitment@lembagapeneitian.org',
                'posted_at' => now()->subDays(4),
                'expires_at' => now()->addDays(26),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'UI/UX Designer',
                'company_name' => 'PT Startup Digital Yogyakarta',
                'location' => 'Yogyakarta',
                'education_min' => 'S1',
                'holland_code' => 'AIE',
                'field_id' => $fieldIds[0] ?? null, // IT
                'description' => 'Designer untuk aplikasi mobile dan web.',
                'contact_value' => 'careers@startup-digital.id',
                'posted_at' => now()->subDays(0),
                'expires_at' => now()->addDays(30),
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\JobField;
use Illuminate\Database\Seeder;

class JobFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * 21 bidang pekerjaan berdasarkan KBLI 2020 (Klasifikasi Baku Lapangan Usaha Indonesia)
     * Sumber: Standar Pemerintah Indonesia
     * Dengan contoh profesi/pekerjaan untuk setiap bidang
     */
    public function run(): void
    {
        // Truncate table untuk menghapus data lama jika ada
        JobField::truncate();

        $fields = [
            [
                'name_id' => 'Pertanian, Kehutanan, dan Perikanan',
                'name_en' => 'Agriculture, Forestry, and Fisheries',
                'examples_id' => 'Petani padi, peternak ayam, nelayan, petani kelapa sawit, pekerja perkebunan, teknisi pertanian',
                'examples_en' => 'Rice farmer, chicken breeder, fisherman, palm oil farmer, plantation worker, agricultural technician',
            ],
            [
                'name_id' => 'Pertambangan dan Penggalian',
                'name_en' => 'Mining and Quarrying',
                'examples_id' => 'Penambang batu bara, penambang nikel, teknisi tambang, ahli geologi tambang, pekerja pertambangan',
                'examples_en' => 'Coal miner, nickel miner, mining technician, mining geologist, mining worker',
            ],
            [
                'name_id' => 'Industri Pengolahan',
                'name_en' => 'Manufacturing Industry',
                'examples_id' => 'Operator pabrik, penjahit, pekerja pabrik makanan, teknisi produksi, supervisor pabrik, quality control',
                'examples_en' => 'Factory operator, tailor, food factory worker, production technician, factory supervisor, quality control officer',
            ],
            [
                'name_id' => 'Pengadaan Listrik, Gas, Uap/Udara Panas',
                'name_en' => 'Electricity, Gas, Steam/Hot Air Supply',
                'examples_id' => 'Teknisi listrik, operator pembangkit listrik, petugas pemeliharaan jaringan listrik, electrical engineer',
                'examples_en' => 'Electrical technician, power plant operator, power line maintenance officer, electrical engineer',
            ],
            [
                'name_id' => 'Pengelolaan Air, Pengelolaan Sampah, Limbah, dan Daur Ulang',
                'name_en' => 'Water Management, Waste Management, and Recycling',
                'examples_id' => 'Petugas kebersihan, operator IPAL, pekerja daur ulang, teknisi pengelolaan limbah, petugas saniter',
                'examples_en' => 'Sanitation worker, WWTP operator, recycling worker, waste management technician, sanitation officer',
            ],
            [
                'name_id' => 'Konstruksi',
                'name_en' => 'Construction',
                'examples_id' => 'Tukang bangunan, arsitek, mandor proyek, insinyur sipil, tukang las, pekerja konstruksi',
                'examples_en' => 'Construction worker, architect, project foreman, civil engineer, welder, construction laborer',
            ],
            [
                'name_id' => 'Perdagangan Besar dan Eceran',
                'name_en' => 'Wholesale and Retail Trade',
                'examples_id' => 'Kasir, pramuniaga, pemilik toko, staf gudang, sales assistant, merchandiser',
                'examples_en' => 'Cashier, shop assistant, store owner, warehouse staff, sales assistant, merchandiser',
            ],
            [
                'name_id' => 'Transportasi dan Pergudangan',
                'name_en' => 'Transportation and Warehousing',
                'examples_id' => 'Sopir, kurir, masinis, petugas logistik, awak kapal, pilot, petugas bandara',
                'examples_en' => 'Driver, courier, train operator, logistics officer, ship crew, pilot, airport officer',
            ],
            [
                'name_id' => 'Penyediaan Akomodasi dan Makan Minum',
                'name_en' => 'Accommodation and Food Service Activities',
                'examples_id' => 'Pelayan restoran, koki, resepsionis hotel, barista, housekeeping, chef, food service manager',
                'examples_en' => 'Restaurant waiter, chef, hotel receptionist, barista, housekeeping staff, chef, food service manager',
            ],
            [
                'name_id' => 'Informasi dan Komunikasi',
                'name_en' => 'Information and Communication',
                'examples_id' => 'Programmer, desainer grafis, jurnalis, operator konten media sosial, teknisi jaringan, web developer, data analyst',
                'examples_en' => 'Programmer, graphic designer, journalist, social media content operator, network technician, web developer, data analyst',
            ],
            [
                'name_id' => 'Keuangan dan Asuransi',
                'name_en' => 'Financial and Insurance Activities',
                'examples_id' => 'Teller bank, akuntan, analis keuangan, agen asuransi, staf pinjaman, relationship manager, auditor',
                'examples_en' => 'Bank teller, accountant, financial analyst, insurance agent, loan officer, relationship manager, auditor',
            ],
            [
                'name_id' => 'Real Estate',
                'name_en' => 'Real Estate Activities',
                'examples_id' => 'Agen properti, broker rumah, manajer properti, staf pemasaran perumahan, property consultant',
                'examples_en' => 'Real estate agent, property broker, property manager, housing marketing staff, property consultant',
            ],
            [
                'name_id' => 'Jasa Profesional, Ilmiah, dan Teknis',
                'name_en' => 'Professional, Scientific, and Technical Services',
                'examples_id' => 'Pengacara, konsultan bisnis, akuntan publik, peneliti, arsitek, engineer, consultant',
                'examples_en' => 'Lawyer, business consultant, public accountant, researcher, architect, engineer, consultant',
            ],
            [
                'name_id' => 'Jasa Persewaan, Ketenagakerjaan, Biro Perjalanan',
                'name_en' => 'Rental, Employment, and Travel Agency Services',
                'examples_id' => 'Staf rekrutmen, agen perjalanan, penyedia jasa sewa kendaraan, staf outsourcing, travel consultant',
                'examples_en' => 'Recruitment officer, travel agent, car rental service provider, outsourcing staff, travel consultant',
            ],
            [
                'name_id' => 'Administrasi Pemerintahan, Pertahanan, dan Jaminan Sosial',
                'name_en' => 'Public Administration, Defense, and Social Security',
                'examples_id' => 'PNS, TNI, Polri, staf BPJS, pegawai kelurahan, civil servant, military personnel',
                'examples_en' => 'Civil servant, military officer, police officer, BPJS staff, village officer, public employee',
            ],
            [
                'name_id' => 'Pendidikan',
                'name_en' => 'Education',
                'examples_id' => 'Guru, dosen, tutor, pengajar les, staf administrasi sekolah, educational staff',
                'examples_en' => 'Teacher, lecturer, tutor, private instructor, school administrative staff, educational staff',
            ],
            [
                'name_id' => 'Jasa Kesehatan dan Pekerjaan Sosial',
                'name_en' => 'Health and Social Work Services',
                'examples_id' => 'Dokter, perawat, bidan, apoteker, psikolog, pekerja sosial, nurse',
                'examples_en' => 'Doctor, nurse, midwife, pharmacist, psychologist, social worker, healthcare officer',
            ],
            [
                'name_id' => 'Kesenian, Hiburan, dan Rekreasi',
                'name_en' => 'Arts, Entertainment, and Recreation',
                'examples_id' => 'Musisi, aktor, atlet, pelatih kebugaran, pemandu wisata, entertainer, artist',
                'examples_en' => 'Musician, actor, athlete, fitness trainer, tour guide, entertainer, artist',
            ],
            [
                'name_id' => 'Jasa Lainnya',
                'name_en' => 'Other Services',
                'examples_id' => 'Penata rambut, mekanik, penjahit, tukang servis elektronik, petugas laundry, technician',
                'examples_en' => 'Hair stylist, mechanic, tailor, electronics service technician, laundry operator, technician',
            ],
            [
                'name_id' => 'Kegiatan Keluarga sebagai Pemberi Kerja',
                'name_en' => 'Activities of Households as Employers',
                'examples_id' => 'Asisten rumah tangga, pengasuh anak, pekerja rumah tangga, domestic helper',
                'examples_en' => 'Domestic assistant, nanny, household worker, domestic helper',
            ],
            [
                'name_id' => 'Kegiatan Badan Internasional dan Badan Ekstraterritorial',
                'name_en' => 'Activities of International Organizations and Other Extraterritorial Bodies',
                'examples_id' => 'Staf organisasi internasional, staf kedutaan, pegawai lembaga multilateral, diplomat',
                'examples_en' => 'International organization staff, embassy staff, multilateral institution employee, diplomat',
            ],
        ];

        foreach ($fields as $field) {
            JobField::create($field);
        }
    }
}

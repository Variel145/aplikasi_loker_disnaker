<?php

namespace Database\Seeders;

use App\Models\RiasecQuestion;
use Illuminate\Database\Seeder;

class RiasecQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * 30 soal RIASEC (5 per tipe) - Versi Dipoles
     * Sumber: Feedback & rekomendasi dari analisis praktis
     * Soal lebih spesifik, praktis, dan relevan ke lowongan kerja
     */
    public function run(): void
    {
        $questions = [
            // ===== REALISTIC (R) - 5 soal =====
            [
                'question_type' => 'R',
                'question_order' => 1,
                'text_id' => 'Saya tertarik merakit, memperbaiki, atau merawat peralatan agar tetap berfungsi baik.',
                'text_en' => 'I enjoy assembling, repairing, or maintaining equipment to keep it functioning properly.',
            ],
            [
                'question_type' => 'R',
                'question_order' => 2,
                'text_id' => 'Saya tertarik bekerja di luar ruangan, misalnya di lokasi konstruksi, pertanian, atau proyek lapangan.',
                'text_en' => 'I am interested in working outdoors, such as on construction sites, farms, or field projects.',
            ],
            [
                'question_type' => 'R',
                'question_order' => 3,
                'text_id' => 'Saya tertarik menggunakan alat ukur, perkakas, atau peralatan teknis untuk menyelesaikan pekerjaan.',
                'text_en' => 'I enjoy using measuring tools, hand tools, or technical equipment to complete work.',
            ],
            [
                'question_type' => 'R',
                'question_order' => 4,
                'text_id' => 'Saya tertarik mengoperasikan kendaraan, mesin, atau peralatan produksi.',
                'text_en' => 'I am interested in operating vehicles, machines, or production equipment.',
            ],
            [
                'question_type' => 'R',
                'question_order' => 5,
                'text_id' => 'Saya tertarik membuat, memasang, atau merawat instalasi teknis seperti jaringan, listrik, atau sistem mekanis.',
                'text_en' => 'I enjoy building, installing, or maintaining technical systems like networks, electrical, or mechanical systems.',
            ],

            // ===== INVESTIGATIVE (I) - 5 soal =====
            [
                'question_type' => 'I',
                'question_order' => 6,
                'text_id' => 'Saya tertarik melakukan penelitian untuk menemukan jawaban atas suatu masalah.',
                'text_en' => 'I enjoy conducting research to find answers to problems.',
            ],
            [
                'question_type' => 'I',
                'question_order' => 7,
                'text_id' => 'Saya tertarik menganalisis data untuk menemukan pola atau menarik kesimpulan.',
                'text_en' => 'I am interested in analyzing data to find patterns or draw conclusions.',
            ],
            [
                'question_type' => 'I',
                'question_order' => 8,
                'text_id' => 'Saya tertarik mempelajari cara kerja teknologi, sistem, atau proses tertentu.',
                'text_en' => 'I enjoy learning how technology, systems, or specific processes work.',
            ],
            [
                'question_type' => 'I',
                'question_order' => 9,
                'text_id' => 'Saya tertarik menguji produk, layanan, atau sistem untuk menemukan masalah atau validasi.',
                'text_en' => 'I am interested in testing products, services, or systems to find issues or validate them.',
            ],
            [
                'question_type' => 'I',
                'question_order' => 10,
                'text_id' => 'Saya tertarik memecahkan masalah kompleks menggunakan logika, data, dan bukti.',
                'text_en' => 'I enjoy solving complex problems using logic, data, and evidence.',
            ],

            // ===== ARTISTIC (A) - 5 soal =====
            [
                'question_type' => 'A',
                'question_order' => 11,
                'text_id' => 'Saya tertarik membuat desain grafis, ilustrasi, atau konten visual.',
                'text_en' => 'I am interested in creating graphic designs, illustrations, or visual content.',
            ],
            [
                'question_type' => 'A',
                'question_order' => 12,
                'text_id' => 'Saya tertarik menulis cerita, naskah, artikel kreatif, atau materi promosi.',
                'text_en' => 'I enjoy writing stories, scripts, creative articles, or promotional materials.',
            ],
            [
                'question_type' => 'A',
                'question_order' => 13,
                'text_id' => 'Saya tertarik mengolah atau mengedit visual (foto, video, desain) untuk hasil terbaik.',
                'text_en' => 'I am interested in editing visuals (photos, videos, designs) for the best results.',
            ],
            [
                'question_type' => 'A',
                'question_order' => 14,
                'text_id' => 'Saya tertarik merancang tampilan visual untuk produk digital atau media promosi.',
                'text_en' => 'I enjoy designing visual layouts for digital products or promotional media.',
            ],
            [
                'question_type' => 'A',
                'question_order' => 15,
                'text_id' => 'Saya tertarik mengekspresikan ide melalui karya seni, desain, atau media kreatif.',
                'text_en' => 'I enjoy expressing ideas through art, design, or creative media.',
            ],

            // ===== SOCIAL (S) - 5 soal =====
            [
                'question_type' => 'S',
                'question_order' => 16,
                'text_id' => 'Saya tertarik membantu orang lain menyelesaikan masalah pribadi, pendidikan, atau karier mereka.',
                'text_en' => 'I am interested in helping others solve personal, educational, or career problems.',
            ],
            [
                'question_type' => 'S',
                'question_order' => 17,
                'text_id' => 'Saya tertarik mengajar, melatih, atau membimbing orang lain.',
                'text_en' => 'I enjoy teaching, training, or coaching others.',
            ],
            [
                'question_type' => 'S',
                'question_order' => 18,
                'text_id' => 'Saya tertarik memberikan layanan pelanggan dan membantu memenuhi kebutuhan orang.',
                'text_en' => 'I am interested in providing customer service and helping meet people\'s needs.',
            ],
            [
                'question_type' => 'S',
                'question_order' => 19,
                'text_id' => 'Saya tertarik bekerja dalam tim untuk mendukung kesejahteraan atau pengembangan orang lain.',
                'text_en' => 'I enjoy working in teams to support others\' well-being or development.',
            ],
            [
                'question_type' => 'S',
                'question_order' => 20,
                'text_id' => 'Saya tertarik mendengarkan keluhan orang lain dan membantu mencarikan solusi.',
                'text_en' => 'I am interested in listening to others\' concerns and helping find solutions.',
            ],

            // ===== ENTERPRISING (E) - 5 soal =====
            [
                'question_type' => 'E',
                'question_order' => 21,
                'text_id' => 'Saya tertarik memimpin tim untuk mencapai target tertentu.',
                'text_en' => 'I am interested in leading teams to achieve specific targets.',
            ],
            [
                'question_type' => 'E',
                'question_order' => 22,
                'text_id' => 'Saya tertarik menjual produk, layanan, atau ide kepada orang lain.',
                'text_en' => 'I enjoy selling products, services, or ideas to others.',
            ],
            [
                'question_type' => 'E',
                'question_order' => 23,
                'text_id' => 'Saya tertarik memulai bisnis atau mengembangkan peluang usaha baru.',
                'text_en' => 'I am interested in starting a business or developing new business opportunities.',
            ],
            [
                'question_type' => 'E',
                'question_order' => 24,
                'text_id' => 'Saya tertarik memengaruhi orang lain melalui presentasi, negosiasi, atau kampanye.',
                'text_en' => 'I enjoy influencing others through presentations, negotiations, or campaigns.',
            ],
            [
                'question_type' => 'E',
                'question_order' => 25,
                'text_id' => 'Saya tertarik menyusun rencana bisnis, mengambil keputusan, dan mengejar target pertumbuhan.',
                'text_en' => 'I am interested in developing business plans, making decisions, and pursuing growth targets.',
            ],

            // ===== CONVENTIONAL (C) - 5 soal =====
            [
                'question_type' => 'C',
                'question_order' => 26,
                'text_id' => 'Saya tertarik mengelola data, dokumen, atau arsip secara rapi dan akurat.',
                'text_en' => 'I am interested in managing data, documents, or archives neatly and accurately.',
            ],
            [
                'question_type' => 'C',
                'question_order' => 27,
                'text_id' => 'Saya tertarik membuat jadwal, laporan, atau daftar tugas yang terstruktur.',
                'text_en' => 'I enjoy creating schedules, reports, or structured task lists.',
            ],
            [
                'question_type' => 'C',
                'question_order' => 28,
                'text_id' => 'Saya tertarik bekerja dengan angka, tabel, spreadsheet, atau sistem pencatatan.',
                'text_en' => 'I am interested in working with numbers, tables, spreadsheets, or record-keeping systems.',
            ],
            [
                'question_type' => 'C',
                'question_order' => 29,
                'text_id' => 'Saya tertarik memastikan prosedur, aturan, dan standar kerja dipatuhi.',
                'text_en' => 'I enjoy ensuring procedures, rules, and work standards are followed.',
            ],
            [
                'question_type' => 'C',
                'question_order' => 30,
                'text_id' => 'Saya tertarik mengelola persediaan, keuangan, atau administrasi perkantoran.',
                'text_en' => 'I am interested in managing inventory, finances, or office administration.',
            ],
        ];

        foreach ($questions as $question) {
            RiasecQuestion::create($question);
        }
    }
}

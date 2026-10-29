<?php

namespace Database\Seeders;

use App\Models\Invitation;
use App\Models\Testimonial;
use App\Models\Theme;
use App\Models\Wish;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat / update 4 katalog Theme bernuansa estetik
        $leafyBotanical = Theme::updateOrCreate(
            ['slug' => 'leafy-botanical'],
            [
                'name' => 'Leafy Botanical',
                'category' => 'Wedding',
                'thumbnail' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=80',
                'price' => 149000,
                'badge' => 'Populer',
            ]
        );

        $summerRustic = Theme::updateOrCreate(
            ['slug' => 'summer-rustic'],
            [
                'name' => 'Summer Rustic',
                'category' => 'Wedding',
                'thumbnail' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80',
                'price' => 129000,
                'badge' => 'Terbaru',
            ]
        );

        $modernMinimalist = Theme::updateOrCreate(
            ['slug' => 'modern-minimalist'],
            [
                'name' => 'Modern Minimalist',
                'category' => 'Wedding',
                'thumbnail' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=800&q=80',
                'price' => 99000,
                'badge' => 'Populer',
            ]
        );

        $heritageGold = Theme::updateOrCreate(
            ['slug' => 'heritage-gold'],
            [
                'name' => 'Heritage Gold',
                'category' => 'Wedding',
                'thumbnail' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?auto=format&fit=crop&w=800&q=80',
                'price' => 199000,
                'badge' => 'Terbaru',
            ]
        );

        // 2. Buat data Invitation Tema 1: Leafy Botanical (slug: zian-sahri)
        $invitation = Invitation::updateOrCreate(
            ['slug' => 'zian-sahri'],
            [
                'theme_id' => $leafyBotanical->id,
                'groom_nickname' => 'Zian',
                'groom_fullname' => 'Zian Pratama, S.Kom.',
                'groom_parents' => 'Putra tercinta dari Bpk. Bambang Irawan & Ibu Siti Aminah',
                'bride_nickname' => 'Sahri',
                'bride_fullname' => 'Sahri Ramadhani, S.Ds.',
                'bride_parents' => 'Putri tercinta dari Bpk. H. Hendra Wijaya & Ibu Hj. Ratna Sari',
                'event_date' => now()->addMonth()->setHour(9)->setMinute(0)->setSecond(0),
                'akad_time' => '08:00 - 10:00 WIB',
                'resepsi_time' => '11:00 - 14:00 WIB',
                'venue_name' => 'Grand Ballroom Hotel Mulia Senayan',
                'venue_address' => 'Jl. Asia Afrika No. 6, Gelora, Tanah Abang, Jakarta Pusat, DKI Jakarta 10270',
                'map_url' => 'https://maps.google.com/?q=Hotel+Mulia+Senayan',
                'audio_url' => '/audio/i-wanna-be-yours.mp3',
                'bank_name' => 'BCA',
                'bank_account_number' => '8735019284',
                'bank_account_holder' => 'Zian Pratama',
                'cover_image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=1200&q=80',
            ]
        );

        if ($invitation->wishes()->count() === 0) {
            Wish::create([
                'invitation_id' => $invitation->id,
                'guest_name' => 'Dimas Setiawan & Partner',
                'attendance' => 'hadir',
                'message' => 'Selamat berbahagia Zian & Sahri! Semoga pernikahan ini selalu dilimpahi keberkahan, cinta, dan kebahagiaan. Sakinah, mawaddah, warahmah.',
            ]);

            Wish::create([
                'invitation_id' => $invitation->id,
                'guest_name' => 'Anisa Rahmawati',
                'attendance' => 'hadir',
                'message' => 'Barakallahu lakum wa baraka alaikum! Happy wedding untuk Sahri & Zian, bahagia selalu sampai kakek-nenek ya!',
            ]);

            Wish::create([
                'invitation_id' => $invitation->id,
                'guest_name' => 'Rian Hidayat',
                'attendance' => 'ragu',
                'message' => 'Selamat menempuh babak baru Zian dan Sahri! Mohon maaf sepertinya belum bisa hadir karena jadwal dinas luar kota, tapi doa terbaik selalu menyertai.',
            ]);
        }

        // 3. Buat data Invitation Tema 2: Summer Rustic (slug: summer-rustic)
        $summerInvitation = Invitation::updateOrCreate(
            ['slug' => 'summer-rustic'],
            [
                'theme_id' => $summerRustic->id,
                'groom_nickname' => 'Dimas',
                'groom_fullname' => 'Dimas Pratama, S.T.',
                'groom_parents' => 'Putra tercinta dari Bpk. Suryanto & Ibu Wahyuni',
                'bride_nickname' => 'Amanda',
                'bride_fullname' => 'Amanda Putri, S.I.Kom.',
                'bride_parents' => 'Putri tercinta dari Bpk. Kusuma Wardhana & Ibu Endang Lestari',
                'event_date' => Carbon::parse('2026-12-12 09:00:00'),
                'akad_time' => '08:00 - 10:00 WIB',
                'resepsi_time' => '11:00 - 14:00 WIB',
                'venue_name' => 'Omah Rustic Garden',
                'venue_address' => 'Jl. Kaliurang Km. 9, Ngaglik, Sleman, D.I. Yogyakarta 55581',
                'map_url' => 'https://maps.google.com/?q=Omah+Rustic+Garden+Yogyakarta',
                'audio_url' => '/audio/acoustic-breeze.mp3',
                'bank_name' => 'Mandiri',
                'bank_account_number' => '1370012345678',
                'bank_account_holder' => 'Dimas Pratama',
                'cover_image' => 'https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=1200&q=80',
            ]
        );

        if ($summerInvitation->wishes()->count() === 0) {
            Wish::create([
                'invitation_id' => $summerInvitation->id,
                'guest_name' => 'Bagas & Citra',
                'attendance' => 'hadir',
                'message' => 'Happy wedding Dimas & Amanda! Semoga jadi keluarga yang sakinah, mawaddah, warahmah. Lancar acaranya di Yogya!',
            ]);

            Wish::create([
                'invitation_id' => $summerInvitation->id,
                'guest_name' => 'Dinda Kirana',
                'attendance' => 'hadir',
                'message' => 'Selamat Dimas dan Amanda! Seneng banget liat kalian berdua akhirnya berlabuh di pelaminan. Bahagia selamanya ya!',
            ]);
        }

        // 4. Buat data Invitation Tema 3: Modern Minimalist (slug: modern-minimalist)
        $minimalistInvitation = Invitation::updateOrCreate(
            ['slug' => 'modern-minimalist'],
            [
                'theme_id' => $modernMinimalist->id,
                'groom_nickname' => 'Adit',
                'groom_fullname' => 'Aditia Kurniawan, S.T.',
                'groom_parents' => 'Putra dari Bpk. Ir. H. Gunawan & Ibu Dra. Hj. Ratnasari',
                'bride_nickname' => 'Nadia',
                'bride_fullname' => 'Nadia Salsabila, S.I.Kom.',
                'bride_parents' => 'Putri dari Bpk. Drs. H. Suryono & Ibu Hj. Marwati',
                'event_date' => Carbon::parse('2026-11-20 10:00:00'),
                'akad_time' => '09:00 - 10:30 WIB',
                'resepsi_time' => '11:30 - 14:30 WIB',
                'venue_name' => 'The Glass House Jakarta',
                'venue_address' => 'Jl. Wijaya II No. 122, Melawai, Kebayoran Baru, Jakarta Selatan 12160',
                'map_url' => 'https://maps.google.com/?q=The+Glass+House+Jakarta',
                'audio_url' => 'https://www.bensound.com/bensound-music/bensound-memories.mp3',
                'bank_name' => 'BCA',
                'bank_account_number' => '5270198234',
                'bank_account_holder' => 'Aditia Kurniawan',
                'cover_image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=1200&q=80',
            ]
        );

        if ($minimalistInvitation->wishes()->count() === 0) {
            Wish::create([
                'invitation_id' => $minimalistInvitation->id,
                'guest_name' => 'Kevin & Jessica',
                'attendance' => 'hadir',
                'message' => 'Congratulations Adit & Nadia! Desain undangannya sleek dan keren banget. Wishing you both a lifetime of love and happiness!',
            ]);

            Wish::create([
                'invitation_id' => $minimalistInvitation->id,
                'guest_name' => 'Reza Pratama',
                'attendance' => 'hadir',
                'message' => 'Happy wedding bro Adit & Nadia! Semoga dilancarkan semua rangkaian acaranya di Glass House. See you on the big day!',
            ]);

            Wish::create([
                'invitation_id' => $minimalistInvitation->id,
                'guest_name' => 'Maya Anggraini',
                'attendance' => 'ragu',
                'message' => 'Selamat Adit & Nadia! Semoga langgeng sampai tua, saling melengkapi dan bahagia selalu.',
            ]);
        }

        // 5. Buat data Invitation Tema 4: Heritage Gold (slug: heritage-gold)
        $heritageInvitation = Invitation::updateOrCreate(
            ['slug' => 'heritage-gold'],
            [
                'theme_id' => $heritageGold->id,
                'groom_nickname' => 'Faris',
                'groom_fullname' => 'Faris Raditya, S.E.',
                'groom_parents' => 'Putra dari Bpk. H. Prasetyo Wibowo & Ibu Hj. Ratna Juwita',
                'bride_nickname' => 'Nabila',
                'bride_fullname' => 'Nabila Syahira, B.A.',
                'bride_parents' => 'Putri dari Bpk. Dr. H. Iskandar Danang & Ibu Hj. Marwah Lestari',
                'event_date' => Carbon::parse('2026-12-25 10:00:00'),
                'akad_time' => '08:30 - 10:00 WIB',
                'resepsi_time' => '11:00 - 15:00 WIB',
                'venue_name' => 'The Hermitage Tribute Portfolio Ballroom',
                'venue_address' => 'Jl. Cikini Raya No. 107, Menteng, Jakarta Pusat 10330',
                'map_url' => 'https://maps.google.com/?q=The+Hermitage+Jakarta',
                'audio_url' => '/audio/acoustic-breeze.mp3',
                'bank_name' => 'BCA',
                'bank_account_number' => '7310892415',
                'bank_account_holder' => 'Faris Raditya',
                'cover_image' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?auto=format&fit=crop&w=1200&q=80',
            ]
        );

        if ($heritageInvitation->wishes()->count() === 0) {
            Wish::create([
                'invitation_id' => $heritageInvitation->id,
                'guest_name' => 'Arya & Keluarga',
                'attendance' => 'hadir',
                'message' => 'Barakallahu lakuma wa baraka alaika Faris & Nabila. Semoga menjadi keluarga sakinah mawaddah warahmah.',
            ]);
        }

        // 6. Buat 3 testimoni dummy realistis (referensi byaadigitall.com)
        if (Testimonial::count() === 0) {
            Testimonial::create([
                'couple_name' => 'Dean & Ganti',
                'photo_url' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=600&q=80',
                'review' => 'Alhamdulillah ga nyesel order di sini. Hasil undangannya mewah banget, revisinya cepet dan tamuku pada muji desainnya! Sukses selalu.',
                'rating' => 5,
            ]);

            Testimonial::create([
                'couple_name' => 'Rizquh & Romy',
                'photo_url' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=600&q=80',
                'review' => 'Pelayanan ramah banget, fitur amplop digital sama musiknya jalan lancar tanpa lag di HP para tamu. Recommended parah buat yang mau nikah!',
                'rating' => 5,
            ]);

            Testimonial::create([
                'couple_name' => 'Hanifah & Asep',
                'photo_url' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=600&q=80',
                'review' => 'Undangan digitalnya estetik, perpaduan warnanya elegan dan ga pasaran. Tamu undangan gampang banget konfirmasi kehadiran lewat RSVP.',
                'rating' => 5,
            ]);
        }
    }
}

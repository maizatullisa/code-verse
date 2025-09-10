<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
         @page {
        size: A4 landscape;
        margin: 0;
    }
        body { font-family: 'DejaVu Sans', sans-serif; margin: 0; padding: 30px; background: #f8f9fa; }
        .cert-container { background: white; border: 8px solid #1a365d; padding: 60px; text-align: center; }
        
        .subtitle { font-size: 28px; margin-bottom: 40px; color: #2d3748; }
        .name { font-size: 36px; font-weight: bold; border-bottom: 3px solid #1a365d; padding: 15px 30px; margin: 30px 0; display: inline-block; }
        .description { font-size: 18px; margin: 20px 0; color: #4a5568; }
        .course { font-size: 24px; font-weight: bold; background: #edf2f7; padding: 15px; margin: 20px 0; color: #2d3748; }
        .details { margin-top: 40px; font-size: 14px; color: #718096; }

           .header-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .title {
        font-size: 40px;
        font-weight: bold;
        margin: 0 auto; /* buat teks tetap di tengah */
        color: #1a365d;
    }
    .logo {
        height: 110px; 
    }

      .cert-container { 
        background: white; 
        border: 8px solid #1a365d; 
        padding: 50px; 
        text-align: center; 

        /* tambahan ini biar gak pecah ke halaman baru */
        page-break-inside: avoid;
        page-break-before: avoid;
        page-break-after: avoid;
    }
    </style>
    
</head>
<body>
    <div class="cert-container">
       <div class="header-row">
        <h1 class="title">SERTIFIKAT KELULUSAN</h1>
        <img src="{{ public_path('assets/images/medal.png') }}" alt="Logo" class="logo">
    </div>

        <p class="description">Dengan bangga di berikan kepada:</p>
        
        <div class="name">{{ $fullName }}</div>
        
        <p class="description">Atas Pencapainnya di Kelas</p>
        <div class="course">{{ $kelas->nama_kelas }}</div>
        
        <div class="details">
            <p>Nomor: {{ $certificateNumber }}</p>
            <p>Tanggal: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <br>
            <strong>CodeVerse Academy</strong>
        </div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<!-- Full modern CSS, gradients, semua bisa! -->
</html>
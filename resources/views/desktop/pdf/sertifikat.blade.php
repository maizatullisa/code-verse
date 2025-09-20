<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .certificate-container {
            position: relative;
            width: 100vw;
            height: 100vh;
            background-image: url('{{ $backgroundImage }}');
            background-size: 100% 100%;
            background-position: center center;
            background-repeat: no-repeat;
        }
        .certificate-container::before {
        content: '';
        position: absolute;
        top: 30px;
        left: 30px;
        right: 30px;
        bottom: 30px;
        border: 3px solid #f59e0b;
        border-radius: 15px;
        z-index: 1;
    }

        .certificate-container::after {
            content: '';
            position: absolute;
            top: 40px;
            left: 40px;
            right: 40px;
            bottom: 40px;
            border: 1px solid #fbbf24;
            border-radius: 10px;
            z-index: 1;
    }

    
        /* Motif Batik Sederhana di Pinggir */
        .batik-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                /* Motif kiri */
                radial-gradient(circle at 50px 100px, rgba(139, 69, 19, 0.08) 2px, transparent 2px),
                radial-gradient(circle at 80px 200px, rgba(210, 105, 30, 0.06) 3px, transparent 3px),
                radial-gradient(circle at 30px 300px, rgba(205, 133, 63, 0.05) 2px, transparent 2px),
                radial-gradient(circle at 70px 400px, rgba(218, 165, 32, 0.07) 2px, transparent 2px),
                
                /* Motif kanan */
                radial-gradient(circle at calc(100% - 50px) 150px, rgba(139, 69, 19, 0.08) 2px, transparent 2px),
                radial-gradient(circle at calc(100% - 80px) 250px, rgba(210, 105, 30, 0.06) 3px, transparent 3px),
                radial-gradient(circle at calc(100% - 30px) 350px, rgba(205, 133, 63, 0.05) 2px, transparent 2px),
                radial-gradient(circle at calc(100% - 70px) 450px, rgba(218, 165, 32, 0.07) 2px, transparent 2px);
            
            background-size: 150px 150px;
            z-index: 0;
        }

        .content {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding-top: 50px;
            margin-top: -110px;
        }

        .main-title {
            font-size: 42px; 
             font-weight: 700;
            color: #000;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .awarded-text {
            font-size: 18px;
            color: #000;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .recipient-name {
            font-size: 38px; 
            font-weight: 600;
            color: #000;
            /* text-decoration: underline; */
            margin: 20px 0;
            letter-spacing: 1px;
        }
       

        .line {
            width: 40%;
            height: 1px;
            background: linear-gradient(to right, 
            transparent,
                #f59e0b 20%,            
                #f59e0b 80%,              
                #fbbf24 ,
                transparent  
            );              
            margin: 15px auto;
        }

        .achievement-text {
            font-size: 18px;
            color: #000;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .course-name {
            font-size: 28px; 
            font-weight: 500;
            color: #000;
            margin: 20px 0;
            text-transform: uppercase;
        }

         .certificate-details {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 60px;
            padding: 0 80px;
            font-size: 16px;
            color: #000;
            width: calc(100% - 160px);
            position: relative;
        }
        /* .details { margin-top: 20px; font-size: 16px; color: #1e3a8a; } */
    .signature-section {
            position: absolute;
            bottom: 40px;
            text-align: center;
            font-size: 25px;
            color: #1e3a8a;
            width: 250px;
        }

      
        .signature-line {
            width: 100%;
            height: 1px;
           background: linear-gradient(to right, 
            transparent,
                #f59e0b 20%,            
                #f59e0b 80%,              
                #fbbf24 ,
                transparent  
            );              
            margin: 10px auto;
        }

        .signature-name {
            font-weight: bold;
            font-size: 18px;
            color: #000;
            margin-bottom: 5px;
            letter-spacing: 0.5px;
        }

        .signature-title {
            font-size: 14px;
            color: #666;
            letter-spacing: 1px;
        }

      /* QR Code dengan label verifikasi */
        .verification-section {
            position: absolute;
            bottom: 40px; 
            right: 70px;  
            text-align: center;
            z-index: 2;
            width: 120px;
        }

        .barcode {
            width: 70px;  
            height: 70px;
            margin: 0 auto 25px;
        }

        .verification-text {
            font-size: 9px;
            color: #666;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            line-height: 1.2;
        }

        /* Tanggal sertifikat */
        .certificate-date {
            position: absolute;
            bottom: 160px;
            right: 70px;
            font-size: 12px;
            color: #666;
            text-align: center;
            z-index: 2;
            width: 120px;
        }

        .date-label {
            font-size: 10px;
            color: #999;
            margin-bottom: 2px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .date-value {
            font-weight: 500;
            color: #333;
            font-size: 11px;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
         <div class="batik-pattern"></div>
        <div class="content">
            <!-- Header Title -->
            <div class="main-title">SERTIFIKAT KELULUSAN</div>
            
            <!-- Awarded Section -->
            <div class="awarded-text">Dengan bangga diberikan kepada :</div>
            
            <!-- Recipient Name -->
             <div class="line"></div>
            <div class="recipient-name">{{ $fullName }}</div>
            <div class="line"></div>
            
            <!-- Achievement Text -->
            <div class="achievement-text">Atas pencapaiannya di kelas</div>
            
            <!-- Course Name -->
            <div class="course-name">{{ $kelas->nama_kelas }}</div>
            
            <!-- Certificate Details -->
            <!-- <div class="details">
            <p>Nomor: {{ $certificateNumber }}</p>
            <p>Tanggal: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <br> -->
            <!-- <strong>CodeVerse Academy</strong> -->
               <!-- Signature Section -->
             <!-- Signature Section -->
              <!-- QR Code Section (samping kiri tanda tangan) -->
        <div class="signature-section">
            <div class="signature-line"></div>
            <div class="signature-name">MUNIF AMIN ROMADHON</div>
            <div class="signature-title">CEO CODEVERSE</div>
        </div>
    </div>
          </div>
        
        <!-- Certificate Date -->
        <div class="certificate-date">
            <div class="date-label">Tanggal Terbit:</div>
            <div class="date-value">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
        </div>
        
        <!-- QR Code with Verification Label -->
        <div class="verification-section">
            <div class="barcode">
                {!! $qrSvg !!}
            </div>
            <div class="verification-text">Verifikasi Sertifikat</div>
        </div>
    </div>
</body>
</html>
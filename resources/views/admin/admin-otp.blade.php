<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi Admin - CodeVerse</title>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #334155;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            min-height: 100vh;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }
        .brand-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
        }
        .header h1 {
            color: white;
            margin: 0;
            font-size: 32px;
            font-weight: 900;
            position: relative;
            z-index: 1;
        }
        .header p {
            color: #dbeafe;
            margin: 8px 0 0 0;
            font-size: 16px;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }
        .admin-badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            background: linear-gradient(135deg, #1e293b 0%, #475569 100%);
            border-radius: 20px;
            color: white;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        .content {
            padding: 40px 30px;
            background: white;
        }
        .greeting {
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 20px;
            color: #1e293b;
        }
        .otp-container {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            border: 2px solid #3b82f6;
            border-radius: 16px;
            padding: 40px 30px;
            text-align: center;
            margin: 30px 0;
            position: relative;
            overflow: hidden;
        }
        .otp-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(59, 130, 246, 0.1) 50%, transparent 70%);
        }
        .otp-label {
            font-size: 12px;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 16px;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
            z-index: 1;
        }
        .otp-code {
            font-size: 42px;
            font-weight: 900;
            color: #1e40af;
            letter-spacing: 12px;
            font-family: 'Inter', 'Courier New', monospace;
            margin: 0;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 4px rgba(30, 64, 175, 0.2);
        }
        .info-box {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border: 1px solid #f59e0b;
            border-radius: 12px;
            padding: 20px;
            margin: 24px 0;
            position: relative;
        }
        .info-box::before {
            content: '⏰';
            position: absolute;
            top: 16px;
            left: 20px;
            font-size: 18px;
        }
        .info-box p {
            margin: 0 0 0 32px;
            font-size: 14px;
            color: #92400e;
            font-weight: 600;
        }
        .security-notice {
            background: linear-gradient(135deg, #fef2f2 0%, #fecaca 100%);
            border: 1px solid #f87171;
            border-radius: 12px;
            padding: 20px;
            margin: 24px 0;
            position: relative;
        }
        .security-notice::before {
            content: '🚨';
            position: absolute;
            top: 16px;
            left: 20px;
            font-size: 18px;
        }
        .security-notice p {
            margin: 0 0 0 32px;
            font-size: 14px;
            color: #991b1b;
            font-weight: 600;
        }
        .feature-list {
            display: flex;
            gap: 12px;
            margin: 24px 0;
            flex-wrap: wrap;
        }
        .feature-item {
            flex: 1;
            min-width: 120px;
            padding: 16px;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            text-align: center;
            font-size: 12px;
        }
        .feature-icon {
            font-size: 20px;
            margin-bottom: 8px;
            display: block;
        }
        .footer {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }
        .footer p {
            margin: 4px 0;
            font-size: 12px;
            color: #64748b;
            font-weight: 500;
        }
        .button {
            display: inline-block;
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="brand-logo">
                <span style="color: white; font-size: 20px; font-weight: 900;">CV</span>
            </div>
            <h1>CodeVerse</h1>
            <p>Admin Portal Security</p>
            <div class="admin-badge">
                🔐 PORTAL AKSES ADMIN
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Halo {{ $user->first_name }},
            </div>

            <p style="color: #64748b; font-size: 16px; margin-bottom: 24px;">
                Seseorang mencoba mengakses <strong>dashboard admin</strong> dengan akun Anda. Untuk melanjutkan login, gunakan kode verifikasi berikut:
            </p>

            <!-- OTP Code -->
            <div class="otp-container">
                <div class="otp-label">Kode Verifikasi Admin</div>
                <div class="otp-code">{{ $otp }}</div>
            </div>

            <!-- Security Features -->
            <div class="feature-list">
                <div class="feature-item">
                    <span class="feature-icon">🛡️</span>
                    <div style="font-weight: 700; color: #1e293b;">Keamanan</div>
                    <div style="color: #64748b;">Multi-layer</div>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">⚡</span>
                    <div style="font-weight: 700; color: #1e293b;">5 Menit</div>
                    <div style="color: #64748b;">Expired</div>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">🔐</span>
                    <div style="font-weight: 700; color: #1e293b;">256-bit</div>
                    <div style="color: #64748b;">Enkripsi</div>
                </div>
            </div>

            <!-- Info Box -->
            <div class="info-box">
                <p><strong>Penting:</strong> Kode ini akan expired dalam 5 menit. Segera gunakan untuk menyelesaikan proses login admin.</p>
            </div>

            <!-- Security Notice -->
            <div class="security-notice">
                <p><strong>Keamanan:</strong> Jika Anda tidak mencoba login sebagai admin, segera hubungi tim IT atau ganti password akun Anda.</p>
            </div>

            <p style="color: #64748b; font-size: 14px; line-height: 1.6;">
                Untuk keamanan akun, jangan bagikan kode ini kepada siapapun. Tim <strong>CodeVerse</strong> tidak akan pernah meminta kode verifikasi melalui telepon atau pesan.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="font-weight: 700; color: #1e293b;">© {{ date('Y') }} CodeVerse. All rights reserved.</p>
            <p>Email ini dikirim secara otomatis, mohon jangan balas email ini.</p>
            <p style="margin-top: 12px; color: #3b82f6;">🚀 Portal Admin - Sistem Keamanan Terdepan</p>
        </div>
    </div>
</body>
</html>
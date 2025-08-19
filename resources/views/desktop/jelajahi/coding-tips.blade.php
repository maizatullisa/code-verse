@extends('desktop.layout.master-desktop')

@section('title', 'Coding - tips')

@section('page-title', 'Tips')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 to-teal-100 py-12">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-emerald-500 rounded-2xl mb-4">
                <i class="ph ph-lightbulb text-white text-2xl"></i>
            </div>
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Coding Tips of The Day</h1>
            <p class="text-lg text-gray-600">Best practices untuk coding yang lebih baik</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center">
                    <i class="ph ph-star text-white text-lg"></i>
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Tip Hari Ini</h2>
                <button onclick="getNewTip()" class="ml-auto px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-colors">
                    <i class="ph ph-arrow-clockwise mr-2"></i>Tips Lainnya
                </button>
            </div>
            
            <div id="daily-tip" class="space-y-4">
                <!-- Tips akan dimuat di sini -->
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="ph ph-code text-emerald-500"></i>
                    Clean Code Tips
                </h3>
                <div class="space-y-3 text-sm text-gray-600">
                    <p>• Gunakan nama variabel yang deskriptif</p>
                    <p>• Buat fungsi yang melakukan satu hal saja</p>
                    <p>• Tambahkan komentar untuk logika kompleks</p>
                    <p>• Konsisten dalam style coding</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="ph ph-gear text-blue-500"></i>
                    Performance Tips
                </h3>
                <div class="space-y-3 text-sm text-gray-600">
                    <p>• Hindari nested loop yang dalam</p>
                    <p>• Gunakan caching untuk data yang sering diakses</p>
                    <p>• Optimasi query database</p>
                    <p>• Lazy loading untuk resource besar</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const codingTips = [
    {
        title: "Single Responsibility Principle",
        description: "Setiap class atau function harus memiliki satu tanggung jawab saja. Ini membuat kode lebih mudah dipahami dan di-maintain.",
        example: "// Bad\nfunction processUser(user) {\n  validateUser(user);\n  saveUser(user);\n  sendEmail(user);\n}\n\n// Good\nfunction validateUser(user) { ... }\nfunction saveUser(user) { ... }\nfunction sendEmail(user) { ... }"
    },
    {
        title: "DRY Principle (Don't Repeat Yourself)",
        description: "Hindari duplikasi kode dengan membuat function atau class yang bisa digunakan berulang kali.",
        example: "// Bad: Duplikasi kode\nconst userAge = calculateAge(user.birthDate);\nconst adminAge = calculateAge(admin.birthDate);\n\n// Good: Reusable function\nfunction calculateAge(birthDate) {\n  return new Date().getFullYear() - new Date(birthDate).getFullYear();\n}"
    },
    {
        title: "Meaningful Variable Names",
        description: "Gunakan nama variabel yang menjelaskan apa yang disimpan di dalamnya, bukan singkatan yang membingungkan.",
        example: "// Bad\nconst u = getUser();\nconst d = new Date();\n\n// Good\nconst currentUser = getUser();\nconst currentDate = new Date();"
    },
    {
        title: "Error Handling",
        description: "Selalu handle error dengan proper. Jangan biarkan aplikasi crash karena error yang tidak ditangani.",
        example: "try {\n  const data = await fetchUserData();\n  processData(data);\n} catch (error) {\n  console.error('Failed to fetch user data:', error);\n  showErrorMessage('Data tidak dapat dimuat');\n}"
    },
    {
        title: "Code Comments",
        description: "Tulis komentar untuk menjelaskan 'mengapa' bukan 'apa'. Kode yang baik sudah self-explanatory untuk 'apa' yang dilakukan.",
        example: "// Bad comment\n// Increment i by 1\ni++;\n\n// Good comment\n// Retry failed requests up to 3 times\nfor (let i = 0; i < 3; i++) {\n  if (await retryRequest()) break;\n}"
    }
];

function getRandomTip() {
    return codingTips[Math.floor(Math.random() * codingTips.length)];
}

function displayTip(tip) {
    const tipContainer = document.getElementById('daily-tip');
    tipContainer.innerHTML = `
        <div class="border-l-4 border-emerald-500 pl-4">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">${tip.title}</h3>
            <p class="text-gray-600 mb-4">${tip.description}</p>
            ${tip.example ? `
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Contoh:</h4>
                    <pre class="text-sm text-gray-800 whitespace-pre-wrap"><code>${tip.example}</code></pre>
                </div>
            ` : ''}
        </div>
    `;
}

function getNewTip() {
    const tip = getRandomTip();
    displayTip(tip);
}

// Load initial tip
document.addEventListener('DOMContentLoaded', function() {
    getNewTip();
});
</script>
@endsection
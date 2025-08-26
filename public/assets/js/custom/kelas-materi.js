// const USE_API = true;
// let courseData = {
//     materials: [
//         {
//         id: 1,
//         title: "Setup Environment & First Component",
//         type: "video",
//         duration: "15",
//         week: 1,
//         weekTitle: "Introduction to React",
//         completed: true,
//         content: {
//             videoUrl: "#",
//             description: "Belajar setup development environment dan membuat komponen React pertama"
//         }
//         },
//         {
//         id: 2,
//         title: "JSX Syntax Deep Dive",
//         type: "article",
//         duration: "10 menit",
//         week: 1,
//         weekTitle: "Introduction to React",
//         completed: false,
//         content: {
//             text: "Memahami sintaks JSX dan perbedaannya dengan HTML biasa"
//         }
//         },
//         {
//         id: 3,
//         title: "Props & Components Practice",
//         type: "video",
//         duration: "20 menit",
//         week: 1,
//         weekTitle: "Introduction to React",
//         completed: false,
//         content: {
//             videoUrl: "#",
//             description: "Praktik langsung membuat komponen dengan props"
//         }
//         },
//         {
//         id: 4,
//         title: "Quiz: React Basics",
//         type: "quiz",
//         duration: "5 menit",
//         week: 1,
//         weekTitle: "Introduction to React",
//         completed: false,
//         content: {
//             questions: 10
//         }
//         },
//         {
//         id: 5,
//         title: "useState Hook Introduction",
//         type: "video",
//         duration: "18 menit",
//         week: 2,
//         weekTitle: "State Management",
//         completed: false,
//         locked: true,
//         content: {
//             videoUrl: "#",
//             description: "Pengenalan useState hook untuk state management"
//         }
//         }
//     ]
//     };
    
//         let currentMaterialId = 1;
//         let userProgress = {
//         completedMaterials: [1],
//         currentMaterial: 1
//         };

//     function initializePage() {
//     if (USE_API) {
//         const courseId = document.body.dataset.courseId;
//         fetch(`/api/courses/${courseId}/materials`)
//         .then(response => response.json())
//         .then(data => {
//         courseData = data;
//         const completedList = data.materials
//             .filter(m => m.completed)
//             .map(m => m.id);

//         userProgress.completedMaterials = completedList;
        
//         // Cari materi pertama yang belum selesai dan belum dikunci
//         const firstUnlocked = data.materials.find(m => !m.locked);
//         currentMaterialId = firstUnlocked?.id || data.materials[0]?.id;

//         userProgress.currentMaterial = currentMaterialId;

//         renderSidebar();
//         loadMaterial(currentMaterialId);
//         updateProgress();
//     })

//         .catch(error => {
//             console.error('Gagal mengambil data dari API:', error);
//         });
//     } else {
//         // Kalau pakai data lokal
//         currentMaterialId = courseData.materials[0]?.id || null;
//         userProgress.currentMaterial = currentMaterialId;

//         renderSidebar();
//         loadMaterial(currentMaterialId);
//         updateProgress();
//     }
//     }

//         function renderSidebar() {
//             const contentDiv = document.getElementById('course-content');
//             const weeks = groupMaterialsByWeek();
            
//             let html = '';
            
//             Object.keys(weeks).forEach(weekNum => {
//                 const weekMaterials = weeks[weekNum];
//                 const weekTitle = weekMaterials[0].weekTitle;
                
//                 html += `
//                     <div class="p-4 border-b border-gray-100">
//                         <h4 class="font-semibold text-sm text-gray-700 mb-3">Week ${weekNum}: ${weekTitle}</h4>
//                         <div class="space-y-2">
//                 `;
                
//                 weekMaterials.forEach(material => {
//                     const isActive = material.id === currentMaterialId;
//                     const isCompleted = userProgress.completedMaterials.includes(material.id);
//                     const isLocked = material.locked;
                    
//                     let icon = 'ph-play-circle';
//                     let iconColor = 'text-gray-400';
                    
//                     if (material.type === 'article') {
//                         icon = 'ph-file-text';
//                     } else if (material.type === 'quiz') {
//                         icon = 'ph-question';
//                         iconColor = 'text-orange-400';
//                     }
                    
//                     if (isLocked) {
//                         icon = 'ph-lock';
//                         iconColor = 'text-gray-400';
//                     } else if (isActive) {
//                         iconColor = 'text-p2';
//                     }
                    
//                     html += `
//                         <div class="flex items-center gap-2 p-2 rounded-lg cursor-pointer transition-all
//                             ${isActive ? 'bg-p2/10 border-l-4 border-p2' : 'hover:bg-gray-50'}
//                             ${isLocked ? 'opacity-50 cursor-not-allowed' : ''}"
//                             ${!isLocked ? `onclick="loadMaterial(${material.id})"` : ''}>
//                             <i class="ph ${icon} ${iconColor}"></i>
//                             <span class="text-sm ${isActive ? 'text-p2 font-medium' : 'text-gray-600'}">${material.title}</span>
//                             ${isCompleted ? '<i class="ph ph-check-circle text-green-500 ml-auto"></i>' : ''}
//                         </div>
//                     `;
//                 });
                
//                 html += `
//                         </div>
//                     </div>
//                 `;
//             });
            
//             contentDiv.innerHTML = html;
//         }

//         function groupMaterialsByWeek() {
//             const weeks = {};
//             courseData.materials.forEach(material => {
//                 if (!weeks[material.week]) {
//                     weeks[material.week] = [];
//                 }
//                 weeks[material.week].push(material);
//             });
//             return weeks;
//         }

//         function loadMaterial(materialId) {
//             const material = courseData.materials.find(m => m.id === materialId);
//              console.log("Material yang dimuat:", material);
//             if (!material || (material.locked && !userProgress.completedMaterials.includes(materialId))) {
//                 return;
//             }
            
//             currentMaterialId = materialId;
            
//             // window.history.pushState({}, '', `/course/${courseData.id}/material/${materialId}`);
            
//             document.getElementById('material-title').textContent = material.title;
//            const durasiText = material.duration ? `${material.duration} menit` : 'N/A menit';
//             document.getElementById('material-info').textContent = `Durasi: ${material.duration ? material.duration : 'N/A'} menit • ${getTypeLabel(material.type)}`;

//             document.getElementById('weekInfo').textContent = `Week ${material.week}: ${material.weekTitle}`;
            
//             const badge = document.getElementById('material-type-badge');
//             badge.textContent = getTypeLabel(material.type);
//             badge.className = `px-3 py-1 rounded-full text-sm ${getTypeBadgeClass(material.type)}`;
            
//             renderMaterialContent(material);
            
//             updateNavigationButtons();
            
//             renderSidebar();

//             updateProgress();
//         }

//         function renderMaterialContent(material) {
//             const contentDiv = document.getElementById('content-display');
            
//             switch(material.type) {
//             case 'video':
//                 contentDiv.innerHTML = `
//                     <div class="mb-4">
//                         <video id="materiVideo" controls class="w-full rounded-lg aspect-video">
//                             <source src="${material.content.videoUrl}" type="video/mp4">
//                             Browser kamu tidak mendukung pemutar video.
//                         </video>
//                         <p class="text-gray-700 mt-2">${material.content.description}</p>
//                     </div>
//                 `;
//             setTimeout(() => {
//                 const video = document.getElementById('materiVideo');
//                 const markCompleteBtn = document.getElementById('markCompleteBtn');
//                 const nextBtn = document.getElementById('nextBtn');
                
//                 if (video) {
//                     // Disable buttons initially
//                     markCompleteBtn.disabled = true;
//                     markCompleteBtn.classList.add('opacity-50', 'cursor-not-allowed');
//                     nextBtn.disabled = true;
//                     nextBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    
//                     // Enable buttons when video ends
//                     video.addEventListener('ended', () => {
//                         markCompleteBtn.disabled = false;
//                         markCompleteBtn.classList.remove('opacity-50', 'cursor-not-allowed');
//                         nextBtn.disabled = false;
//                         nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
//                     });
//                 }
//             }, 100);
//             break;
                  
//              case 'article':
//             const isPDF = material.content.pdfUrl !== null;
//             if (isPDF) {
//                 contentDiv.innerHTML = `<iframe src="${material.content.pdfUrl}" class="w-full h-96 rounded-lg"></iframe>`;
                
//                 // Untuk PDF, bisa enable langsung atau set timer
//                 setTimeout(() => {
//                     const markCompleteBtn = document.getElementById('markCompleteBtn');
//                     const nextBtn = document.getElementById('nextBtn');
//                     markCompleteBtn.disabled = false;
//                     nextBtn.disabled = false;
//                 }, 30000); // 30 detik untuk PDF
                
//             } else {
//                 contentDiv.innerHTML = `
//                     <div class="prose max-w-none">
//                         <div id="articleContent" class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg h-96 overflow-y-auto">
//                             <h4 class="font-semibold text-blue-800 mb-2">📖 Artikel Pembelajaran</h4>
//                             <p class="text-blue-700">${material.content.text}</p>
//                         </div>
//                     </div>`;
                
//                 // Setup scroll tracking
//                 setTimeout(() => {
//                     const article = document.getElementById('articleContent');
//                     const markCompleteBtn = document.getElementById('markCompleteBtn');
//                     const nextBtn = document.getElementById('nextBtn');
                    
//                     if (article) {
//                         // Disable buttons initially
//                         markCompleteBtn.disabled = true;
//                         markCompleteBtn.classList.add('opacity-50', 'cursor-not-allowed');
//                         nextBtn.disabled = true;
//                         nextBtn.classList.add('opacity-50', 'cursor-not-allowed');
                        
//                         // Track scroll progress
//                         article.addEventListener('scroll', () => {
//                             const scrolled = article.scrollTop + article.clientHeight;
//                             const total = article.scrollHeight;
                            
//                             // Enable when scrolled 90% of content
//                             if (scrolled >= total * 0.9) {
//                                 markCompleteBtn.disabled = false;
//                                 markCompleteBtn.classList.remove('opacity-50', 'cursor-not-allowed');
//                                 nextBtn.disabled = false;
//                                 nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
//                             }
//                         });
//                     }
//                 }, 100);
//             }
//             break;
//                 case 'quiz':
//                     contentDiv.innerHTML = `
//                         <div class="bg-orange-50 border border-orange-200 rounded-lg p-6 text-center">
//                             <i class="ph ph-question text-4xl text-orange-500 mb-4"></i>
//                             <h4 class="font-semibold text-orange-800 mb-2">Quiz Interaktif</h4>
//                             <p class="text-orange-700 mb-4">${material.content.questions} pertanyaan untuk menguji pemahaman Anda</p>
//                             <a href="/desktop/pages/kelas/kelas-quiz" class="bg-orange-500 text-white px-6 py-2 rounded-full font-semibold hover:bg-orange-600 transition-all">
//                                 Mulai Quiz
//                             </a>
//                         </div>
//                     `;
//                     break;
//             }
//         }

        
//         function updateNavigationButtons() {
//             const currentIndex = courseData.materials.findIndex(m => m.id === currentMaterialId);
//             const prevBtn = document.getElementById('prevBtn');
//             const nextBtn = document.getElementById('nextBtn');
//             const completeBtn = document.getElementById('markCompleteBtn');
//             const completeText = document.getElementById('complete-text');
//             const nextText = document.getElementById('next-text');
            
           
//             prevBtn.disabled = currentIndex === 0;
            
            
//             const nextMaterial = courseData.materials[currentIndex + 1];
//             nextBtn.disabled = !nextMaterial;
            
//             if (nextMaterial) {
//                 if (nextMaterial.type === 'quiz') {
//                     nextText.textContent = 'Lanjut ke Quiz';
//                 } else {
//                     nextText.textContent = 'Lanjut ke Materi';
//                 }
//             } else {
//                 nextText.textContent = 'Selesai';
//             }
            
//             const isCompleted = userProgress.completedMaterials.includes(currentMaterialId);
//             if (isCompleted) {
//                 completeText.textContent = 'Sudah Selesai';
//                 completeBtn.classList.add('bg-green-100', 'text-green-700');
//                 completeBtn.classList.remove('bg-gray-100', 'text-gray-700');
//             } else {
//                 completeText.textContent = 'Tandai Selesai';
//                 completeBtn.classList.remove('bg-green-100', 'text-green-700');
//                 completeBtn.classList.add('bg-gray-100', 'text-gray-700');
//             }
//         }

//         function updateProgress() {
//             const completedCount = userProgress.completedMaterials.length;
//             const totalCount = courseData.materials.length;
//             const percentage = Math.round((completedCount / totalCount) * 100);
            
//             document.getElementById('completed-count').textContent = completedCount;
//             document.getElementById('total-count').textContent = totalCount;
//             document.getElementById('progress-bar').style.width = `${percentage}%`;
//             document.getElementById('progress-text').textContent = `${percentage}%`;
//         }

      
//         function getTypeLabel(type) {
//             const labels = {
//                 video: 'Video Pembelajaran',
//                 article: 'Artikel',
//                 quiz: 'Quiz'
//             };
//             return labels[type] || type;
//         }

//         function getTypeBadgeClass(type) {
//             const classes = {
//                 video: 'bg-blue-100 text-blue-800',
//                 article: 'bg-green-100 text-green-800',
//                 quiz: 'bg-orange-100 text-orange-800'
//             };
//             return classes[type] || 'bg-gray-100 text-gray-800';
//         }

//         document.getElementById('prevBtn').addEventListener('click', () => {
//             const currentIndex = courseData.materials.findIndex(m => m.id === currentMaterialId);
//             if (currentIndex > 0) {
//                 loadMaterial(courseData.materials[currentIndex - 1].id);
//             }
//         });

//         document.getElementById('nextBtn').addEventListener('click', () => {
//             const currentIndex = courseData.materials.findIndex(m => m.id === currentMaterialId);
//             if (currentIndex < courseData.materials.length - 1) {
//                 loadMaterial(courseData.materials[currentIndex + 1].id);
//             }
//         });


//         document.addEventListener('DOMContentLoaded', initializePage);
//         document.addEventListener('DOMContentLoaded', () => {
//         const markCompleteBtn = document.getElementById('markCompleteBtn');
//         const completeText = document.getElementById('complete-text');
//         const progressBar = document.getElementById('progress-bar');
//         const progressText = document.getElementById('progress-text');
//         const completedCountEl = document.getElementById('completed-count');
//         const totalCountEl = document.getElementById('total-count');

//         if (markCompleteBtn) {
//             markCompleteBtn.addEventListener('click', async () => {
//                 const materiId = getCurrentMateriIdFromURL(); // fungsi bantu
//                 const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//                 try {
//                     const response = await fetch(`/course/materi/${materiId}/mark-complete`, {
//                         method: 'POST',
//                         headers: {
//                             'Content-Type': 'application/json',
//                             'X-CSRF-TOKEN': csrfToken,
//                         },
//                     });

//                     const data = await response.json();

//                     if (data.success) {
//                         // Ubah tampilan tombol
//                         completeText.textContent = 'Selesai ✔';
//                         markCompleteBtn.disabled = true;
//                         markCompleteBtn.classList.add('opacity-50', 'cursor-not-allowed');

//                         // Update progres visual
//                         const completedCount = parseInt(completedCountEl.textContent) + 1;
//                         const totalCount = parseInt(totalCountEl.textContent);
//                         const progress = Math.round((completedCount / totalCount) * 100);

//                         completedCountEl.textContent = completedCount;
//                         progressBar.style.width = progress + '%';
//                         progressText.textContent = progress + '%';
//                     }
//                 } catch (error) {
//                     console.error('Gagal menyelesaikan materi:', error);
//                 }
//             });
//         }

//         function getCurrentMateriIdFromURL() {
//             const pathParts = window.location.pathname.split('/');
//             return pathParts[pathParts.length - 1]; // asumsi URL-nya: /course/{kelasId}/materi/{materiId}
//         }
//     });

//     document.addEventListener('DOMContentLoaded', function () {
//     const completeBtn = document.getElementById('markCompleteBtn');

//     if (completeBtn) {
//         completeBtn.addEventListener('click', function () {
//             const route = completeBtn.dataset.route;

//             if (!route) return;

//             completeBtn.disabled = true;

//             fetch(route, {
//                 method: 'POST',
//                 headers: {
//                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//                     'Accept': 'application/json',
//                     'Content-Type': 'application/json'
//                 },
//                 body: JSON.stringify({})
//             })
//             .then(response => {
//                 if (!response.ok) throw new Error('Gagal menyimpan progress');
//                 return response.json();
//             })
//             .then(data => {
//                 if (data.success) {
//                     // Update button appearance
//                     completeBtn.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
//                     completeBtn.classList.add('bg-green-100', 'text-green-700');
//                     completeBtn.querySelector('#complete-text').textContent = 'Sudah Selesai';
//                     completeBtn.disabled = true;

//                     // Update progress
//                     userProgress.completedMaterials.push(currentMaterialId);
                    
//                     // Update progress display
//                     document.getElementById('completed-count').textContent = data.completed_count;
//                     document.getElementById('total-count').textContent = data.total_count;
                    
//                     const progressPercentage = Math.round((data.completed_count / data.total_count) * 100);
//                     document.getElementById('progress-bar').style.width = `${progressPercentage}%`;
//                     document.getElementById('progress-text').textContent = `${progressPercentage}%`;
                    
//                     // Show course completion message
//                     if (data.course_completed) {
//                         alert('Selamat! Anda telah menyelesaikan seluruh kelas ini. Sertifikat akan segera tersedia.');
//                     }

//                     renderSidebar();
//                     updateNavigationButtons();
//                 }
//             })
//             .catch(error => {
//                 console.error('Gagal menyelesaikan materi:', error);
//                 completeBtn.disabled = false;
//             });
//         });
//     }
// });

const USE_API = true;
let courseData = {
    materials: [
        {
        id: 1,
        title: "Setup Environment & First Component",
        type: "video",
        duration: "15",
        week: 1,
        weekTitle: "Introduction to React",
        completed: true,
        content: {
            videoUrl: "#",
            description: "Belajar setup development environment dan membuat komponen React pertama"
        }
        },
        {
        id: 2,
        title: "JSX Syntax Deep Dive",
        type: "article",
        duration: "10 menit",
        week: 1,
        weekTitle: "Introduction to React",
        completed: false,
        content: {
            text: "Memahami sintaks JSX dan perbedaannya dengan HTML biasa"
        }
        },
        {
        id: 3,
        title: "Props & Components Practice",
        type: "video",
        duration: "20 menit",
        week: 1,
        weekTitle: "Introduction to React",
        completed: false,
        content: {
            videoUrl: "#",
            description: "Praktik langsung membuat komponen dengan props"
        }
        },
        {
        id: 4,
        title: "Quiz: React Basics",
        type: "quiz",
        duration: "5 menit",
        week: 1,
        weekTitle: "Introduction to React",
        completed: false,
        content: {
            questions: 10
        }
        },
        {
        id: 5,
        title: "useState Hook Introduction",
        type: "video",
        duration: "18 menit",
        week: 2,
        weekTitle: "State Management",
        completed: false,
        locked: true,
        content: {
            videoUrl: "#",
            description: "Pengenalan useState hook untuk state management"
        }
        }
    ]
};
    
let currentMaterialId = 1;
let userProgress = {
    completedMaterials: [1],
    currentMaterial: 1
};

// Global flag to track if material content requirements are met
let canProceed = false;

function initializePage() {
    if (USE_API) {
        const courseId = document.body.dataset.courseId;
        fetch(`/api/courses/${courseId}/materials`)
        .then(response => response.json())
        .then(data => {
            courseData = data;
            const completedList = data.materials
                .filter(m => m.completed)
                .map(m => m.id);

            userProgress.completedMaterials = completedList;
            
            // Cari materi pertama yang belum selesai dan belum dikunci
            const firstUnlocked = data.materials.find(m => !m.locked);
            currentMaterialId = firstUnlocked?.id || data.materials[0]?.id;

            userProgress.currentMaterial = currentMaterialId;

            renderSidebar();
            loadMaterial(currentMaterialId);
            updateProgress();
        })
        .catch(error => {
            console.error('Gagal mengambil data dari API:', error);
        });
    } else {
        // Kalau pakai data lokal
        currentMaterialId = courseData.materials[0]?.id || null;
        userProgress.currentMaterial = currentMaterialId;

        renderSidebar();
        loadMaterial(currentMaterialId);
        updateProgress();
    }
}

function renderSidebar() {
    const contentDiv = document.getElementById('course-content');
    const weeks = groupMaterialsByWeek();
    
    let html = '';
    
    Object.keys(weeks).forEach(weekNum => {
        const weekMaterials = weeks[weekNum];
        const weekTitle = weekMaterials[0].weekTitle;
        
        html += `
            <div class="p-4 border-b border-gray-100">
                <h4 class="font-semibold text-sm text-gray-700 mb-3">Week ${weekNum}: ${weekTitle}</h4>
                <div class="space-y-2">
        `;
        
        weekMaterials.forEach(material => {
            const isActive = material.id === currentMaterialId;
            const isCompleted = userProgress.completedMaterials.includes(material.id);
            const isLocked = material.locked;
            
            let icon = 'ph-play-circle';
            let iconColor = 'text-gray-400';
            
            if (material.type === 'article') {
                icon = 'ph-file-text';
            } else if (material.type === 'quiz') {
                icon = 'ph-question';
                iconColor = 'text-orange-400';
            }
            
            if (isLocked) {
                icon = 'ph-lock';
                iconColor = 'text-gray-400';
            } else if (isActive) {
                iconColor = 'text-p2';
            }
            
            html += `
                <div class="flex items-center gap-2 p-2 rounded-lg cursor-pointer transition-all
                    ${isActive ? 'bg-p2/10 border-l-4 border-p2' : 'hover:bg-gray-50'}
                    ${isLocked ? 'opacity-50 cursor-not-allowed' : ''}"
                    ${!isLocked ? `onclick="loadMaterial(${material.id})"` : ''}>
                    <i class="ph ${icon} ${iconColor}"></i>
                    <span class="text-sm ${isActive ? 'text-p2 font-medium' : 'text-gray-600'}">${material.title}</span>
                    ${isCompleted ? '<i class="ph ph-check-circle text-green-500 ml-auto"></i>' : ''}
                </div>
            `;
        });
        
        html += `
                </div>
            </div>
        `;
    });
    
    contentDiv.innerHTML = html;
}

function groupMaterialsByWeek() {
    const weeks = {};
    courseData.materials.forEach(material => {
        if (!weeks[material.week]) {
            weeks[material.week] = [];
        }
        weeks[material.week].push(material);
    });
    return weeks;
}

function loadMaterial(materialId) {
    const material = courseData.materials.find(m => m.id === materialId);
    console.log("Material yang dimuat:", material);
    if (!material || (material.locked && !userProgress.completedMaterials.includes(materialId))) {
        return;
    }
    
    currentMaterialId = materialId;
    // Reset canProceed for new material
    canProceed = userProgress.completedMaterials.includes(materialId); // Already completed materials can proceed
    
    document.getElementById('material-title').textContent = material.title;
    document.getElementById('material-info').textContent = `Durasi: ${material.duration ? material.duration : 'N/A'} menit • ${getTypeLabel(material.type)}`;
    document.getElementById('weekInfo').textContent = `Week ${material.week}: ${material.weekTitle}`;
    
    const badge = document.getElementById('material-type-badge');
    badge.textContent = getTypeLabel(material.type);
    badge.className = `px-3 py-1 rounded-full text-sm ${getTypeBadgeClass(material.type)}`;
    
    renderMaterialContent(material);
    updateNavigationButtons();
    renderSidebar();
    updateProgress();
}

function renderMaterialContent(material) {
    const contentDiv = document.getElementById('content-display');
    
    switch(material.type) {
        case 'video':
            contentDiv.innerHTML = `
                <div class="mb-4">
                    <video id="materiVideo" controls class="w-full rounded-lg aspect-video">
                        <source src="${material.content.videoUrl}" type="video/mp4">
                        Browser kamu tidak mendukung pemutar video.
                    </video>
                    <p class="text-gray-700 mt-2">${material.content.description}</p>
                </div>
            `;
            
            setTimeout(() => {
                const video = document.getElementById('materiVideo');
                if (video && !userProgress.completedMaterials.includes(material.id)) {
                    video.addEventListener('ended', () => {
                        canProceed = true;
                        updateNavigationButtons();
                    });
                }
            }, 100);
            break;
              
        case 'article':
            const isPDF = material.content.pdfUrl && material.content.pdfUrl !== null;
            if (isPDF) {
                contentDiv.innerHTML = `<iframe src="${material.content.pdfUrl}" class="w-full h-96 rounded-lg"></iframe>`;
                
                if (!userProgress.completedMaterials.includes(material.id)) {
                    setTimeout(() => {
                        canProceed = true;
                        updateNavigationButtons();
                    }, 5000); // Kurangi jadi 5 detik untuk testing
                }
            } else {
                // Buat konten artikel yang lebih panjang agar bisa di-scroll
                const longContent = `
                    <h4 class="font-semibold text-blue-800 mb-4">📖 Artikel Pembelajaran</h4>
                    <div class="text-blue-700 space-y-4">
                        <p>${material.content.text}</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                        <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>
                        <p class="font-semibold text-blue-800">🎯 Scroll ke bawah untuk menyelesaikan artikel ini</p>
                        <div style="height: 200px;"></div>
                        <p class="text-center font-bold text-green-600">✅ Artikel Selesai - Anda dapat melanjutkan!</p>
                    </div>
                `;
                
                contentDiv.innerHTML = `
                    <div class="prose max-w-none">
                        <div id="articleContent" class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg h-80 overflow-y-auto">
                            ${longContent}
                        </div>
                    </div>`;
                
                setTimeout(() => {
                    const article = document.getElementById('articleContent');
                    if (article && !userProgress.completedMaterials.includes(material.id)) {
                        
                        // Langsung enable untuk testing - hapus ini nanti
                        // canProceed = true;
                        // updateNavigationButtons();
                        
                        article.addEventListener('scroll', () => {
                            const scrolled = article.scrollTop + article.clientHeight;
                            const total = article.scrollHeight;
                            const scrollPercentage = (scrolled / total) * 100;
                            
                            console.log(`Scroll progress: ${scrollPercentage.toFixed(1)}%`);
                            
                            // Enable ketika scroll 80% (lebih mudah)
                            if (scrollPercentage >= 80) {
                                canProceed = true;
                                updateNavigationButtons();
                                console.log('Artikel dapat diselesaikan!');
                            }
                        });
                        
                        // Fallback: auto-enable setelah 10 detik jika tidak di-scroll
                        setTimeout(() => {
                            if (!canProceed && !userProgress.completedMaterials.includes(material.id)) {
                                console.log('Auto-enabling artikel setelah 10 detik');
                                canProceed = true;
                                updateNavigationButtons();
                            }
                        }, 10000);
                    }
                }, 500); // Tambah delay sedikit
            }
            break;
            
        case 'quiz':
            contentDiv.innerHTML = `
                <div class="bg-orange-50 border border-orange-200 rounded-lg p-6 text-center">
                    <i class="ph ph-question text-4xl text-orange-500 mb-4"></i>
                    <h4 class="font-semibold text-orange-800 mb-2">Quiz Interaktif</h4>
                    <p class="text-orange-700 mb-4">${material.content.questions} pertanyaan untuk menguji pemahaman Anda</p>
                    <a href="/desktop/pages/kelas/kelas-quiz" class="bg-orange-500 text-white px-6 py-2 rounded-full font-semibold hover:bg-orange-600 transition-all">
                        Mulai Quiz
                    </a>
                </div>
            `;
            canProceed = true; // Quiz always allows to proceed
            break;
    }
}

function updateNavigationButtons() {
    const currentIndex = courseData.materials.findIndex(m => m.id === currentMaterialId);
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const completeBtn = document.getElementById('markCompleteBtn');
    const completeText = document.getElementById('complete-text');
    const nextText = document.getElementById('next-text');
    
    // Previous button
    prevBtn.disabled = currentIndex === 0;
    
    // Next button - enable if material is completed OR if canProceed is true
    const nextMaterial = courseData.materials[currentIndex + 1];
    const isCurrentCompleted = userProgress.completedMaterials.includes(currentMaterialId);
    
    nextBtn.disabled = !nextMaterial || (!isCurrentCompleted && !canProceed);
    
    // Remove visual disabled state if enabled
    if (!nextBtn.disabled) {
        nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    } else {
        nextBtn.classList.add('opacity-50', 'cursor-not-allowed');
    }
    
    if (nextMaterial) {
        if (nextMaterial.type === 'quiz') {
            nextText.textContent = 'Lanjut ke Quiz';
        } else {
            nextText.textContent = 'Lanjut ke Materi';
        }
    } else {
        nextText.textContent = 'Selesai';
    }
    
    // Complete button
    const isCompleted = userProgress.completedMaterials.includes(currentMaterialId);
    if (isCompleted) {
        completeText.textContent = 'Sudah Selesai';
        completeBtn.classList.add('bg-green-100', 'text-green-700');
        completeBtn.classList.remove('bg-gray-100', 'text-gray-700');
        completeBtn.disabled = true;
    } else {
        completeText.textContent = 'Tandai Selesai';
        completeBtn.classList.remove('bg-green-100', 'text-green-700');
        completeBtn.classList.add('bg-gray-100', 'text-gray-700');
        
        // Enable complete button only if content requirements are met
        completeBtn.disabled = !canProceed;
        if (!canProceed) {
            completeBtn.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            completeBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }
}

function updateProgress() {
    const completedCount = userProgress.completedMaterials.length;
    const totalCount = courseData.materials.length;
    const percentage = Math.round((completedCount / totalCount) * 100);
    
    document.getElementById('completed-count').textContent = completedCount;
    document.getElementById('total-count').textContent = totalCount;
    document.getElementById('progress-bar').style.width = `${percentage}%`;
    document.getElementById('progress-text').textContent = `${percentage}%`;
}

function getTypeLabel(type) {
    const labels = {
        video: 'Video Pembelajaran',
        article: 'Artikel',
        quiz: 'Quiz'
    };
    return labels[type] || type;
}

function getTypeBadgeClass(type) {
    const classes = {
        video: 'bg-blue-100 text-blue-800',
        article: 'bg-green-100 text-green-800',
        quiz: 'bg-orange-100 text-orange-800'
    };
    return classes[type] || 'bg-gray-100 text-gray-800';
}

// Navigation event listeners - PINDAH KE DALAM DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize page
    initializePage();
    
    // Setup navigation buttons
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            const currentIndex = courseData.materials.findIndex(m => m.id === currentMaterialId);
            if (currentIndex > 0) {
                loadMaterial(courseData.materials[currentIndex - 1].id);
            }
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            const currentIndex = courseData.materials.findIndex(m => m.id === currentMaterialId);
            if (currentIndex < courseData.materials.length - 1) {
                loadMaterial(courseData.materials[currentIndex + 1].id);
            }
        });
    }
    
    // Setup Mark Complete button
    setupMarkCompleteButton();
});

function setupMarkCompleteButton() {
    const completeBtn = document.getElementById('markCompleteBtn');

    if (completeBtn) {
        completeBtn.addEventListener('click', function () {
            const route = completeBtn.dataset.route;
            if (!route) return;

            const originalText = completeBtn.querySelector('#complete-text').textContent;
            completeBtn.disabled = true;
            completeBtn.querySelector('#complete-text').textContent = 'Menyimpan...';

            fetch(route, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => {
                if (!response.ok) throw new Error('Gagal menyimpan progress');
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Update local state
                    if (!userProgress.completedMaterials.includes(currentMaterialId)) {
                        userProgress.completedMaterials.push(currentMaterialId);
                    }
                    
                    // Update courseData if using local data
                    if (!USE_API) {
                        const material = courseData.materials.find(m => m.id === currentMaterialId);
                        if (material) material.completed = true;
                    }

                    // Update button appearance
                    completeBtn.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                    completeBtn.classList.add('bg-green-100', 'text-green-700');
                    completeBtn.querySelector('#complete-text').textContent = 'Sudah Selesai';
                    completeBtn.disabled = true;

                    // Update progress display
                    document.getElementById('completed-count').textContent = data.completed_count || userProgress.completedMaterials.length;
                    document.getElementById('total-count').textContent = data.total_count || courseData.materials.length;
                    
                    const progressPercentage = Math.round(((data.completed_count || userProgress.completedMaterials.length) / (data.total_count || courseData.materials.length)) * 100);
                    document.getElementById('progress-bar').style.width = `${progressPercentage}%`;
                    document.getElementById('progress-text').textContent = `${progressPercentage}%`;
                    
                    // Show course completion message
                    if (data.course_completed) {
                        alert('Selamat! Anda telah menyelesaikan seluruh kelas ini. Sertifikat akan segera tersedia.');
                    }

                    // Re-render components to reflect changes
                    renderSidebar();
                    updateNavigationButtons(); // This will now enable the next button
                }
            })
            .catch(error => {
                console.error('Gagal menyelesaikan materi:', error);
                completeBtn.disabled = false;
                completeBtn.querySelector('#complete-text').textContent = originalText;
            });
        });
    }
}
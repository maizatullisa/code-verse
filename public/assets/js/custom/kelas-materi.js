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
            
            // window.history.pushState({}, '', `/course/${courseData.id}/material/${materialId}`);
            
            document.getElementById('material-title').textContent = material.title;
           const durasiText = material.duration ? `${material.duration} menit` : 'N/A menit';
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
                    <video controls class="w-full rounded-lg aspect-video">
                        <source src="${material.content.videoUrl}" type="video/mp4">
                        Browser kamu tidak mendukung pemutar video.
                    </video>
                    <p class="text-gray-700 mt-2">${material.content.description}</p>
                </div>
            `;
            setTimeout(() => {
            const video = document.getElementById('materiVideo');
            if (video) {
            video.addEventListener('ended', () => {
                document.getElementById('markCompleteBtn').disabled = false;
            });

            // Default: tombol dikunci
            document.getElementById('markCompleteBtn').disabled = true;
            }
        }, 100); 
            break;
                  
                case 'article':
                const isPDF = material.content.pdfUrl !== null;
                contentDiv.innerHTML = isPDF
                    ? `<iframe src="${material.content.pdfUrl}" class="w-full h-96 rounded-lg"></iframe>`
                    : `<div class="prose max-w-none">
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg">
                                <h4 class="font-semibold text-blue-800 mb-2">📖 Artikel Pembelajaran</h4>
                                <p class="text-blue-700">${material.content.text}</p>
                            </div>
                    </div>`;
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
            
           
            prevBtn.disabled = currentIndex === 0;
            
            
            const nextMaterial = courseData.materials[currentIndex + 1];
            nextBtn.disabled = !nextMaterial;
            
            if (nextMaterial) {
                if (nextMaterial.type === 'quiz') {
                    nextText.textContent = 'Lanjut ke Quiz';
                } else {
                    nextText.textContent = 'Lanjut ke Materi';
                }
            } else {
                nextText.textContent = 'Selesai';
            }
            
            const isCompleted = userProgress.completedMaterials.includes(currentMaterialId);
            if (isCompleted) {
                completeText.textContent = 'Sudah Selesai';
                completeBtn.classList.add('bg-green-100', 'text-green-700');
                completeBtn.classList.remove('bg-gray-100', 'text-gray-700');
            } else {
                completeText.textContent = 'Tandai Selesai';
                completeBtn.classList.remove('bg-green-100', 'text-green-700');
                completeBtn.classList.add('bg-gray-100', 'text-gray-700');
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

        document.getElementById('prevBtn').addEventListener('click', () => {
            const currentIndex = courseData.materials.findIndex(m => m.id === currentMaterialId);
            if (currentIndex > 0) {
                loadMaterial(courseData.materials[currentIndex - 1].id);
            }
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            const currentIndex = courseData.materials.findIndex(m => m.id === currentMaterialId);
            if (currentIndex < courseData.materials.length - 1) {
                loadMaterial(courseData.materials[currentIndex + 1].id);
            }
        });


        document.addEventListener('DOMContentLoaded', initializePage);
        document.addEventListener('DOMContentLoaded', () => {
        const markCompleteBtn = document.getElementById('markCompleteBtn');
        const completeText = document.getElementById('complete-text');
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        const completedCountEl = document.getElementById('completed-count');
        const totalCountEl = document.getElementById('total-count');

        if (markCompleteBtn) {
            markCompleteBtn.addEventListener('click', async () => {
                const materiId = getCurrentMateriIdFromURL(); // fungsi bantu
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                try {
                    const response = await fetch(`/course/materi/${materiId}/mark-complete`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    });

                    const data = await response.json();

                    if (data.success) {
                        // Ubah tampilan tombol
                        completeText.textContent = 'Selesai ✔';
                        markCompleteBtn.disabled = true;
                        markCompleteBtn.classList.add('opacity-50', 'cursor-not-allowed');

                        // Update progres visual
                        const completedCount = parseInt(completedCountEl.textContent) + 1;
                        const totalCount = parseInt(totalCountEl.textContent);
                        const progress = Math.round((completedCount / totalCount) * 100);

                        completedCountEl.textContent = completedCount;
                        progressBar.style.width = progress + '%';
                        progressText.textContent = progress + '%';
                    }
                } catch (error) {
                    console.error('Gagal menyelesaikan materi:', error);
                }
            });
        }

        function getCurrentMateriIdFromURL() {
            const pathParts = window.location.pathname.split('/');
            return pathParts[pathParts.length - 1]; // asumsi URL-nya: /course/{kelasId}/materi/{materiId}
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
    const completeBtn = document.getElementById('markCompleteBtn');

    if (completeBtn) {
        completeBtn.addEventListener('click', function () {
            const route = completeBtn.dataset.route;

            if (!route) return;

            // Cegah double klik
            completeBtn.disabled = true;

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
                    completeBtn.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                    completeBtn.classList.add('bg-green-100', 'text-green-700');
                    completeBtn.querySelector('#complete-text').textContent = 'Sudah Selesai';
                    completeBtn.disabled = true;

                    userProgress.completedMaterials.push(currentMaterialId);
                    renderSidebar();
                    updateNavigationButtons();
                    updateProgress();

                }
                
            })
            .catch(error => {
                console.error('Gagal menyelesaikan materi:', error);
                completeBtn.disabled = false;
            });
        });
    }
});


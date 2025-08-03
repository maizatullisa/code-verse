const courseData = {
    id: 1,
    title: "React JS Fundamental", 
    instructor: "John Doe",
    materials: [
        {
        id: 1,
        title: "Setup Environment & First Component",
        type: "video",
        duration: "15 menit",
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
            renderSidebar();
            loadMaterial(currentMaterialId);
            updateProgress();
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
                    const isLocked = material.locked && !isCompleted;
                    
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
            if (!material || (material.locked && !userProgress.completedMaterials.includes(materialId))) {
                return;
            }
            
            currentMaterialId = materialId;
            
            // window.history.pushState({}, '', `/course/${courseData.id}/material/${materialId}`);
            
            document.getElementById('material-title').textContent = material.title;
            document.getElementById('material-info').textContent = `Durasi: ${material.duration} • ${getTypeLabel(material.type)}`;
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
                        <div class="bg-gray-900 rounded-lg aspect-video flex items-center justify-center mb-4 relative">
                            <div class="text-center">
                                <button class="bg-white/20 backdrop-blur-sm text-white rounded-full p-4 hover:bg-white/30 transition-all mb-4">
                                    <i class="ph ph-play text-3xl"></i>
                                </button>
                                <p class="text-white/80 text-sm">${material.content.description}</p>
                            </div>
                        </div>
                    `;
                    break;
                    
                case 'article':
                    contentDiv.innerHTML = `
                        <div class="prose max-w-none">
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg">
                                <h4 class="font-semibold text-blue-800 mb-2">📖 Artikel Pembelajaran</h4>
                                <p class="text-blue-700">${material.content.text}</p>
                            </div>
                        </div>
                    `;
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

        document.getElementById('markCompleteBtn').addEventListener('click', () => {
            if (!userProgress.completedMaterials.includes(currentMaterialId)) {
                userProgress.completedMaterials.push(currentMaterialId);
                
                const currentIndex = courseData.materials.findIndex(m => m.id === currentMaterialId);
                const nextMaterial = courseData.materials[currentIndex + 1];
                if (nextMaterial && nextMaterial.locked) {
                    nextMaterial.locked = false;
                }
                
                // krm ke be
                // fetch(`/api/materials/${currentMaterialId}/complete`, { method: 'POST' })
                
                updateNavigationButtons();
                renderSidebar();
                updateProgress();
            }
        });

       
        document.addEventListener('DOMContentLoaded', initializePage);
let stepCounter = 0;

// Modal functions
function openCreateModal() {
    document.getElementById('modalTitle').textContent = 'Tambah Roadmap Baru';
    document.getElementById('submitText').textContent = 'Simpan Roadmap';
    document.getElementById('roadmapForm').reset();
    document.getElementById('roadmapId').value = '';
    document.getElementById('stepsContainer').innerHTML = '';
    stepCounter = 0;
    addStep(); // Add first step
    document.getElementById('roadmapModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('roadmapModal').classList.add('hidden');
}

function closeViewModal() {
    document.getElementById('viewModal').classList.add('hidden');
}

// Add step function
function addStep() {
    stepCounter++;
    const stepHtml = `
        <div class="step-item border border-gray-200 rounded-lg p-4" data-step="${stepCounter}">
            <div class="flex justify-between items-center mb-4">
                <h4 class="font-medium text-gray-900">Step ${stepCounter}</h4>
                <button type="button" onclick="removeStep(${stepCounter})" class="text-red-600 hover:text-red-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Step *</label>
                    <input type="text" name="steps[${stepCounter}][title]" required
                           class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="e.g. Learn HTML Basics">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Estimasi Waktu</label>
                    <input type="text" name="steps[${stepCounter}][duration]"
                           class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="e.g. 2 minggu">
                </div>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi *</label>
                <textarea name="steps[${stepCounter}][description]" rows="2" required
                          class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                          placeholder="Jelaskan apa yang akan dipelajari di step ini..."></textarea>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Resources (URLs dipisah koma)</label>
                <textarea name="steps[${stepCounter}][resources]" rows="2"
                          class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                          placeholder="https://developer.mozilla.org/en-US/docs/Web/HTML, https://w3schools.com/html/"></textarea>
            </div>
        </div>
    `;
    
    document.getElementById('stepsContainer').insertAdjacentHTML('beforeend', stepHtml);
}

function removeStep(stepId) {
    const stepElement = document.querySelector(`[data-step="${stepId}"]`);
    if (stepElement) {
        stepElement.remove();
    }
    
    // Renumber remaining steps
    const steps = document.querySelectorAll('.step-item');
    steps.forEach((step, index) => {
        const stepNumber = index + 1;
        step.querySelector('h4').textContent = `Step ${stepNumber}`;
    });
}

// CRUD operations
function editRoadmap(id) {
    fetch(`/admin/roadmap/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const roadmap = data.roadmap;
                
                document.getElementById('modalTitle').textContent = 'Edit Roadmap';
                document.getElementById('submitText').textContent = 'Update Roadmap';
                document.getElementById('roadmapId').value = roadmap.id;
                document.getElementById('title').value = roadmap.title;
                document.getElementById('category').value = roadmap.category;
                document.getElementById('level').value = roadmap.level;
                document.getElementById('duration').value = roadmap.duration;
                document.getElementById('description').value = roadmap.description;
                document.getElementById('prerequisites').value = roadmap.prerequisites || '';
                document.getElementById('color').value = roadmap.color || 'from-blue-500 to-indigo-600';
                document.getElementById('status').value = roadmap.status;
                
                // Load steps
                document.getElementById('stepsContainer').innerHTML = '';
                stepCounter = 0;
                
                if (roadmap.steps && roadmap.steps.length > 0) {
                    roadmap.steps.forEach(step => {
                        addStep();
                        const currentStep = stepCounter;
                        const stepElement = document.querySelector(`[data-step="${currentStep}"]`);
                        stepElement.querySelector(`input[name="steps[${currentStep}][title]"]`).value = step.title;
                        stepElement.querySelector(`input[name="steps[${currentStep}][duration]"]`).value = step.duration || '';
                        stepElement.querySelector(`textarea[name="steps[${currentStep}][description]"]`).value = step.description;
                        stepElement.querySelector(`textarea[name="steps[${currentStep}][resources]"]`).value = step.resources || '';
                    });
                } else {
                    addStep();
                }
                
                document.getElementById('roadmapModal').classList.remove('hidden');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal memuat data roadmap');
        });
}

function viewRoadmap(id) {
    fetch(`/admin/roadmap/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const roadmap = data.roadmap;
                let stepsHtml = '';
                
                if (roadmap.steps && roadmap.steps.length > 0) {
                    stepsHtml = roadmap.steps.map((step, index) => `
                        <div class="border border-gray-200 rounded-lg p-4 mb-4">
                            <h4 class="font-semibold text-gray-900 mb-2">Step ${index + 1}: ${step.title}</h4>
                            <p class="text-gray-600 mb-2">${step.description}</p>
                            ${step.duration ? `<p class="text-sm text-gray-500 mb-2"><strong>Durasi:</strong> ${step.duration}</p>` : ''}
                            ${step.resources ? `<div class="text-sm text-gray-500"><strong>Resources:</strong><br>${step.resources.split(',').map(url => `<a href="${url.trim()}" target="_blank" class="text-blue-600 hover:underline">${url.trim()}</a>`).join('<br>')}</div>` : ''}
                        </div>
                    `).join('');
                }
                
                document.getElementById('viewContent').innerHTML = `
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-r ${roadmap.color || 'from-indigo-500 to-purple-500'} rounded-xl flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">${roadmap.title}</h3>
                                <div class="flex items-center space-x-4 mt-2">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">${roadmap.category}</span>
                                    <span class="px-3 py-1 text-xs font-medium rounded-full ${roadmap.level == 'beginner' ? 'bg-green-100 text-green-800' : (roadmap.level == 'intermediate' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800')}">${roadmap.level}</span>
                                    <span class="px-3 py-1 text-xs font-medium rounded-full ${roadmap.status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">${roadmap.status}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Deskripsi</h4>
                            <p class="text-gray-600">${roadmap.description}</p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">Durasi</h4>
                                <p class="text-gray-600">${roadmap.duration}</p>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">Total Steps</h4>
                                <p class="text-gray-600">${roadmap.steps ? roadmap.steps.length : 0} langkah</p>
                            </div>
                        </div>
                        
                        ${roadmap.prerequisites ? `
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Prerequisites</h4>
                            <p class="text-gray-600">${roadmap.prerequisites}</p>
                        </div>
                        ` : ''}
                        
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-4">Langkah-langkah Roadmap</h4>
                            ${stepsHtml || '<p class="text-gray-500">Belum ada langkah yang ditambahkan</p>'}
                        </div>
                    </div>
                `;
                
                document.getElementById('viewModal').classList.remove('hidden');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal memuat detail roadmap');
        });
}

function deleteRoadmap(id) {
    if (confirm('Apakah Anda yakin ingin menghapus roadmap ini?')) {
        fetch(`/admin/roadmap/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Gagal menghapus roadmap');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal menghapus roadmap');
        });
    }
}

// Form submission
document.getElementById('roadmapForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const roadmapId = document.getElementById('roadmapId').value;
    const url = roadmapId ? `/admin/roadmap/${roadmapId}` : '/admin/roadmap';
    const method = roadmapId ? 'PUT' : 'POST';
    
    if (method === 'PUT') {
        formData.append('_method', 'PUT');
    }
    
    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            closeModal();
            location.reload();
        } else {
            alert(data.message || 'Gagal menyimpan roadmap');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Gagal menyimpan roadmap');
    });
});

// Search and filter functionality
document.getElementById('search-roadmap').addEventListener('input', filterRoadmaps);
document.getElementById('filter-category').addEventListener('change', filterRoadmaps);
document.getElementById('filter-status').addEventListener('change', filterRoadmaps);

function filterRoadmaps() {
    const search = document.getElementById('search-roadmap').value.toLowerCase();
    const category = document.getElementById('filter-category').value;
    const status = document.getElementById('filter-status').value;
    
    const rows = document.querySelectorAll('#roadmaps-table-body tr');
    
    rows.forEach(row => {
        if (row.querySelector('td[colspan]')) return; // Skip empty state row
        
        const title = row.querySelector('td:first-child .text-sm.font-medium').textContent.toLowerCase();
        const rowCategory = row.querySelector('td:nth-child(2) span').textContent.toLowerCase();
        const rowStatus = row.querySelector('td:nth-child(5) span').textContent.toLowerCase();
        
        const matchesSearch = title.includes(search);
        const matchesCategory = !category || rowCategory.includes(category.toLowerCase().replace('-', ' '));
        const matchesStatus = !status || rowStatus.includes(status.toLowerCase());
        
        if (matchesSearch && matchesCategory && matchesStatus) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
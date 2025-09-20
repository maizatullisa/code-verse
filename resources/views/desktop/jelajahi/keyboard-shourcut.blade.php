@extends('desktop.layout.master-desktop')

@section('title', 'key-shourcut')

@section('page-title', 'Tips-Shourcut')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-pink-100 py-6 sm:py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <!-- Header Section -->
        <div class="text-center mb-8 sm:mb-12">
            <div class="inline-flex items-center justify-center w-12 h-12 sm:w-16 sm:h-16 bg-purple-500 rounded-2xl mb-4">
                <i class="ph ph-keyboard text-white text-xl sm:text-2xl"></i>
            </div>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-2 sm:mb-4">Keyboard Shortcuts</h1>
            <p class="text-base sm:text-lg text-gray-600 px-4">Shortcut yang wajib diketahui untuk meningkatkan produktivitas</p>
        </div>

        <!-- Category Tabs & Search -->
        <div class="bg-white rounded-2xl shadow-xl p-4 sm:p-6 mb-6 sm:mb-8">
            <!-- Category Tabs -->
            <div class="flex flex-wrap gap-1 sm:gap-2 justify-center mb-4 sm:mb-6 overflow-x-auto pb-2">
                <button onclick="showCategory('vscode')" class="category-btn active px-3 py-2 sm:px-6 sm:py-3 rounded-xl text-xs sm:text-sm font-medium transition-all whitespace-nowrap flex items-center">
                    <i class="ph ph-code mr-1 sm:mr-2 text-sm sm:text-base"></i>
                    <span class="hidden xs:inline">VS Code</span>
                    <span class="xs:hidden">VS</span>
                </button>
                <button onclick="showCategory('git')" class="category-btn px-3 py-2 sm:px-6 sm:py-3 rounded-xl text-xs sm:text-sm font-medium transition-all whitespace-nowrap flex items-center">
                    <i class="ph ph-git-branch mr-1 sm:mr-2 text-sm sm:text-base"></i>Git
                </button>
                <button onclick="showCategory('linux')" class="category-btn px-3 py-2 sm:px-6 sm:py-3 rounded-xl text-xs sm:text-sm font-medium transition-all whitespace-nowrap flex items-center">
                    <i class="ph ph-terminal mr-1 sm:mr-2 text-sm sm:text-base"></i>Linux
                </button>
                <button onclick="showCategory('chrome')" class="category-btn px-3 py-2 sm:px-6 sm:py-3 rounded-xl text-xs sm:text-sm font-medium transition-all whitespace-nowrap flex items-center">
                    <i class="ph ph-browser mr-1 sm:mr-2 text-sm sm:text-base"></i>
                    <span class="hidden sm:inline">Chrome DevTools</span>
                    <span class="sm:hidden">Chrome</span>
                </button>
                <button onclick="showCategory('general')" class="category-btn px-3 py-2 sm:px-6 sm:py-3 rounded-xl text-xs sm:text-sm font-medium transition-all whitespace-nowrap flex items-center">
                    <i class="ph ph-desktop mr-1 sm:mr-2 text-sm sm:text-base"></i>General
                </button>
            </div>

            <!-- Search Bar -->
            <div class="relative">
                <i class="ph ph-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg sm:text-xl"></i>
                <input 
                    type="text" 
                    id="search-shortcuts"
                    placeholder="Cari shortcut..."
                    class="w-full pl-12 pr-4 py-3 sm:py-4 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:outline-none text-gray-700 text-sm sm:text-base transition-all"
                    oninput="debouncedSearch()"
                >
                <button onclick="clearSearch()" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors hidden" id="clear-search-btn">
                    <i class="ph ph-x text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Shortcuts Content -->
        <div id="shortcuts-container" class="space-y-4 sm:space-y-6 lg:space-y-8">
            <!-- Content akan dimuat di sini -->
        </div>

        <!-- No Results -->
        <div id="no-results-shortcuts" class="hidden text-center py-8 sm:py-12">
            <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="ph ph-keyboard text-gray-400 text-xl sm:text-2xl"></i>
            </div>
            <h3 class="text-base sm:text-lg font-medium text-gray-600 mb-2">Tidak ada shortcut ditemukan</h3>
            <p class="text-sm sm:text-base text-gray-500">Coba dengan kata kunci yang berbeda</p>
        </div>
    </div>
</div>

<style>
/* Category buttons styling */
.category-btn {
    background: #f3f4f6;
    color: #6b7280;
    min-height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.category-btn:hover {
    background: #e5e7eb;
    color: #374151;
    transform: translateY(-1px);
}

.category-btn.active {
    background: #8b5cf6;
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
}

/* Shortcut key styling */
.shortcut-key {
    background: #f8fafc;
    border: 2px solid #e2e8f0;
    border-radius: 6px;
    padding: 3px 6px;
    font-family: 'SF Mono', 'Monaco', 'Menlo', monospace;
    font-size: 11px;
    font-weight: 600;
    color: #475569;
    display: inline-block;
    margin: 0 1px;
    min-width: 20px;
    text-align: center;
    box-shadow: 0 1px 0 0 #cbd5e1;
    position: relative;
    top: -1px;
}

@media (min-width: 640px) {
    .shortcut-key {
        padding: 4px 8px;
        font-size: 12px;
        margin: 0 2px;
        min-width: 24px;
    }
}

/* Shortcut group styling */
.shortcut-group {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    padding: 16px;
    transition: all 0.3s ease;
}

@media (min-width: 640px) {
    .shortcut-group {
        padding: 24px;
    }
}

.shortcut-group:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
}

/* Shortcut item styling */
.shortcut-item {
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding: 12px;
    background: #f8fafc;
    border-radius: 8px;
    transition: all 0.2s ease;
}

@media (min-width: 640px) {
    .shortcut-item {
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        padding: 16px;
        gap: 12px;
    }
}

.shortcut-item:hover {
    background: #f1f5f9;
    transform: translateX(4px);
}

/* Mobile-specific adjustments */
@media (max-width: 640px) {
    /* Category tabs horizontal scroll */
    .category-tabs-container {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    
    .category-tabs-container::-webkit-scrollbar {
        display: none;
    }
    
    /* Shortcut keys wrap on mobile */
    .shortcut-keys-mobile {
        flex-wrap: wrap;
        gap: 4px;
        margin-bottom: 8px;
    }
    
    /* Description on mobile */
    .shortcut-description-mobile {
        font-size: 14px;
        line-height: 1.4;
    }
}

/* Loading state */
.loading {
    opacity: 0.6;
    pointer-events: none;
}

/* Search input focus */
#search-shortcuts:focus {
    box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
}

/* Animation for content changes */
.shortcut-item {
    animation: fadeInUp 0.3s ease forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive breakpoint for extra small screens */
@media (min-width: 480px) {
    .xs\:inline {
        display: inline;
    }
    .xs\:hidden {
        display: none;
    }
}

/* Color variations for different categories */
.color-blue { background-color: #3b82f6; }
.color-orange { background-color: #f97316; }
.color-green { background-color: #10b981; }
.color-red { background-color: #ef4444; }
.color-gray { background-color: #6b7280; }
</style>

<script>
const shortcuts = {
    vscode: {
        title: "Visual Studio Code",
        icon: "ph-code",
        color: "blue",
        items: [
            { keys: ["Ctrl", "+", "Shift", "+", "P"], description: "Command Palette", category: "Navigation" },
            { keys: ["Ctrl", "+", "P"], description: "Quick Open File", category: "Navigation" },
            { keys: ["Ctrl", "+", "`"], description: "Open Terminal", category: "Terminal" },
            { keys: ["Ctrl", "+", "B"], description: "Toggle Sidebar", category: "Interface" },
            { keys: ["Ctrl", "+", "/"], description: "Comment/Uncomment", category: "Edit" },
            { keys: ["Alt", "+", "↑/↓"], description: "Move Line Up/Down", category: "Edit" },
            { keys: ["Shift", "+", "Alt", "+", "↓"], description: "Copy Line Down", category: "Edit" },
            { keys: ["Ctrl", "+", "D"], description: "Select Next Occurrence", category: "Selection" },
            { keys: ["Ctrl", "+", "Shift", "+", "L"], description: "Select All Occurrences", category: "Selection" },
            { keys: ["F12"], description: "Go to Definition", category: "Navigation" },
            { keys: ["Ctrl", "+", "Shift", "+", "F"], description: "Search in Files", category: "Search" },
            { keys: ["Ctrl", "+", "H"], description: "Replace", category: "Search" },
            { keys: ["Ctrl", "+", "G"], description: "Go to Line", category: "Navigation" },
            { keys: ["F5"], description: "Start Debugging", category: "Debug" },
            { keys: ["Ctrl", "+", "Shift", "+", "E"], description: "Show Explorer", category: "Interface" }
        ]
    },
    git: {
        title: "Git Commands",
        icon: "ph-git-branch",
        color: "orange",
        items: [
            { keys: ["git", "status"], description: "Check repository status", category: "Info" },
            { keys: ["git", "add", "."], description: "Stage all changes", category: "Staging" },
            { keys: ["git", "commit", "-m"], description: "Commit with message", category: "Commit" },
            { keys: ["git", "push"], description: "Push to remote repository", category: "Remote" },
            { keys: ["git", "pull"], description: "Pull from remote repository", category: "Remote" },
            { keys: ["git", "branch"], description: "List all branches", category: "Branch" },
            { keys: ["git", "checkout", "-b"], description: "Create and switch to new branch", category: "Branch" },
            { keys: ["git", "merge"], description: "Merge branch", category: "Branch" },
            { keys: ["git", "log", "--oneline"], description: "Show commit history (compact)", category: "Info" },
            { keys: ["git", "diff"], description: "Show changes", category: "Info" },
            { keys: ["git", "reset", "HEAD~1"], description: "Undo last commit (keep changes)", category: "Undo" },
            { keys: ["git", "stash"], description: "Temporarily save changes", category: "Stash" },
            { keys: ["git", "stash", "pop"], description: "Apply stashed changes", category: "Stash" }
        ]
    },
    linux: {
        title: "Linux Terminal",
        icon: "ph-terminal",
        color: "green",
        items: [
            { keys: ["ls", "-la"], description: "List all files with details", category: "File Operations" },
            { keys: ["cd", ".."], description: "Go to parent directory", category: "Navigation" },
            { keys: ["pwd"], description: "Show current directory", category: "Navigation" },
            { keys: ["mkdir"], description: "Create directory", category: "File Operations" },
            { keys: ["rm", "-rf"], description: "Remove directory and contents", category: "File Operations" },
            { keys: ["cp", "-r"], description: "Copy directory recursively", category: "File Operations" },
            { keys: ["mv"], description: "Move/rename file or directory", category: "File Operations" },
            { keys: ["grep", "-r"], description: "Search text in files recursively", category: "Search" },
            { keys: ["find", ".", "-name"], description: "Find files by name", category: "Search" },
            { keys: ["chmod", "755"], description: "Change file permissions", category: "Permissions" },
            { keys: ["sudo"], description: "Execute as administrator", category: "System" },
            { keys: ["ps", "aux"], description: "Show all running processes", category: "System" },
            { keys: ["top"], description: "Show system processes (real-time)", category: "System" },
            { keys: ["Ctrl", "+", "C"], description: "Cancel current command", category: "Control" },
            { keys: ["Ctrl", "+", "Z"], description: "Suspend current process", category: "Control" }
        ]
    },
    chrome: {
        title: "Chrome DevTools",
        icon: "ph-browser",
        color: "red",
        items: [
            { keys: ["F12"], description: "Open/Close DevTools", category: "General" },
            { keys: ["Ctrl", "+", "Shift", "+", "I"], description: "Open DevTools", category: "General" },
            { keys: ["Ctrl", "+", "Shift", "+", "J"], description: "Open Console", category: "Console" },
            { keys: ["Ctrl", "+", "Shift", "+", "C"], description: "Select Element", category: "Elements" },
            { keys: ["Ctrl", "+", "R"], description: "Reload Page", category: "Network" },
            { keys: ["Ctrl", "+", "Shift", "+", "R"], description: "Hard Reload", category: "Network" },
            { keys: ["Ctrl", "+", "Shift", "+", "Delete"], description: "Clear Browsing Data", category: "General" },
            { keys: ["Ctrl", "+", "F"], description: "Search in DevTools", category: "Search" },
            { keys: ["Ctrl", "+", "Shift", "+", "P"], description: "Command Menu", category: "General" },
            { keys: ["Ctrl", "+", "["], description: "Previous Panel", category: "Navigation" },
            { keys: ["Ctrl", "+", "]"], description: "Next Panel", category: "Navigation" },
            { keys: ["Esc"], description: "Toggle Console Drawer", category: "Console" }
        ]
    },
    general: {
        title: "General System",
        icon: "ph-desktop",
        color: "gray",
        items: [
            { keys: ["Ctrl", "+", "C"], description: "Copy", category: "Clipboard" },
            { keys: ["Ctrl", "+", "V"], description: "Paste", category: "Clipboard" },
            { keys: ["Ctrl", "+", "X"], description: "Cut", category: "Clipboard" },
            { keys: ["Ctrl", "+", "Z"], description: "Undo", category: "Edit" },
            { keys: ["Ctrl", "+", "Y"], description: "Redo", category: "Edit" },
            { keys: ["Ctrl", "+", "A"], description: "Select All", category: "Selection" },
            { keys: ["Ctrl", "+", "S"], description: "Save", category: "File" },
            { keys: ["Ctrl", "+", "F"], description: "Find", category: "Search" },
            { keys: ["Alt", "+", "Tab"], description: "Switch Applications", category: "System" },
            { keys: ["Ctrl", "+", "Alt", "+", "Delete"], description: "Task Manager", category: "System" },
            { keys: ["Windows", "+", "D"], description: "Show Desktop", category: "System" },
            { keys: ["Windows", "+", "L"], description: "Lock Screen", category: "System" },
            { keys: ["Print", "Screen"], description: "Screenshot", category: "System" }
        ]
    }
};

let currentCategory = 'vscode';
let searchTimeout;
let isLoading = false;

function showCategory(category) {
    if (isLoading) return;
    
    currentCategory = category;
    
    // Update active button
    document.querySelectorAll('.category-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    // Clear search
    document.getElementById('search-shortcuts').value = '';
    toggleClearButton(false);
    
    renderShortcuts(shortcuts[category]);
}

function renderShortcuts(categoryData) {
    const container = document.getElementById('shortcuts-container');
    const noResults = document.getElementById('no-results-shortcuts');
    
    if (!categoryData || categoryData.items.length === 0) {
        container.classList.add('hidden');
        noResults.classList.remove('hidden');
        return;
    }
    
    container.classList.remove('hidden');
    noResults.classList.add('hidden');
    
    // Add loading state
    container.classList.add('loading');
    
    setTimeout(() => {
        // Group shortcuts by category
        const groupedShortcuts = categoryData.items.reduce((acc, item) => {
            if (!acc[item.category]) {
                acc[item.category] = [];
            }
            acc[item.category].push(item);
            return acc;
        }, {});
        
        container.innerHTML = Object.keys(groupedShortcuts).map((category, groupIndex) => `
            <div class="shortcut-group" style="animation-delay: ${groupIndex * 0.1}s">
                <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center gap-2">
                    <div class="w-6 h-6 sm:w-8 sm:h-8 color-${categoryData.color} rounded-lg flex items-center justify-center">
                        <i class="${categoryData.icon} text-white text-sm"></i>
                    </div>
                    ${category}
                </h3>
                <div class="grid gap-2 sm:gap-3">
                    ${groupedShortcuts[category].map((shortcut, index) => `
                        <div class="shortcut-item" style="animation-delay: ${(groupIndex * 0.1) + (index * 0.05)}s">
                            <div class="flex items-center gap-1 sm:gap-2 shortcut-keys-mobile">
                                ${shortcut.keys.map(key => `<span class="shortcut-key">${key}</span>`).join('')}
                            </div>
                            <div class="text-gray-700 font-medium text-sm sm:text-base shortcut-description-mobile flex-1">
                                ${shortcut.description}
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>
        `).join('');
        
        container.classList.remove('loading');
    }, 100);
}

function searchShortcuts() {
    const searchValue = document.getElementById('search-shortcuts').value.toLowerCase().trim();
    const categoryData = shortcuts[currentCategory];
    
    toggleClearButton(searchValue.length > 0);
    
    if (!searchValue) {
        renderShortcuts(categoryData);
        return;
    }
    
    const filtered = {
        ...categoryData,
        items: categoryData.items.filter(item => 
            item.description.toLowerCase().includes(searchValue) ||
            item.keys.some(key => key.toLowerCase().includes(searchValue)) ||
            item.category.toLowerCase().includes(searchValue)
        )
    };
    
    renderShortcuts(filtered);
}

function debouncedSearch() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(searchShortcuts, 300);
}

function clearSearch() {
    document.getElementById('search-shortcuts').value = '';
    toggleClearButton(false);
    renderShortcuts(shortcuts[currentCategory]);
}

function toggleClearButton(show) {
    const clearBtn = document.getElementById('clear-search-btn');
    if (show) {
        clearBtn.classList.remove('hidden');
    } else {
        clearBtn.classList.add('hidden');
    }
}

function setLoadingState(loading) {
    isLoading = loading;
    const container = document.getElementById('shortcuts-container');
    
    if (loading) {
        container.classList.add('loading');
    } else {
        container.classList.remove('loading');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-shortcuts');
    
    searchInput.removeAttribute('oninput');
    searchInput.addEventListener('input', debouncedSearch);
    
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            clearSearch();
        }
    });
    
    // MOBILE
    const categoryContainer = searchInput.closest('.bg-white').querySelector('.flex.flex-wrap');
    if (categoryContainer && window.innerWidth <= 640) {
        categoryContainer.classList.add('category-tabs-container');
    }
    renderShortcuts(shortcuts.vscode);
});

// Handle window resize
window.addEventListener('resize', function() {
    const categoryContainer = document.querySelector('.flex.flex-wrap.gap-1');
    if (categoryContainer) {
        if (window.innerWidth <= 640) {
            categoryContainer.classList.add('category-tabs-container');
        } else {
            categoryContainer.classList.remove('category-tabs-container');
        }
    }
});
</script>
@endsection
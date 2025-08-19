@extends('desktop.layout.master-desktop')

@section('title', 'key-shourcut')

@section('page-title', 'Tips-Shourcut')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-pink-100 py-12">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-500 rounded-2xl mb-4">
                <i class="ph ph-keyboard text-white text-2xl"></i>
            </div>
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Keyboard Shortcuts</h1>
            <p class="text-lg text-gray-600">Shortcut yang wajib diketahui untuk meningkatkan produktivitas</p>
        </div>

        <!-- Category Tabs -->
        <div class="bg-white rounded-2xl shadow-xl p-6 mb-8">
            <div class="flex flex-wrap gap-2 justify-center mb-6">
                <button onclick="showCategory('vscode')" class="category-btn active px-6 py-3 rounded-xl font-medium transition-all">
                    <i class="ph ph-code mr-2"></i>VS Code
                </button>
                <button onclick="showCategory('git')" class="category-btn px-6 py-3 rounded-xl font-medium transition-all">
                    <i class="ph ph-git-branch mr-2"></i>Git
                </button>
                <button onclick="showCategory('linux')" class="category-btn px-6 py-3 rounded-xl font-medium transition-all">
                    <i class="ph ph-terminal mr-2"></i>Linux
                </button>
                <button onclick="showCategory('chrome')" class="category-btn px-6 py-3 rounded-xl font-medium transition-all">
                    <i class="ph ph-browser mr-2"></i>Chrome DevTools
                </button>
                <button onclick="showCategory('general')" class="category-btn px-6 py-3 rounded-xl font-medium transition-all">
                    <i class="ph ph-desktop mr-2"></i>General
                </button>
            </div>

            <!-- Search Bar -->
            <div class="relative">
                <i class="ph ph-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-xl"></i>
                <input 
                    type="text" 
                    id="search-shortcuts"
                    placeholder="Cari shortcut..."
                    class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:outline-none text-gray-700"
                    oninput="searchShortcuts()"
                >
            </div>
        </div>

        <!-- Shortcuts Content -->
        <div id="shortcuts-container" class="space-y-8">
            <!-- Content akan dimuat di sini -->
        </div>

        <!-- No Results -->
        <div id="no-results-shortcuts" class="hidden text-center py-12">
            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="ph ph-keyboard text-gray-400 text-2xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-600 mb-2">Tidak ada shortcut ditemukan</h3>
            <p class="text-gray-500">Coba dengan kata kunci yang berbeda</p>
        </div>
    </div>
</div>

<style>
.category-btn {
    background: #f3f4f6;
    color: #6b7280;
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

.shortcut-key {
    background: #f3f4f6;
    border: 2px solid #e5e7eb;
    border-radius: 6px;
    padding: 4px 8px;
    font-family: 'Monaco', 'Menlo', monospace;
    font-size: 12px;
    font-weight: 600;
    color: #374151;
    display: inline-block;
    margin: 0 2px;
    min-width: 24px;
    text-align: center;
}

.shortcut-group {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    padding: 24px;
}
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
let filteredShortcuts = [];

function showCategory(category) {
    currentCategory = category;
    
    // Update active button
    document.querySelectorAll('.category-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    // Clear search
    document.getElementById('search-shortcuts').value = '';
    
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
    
    // Group shortcuts by category
    const groupedShortcuts = categoryData.items.reduce((acc, item) => {
        if (!acc[item.category]) {
            acc[item.category] = [];
        }
        acc[item.category].push(item);
        return acc;
    }, {});
    
    container.innerHTML = Object.keys(groupedShortcuts).map(category => `
        <div class="shortcut-group">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                <div class="w-8 h-8 bg-${categoryData.color}-500 rounded-lg flex items-center justify-center">
                    <i class="${categoryData.icon} text-white text-sm"></i>
                </div>
                ${category}
            </h3>
            <div class="grid gap-4">
                ${groupedShortcuts[category].map(shortcut => `
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="flex items-center gap-1">
                                ${shortcut.keys.map(key => `<span class="shortcut-key">${key}</span>`).join('')}
                            </div>
                        </div>
                        <div class="text-gray-700 font-medium">${shortcut.description}</div>
                    </div>
                `).join('')}
            </div>
        </div>
    `).join('');
}

function searchShortcuts() {
    const searchValue = document.getElementById('search-shortcuts').value.toLowerCase();
    const categoryData = shortcuts[currentCategory];
    
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

// Initial render
document.addEventListener('DOMContentLoaded', function() {
    renderShortcuts(shortcuts.vscode);
});
</script>
@endsection
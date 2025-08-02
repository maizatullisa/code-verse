class CodePuzzleGame {
            constructor() {
                this.currentLevel = 1;
                this.score = 0;
                this.attempts = 3;
                this.draggedElement = null;
                this.dropZone = document.getElementById('drop-zone');
                this.codeBlocks = document.getElementById('code-blocks');
                
                this.levels = {
                    1: {
                        title: "Level 1: Fungsi Sederhana",
                        description: "Susun kode untuk membuat fungsi yang mengembalikan 'Hello World!'",
                        expectedOutput: "Hello World!",
                        correctBlocks: [
                            "function sayHello() {",
                            "    return 'Hello World!';",
                            "}",
                            "console.log(sayHello());"
                        ],
                        wrongBlocks: [
                            "var x = 10;",
                            "return false;",
                            "if (true) {",
                            "console.log('Wrong!');"
                        ],
                        hint: "Mulai dengan deklarasi fungsi, lalu isi fungsi, tutup kurung kurawal, dan panggil fungsi!"
                    },
                    2: {
                        title: "Level 2: Loop dan Kondisi",
                        description: "Susun kode untuk loop yang mencetak angka 1 sampai 3",
                        expectedOutput: "1\n2\n3",
                        correctBlocks: [
                            "for (let i = 1; i <= 3; i++) {",
                            "    console.log(i);",
                            "}",
                            "// Loop selesai"
                        ],
                        wrongBlocks: [
                            "if (true) {",
                            "    break;",
                            "let i = 0;",
                            "i++",
                            "while (false) {",
                            "console.log('error');"
                        ],
                        hint: "Struktur for loop: deklarasi, kondisi, increment, lalu body loop di dalam kurung kurawal!"
                    },
                    3: {
                        title: "Level 3: Array dan Method",
                        description: "Susun kode untuk membuat array, menambah elemen, dan menampilkan hasil",
                        expectedOutput: "[1, 2, 3, 4]",
                        correctBlocks: [
                            "let numbers = [1, 2, 3];",
                            "numbers.push(4);",
                            "console.log(numbers);",
                            "// Array berhasil dimodifikasi"
                        ],
                        wrongBlocks: [
                            "numbers.pop();",
                            "let result = [];",
                            "numbers[0] = 0;",
                            "return numbers;",
                            "numbers.splice(0, 1);",
                            "console.log('error');"
                        ],
                        hint: "Buat array dengan let, tambah elemen dengan push(), lalu tampilkan hasilnya dengan console.log!"
                    },
                    4: {
                        title: "Level 4: Conditional Statement",
                        description: "Susun kode untuk mengecek apakah angka lebih besar dari 5",
                        expectedOutput: "Angka lebih besar dari 5",
                        correctBlocks: [
                            "let num = 8;",
                            "if (num > 5) {",
                            "    console.log('Angka lebih besar dari 5');",
                            "}"
                        ],
                        wrongBlocks: [
                            "else {",
                            "    console.log('Angka kecil');",
                            "let num = 3;",
                            "if (num < 5) {",
                            "while (num > 5) {",
                            "console.log('Wrong!');"
                        ],
                        hint: "Deklarasi variabel dengan nilai > 5, lalu gunakan if statement untuk mengecek kondisi!"
                    },
                    5: {
                        title: "Level 5: Object dan Property",
                        description: "Susun kode untuk membuat object dan mengakses properti",
                        expectedOutput: "John",
                        correctBlocks: [
                            "let person = {",
                            "    name: 'John',",
                            "    age: 25",
                            "};",
                            "console.log(person.name);"
                        ],
                        wrongBlocks: [
                            "console.log(person.age);",
                            "let person = [];",
                            "name: 'Jane',",
                            "person.push('John');",
                            "delete person.name;",
                            "console.log(person[0]);"
                        ],
                        hint: "Buat object dengan kurung kurawal, definisikan property name dan age, lalu akses name dengan dot notation!"
                    }
                };

                this.initializeGame();
                this.setupEventListeners();
            }

            initializeGame() {
                this.updateDisplay();
                this.loadLevel(this.currentLevel);
            }

            updateDisplay() {
                document.getElementById('current-level').textContent = this.currentLevel;
                document.getElementById('score').textContent = this.score;
                document.getElementById('attempts').textContent = this.attempts;
            }

            loadLevel(level) {
                const levelData = this.levels[level];
                if (!levelData) return;

                document.getElementById('level-title').textContent = levelData.title;
                document.getElementById('level-description').textContent = levelData.description;
                document.getElementById('expected-output').textContent = levelData.expectedOutput;

                this.clearDropZone();
                this.createCodeBlocks(levelData);
            }

            clearDropZone() {
                this.dropZone.innerHTML = '<p class="text-gray-400 text-center py-8 text-sm lg:text-base" id="drop-hint">Seret blok kode ke sini untuk menyusun jawaban</p>';
            }

            createCodeBlocks(levelData) {
                this.codeBlocks.innerHTML = '';
                
                // Gabungkan blok benar dan salah, lalu acak
                const allBlocks = [...levelData.correctBlocks, ...levelData.wrongBlocks];
                const shuffledBlocks = allBlocks.sort(() => Math.random() - 0.5);
                
                shuffledBlocks.forEach((code, index) => {
                    const block = document.createElement('div');
                    block.className = 'code-block bg-gray-800 p-3 rounded-lg border border-gray-600 hover:border-blue-400 cursor-move';
                    block.draggable = true;
                    block.dataset.code = code;
                    block.dataset.id = `block-${index}`;
                    block.innerHTML = `<code class="text-green-400 text-xs lg:text-sm font-mono">${this.escapeHtml(code)}</code>`;
                    
                    block.addEventListener('dragstart', (e) => this.handleDragStart(e));
                    block.addEventListener('dragend', (e) => this.handleDragEnd(e));
                    
                    this.codeBlocks.appendChild(block);
                });
            }

            escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            setupEventListeners() {
                // Drag and drop
                this.dropZone.addEventListener('dragover', (e) => this.handleDragOver(e));
                this.dropZone.addEventListener('drop', (e) => this.handleDrop(e));
                this.dropZone.addEventListener('dragenter', (e) => this.handleDragEnter(e));
                this.dropZone.addEventListener('dragleave', (e) => this.handleDragLeave(e));

                // Buttons
                document.getElementById('check-answer').addEventListener('click', () => this.checkAnswer());
                document.getElementById('reset-level').addEventListener('click', () => this.resetLevel());
                document.getElementById('hint-btn').addEventListener('click', () => this.showHint());
                document.getElementById('next-level').addEventListener('click', () => this.nextLevel());
                document.getElementById('restart-game').addEventListener('click', () => this.restartGame());
            }

            handleDragStart(e) {
                this.draggedElement = e.target;
                e.target.classList.add('dragging');
            }

            handleDragEnd(e) {
                e.target.classList.remove('dragging');
                this.draggedElement = null;
            }

            handleDragOver(e) {
                e.preventDefault();
            }

            handleDragEnter(e) {
                e.preventDefault();
                this.dropZone.classList.add('drag-over');
            }

            handleDragLeave(e) {
                if (!this.dropZone.contains(e.relatedTarget)) {
                    this.dropZone.classList.remove('drag-over');
                }
            }

            handleDrop(e) {
                e.preventDefault();
                this.dropZone.classList.remove('drag-over');
                
                if (this.draggedElement) {
                    const hint = document.getElementById('drop-hint');
                    if (hint) hint.remove();
                    
                    const clonedBlock = this.draggedElement.cloneNode(true);
                    clonedBlock.className = 'dropped-block bg-blue-800 p-3 rounded-lg border border-blue-400 mb-2 cursor-pointer hover:bg-blue-700 transition-colors';
                    clonedBlock.draggable = false;
                    
                    // Add click to remove functionality
                    clonedBlock.addEventListener('click', () => {
                        clonedBlock.remove();
                        if (this.dropZone.children.length === 0) {
                            this.dropZone.innerHTML = '<p class="text-gray-400 text-center py-8 text-sm lg:text-base" id="drop-hint">Seret blok kode ke sini untuk menyusun jawaban</p>';
                        }
                    });
                    
                    this.dropZone.appendChild(clonedBlock);
                    
                    // Hide the original block to prevent using it again
                    this.draggedElement.style.opacity = '0.3';
                    this.draggedElement.style.pointerEvents = 'none';
                    this.draggedElement.draggable = false;
                }
            }

            checkAnswer() {
                const droppedBlocks = Array.from(this.dropZone.children)
                    .filter(child => child.dataset.code)
                    .map(child => child.dataset.code);

                if (droppedBlocks.length === 0) {
                    this.showMessage('❌ Silakan susun beberapa blok kode terlebih dahulu!', 'warning');
                    return;
                }

                const levelData = this.levels[this.currentLevel];
                const correctBlocks = levelData.correctBlocks;
                
                // Check if answer is correct (exact match and order)
                const isCorrect = droppedBlocks.length === correctBlocks.length && 
                    droppedBlocks.every((block, index) => block === correctBlocks[index]);

                if (isCorrect) {
                    this.score += this.currentLevel * 100;
                    this.dropZone.classList.add('success-glow');
                    this.showMessage('🎉 Benar! Kode Anda sudah tepat!', 'success');
                    setTimeout(() => {
                        this.dropZone.classList.remove('success-glow');
                        this.showVictoryModal();
                    }, 1500);
                } else {
                    this.attempts--;
                    this.dropZone.classList.add('shake');
                    setTimeout(() => this.dropZone.classList.remove('shake'), 500);
                    
                    if (this.attempts <= 0) {
                        this.showGameOverModal();
                    } else {
                        this.showMessage(`❌ Salah! Periksa urutan kode Anda. Kesempatan tersisa: ${this.attempts}`, 'error');
                    }
                }
                
                this.updateDisplay();
            }

            showMessage(message, type) {
                const messageEl = document.getElementById('result-message');
                messageEl.className = `text-center p-4 rounded-lg mb-6 text-sm lg:text-base`;
                
                switch (type) {
                    case 'success':
                        messageEl.className += ' bg-green-600 text-white';
                        break;
                    case 'error':
                        messageEl.className += ' bg-red-600 text-white';
                        break;
                    case 'warning':
                        messageEl.className += ' bg-yellow-600 text-white';
                        break;
                }
                
                messageEl.textContent = message;
                messageEl.classList.remove('hidden');
                
                setTimeout(() => {
                    messageEl.classList.add('hidden');
                }, 4000);
            }

            showHint() {
                const levelData = this.levels[this.currentLevel];
                this.showMessage(`💡 Hint: ${levelData.hint}`, 'warning');
            }

            resetLevel() {
                this.clearDropZone();
                document.getElementById('result-message').classList.add('hidden');
                
                // Reset all code blocks visibility
                const allBlocks = this.codeBlocks.querySelectorAll('.code-block');
                allBlocks.forEach(block => {
                    block.style.opacity = '1';
                    block.style.pointerEvents = 'auto';
                    block.draggable = true;
                });
            }

            showVictoryModal() {
                const modal = document.getElementById('victory-modal');
                const message = document.getElementById('victory-message');
                
                if (this.currentLevel >= Object.keys(this.levels).length) {
                    message.textContent = '🏆 Selamat! Anda telah menyelesaikan semua level!';
                    document.getElementById('next-level').textContent = '🎮 Main Lagi';
                } else {
                    message.textContent = `Level ${this.currentLevel} selesai! Score: +${this.currentLevel * 100}`;
                }
                
                modal.classList.remove('hidden');
            }

            showGameOverModal() {
                document.getElementById('gameover-modal').classList.remove('hidden');
            }

            nextLevel() {
                document.getElementById('victory-modal').classList.add('hidden');
                
                if (this.currentLevel >= Object.keys(this.levels).length) {
                    this.restartGame();
                } else {
                    this.currentLevel++;
                    this.attempts = 3;
                    this.updateDisplay();
                    this.loadLevel(this.currentLevel);
                }
            }

            restartGame() {
                document.getElementById('victory-modal').classList.add('hidden');
                document.getElementById('gameover-modal').classList.add('hidden');
                
                this.currentLevel = 1;
                this.score = 0;
                this.attempts = 3;
                this.updateDisplay();
                this.loadLevel(this.currentLevel);
            }
        }

        // Start the game when page loads
        document.addEventListener('DOMContentLoaded', () => {
            new CodePuzzleGame();
        });
class MazeEscapeGame {
            constructor() {
                this.boardSize = 25;
                this.board = [];
                this.player = { x: 1, y: 1 };
                this.exit = { x: 23, y: 23 };
                this.enemies = [];
                this.powerups = [];
                this.score = 0;
                this.level = 1;
                this.health = 100;
                this.maxHealth = 100;
                this.timeLeft = 60;
                this.enemiesDefeated = 0;
                this.gameRunning = false;
                this.gameTimer = null;
                this.enemyMoveTimer = null;
                this.inCombat = false;
                this.combatTimer = null;

                this.initializeGame();
                this.setupEventListeners();
            }

            initializeGame() {
                this.generateMaze();
                this.spawnEnemies();
                this.spawnPowerups();
                this.renderBoard();
                this.updateUI();
                this.startGame();
            }

            generateMaze() {
                // Initialize board with walls
                this.board = Array(this.boardSize).fill().map(() => Array(this.boardSize).fill(1));
                
                // Create paths using recursive backtracking
                const stack = [];
                const visited = Array(this.boardSize).fill().map(() => Array(this.boardSize).fill(false));
                
                const directions = [[0, 2], [2, 0], [0, -2], [-2, 0]];
                
                // Start from (1,1)
                let current = [1, 1];
                this.board[1][1] = 0;
                visited[1][1] = true;
                stack.push(current);
                
                while (stack.length > 0) {
                    const [x, y] = current;
                    const neighbors = [];
                    
                    for (const [dx, dy] of directions) {
                        const nx = x + dx;
                        const ny = y + dy;
                        
                        if (nx > 0 && nx < this.boardSize - 1 && ny > 0 && ny < this.boardSize - 1 && !visited[nx][ny]) {
                            neighbors.push([nx, ny]);
                        }
                    }
                    
                    if (neighbors.length > 0) {
                        const [nx, ny] = neighbors[Math.floor(Math.random() * neighbors.length)];
                        const wallX = x + (nx - x) / 2;
                        const wallY = y + (ny - y) / 2;
                        
                        this.board[nx][ny] = 0;
                        this.board[wallX][wallY] = 0;
                        visited[nx][ny] = true;
                        
                        stack.push([nx, ny]);
                        current = [nx, ny];
                    } else {
                        current = stack.pop();
                    }
                }
                
                // Ensure exit is accessible
                this.board[this.exit.x][this.exit.y] = 0;
                this.board[this.exit.x - 1][this.exit.y] = 0;
                this.board[this.exit.x][this.exit.y - 1] = 0;
            }

            spawnEnemies() {
                this.enemies = [];
                const enemyCount = Math.min(3 + this.level, 8);
                
                for (let i = 0; i < enemyCount; i++) {
                    let enemyPos;
                    do {
                        enemyPos = {
                            x: Math.floor(Math.random() * (this.boardSize - 2)) + 1,
                            y: Math.floor(Math.random() * (this.boardSize - 2)) + 1
                        };
                    } while (
                        this.board[enemyPos.x][enemyPos.y] === 1 ||
                        (enemyPos.x === this.player.x && enemyPos.y === this.player.y) ||
                        (enemyPos.x === this.exit.x && enemyPos.y === this.exit.y) ||
                        Math.abs(enemyPos.x - this.player.x) + Math.abs(enemyPos.y - this.player.y) < 5
                    );
                    
                    this.enemies.push({
                        ...enemyPos,
                        health: 50 + (this.level * 10),
                        lastMove: Date.now()
                    });
                }
            }

            spawnPowerups() {
                this.powerups = [];
                const powerupCount = Math.max(2, Math.floor(this.level / 2));
                
                for (let i = 0; i < powerupCount; i++) {
                    let powerupPos;
                    do {
                        powerupPos = {
                            x: Math.floor(Math.random() * (this.boardSize - 2)) + 1,
                            y: Math.floor(Math.random() * (this.boardSize - 2)) + 1
                        };
                    } while (
                        this.board[powerupPos.x][powerupPos.y] === 1 ||
                        (powerupPos.x === this.player.x && powerupPos.y === this.player.y) ||
                        (powerupPos.x === this.exit.x && powerupPos.y === this.exit.y) ||
                        this.enemies.some(e => e.x === powerupPos.x && e.y === powerupPos.y)
                    );
                    
                    this.powerups.push(powerupPos);
                }
            }

            renderBoard() {
                const gameBoard = document.getElementById('game-board');
                gameBoard.innerHTML = '';
                gameBoard.style.gridTemplateColumns = `repeat(${this.boardSize}, 20px)`;
                
                for (let x = 0; x < this.boardSize; x++) {
                    for (let y = 0; y < this.boardSize; y++) {
                        const cell = document.createElement('div');
                        cell.className = 'maze-cell';
                        
                        if (this.board[x][y] === 1) {
                            cell.classList.add('wall');
                        } else {
                            cell.classList.add('path');
                        }
                        
                        // Add entities
                        if (x === this.player.x && y === this.player.y) {
                            cell.classList.add('player');
                        } else if (x === this.exit.x && y === this.exit.y) {
                            cell.classList.add('exit');
                        } else if (this.enemies.some(e => e.x === x && e.y === y)) {
                            cell.classList.add('enemy');
                        } else if (this.powerups.some(p => p.x === x && p.y === y)) {
                            cell.classList.add('powerup');
                        }
                        
                        // Combat zone indicator
                        if (this.inCombat && this.enemies.some(e => 
                            Math.abs(e.x - this.player.x) <= 1 && Math.abs(e.y - this.player.y) <= 1
                        )) {
                            if (Math.abs(x - this.player.x) <= 1 && Math.abs(y - this.player.y) <= 1) {
                                cell.classList.add('combat-zone');
                            }
                        }
                        
                        gameBoard.appendChild(cell);
                    }
                }
            }

            movePlayer(dx, dy) {
                if (!this.gameRunning || this.inCombat) return;
                
                const newX = this.player.x + dx;
                const newY = this.player.y + dy;
                
                if (newX >= 0 && newX < this.boardSize && 
                    newY >= 0 && newY < this.boardSize && 
                    this.board[newX][newY] === 0) {
                    
                    this.player.x = newX;
                    this.player.y = newY;
                    
                    // Check for powerup collection
                    const powerupIndex = this.powerups.findIndex(p => p.x === newX && p.y === newY);
                    if (powerupIndex !== -1) {
                        this.powerups.splice(powerupIndex, 1);
                        this.health = Math.min(this.maxHealth, this.health + 25);
                        this.score += 50;
                        this.updateUI();
                    }
                    
                    // Check for exit
                    if (newX === this.exit.x && newY === this.exit.y) {
                        this.levelComplete();
                        return;
                    }
                    
                    // Check for enemy collision
                    const nearbyEnemy = this.enemies.find(e => 
                        Math.abs(e.x - newX) <= 1 && Math.abs(e.y - newY) <= 1
                    );
                    
                    if (nearbyEnemy) {
                        this.startCombat();
                    }
                    
                    this.renderBoard();
                }
            }

            moveEnemies() {
                if (!this.gameRunning || this.inCombat) return;
                
                this.enemies.forEach(enemy => {
                    if (Date.now() - enemy.lastMove < 800) return;
                    
                    const dx = this.player.x - enemy.x;
                    const dy = this.player.y - enemy.y;
                    
                    let moveX = 0, moveY = 0;
                    
                    if (Math.abs(dx) > Math.abs(dy)) {
                        moveX = dx > 0 ? 1 : -1;
                    } else {
                        moveY = dy > 0 ? 1 : -1;
                    }
                    
                    const newX = enemy.x + moveX;
                    const newY = enemy.y + moveY;
                    
                    if (newX >= 0 && newX < this.boardSize && 
                        newY >= 0 && newY < this.boardSize && 
                        this.board[newX][newY] === 0 &&
                        !this.enemies.some(e => e.x === newX && e.y === newY && e !== enemy)) {
                        
                        enemy.x = newX;
                        enemy.y = newY;
                        enemy.lastMove = Date.now();
                        
                        // Check if enemy reached player
                        if (Math.abs(enemy.x - this.player.x) <= 1 && 
                            Math.abs(enemy.y - this.player.y) <= 1) {
                            this.startCombat();
                        }
                    }
                });
                
                this.renderBoard();
            }

            startCombat() {
                if (this.inCombat) return;
                
                this.inCombat = true;
                document.getElementById('game-status').className = 'text-center p-4 rounded-lg mb-4 bg-red-600 text-white';
                document.getElementById('game-status').textContent = '⚔️ COMBAT! Tekan SPACE untuk menyerang!';
                document.getElementById('game-status').classList.remove('hidden');
                
                // Auto damage from enemies
                this.combatTimer = setInterval(() => {
                    if (!this.inCombat) return;
                    
                    const nearbyEnemies = this.enemies.filter(e => 
                        Math.abs(e.x - this.player.x) <= 1 && Math.abs(e.y - this.player.y) <= 1
                    );
                    
                    if (nearbyEnemies.length === 0) {
                        this.endCombat();
                        return;
                    }
                    
                    this.takeDamage(nearbyEnemies.length * 5);
                }, 1000);
                
                this.renderBoard();
            }

            attack() {
                if (!this.inCombat) return;
                
                const nearbyEnemies = this.enemies.filter(e => 
                    Math.abs(e.x - this.player.x) <= 1 && Math.abs(e.y - this.player.y) <= 1
                );
                
                if (nearbyEnemies.length > 0) {
                    const enemy = nearbyEnemies[0];
                    enemy.health -= 25;
                    
                    if (enemy.health <= 0) {
                        // Remove defeated enemy
                        const enemyIndex = this.enemies.indexOf(enemy);
                        this.enemies.splice(enemyIndex, 1);
                        this.enemiesDefeated++;
                        this.score += 100 * this.level;
                        this.updateUI();
                        
                        // Check if no more nearby enemies
                        const stillNearby = this.enemies.filter(e => 
                            Math.abs(e.x - this.player.x) <= 1 && Math.abs(e.y - this.player.y) <= 1
                        );
                        
                        if (stillNearby.length === 0) {
                            this.endCombat();
                        }
                    }
                    
                    this.renderBoard();
                }
            }

            endCombat() {
                this.inCombat = false;
                if (this.combatTimer) {
                    clearInterval(this.combatTimer);
                    this.combatTimer = null;
                }
                document.getElementById('game-status').classList.add('hidden');
                this.renderBoard();
            }

            takeDamage(amount) {
                this.health -= amount;
                if (this.health < 0) this.health = 0;
                
                // Visual damage effect
                document.body.classList.add('damage-flash');
                setTimeout(() => document.body.classList.remove('damage-flash'), 300);
                
                this.updateUI();
                
                if (this.health <= 0) {
                    this.gameOver('Health habis!');
                }
            }

            updateUI() {
                document.getElementById('score').textContent = this.score;
                document.getElementById('level').textContent = this.level;
                document.getElementById('enemies-defeated').textContent = this.enemiesDefeated;
                document.getElementById('health-text').textContent = `${this.health}/${this.maxHealth}`;
                
                const healthPercent = (this.health / this.maxHealth) * 100;
                document.getElementById('health-bar').style.width = `${healthPercent}%`;
                
                const timerElement = document.getElementById('timer');
                timerElement.textContent = this.timeLeft;
                
                if (this.timeLeft <= 10) {
                    timerElement.classList.add('timer-warning');
                } else {
                    timerElement.classList.remove('timer-warning');
                }
            }

            startGame() {
                this.gameRunning = true;
                
                // Game timer
                this.gameTimer = setInterval(() => {
                    this.timeLeft--;
                    this.updateUI();
                    
                    if (this.timeLeft <= 0) {
                        this.gameOver('Waktu habis!');
                    }
                }, 1000);
                
                // Enemy movement timer
                this.enemyMoveTimer = setInterval(() => {
                    this.moveEnemies();
                }, 500);
            }

            levelComplete() {
                this.gameRunning = false;
                this.endCombat();
                
                if (this.gameTimer) clearInterval(this.gameTimer);
                if (this.enemyMoveTimer) clearInterval(this.enemyMoveTimer);
                
                const timeBonus = this.timeLeft * 10;
                const levelBonus = this.level * 200;
                this.score += timeBonus + levelBonus;
                
                document.getElementById('level-bonus').textContent = levelBonus;
                document.getElementById('time-bonus').textContent = timeBonus;
                document.getElementById('victory-modal').classList.remove('hidden');
            }

            gameOver(reason) {
                this.gameRunning = false;
                this.endCombat();
                
                if (this.gameTimer) clearInterval(this.gameTimer);
                if (this.enemyMoveTimer) clearInterval(this.enemyMoveTimer);
                
                document.getElementById('game-over-message').textContent = reason;
                document.getElementById('final-score').textContent = this.score;
                document.getElementById('final-enemies').textContent = this.enemiesDefeated;
                document.getElementById('game-over-modal').classList.remove('hidden');
            }

            nextLevel() {
                document.getElementById('victory-modal').classList.add('hidden');
                
                this.level++;
                this.timeLeft = Math.max(45, 60 - (this.level * 2));
                this.health = this.maxHealth;
                this.player = { x: 1, y: 1 };
                
                this.generateMaze();
                this.spawnEnemies();
                this.spawnPowerups();
                this.renderBoard();
                this.updateUI();
                this.startGame();
            }

            restartGame() {
                document.getElementById('game-over-modal').classList.add('hidden');
                document.getElementById('victory-modal').classList.add('hidden');
                
                this.level = 1;
                this.score = 0;
                this.health = this.maxHealth;
                this.timeLeft = 60;
                this.enemiesDefeated = 0;
                this.player = { x: 1, y: 1 };
                this.inCombat = false;
                
                this.generateMaze();
                this.spawnEnemies();
                this.spawnPowerups();
                this.renderBoard();
                this.updateUI();
                this.startGame();
            }

            setupEventListeners() {
                // Keyboard controls
                document.addEventListener('keydown', (e) => {
                    switch(e.key.toLowerCase()) {
                        case 'w':
                        case 'arrowup':
                            e.preventDefault();
                            this.movePlayer(-1, 0);
                            break;
                        case 's':
                        case 'arrowdown':
                            e.preventDefault();
                            this.movePlayer(1, 0);
                            break;
                        case 'a':
                        case 'arrowleft':
                            e.preventDefault();
                            this.movePlayer(0, -1);
                            break;
                        case 'd':
                        case 'arrowright':
                            e.preventDefault();
                            this.movePlayer(0, 1);
                            break;
                        case ' ':
                            e.preventDefault();
                            this.attack();
                            break;
                    }
                });

                // Button controls
                document.getElementById('btn-up').addEventListener('click', () => this.movePlayer(-1, 0));
                document.getElementById('btn-down').addEventListener('click', () => this.movePlayer(1, 0));
                document.getElementById('btn-left').addEventListener('click', () => this.movePlayer(0, -1));
                document.getElementById('btn-right').addEventListener('click', () => this.movePlayer(0, 1));
                document.getElementById('btn-attack').addEventListener('click', () => this.attack());

                // Modal controls
                document.getElementById('restart-game').addEventListener('click', () => this.restartGame());
                document.getElementById('next-level').addEventListener('click', () => this.nextLevel());

                // Touch controls for mobile
                let touchStartX = null;
                let touchStartY = null;

                document.addEventListener('touchstart', (e) => {
                    const touch = e.touches[0];
                    touchStartX = touch.clientX;
                    touchStartY = touch.clientY;
                });

                document.addEventListener('touchend', (e) => {
                    if (!touchStartX || !touchStartY) return;

                    const touch = e.changedTouches[0];
                    const touchEndX = touch.clientX;
                    const touchEndY = touch.clientY;

                    const deltaX = touchEndX - touchStartX;
                    const deltaY = touchEndY - touchStartY;

                    const minSwipeDistance = 30;

                    if (Math.abs(deltaX) > Math.abs(deltaY)) {
                        if (Math.abs(deltaX) > minSwipeDistance) {
                            if (deltaX > 0) {
                                this.movePlayer(0, 1); // Right
                            } else {
                                this.movePlayer(0, -1); // Left
                            }
                        }
                    } else {
                        if (Math.abs(deltaY) > minSwipeDistance) {
                            if (deltaY > 0) {
                                this.movePlayer(1, 0); // Down
                            } else {
                                this.movePlayer(-1, 0); // Up
                            }
                        }
                    }

                    touchStartX = null;
                    touchStartY = null;
                });

                // Prevent context menu on right click
                document.addEventListener('contextmenu', (e) => e.preventDefault());
            }
        }

        // Initialize game when page loads
        document.addEventListener('DOMContentLoaded', () => {
            new MazeEscapeGame();
        });
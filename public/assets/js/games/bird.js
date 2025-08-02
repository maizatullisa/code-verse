        // Get canvas and context
        const canvas = document.getElementById('gameCanvas');
        const ctx = canvas.getContext('2d');
        const scoreElement = document.getElementById('score');
        const finalScoreElement = document.getElementById('finalScore');
        const gameOverElement = document.getElementById('gameOver');
        const instructionsElement = document.getElementById('instructions');

        // SIZE KANVAS SESUAI KONTAINER
        function resizeCanvas() {
            const rect = canvas.getBoundingClientRect();
            const dpr = window.devicePixelRatio || 1;
            
            canvas.width = rect.width * dpr;
            canvas.height = rect.height * dpr;
            
            ctx.scale(dpr, dpr);
            canvas.style.width = rect.width + 'px';
            canvas.style.height = rect.height + 'px';
        }

        // INISIALISASI UK CANVAS
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        // VAR GAME
        let gameStarted = false;
        let gameRunning = false;
        let score = 0;
        let frame = 0;
        let highScore = 0; 

        // Dynamic sizing based on canvas
        function getCanvasSize() {
            return {
                width: canvas.width / (window.devicePixelRatio || 1),
                height: canvas.height / (window.devicePixelRatio || 1)
            };
        }

        // PROPERTI BURUNG RESPONSIVE
        let bird = {};
        function initBird() {
            const size = getCanvasSize();
            bird = {
                x: size.width * 0.2,
                y: size.height * 0.5,
                width: Math.max(25, size.width * 0.04),
                height: Math.max(20, size.width * 0.03),
                velocity: 0,
                gravity: size.height * 0.0008,
                jump: -size.height * 0.018,
                color: '#ffeb3b'
            };
        }

        // NIH BUAT PIPA
        let pipes = [];
        let pipeWidth, pipeGap, pipeSpeed;
        
        function initPipeSettings() {
            const size = getCanvasSize();
            pipeWidth = Math.max(45, size.width * 0.1);
            pipeGap = Math.max(140, size.height * 0.3);
            pipeSpeed = Math.max(1.2, size.width * 0.003);
        }

        // GAME SETT
        function initGame() {
            initBird();
            initPipeSettings();
        }

        // PIPA
        function createPipe() {
            const size = getCanvasSize();
            const minHeight = size.height * 0.15; // Minimum pipe height
            const maxHeight = size.height * 0.7; // Maximum top pipe height
            const topHeight = Math.random() * (maxHeight - minHeight) + minHeight;
            
            pipes.push({
                x: size.width,
                topHeight: topHeight,
                bottomY: topHeight + pipeGap,
                bottomHeight: size.height - (topHeight + pipeGap),
                passed: false
            });
        }

        // GAMBAR BURUNK
        function drawBird() {
            const size = getCanvasSize();
            ctx.save();
            ctx.translate(bird.x + bird.width/2, bird.y + bird.height/2);
            
            // Rotate bird based on velocity
            const rotation = Math.min(Math.max(bird.velocity * 0.05, -0.5), 0.8);
            ctx.rotate(rotation);
            
            // Bird shadow
            ctx.fillStyle = 'rgba(0, 0, 0, 0.2)';
            ctx.fillRect(-bird.width/2 + 2, -bird.height/2 + 2, bird.width, bird.height);
            
            // Bird body
            ctx.fillStyle = bird.color;
            ctx.fillRect(-bird.width/2, -bird.height/2, bird.width, bird.height);
            
            // Bird highlights
            ctx.fillStyle = '#fff59d';
            ctx.fillRect(-bird.width/2, -bird.height/2, bird.width, bird.height * 0.3);
            
            // Bird eye
            const eyeSize = Math.max(6, bird.width * 0.25);
            ctx.fillStyle = 'white';
            ctx.fillRect(-eyeSize/2, -eyeSize, eyeSize, eyeSize);
            ctx.fillStyle = 'black';
            ctx.fillRect(-eyeSize/3, -eyeSize * 0.8, eyeSize * 0.4, eyeSize * 0.4);
            
            // Bird beak
            ctx.fillStyle = '#ff9800';
            ctx.fillRect(bird.width/2 - bird.width * 0.4, -bird.height * 0.15, bird.width * 0.3, bird.height * 0.3);
            
            ctx.restore();
        }

        // Draw pipes with improved graphics
        function drawPipes() {
            for (let pipe of pipes) {
                // Pipe shadow
                ctx.fillStyle = 'rgba(0, 0, 0, 0.2)';
                ctx.fillRect(pipe.x + 3, 3, pipeWidth, pipe.topHeight);
                ctx.fillRect(pipe.x + 3, pipe.bottomY + 3, pipeWidth, pipe.bottomHeight);
                
                // Main pipe body
                ctx.fillStyle = '#4caf50';
                ctx.fillRect(pipe.x, 0, pipeWidth, pipe.topHeight);
                ctx.fillRect(pipe.x, pipe.bottomY, pipeWidth, pipe.bottomHeight);
                
                // Pipe highlights
                ctx.fillStyle = '#66bb6a';
                ctx.fillRect(pipe.x, 0, pipeWidth * 0.3, pipe.topHeight);
                ctx.fillRect(pipe.x, pipe.bottomY, pipeWidth * 0.3, pipe.bottomHeight);
                
                // Pipe caps
                const capHeight = Math.max(15, pipeWidth * 0.3);
                ctx.fillStyle = '#2e7d32';
                ctx.fillRect(pipe.x - 5, pipe.topHeight - capHeight, pipeWidth + 10, capHeight);
                ctx.fillRect(pipe.x - 5, pipe.bottomY, pipeWidth + 10, capHeight);
                
                // Cap highlights
                ctx.fillStyle = '#4caf50';
                ctx.fillRect(pipe.x - 3, pipe.topHeight - capHeight + 2, pipeWidth + 6, capHeight * 0.4);
                ctx.fillRect(pipe.x - 3, pipe.bottomY + 2, pipeWidth + 6, capHeight * 0.4);
            }
        }

        // Draw animated background elements
        function drawBackground() {
            const size = getCanvasSize();
            
            // Sky gradient
            const gradient = ctx.createLinearGradient(0, 0, 0, size.height);
            gradient.addColorStop(0, '#87CEEB');
            gradient.addColorStop(0.7, '#98FB98');
            gradient.addColorStop(1, '#90EE90');
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, size.width, size.height);
            
            // Moving clouds
            ctx.fillStyle = 'rgba(255, 255, 255, 0.8)';
            const cloudOffset = (frame * 0.3) % (size.width + 200);
            
            // Cloud 1
            drawCloud(size.width * 0.2 - cloudOffset, size.height * 0.15, size.width * 0.08);
            
            // Cloud 2  
            drawCloud(size.width * 0.7 - cloudOffset, size.height * 0.25, size.width * 0.06);
            
            // Cloud 3
            drawCloud(size.width * 1.2 - cloudOffset, size.height * 0.1, size.width * 0.07);
        }

        // Helper function to draw clouds
        function drawCloud(x, y, size) {
            ctx.beginPath();
            ctx.arc(x, y, size, 0, Math.PI * 2);
            ctx.arc(x + size * 0.6, y, size * 1.2, 0, Math.PI * 2);
            ctx.arc(x + size * 1.2, y, size, 0, Math.PI * 2);
            ctx.fill();
        }

        // Update game logic - INI JUGA DIPERBAIKI
        function update() {
            if (!gameRunning) return;

            frame++;
            
            // Update bird physics
            bird.velocity += bird.gravity;
            bird.y += bird.velocity;

            // Create new pipes - INTERVAL YANG LEBIH MASUK AKAL
            const size = getCanvasSize();
            const pipeInterval = Math.floor(120); // Fixed interval 120 frames
            if (frame % pipeInterval === 0) {
                createPipe();
            }

            // Update pipes
            for (let i = pipes.length - 1; i >= 0; i--) {
                const pipe = pipes[i];
                pipe.x -= pipeSpeed;

                // Remove off-screen pipes
                if (pipe.x + pipeWidth < 0) {
                    pipes.splice(i, 1);
                    continue;
                }

                // Check for scoring
                if (!pipe.passed && pipe.x + pipeWidth < bird.x) {
                    pipe.passed = true;
                    score++;
                    scoreElement.textContent = score;
                    
                    // Update high score
                    if (score > highScore) {
                        highScore = score;
                    }
                }

                // Collision detection
                if (bird.x < pipe.x + pipeWidth && 
                    bird.x + bird.width > pipe.x &&
                    (bird.y < pipe.topHeight || bird.y + bird.height > pipe.bottomY)) {
                    gameOver();
                    return;
                }
            }

            // Check ground/ceiling collision
            if (bird.y + bird.height > size.height || bird.y < 0) {
                gameOver();
                return;
            }
        }

        // Draw everything
        function draw() {
            drawBackground();
            drawPipes();
            drawBird();
        }

        // Game over
        function gameOver() {
            gameRunning = false;
            finalScoreElement.textContent = score;
            gameOverElement.style.display = 'block';
            
            // Add high score display
            if (score >= highScore) {
                finalScoreElement.innerHTML = score + ' 🏆 <small style="display:block; font-size:14px; opacity:0.8;">Rekor Baru!</small>';
            } else {
                finalScoreElement.innerHTML = score + ' <small style="display:block; font-size:14px; opacity:0.8;">Terbaik: ' + highScore + '</small>';
            }
        }

        // Start game - DIPERBAIKI JUGA
        function startGame() {
            if (gameStarted) return;
            
            gameStarted = true;
            gameRunning = true;
            instructionsElement.style.display = 'none';
            
            // First pipe langsung spawned tanpa delay
            createPipe();
        }

        // Jump function
        function jump() {
            if (!gameStarted) {
                startGame();
            }
            
            if (gameRunning) {
                bird.velocity = bird.jump;
            }
        }

        // Restart game
        function restartGame() {
            initBird();
            pipes = [];
            score = 0;
            frame = 0;
            gameStarted = false;
            gameRunning = false;
            scoreElement.textContent = score;
            gameOverElement.style.display = 'none';
            instructionsElement.style.display = 'block';
        }

        // Event listeners
        canvas.addEventListener('click', jump);
        canvas.addEventListener('touchstart', (e) => {
            e.preventDefault();
            jump();
        });

        document.addEventListener('keydown', (e) => {
            if (e.code === 'Space') {
                e.preventDefault();
                jump();
            }
        });

        // Prevent zoom on mobile
        document.addEventListener('touchstart', (e) => {
            if (e.touches.length > 1) {
                e.preventDefault();
            }
        });

        // Game loop
        function gameLoop() {
            update();
            draw();
            requestAnimationFrame(gameLoop);
        }

        // Initialize and start
        initGame();
        gameLoop();
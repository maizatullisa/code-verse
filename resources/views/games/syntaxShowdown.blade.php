<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Syntax Showdown</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-6">
  <div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-4 text-purple-400">⚔️ Syntax Showdown</h1>
    <div id="question-box" class="bg-gray-800 p-6 rounded-lg shadow mb-6"></div>
    <div id="answers" class="space-y-3"></div>
    <div id="result" class="mt-4 font-semibold"></div>
    <div class="mt-6 flex justify-between">
      <button onclick="nextQuestion()" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded">Next</button>
      <span>Score: <span id="score">0</span></span>
    </div>
  </div>

  <script>
    const questions = [
      {
        code: `console.log([] + {});`,
        language: "JavaScript",
        options: ["[object Object]", "0", "undefined", "Error"],
        answer: "[object Object]"
      },
      {
        code: `print("Hello" * 3)`,
        language: "Python",
        options: ["HelloHelloHello", "Hello3", "Error", "Hello Hello Hello"],
        answer: "HelloHelloHello"
      },
      {
        code: `int x = 5; printf("%d", x++);`,
        language: "C",
        options: ["5", "6", "Error", "Random Value"],
        answer: "5"
      },
      {
        code: `System.out.println(10 + 20 + "30");`,
        language: "Java",
        options: ["3030", "102030", "30", "3030"],
        answer: "3030"
      }
      // Tambahin soal lagi bro!
    ];

    let currentQuestion = 0;
    let score = 0;

    function loadQuestion() {
      const q = questions[currentQuestion];
      document.getElementById('question-box').innerHTML = `
        <p class="text-sm text-gray-400">${q.language}</p>
        <pre class="bg-gray-700 p-3 rounded mt-2 text-sm">${q.code}</pre>
      `;

      const answerBox = document.getElementById('answers');
      answerBox.innerHTML = "";

      q.options.forEach(option => {
        const btn = document.createElement('button');
        btn.innerText = option;
        btn.className = "block w-full text-left px-4 py-2 bg-gray-700 rounded hover:bg-purple-700 transition";
        btn.onclick = () => checkAnswer(option);
        answerBox.appendChild(btn);
      });

      document.getElementById('result').innerText = "";
    }

    function checkAnswer(selected) {
      const q = questions[currentQuestion];
      const resultBox = document.getElementById('result');
      if (selected === q.answer) {
        resultBox.innerText = "🔥 Bener cuy!";
        score += 10;
      } else {
        resultBox.innerText = "❌ Salah woy... belajar lagi 😭";
        score -= 5;
      }
      document.getElementById('score').innerText = score;
    }

    function nextQuestion() {
      currentQuestion++;
      if (currentQuestion >= questions.length) {
        document.getElementById('question-box').innerHTML = "<h2 class='text-2xl font-bold'>🎉 Done, Bro!</h2>";
        document.getElementById('answers').innerHTML = "";
        document.getElementById('result').innerText = `Total Score lo: ${score}`;
      } else {
        loadQuestion();
      }
    }

    // Start the first question
    loadQuestion();
  </script>
</body>
</html>

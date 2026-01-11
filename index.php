<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
<h1>Projetos em Python, rodando no servidor do Render</h1>
<input id="a" type="number" placeholder="A">
<input id="b" type="number" placeholder="B">
<button onclick="somar()">Somar</button>

<p id="resultado"></p>


  <script>
    // acorda o backend quando a página abrir
    fetch("https://avallong-python-backend.onrender.com/")
      .then(() => console.log("Backend acordado"))
      .catch(() => console.log("Erro ao acordar backend"));

    function somar() {
      const a = document.getElementById("a").value;
      const b = document.getElementById("b").value;

      fetch(`https://avallong-python-backend.onrender.com/soma/${a}/${b}`)
        .then(res => res.json())
        .then(data => {
          document.getElementById("resultado").innerText =
            "Resultado: " + data.resultado;
        })
        .catch(err => {
          document.getElementById("resultado").innerText =
            "Erro ao chamar o backend";
          console.error(err);
        });
    }
  </script>
</body>
</html>
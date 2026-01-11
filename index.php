<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="shortcut icon" href="https://avallong.com.br/assets/img/logocolorida.png" type="image/x-icon">
</head>
<body>
    <h1>Projetos em Python, rodando no servidor do Render</h1>
    <p id="server_status">Status: verificando servidor...</p>
    
    <input id="a" type="number" placeholder="A">
    <input id="b" type="number" placeholder="B">
    <button id="btn_somar" onclick="somar()" disabled>Somar</button>

<p id="resultado"></p>


  <script>
    const statusEl = document.getElementById("status");
    const btn_somar = document.getElementById("btn_somar");

    function atualizarStatus(texto, cor){
        statusEl.innerText = "Status: " + texto;
        statusEl.style.color = color;
    }

    atualizarStatus("tentando ligar...", "orange");
    // acorda o backend quando a página abrir
    fetch("https://avallong-python-backend.onrender.com/")
      .then(res => {
        if (res.ok){
        atualizarStatus("Servidor ON", "green");
        btn_somar.disabled = false;
      } else {
        atualizarStatus("Servidor indisponível", "red");
      }
    });
    .catch(() => {
        atualizarStatus("Servidor OFF", "red");
    });
        
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
            atualizarStatus("Servidor OFF", "red");
          console.error(err);
        });
    }
  </script>
</body>
</html>
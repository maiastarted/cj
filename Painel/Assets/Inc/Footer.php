<script>
  $(document).ready(function () {
      // Show the Modal on load
      // $("#Modal_erro1").modal("show");

      // Hide the Modal
      $("#myBtn").click(function () {
          $("#myModal").modal("hide");
      });
      $("#vai").click(function () {
          var elemento = document.getElementById('onde').value;

          //            alert(elemento);
          window.location.href = "/?BL=" + elemento;
          $("#Modal_erro1").modal("hide");

      });
  });
</script>

<script type="text/javascript">
  $("#telefone, #celular").mask("(00) 0000-0000");

  function formatarMoeda(input) {
      let valor = input.value.replace(/\D/g, ""); // Remove tudo que não for número
      valor = (valor / 100).toLocaleString("pt-BR", {
      });
      input.value = valor;
  }</script>

<script language="Javascript">
  function validacaoEmail(field) {

      usuario = field.value.substring(0, field.value.indexOf("@"));
      // console.log ('usuario '+usuario.length);
      dominio = field.value.substring(field.value.indexOf("@") + 1, field.value.length);
      // console.log ('dominio '+dominio);

      if ((usuario.length >= 1) &&
              (dominio.length >= 3) &&
              (usuario.search("@") == -1) &&
              (dominio.search("@") == -1) &&
              (usuario.search(" ") == -1) &&
              (dominio.search(" ") == -1) &&
              (dominio.search(".") != -1) &&
              (dominio.indexOf(".") >= 1) &&
              (dominio.lastIndexOf(".") < dominio.length - 1)) {
          //  document.getElementById("msgemail").innerHTML = "E-mail válido";
          // alert("E-mail valido");
      } else {
          // document.getElementById("msgemail").innerHTML = "<font color='red'>E-mail inválido </font>";
          var msgpassword = "E-mail inválido";
          alerta("Erro", "Erro", msgpassword);
      }
  }
</script>

<script language="Javascript">
  function validacaopassword(password) {

      var password = password.value;

      var letraMaiscula = 0;
      var numero = 0;
      var caracterEspecial = 0;
      var caracteresEspeciais = "/([~`!@#$%\^&*+=\-\[\]\\';,/{}|\":<>\?])"; // adicione o que quiser pra validar como caracter especial
      var total = password.length;

      for (var i = 0; i <= password.length; i++) {
          var valorAscii = password.charCodeAt(i);
          // console.log('valorAscii ' + valorAscii);
          // de A até Z
          if (valorAscii >= 65 && valorAscii <= 90)
              letraMaiscula++;
          // console.log('valorAscii ' + valorAscii);

          // de 0 até 9
          if (valorAscii >= 48 && valorAscii <= 57)
              numero++;
          // console.log('valorAscii ' + valorAscii);

          // indexOf retorna -1 quando NÃO encontra
          if (caracteresEspeciais.indexOf(password[i]) != -1)
              caracterEspecial++;
          // console.log('valorAscii ' + valorAscii);

      }
      console.log('letraMaiscula ' + letraMaiscula);
      console.log('numero ' + numero);
      console.log('caracterEspecial ' + caracterEspecial);
      var somatorio = 0;

      if (total >= 8)
          somatorio++;
      /////////////////////////////////////
      if (letraMaiscula >= 3)
          somatorio++;
      //////////////////////////////////
      if (total >= 3)
          numero++;
      //////////////////////////////////
      if (caracterEspecial >= 1)
          somatorio++;

      if (somatorio < 4)
          var msgpassword = "password inválida deve ter no mínimo:<br>8 caracteres <br>3 Maiúsculas<br>2 números<br>1 caracter especial";
      alerta("Erro", "Erro", msgpassword);

      // console.log('total ' + somatorio);

      // return (letraMaiscula >= 3) && (letraMaiscula >= 3) && (numero >= 2) && (caracterEspecial >= 1);
  }


</script>

<script>

  function dar_Like(botao_like, botao_like_nome, botao) {
      var btn = botao + botao_like_nome;
      var btn1 = "#" + btn;

      $.ajax({
          url: "Painel/Views/Posts/Modal/Crud.php",
          type: "POST",
          data: {postado: botao_like, mode: 23},
          dataType: "json", // Isso já força a resposta a ser JSON
          success: function (response) {
              if (response.success) {
                  let novoTotal = response.likes;
                  $(btn1).html(novoTotal); // Atualiza o botão
              } else {
                  console.error('Erro ao registrar like.');
              }
          },
          error: function (xhr, status, error) {
              console.error('Erro na requisição AJAX:', xhr.responseText); // Mostra a resposta bruta
          }
      });
  }

  function dar_nLike(botao_nlike, botao_nlike_nome, botao) {
      var btn = botao + botao_nlike_nome;
      var btn1 = "#" + btn;

      $.ajax({
          url: "Painel/Views/Posts/Modal/Crud.php",
          type: "POST",
          data: {postado: botao_nlike, mode: 23},
          dataType: "json", // Isso já força a resposta a ser JSON
          success: function (response) {
              if (response.success) {
                  let novoTotal = response.likes;
                  $(btn1).html(novoTotal); // Atualiza o botão
              } else {
                  console.error('Erro ao registrar like.');
              }
          },
          error: function (xhr, status, error) {
              console.error('Erro na requisição AJAX:', xhr.responseText); // Mostra a resposta bruta
          }
      });
  }
</script>

<script>
  function dar_9Like(botao_like, botao_like_nome, botao) {
      alert('novo ' + botao);


      // Criando os parâmetros para enviar ao servidor
      const data = new URLSearchParams();
      data.append('postado', botao_like);
      data.append('botao_nlike_nome', botao_like_nome);
      data.append('mode', 45);
//    data.append('user_id', userId);
      console.log('wwwwwwwwwwwwwwwwww');
      // Enviar a requisição ao servidor
      fetch('Painel/Views/Posts/Modal/Crud.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: data.toString()
      })
              .then(response => {
                  if (!response.ok) {
                      throw new Error(`Erro HTTP! Status: ${response.status}`);
                  }
                  return response.json();
              })
              .then(data => {
                  if (data.success) {
                      // Atualiza a contagem de likes na interface
//                        console.log('botao ' + ${botao_nlike_nome});
//                        console.log('botao ' + botao_nlike_nome);
                      const likesCount = document.getElementById(`like-count_${botao_like_nome}`);
                      if (likesCount) {
//                            console.log('nlikes ' + data.nlikes);
                          likesCount.textContent = data.likes;
                      }
                  } else {
                      alert(data.error || 'Erro ao registrar like.');
                  }
              })
              .catch(error => console.error('Erro na requisição:', error));
  }

</script>

<script>
  function dar_nLike2(botao_nlike, botao_nlike_nome, botao) {
      var btn = botao + botao_nlike_nome;
//      alert('btn ' + btn);

      // Criando os parâmetros para enviar ao servidor
      const data = new URLSearchParams();
      data.append('postado', botao_nlike);
      data.append('botao_nlike_nome', botao_nlike_nome);
      data.append('mode', 45);
//    data.append('user_id', userId);

      // Enviar a requisição ao servidor
      fetch('Painel/Views/Posts/Modal/Crud.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: data.toString()
      })
              .then(response => {
                  if (!response.ok) {
                      throw new Error(`Erro HTTP! Status: ${response.status}`);
                  }
                  return response.json();
              })
              .then(data => {
                  if (data.success) {
                      // Atualiza a contagem de likes na interface
//                        console.log('botao ' + ${botao_nlike_nome});
//                        console.log('botao ' + botao_nlike_nome);
                      const likesCount = document.getElementById(btn);
                      if (likesCount) {
//                            console.log('nlikes ' + data.nlikes);
                          likesCount.textContent = data.nlikes;
                      }
                  } else {
                      alert(data.error || 'Erro ao registrar like.');
                  }
              })
              .catch(error => console.error('Erro na requisição:', error));
  }

</script>

<script>
  const currentPages = {1: 1, 2: 1, 3: 1};
   const rowsPerPage = <?= $linhasPorPagina ?>;
  const filteredData = {};

// Inicializar filtragens
  document.addEventListener("DOMContentLoaded", () => {
      [1, 2, 3].forEach(id => {
          filterTable(id);
      });
  });

  function filterTable(tabelaId) {
      const input = document.getElementById(`search-input-${tabelaId}`);
      const filter = input.value.toLowerCase();
      const body = document.getElementById(`table-body-${tabelaId}`);
      const rows = Array.from(body.querySelectorAll('.table-row'));

      filteredData[tabelaId] = rows.filter(row => {
          return row.textContent.toLowerCase().includes(filter);
      });

      currentPages[tabelaId] = 1;
      renderPage(tabelaId);
  }

  function renderPage(tabelaId) {
      const page = currentPages[tabelaId];
      const data = filteredData[tabelaId];
      const start = (page - 1) * rowsPerPage;
      const end = start + rowsPerPage;

      const body = document.getElementById(`table-body-${tabelaId}`);
      body.querySelectorAll('.table-row').forEach(row => row.style.display = 'none');

      data.slice(start, end).forEach(row => row.style.display = '');

      const pageNumber = document.getElementById(`page-number-${tabelaId}`);
      pageNumber.textContent = `<?= $Lang->logar('en', 'pag') ?> ${page}`;
  }

  function changePage(tabelaId, delta) {
      const totalPages = Math.ceil(filteredData[tabelaId].length / rowsPerPage);
      currentPages[tabelaId] += delta;
      if (currentPages[tabelaId] < 1)
      currentPages[tabelaId] = 1;
      if (currentPages[tabelaId] > totalPages)
      currentPages[tabelaId] = totalPages;
      renderPage(tabelaId);
  }

  function sortTable(tabelaId, colIndex) {
      const body = document.getElementById(`table-body-${tabelaId}`);
      const rows = Array.from(body.querySelectorAll('.table-row'));

      const sorted = rows.sort((a, b) => {
          const valA = a.children[colIndex].textContent.trim().toLowerCase();
          const valB = b.children[colIndex].textContent.trim().toLowerCase();
          return valA.localeCompare(valB, undefined, {numeric: true});
      });

      sorted.forEach(row => body.appendChild(row));
      filterTable(tabelaId);
  }
</script>

<script>
  feather.replace();
  $(".emojiPicker").emojioneArea({
      inline: true,
      placement: 'absleft',
      pickerPosition: "top left",
  });
</script>
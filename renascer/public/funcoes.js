console.log("JavaScript carregado!");

$(document).ready(function () {
  console.log("jQuery ativo!");
  const mensagem = $("#mensagem");

  // ======== Mostrar / ocultar senha ========
  $("#verSenha").on("click", function (e) {
    e.preventDefault();
    const campo = $("#senha");
    const tipo = campo.attr("type") === "password" ? "text" : "password";
    campo.attr("type", tipo);
    $(this).text(tipo === "password" ? "👁️" : "🙈");
  });

  // ======== Detectar tipo de formulário ========
  const isLogin = $("#formLogin").length;
  const isCriarConta = $("#formCriarConta").length;
  const isUsuario = $("#formUsuario").length;

  // ======== Máscara de telefone (para ambos os formulários que têm telefone) ========
  if (isCriarConta || isUsuario) {
    $("#telefone").mask("(00) 00000-0000");

    $("#telefone").on("input", function () {
      const valor = $(this).val().replace(/[^0-9]/g, "");
      if (isNaN(valor)) {
        mensagem.text("O telefone deve conter apenas números.");
      } else {
        mensagem.text("");
      }
    });
  }

  // ======== LOGIN ========
  if (isLogin) {
    console.log("Tela de login detectada!");

    $("#email").on("blur", function () {
      const email = $(this).val().trim();
      if (email === "") mensagem.text("O e-mail não pode ficar vazio.");
      else if (!email.includes("@")) mensagem.text("Digite um e-mail válido (exemplo@gmail.com).");
      else if (!email.endsWith("@gmail.com")) mensagem.text("Apenas e-mails @gmail.com são aceitos.");
      else mensagem.text("");
    });

    $("#formLogin").on("submit", function (e) {
      const email = $("#email").val().trim();
      const senha = $("#senha").val().trim();

      if (email === "" || senha === "") {
        e.preventDefault();
        mensagem.text("Preencha todos os campos.");
        return;
      }
      if (!email.includes("@") || !email.endsWith("@gmail.com")) {
        e.preventDefault();
        mensagem.text("Digite um e-mail válido que termine com @gmail.com.");
        return;
      }
      if (senha.length < 3) {
        e.preventDefault();
        mensagem.text("A senha deve ter pelo menos 3 caracteres.");
        return;
      }
      mensagem.text("");
    });
  }

  // ======== CRIAR CONTA ou ADICIONAR USUÁRIO ========
  if (isCriarConta || isUsuario) {
    console.log(isCriarConta ? "Tela de criar conta detectada!" : "Tela de adicionar usuário detectada!");

    $("#email").on("blur", function () {
      const email = $(this).val().trim();
      if (email === "") mensagem.text("O campo de e-mail não pode ficar vazio.");
      else if (!email.includes("@")) mensagem.text("Digite um e-mail válido (exemplo@gmail.com).");
      else if (!email.endsWith("@gmail.com")) mensagem.text("Apenas e-mails @gmail.com são aceitos.");
      else mensagem.text("");
    });

    // Validação antes de enviar
    $("form").on("submit", function (e) {
      const nome = $("#nome").val().trim();
      const telefone = $("#telefone").val().trim();
      const email = $("#email").val().trim();
      const senha = $("#senha").val().trim();
      const tipoSelecionado = $("input[name='tipo']:checked").val();

      if (nome === "" || telefone === "" || email === "" || senha === "") {
        e.preventDefault();
        mensagem.text("Por favor, preencha todos os campos.");
        return;
      }

      if (!email.includes("@") || !email.endsWith("@gmail.com")) {
        e.preventDefault();
        mensagem.text("Digite um e-mail válido que termine com @gmail.com.");
        return;
      }

      if (senha.length < 3) {
        e.preventDefault();
        mensagem.text("A senha deve ter pelo menos 3 caracteres.");
        return;
      }

      if (telefone.length < 14) {
        e.preventDefault();
        mensagem.text("Digite um telefone válido no formato (00) 00000-0000.");
        return;
      }

      // Valida tipo (somente em Adicionar Usuário)
      if (isUsuario && !tipoSelecionado) {
        e.preventDefault();
        mensagem.text("Selecione o tipo de usuário (Funcionário ou Gerente).");
        return;
      }

      mensagem.text("");
    });
  }
});

// Bloquear números no campo "nome"
$(function () {
  $("#nome").on("input", function () {
    const apenasLetras = $(this).val().replace(/[^a-zA-ZÀ-ÿ\s]/g, "");
    $(this).val(apenasLetras);
    $("#mensagem").text(apenasLetras.length < $(this).val().length ? "Somente letras são permitidas." : "");
  });
});

// ======== Validação do formulário de agendamento =========
$(function() {
  // Quando sair de um campo
  $("#formAgendamento input, #formAgendamento select").on("blur change", function() {
    if ($(this).val().trim() === "") {
      alert("Por favor, preencha o campo: " + $("label[for='" + this.id + "']").text());
      $(this).focus();
    }
  });

  // Antes de enviar o formulário
  $("#formAgendamento").on("submit", function(e) {
    let vazio = false;
    $("#formAgendamento input, #formAgendamento select").each(function() {
      if ($(this).val().trim() === "") {
        alert("Preencha todos os campos antes de enviar.");
        $(this).focus();
        vazio = true;
        return false; // sai do loop
      }
    });
    if (vazio) e.preventDefault(); // bloqueia envio
  });
});
console.log("✅ JavaScript carregado!");

// Espera o documento estar pronto
$(document).ready(function() {
  console.log("✅ jQuery ativo!");

  const mensagem = $("#mensagem");

  // Mostrar / ocultar senha (em ambos os formulários)
  $("#verSenha").on("click", function(e) {
    e.preventDefault();
    const campo = $("#senha");
    const tipo = campo.attr("type") === "password" ? "text" : "password";
    campo.attr("type", tipo);
    $(this).text(tipo === "password" ? "👁️" : "🙈");
  });

  // ========== LOGIN ==========
  if ($("#formLogin").length) {
    console.log("🟢 Tela de login detectada!");

    // Validação ao sair do campo de e-mail
    $("#email").on("blur", function() {
      let email = $(this).val().trim();

      if (email === "") {
        mensagem.text("O e-mail não pode ficar vazio.");
      } else if (!email.includes("@")) {
        mensagem.text("Digite um e-mail válido (exemplo@gmail.com).");
      } else if (!email.endsWith("@gmail.com")) {
        mensagem.text("Apenas e-mails @gmail.com são aceitos.");
      } else {
        mensagem.text("");
      }
    });

    // Validação ao enviar o formulário
    $("#formLogin").on("submit", function(e) {
      let email = $("#email").val().trim();
      let senha = $("#senha").val().trim();

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

  // ========== CRIAR CONTA ==========
  if ($("#formCriarConta").length) {
    console.log("🟢 Tela de criar conta detectada!");

    // Aplica máscara no telefone
    $("#telefone").mask("(00) 00000-0000");

    // Bloqueia letras no telefone
    $("#telefone").on("input", function() {
      let valor = $(this).val().replace(/[^0-9]/g, "");
      if (isNaN(valor)) {
        mensagem.text("O telefone deve conter apenas números.");
      } else {
        mensagem.text("");
      }
    });

    // Validação de e-mail (ao sair do campo)
    $("#email").on("blur", function() {
      let email = $(this).val().trim();

      if (email === "") {
        mensagem.text("O campo de e-mail não pode ficar vazio.");
      } else if (!email.includes("@")) {
        mensagem.text("Digite um e-mail válido (exemplo@gmail.com).");
      } else if (!email.endsWith("@gmail.com")) {
        mensagem.text("Apenas e-mails @gmail.com são aceitos.");
      } else {
        mensagem.text("");
      }
    });

    // Validação antes de enviar
    $("#formCriarConta").on("submit", function(e) {
      let nome = $("#nome").val().trim();
      let telefone = $("#telefone").val().trim();
      let email = $("#email").val().trim();
      let senha = $("#senha").val().trim();

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

      mensagem.text("");
    });
  }
});

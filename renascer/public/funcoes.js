// Mostra mensagem no console para confirmar funcionamento
console.log("✅ JavaScript conectado!");

// Espera o carregamento do documento
$(document).ready(function() {
  console.log("✅ jQuery carregado com sucesso!");

  const mensagem = $("#mensagem");

  // Aplica máscara de telefone
  $("#telefone").mask("(00) 00000-0000");

  // Impede letras no campo telefone
  $("#telefone").on("input", function() {
    let valor = $(this).val().replace(/[^0-9]/g, "");
    if (isNaN(valor)) {
      mensagem.text("O telefone deve conter apenas números.");
    } else {
      mensagem.text("");
    }
  });

  // Mostrar / ocultar senha
  $("#verSenha").on("click", function(e) {
    e.preventDefault(); // impede comportamento do botão
    const campo = $("#senha");
    const tipo = campo.attr("type") === "password" ? "text" : "password";
    campo.attr("type", tipo);
    $(this).text(tipo === "password" ? "👁️" : "🙈");
  });

  // Validação ao sair do campo de e-mail
  $("#email").on("blur", function() {
    let email = $(this).val().trim();

    if (email === "") {
      mensagem.text("O campo de e-mail não pode ficar vazio.");
    } 
    else if (!email.includes("@")) {
      mensagem.text("Digite um e-mail válido (exemplo@gmail.com).");
    } 
    else if (!email.endsWith("@gmail.com")) {
      mensagem.text("Apenas e-mails @gmail.com são aceitos.");
    } 
    else {
      mensagem.text("");
    }
  });

  // Validação completa antes de enviar
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
});

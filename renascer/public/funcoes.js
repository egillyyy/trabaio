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

// ========== JQUERY: FORMULÁRIO DE SERVIÇO ==========
$(document).ready(function () {
  const form = $("#formServico");
  const preco = $('input[name="preco_servico"]');
  const descricao = $('textarea[name="descricao_servico"]');
  const foto = $('input[name="foto"]');
  const mensagem = $("<p id='mensagem' style='color:red; font-weight:bold;'></p>");
  form.append(mensagem);

  // ======== Máscara do campo preço ========
  preco.mask("R$ 000.000.000,00", { reverse: true });

  // Bloquear letras
  preco.on("input", function () {
    let valor = $(this).val().replace(/[A-Za-z]/g, "");
    $(this).val(valor);
  });

  // ======== Mensagens ao sair do campo ========
  preco.on("blur", function () {
    if ($(this).val().trim() === "R$ ,00" || $(this).val().trim() === "") {
      mensagem.text("O campo de preço não pode ficar vazio.");
    } else {
      mensagem.text("");
    }
  });

  descricao.on("blur", function () {
    if ($(this).val().trim() === "") {
      mensagem.text("A descrição do serviço é obrigatória.");
    } else {
      mensagem.text("");
    }
  });

  foto.on("blur", function () {
    if ($(this).val().trim() === "") {
      mensagem.text("Por favor, selecione uma foto.");
    } else {
      mensagem.text("");
    }
  });

  // ======== Validação completa no envio ========
  form.on("submit", function (e) {
    const precoVal = preco.val().trim();
    const tipoVal = $('input[name="tipo_servico"]:checked').val();
    const descricaoVal = descricao.val().trim();
    const fotoVal = foto.val().trim();

    if (precoVal === "" || precoVal === "R$ ,00") {
      e.preventDefault();
      mensagem.text("Preencha o campo de preço corretamente.");
      preco.focus();
      return;
    }

    // Limita ao formato 10,2 (até 10 dígitos antes da vírgula e 2 depois)
    const numeros = precoVal.replace(/[^\d]/g, "");
    if (numeros.length > 12) {
      e.preventDefault();
      mensagem.text("O valor do preço excede o limite permitido (10 dígitos e 2 decimais).");
      preco.focus();
      return;
    }

    if (!tipoVal) {
      e.preventDefault();
      mensagem.text("Selecione um tipo de serviço.");
      return;
    }

    if (descricaoVal === "") {
      e.preventDefault();
      mensagem.text("A descrição do serviço não pode estar vazia.");
      descricao.focus();
      return;
    }

    if (fotoVal === "") {
      e.preventDefault();
      mensagem.text("Selecione uma foto para o serviço.");
      foto.focus();
      return;
    }

    mensagem.text("");
  });
});

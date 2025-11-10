// Mostra uma mensagem no console pra testar se o JS está funcionando
function teste() {
  console.log("JavaScript conectado!");
}

// Mostrar ou ocultar senha
function mostrarSenha() {
  let campo = document.getElementById("senha");
  if (campo.type === "password") {
    campo.type = "text";
  } else {
    campo.type = "password";
  }
}

// Verifica se o formulário foi preenchido corretamente antes de enviar
function validarLogin() {
  let email = document.getElementById("email").value;
  let senha = document.getElementById("senha").value;
  let mensagem = document.getElementById("mensagem");

  if (email === "" || senha === "") {
    mensagem.innerText = "Por favor, preencha todos os campos.";
    mensagem.style.color = "red";
    return false; // Impede o envio
  }

  if (!email.includes("@")) {
    mensagem.innerText = "Digite um e-mail válido.";
    mensagem.style.color = "red";
    return false;
  }

  if (senha.length < 4) {
    mensagem.innerText = "A senha deve ter pelo menos 4 caracteres.";
    mensagem.style.color = "red";
    return false;
  }

  // Se tudo estiver ok
  mensagem.innerText = "";
  return true;
}

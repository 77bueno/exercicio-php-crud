// constantes | ids da pagina atualizar
const inputNota1 = document.getElementById("primeira");
const inputNota2 = document.getElementById("segunda");
const inputMedia = document.getElementById("media");
const mensagemErro = document.getElementById("mensagemErro");
const situacao = document.getElementById("situacao");

inputNota1.addEventListener('input', verificaMedia);
inputNota2.addEventListener('input', verificaMedia);
function verificaMedia() {
  const nota1 = parseFloat(inputNota1.value);
  const nota2 = parseFloat(inputNota2.value);

  if (isNaN(nota1) || isNaN(nota2)) {
    exibeErro();
  } else {
    mensagemErro.textContent = "";
    inputMedia.value = calculaMedia(nota1, nota2);
    verificaSituacao(); // atualiza a situação quando as notas mudam
  }
}

function calculaMedia(nota1, nota2) {
 let media =   (nota1 + nota2) / 2;

 return media.toFixed(2);
}

function verificaSituacao() {
  const media = parseFloat(inputMedia.value);

  if (media < 5) {
    situacao.value = "Reprovado";
  } else if (media >= 7) {
    situacao.value = "Aprovado";
  } else {
    situacao.value = "Recuperação";
  }
}

function exibeErro() {
  mensagemErro.textContent = "Digite notas válidas!";
  inputMedia.type = "text";
  inputMedia.value = "---";
  situacao.value = "---";
}

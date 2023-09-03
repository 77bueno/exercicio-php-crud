// Recupere o elemento HTML do aluno
var situacoes = document.querySelectorAll(".situacao");

for (const situacao of situacoes) {
    if (situacao.textContent === 'Aprovado') {
        situacao.classList.add('aprovado');
    } else if (situacao.textContent === 'Reprovado') {
        situacao.classList.add('reprovado');
    } else if (situacao.textContent === 'Recupereitchan!') {
        situacao.classList.add('recuperacao');
    }
}

# Promise

Uma Promise é um objeto usado em JavaScript para representar um valor que pode estar disponível agora, no futuro ou nunca. Ela é usada para operações assíncronas, como requisições de rede, leitura de arquivos e outras tarefas que podem demorar para serem concluídas. Uma Promise pode estar em um dos três estados: pendente (pending), resolvida (fulfilled) ou rejeitada (rejected).

ˋˋˋ
// Exemplo de Promise que espera 1 segundo e resolve com "Sucesso!"
const minhaPromise = new Promise((resolve, reject) => {
  setTimeout(() => {
    resolve("Sucesso!");
  }, 1000);
});

// Utilizando a Promise
minhaPromise.then(resultado => {
  console.log(resultado); // Saída após 1 segundo: "Sucesso!"
});
ˋˋˋ
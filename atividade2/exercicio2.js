// Definição da matriz A
const matrizA = [
    [1, 2, 3],
    [4, 5, 6],
  ];
  
  // Função para calcular a transposta de uma matriz
  function calcularTransposta(matriz) {
    const transposta = [];
    for (let j = 0; j < matriz[0].length; j++) {
      transposta[j] = [];
      for (let i = 0; i < matriz.length; i++) {
        transposta[j][i] = matriz[i][j];
      }
    }
    return transposta;
  }
  
  // Calculando e imprimindo a transposta da matriz A
  const transpostaA = calcularTransposta(matrizA);
  console.log("Matriz A:");
  console.log(matrizA);
  console.log("Transposta de A:");
  console.log(transpostaA);
  
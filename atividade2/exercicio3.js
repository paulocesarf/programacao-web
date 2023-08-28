// Definição das matrizes A e B
const matrizA = [
    [1, 2],
    [3, 4],
  ];
  
  const matrizB = [
    [5, 6],
    [7, 8],
  ];
  
  // Função para multiplicar matrizes
  function multiplicarMatrizes(matriz1, matriz2) {
    const linhasMatriz1 = matriz1.length;
    const colunasMatriz1 = matriz1[0].length;
    const colunasMatriz2 = matriz2[0].length;
  
    if (colunasMatriz1 !== matriz2.length) {
      return "Não é possível calcular";
    }
  
    const matrizResultado = [];
    for (let i = 0; i < linhasMatriz1; i++) {
      matrizResultado[i] = [];
      for (let j = 0; j < colunasMatriz2; j++) {
        let soma = 0;
        for (let k = 0; k < colunasMatriz1; k++) {
          soma += matriz1[i][k] * matriz2[k][j];
        }
        matrizResultado[i][j] = soma;
      }
    }
    return matrizResultado;
  }
  
  // Calculando e imprimindo o resultado da multiplicação
  const matrizResultado = multiplicarMatrizes(matrizA, matrizB);
  console.log("Resultado da multiplicação AxB:");
  console.log(matrizResultado);
  
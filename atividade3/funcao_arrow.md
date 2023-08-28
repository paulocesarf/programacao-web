# Função Arrow

Uma função arrow, também conhecida como função de seta, é uma forma mais concisa de escrever funções em JavaScript.
Elas não possuem seu próprio contexto this, o que significa que o valor de this dentro de uma função arrow é determinado pelo contexto em que a função é criada.

~~~javascript
// Função tradicional
function soma(a, b) {
  return a + b;
}

// Mesma função como arrow function
const somaArrow = (a, b) => a + b;
~~~

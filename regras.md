# Regras da OO no PHP

1. O nome dos arquivos são preferencialmente em maiusculos (Classes, Interfaces, Traits e Enums)

2. Todos os arquivos irão iniciar com 
```php
declare(strict_types=1);
```

3. Todo nome de Classe, Interface, Enum ou Trait, precisa respeitar o CamelCase 
```php
class AlunoEspecial {}
```

para garantir a tipagem forte no PHP

4. Uma e somente uma classe por arquivo, e o nome do arquivo tem que ser identico ao nome da classe.

5. dentro da pasta src, as pastas terao os nomes respeitando o CamelCase.
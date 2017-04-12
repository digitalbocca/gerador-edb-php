# Gerador EDB #

**Gerador de Páginas Estáticas em PHP**

#### v0.7.0 ####

#### INSTRUÇÕES ####

**INSTALAÇÃO**

- Clone o Respositório.
- Adicione suas páginas (.json) na pasta paginas.
- Edite o Arquivo de configuração projeto.json.
- Adicione o Composer e crie o autoload PSR-4.
- Rode o arquivo gerador.php.
- Instale as Dependências (dentro da pasta gerados).
- Gere os arquivos de produção com o Gulp (dentro da pasta gerados).

#### MUDANÇAS ####

**mudanças v0.7.0**

- Adicionado comando npm run gerar.
- Adicionado package.json.
- Verifica e Sobrescreve pasta existente (Precisa de Modificação).

**mudanças v0.6.0**

- Criado um leitor de Modelos.

**mudanças v0.5.0**

- Documentação das classes EstudioDigitalBocca/Gerador.
- Mudanças na Geração de arquivo package do npm.

**mudanças v0.4.0**

- Páginas Geradas agora são editaveis e possuem identação.
- Gerando package no modelo novo.
- Adicionado modelo de package npm.
- Adicionado Type nas Páginas json.
- Adicionado modelos de html.

**mudanças v0.3.0**

- Trabalhando no GeradorDeArquivo.
- Criada a Interface ArquivoInterface.
- Criada a Classe CriadorDeArquivo.
- Criada a Entidade Arquivo.
- Criada a Interface RetornoDeListaInterface.

**mudanças v0.2.0**

- Integrado o Novo Código com o Código Legado.
- Criada a Classe EncontradorDeArquivos.
- Adicionado autoload PSR-4 do composer.
- Criada a Classe CriadorDeDiretorio.
- Adicionado o Namespace EstudioDigitalBocca/Gerador.

**mudanças v0.1.0**

- Recebido Código Legado (Vindo de Teste).
- Início do Controle de Versão.
# Estúdio Digital Bocca

## Gerador EDB

### v1.4.0

> Gerador de Páginas Estáticas em PHP

## ATENÇÃO: NÃO USE EM PRODUÇÃO, APENAS PARA ESTUDO

## ESTOU ATUALIZANDO O README COM O PASSO A PASSO CORRETO DA INSTALAÇÃO. OBRIGADO PELA COMPREENSÃO

### ETIQUETAS

[![Maintainability](https://api.codeclimate.com/v1/badges/2789e5c02b5a06d08ae5/maintainability)](https://codeclimate.com/github/digitalbocca/gerador-edb-php/maintainability)
[![edb](https://img.shields.io/badge/produto-EDB-e67e22.svg)](https://estudiodigitalbocca.com.br)
[![php](https://img.shields.io/badge/escrito_em-PHP-9b59b6.svg)](https://estudiodigitalbocca.com.br)
[![js](https://img.shields.io/badge/escrito_em-JS-f1c40f.svg)](https://estudiodigitalbocca.com.br)
[![egh-php](https://img.shields.io/badge/Extreme_Go_Horse-PHP-9b59b6.svg)](https://estudiodigitalbocca.com.br)
[![versao](https://img.shields.io/badge/versao-v1.4.0-7f8c8d.svg)](https://estudiodigitalbocca.com.br)

### INSTRUÇÕES

#### INSTALAÇÃO - RAIZ

- Clone o Respositório.
- Adicione suas páginas (.json) na pasta paginas.
- Edite o Arquivo de configuração projeto.json.
- Adicione o Composer e crie o autoload PSR-4.
- Rode o arquivo gerador.php.

#### INSTALAÇÃO - PASTA GERADOS

- Instale as Dependências:

```bash
npm install
```

- Rode o Servidor de Desenvolvimento:

```bash
npm run dev
```

- Gere os arquivos de produção com o Gulp (AGUARDANDO IMPLEMENTAÇÃO).

#### MUDANÇAS

##### mudanças v1.4.0

- Atualizado CDN do Bootstrap.
- Correções no README.

##### mudanças v1.3.0

- Adicionado cross-var-no-babel@1.2.0.

##### mudanças v1.2.0

- Adicionado Label Code Climate.

##### mudanças v1.1.0

- Atualização de Dependências.

##### mudanças v1.0.0

- Disponibilização no GitHub.
- Adicionada licença MIT.

##### mudanças v0.11.0

- Atualização das dependências do NPM do projeto gerado.

##### mudanças v0.10.1

- Correção no script npm git.

##### mudanças v0.10.0

- Gerador de README Adicionado.
- Automatizado o processo de Controle de Versão.
- Automatizada a instalação do servidor de desenvolvimento.

##### mudanças v0.9.0

- Inserindo Menu nas páginas.

##### mudanças v0.8.0

- Correção no README.
- Adicionado server de desenvolvimento: npm run dev.
- Adicionado comando de pós instalação: npm run pos.
- Atualização de dependências.
- Corrigido BUG que não deletava a pasta gerados.

##### mudanças v0.7.0

- Adicionado comando npm run gerar.
- Adicionado package.json.
- Verifica e Sobrescreve pasta existente (Precisa de Modificação).

##### mudanças v0.6.0

- Criado um leitor de Modelos.

##### mudanças v0.5.0

- Documentação das classes EstudioDigitalBocca/Gerador.
- Mudanças na Geração de arquivo package do npm.

##### mudanças v0.4.0

- Páginas Geradas agora são editaveis e possuem identação.
- Gerando package no modelo novo.
- Adicionado modelo de package npm.
- Adicionado Type nas Páginas json.
- Adicionado modelos de html.

##### mudanças v0.3.0

- Trabalhando no GeradorDeArquivo.
- Criada a Interface ArquivoInterface.
- Criada a Classe CriadorDeArquivo.
- Criada a Entidade Arquivo.
- Criada a Interface RetornoDeListaInterface.

##### mudanças v0.2.0

- Integrado o Novo Código com o Código Legado.
- Criada a Classe EncontradorDeArquivos.
- Adicionado autoload PSR-4 do composer.
- Criada a Classe CriadorDeDiretorio.
- Adicionado o Namespace EstudioDigitalBocca/Gerador.

##### mudanças v0.1.0

- Recebido Código Legado (Vindo de Teste).
- Início do Controle de Versão.

---

>(c)2017-2018 Estudio Digital Bocca - <http://estudiodigitalbocca.com.br>
<div align="center">
  <img src="./assets/images/agen_logo.png" alt="Logo da aplicação AGEN" width="150px" />
  <h1>AGENDA PROGMUD (AGEN) 🗓️</h1>
  <p><strong>Aplicação Web para Agendamento de Consultores da ProGmud</strong></p>

  <p>
    <img src="https://img.shields.io/badge/status-em%20desenvolvimento-yellow" alt="Status do Projeto: Em Desenvolvimento">
    <img src="https://img.shields.io/badge/licença-MIT-blue" alt="Licença MIT">
  </p>
</div>

---

## 📑 Sumário

- [🏛️ Sobre o Projeto](#-sobre-o-projeto)
- [🧭 Índice](#-índice)
- [📝 Resumo da Aplicação](#-resumo-da-aplicação)
  - [🎯 Objetivos](#-objetivos)
- [📋 Documento de Requisitos](#-documento-de-requisitos)
  - [✅ Requisitos Funcionais](#-requisitos-funcionais)
  - [🔧 Requisitos Não Funcionais](#-requisitos-não-funcionais)
- [💡 Estudo de Viabilidade](#-estudo-de-viabilidade)
- [📈 Regras de Negócio](#-regras-de-negócio)
- [🎨 Design](#-design)
- [📱 Protótipo](#-protótipo)
- [🛠️ Tecnologias Utilizadas](#-tecnologias-utilizadas)
- [🚀 Aplicação](#-aplicação)
- [👨‍💻 Autores](#-autores)
- [🏁 Considerações Finais](#-considerações-finais)
- [📚 Referências](#-referências)

---

## 🏛️ Sobre o Projeto

O **AGEN** é um sistema web criado para otimizar a experiência e a organização dos colaboradores da **ProGmud**.  
O objetivo principal é **automatizar o agendamento de consultores**, centralizar informações e facilitar a comunicação entre techleads e a equipe, substituindo processos manuais por uma plataforma digital eficiente e intuitiva.

---

## 🧭 Índice

1. Resumo da Aplicação  
2. Documento de Requisitos  
   - Funcionais  
   - Não Funcionais  
3. Estudo de Viabilidade  
4. Regras de Negócio  
5. Design  
6. Protótipo  
7. Aplicação  
8. Considerações Finais  
9. Referências  

---

## 📝 Resumo da Aplicação

### 🎯 Objetivos

**Objetivo Geral**  
Facilitar a transferência de informações entre consultores e techleads, com:  
- Criação automática de agendas  
- Envio individual por e-mail  
- Organização inteligente de horários  

**Objetivos Específicos**  
- Mapear processos atuais  
- Definir funcionalidades-chave  
- Propor arquitetura técnica  

---

## 📋 Documento de Requisitos

Os requisitos definem **o que o sistema deve fazer** (funcionais) e **como deve se comportar** (não funcionais), garantindo que o **AGEN** atenda às necessidades da ProGmud de forma eficiente, segura e acessível.

### ✅ Requisitos Funcionais (RF)

#### 🔹 Módulo de Cadastros e Gerenciamento (Core) 🗂️
- **RF01 – Cadastrar Consultores:** Permitir que Techleads cadastrem novos consultores.  
  **Dados:** `id_consultor (PK)`, `nome_completo`, `email_profissional`, `email_pessoal`, `cargo`, `especialidade_tecnica`, `status (Ativo/Inativo)`  

- **RF02 – Cadastrar Techleads:** Cadastro de Techleads com permissões elevadas.  
  **Dados:** `id_techlead (PK)`, `nome_completo`, `email_profissional`, `status (Ativo/Inativo)`  

- **RF03 – Cadastrar Clientes:** Cadastro dos clientes da ProGmud.  
  **Dados:** `id_cliente (PK)`, `razao_social`, `cnpj`, `nome_contato_principal`, `email_contato`  

- **RF04 – Gerenciar Projetos/Alocação:** Cadastro e gestão de períodos de alocação dos consultores.  
  **Dados:** `id_alocacao (PK)`, `id_consultor (FK)`, `id_cliente (FK)`, `data_inicio`, `data_fim`, `descricao_projeto`  

---

#### 🔹 Módulo de Agenda 📅
- **RF05 – Criar e Atribuir Agendas:** Criação, edição e visualização de agendas por Techleads, com prevenção de conflitos de horário.  
- **RF06 – Notificação Automática por E-mail:** Envio automático de e-mails após criação/alteração/exclusão de agendas.  
- **RF07 – Visualização de Agenda Pessoal:** Consultores só podem visualizar suas próprias agendas, sem editar.  

---

#### 🔹 Módulo de Autenticação e Perfis 🔐
- **RF08 – Autenticação de Usuários:** Tela de login com e-mail profissional + senha.  
- **RF09 – Níveis de Permissão:**  
  - **Consultor:** acesso restrito à agenda própria e páginas informativas.  
  - **Techlead/Admin:** acesso total aos cadastros e gerenciamento de agendas.  

---

#### 🔹 Páginas Estáticas 📖
- **RF10 – Apresentação Institucional:**  
  Páginas públicas com:  
  - Sobre a ProGmud (missão, visão, valores)  
  - Sobre o Sistema (objetivos e funcionalidades)  
  - Desenvolvedores (nome, foto, LinkedIn e GitHub)  

---

### 🔧 Requisitos Não Funcionais (RNF)

- **RNF01 – Usabilidade:** Interface simples, formulários claros e menus intuitivos.  
- **RNF02 – Desempenho:** Resposta em até **3 segundos** em condições normais de rede.  
- **RNF03 – Acessibilidade:** Seguir diretrizes da **WCAG**, com suporte a leitores de tela e navegação por teclado.  
- **RNF04 – Compatibilidade:** Responsivo e funcional em **Chrome, Firefox, Edge e Safari** (desktop e mobile).  
- **RNF05 – Segurança:**  
  - Comunicação via **HTTPS**  
  - Senhas com **hash**  
  - Proteção contra **SQL Injection, XSS** e outras vulnerabilidades  

---

## 💡 Estudo de Viabilidade

- **Infraestrutura**: Computador pessoal + internet da faculdade  
- **Tecnologias**: Ferramentas gratuitas (VSCode, Git, Figma, Balsamiq)  
- **Banco de dados**: SQLite / Firebase  
- **Hospedagem**: GitHub Pages  
- **Mão de obra**: Equipe interna (Luca & Aquiles)  

---

## 📈 Regras de Negócio

<div align="center">
  <img src="./assets/images/canvas_modelo_negocios.png" alt="Canvas do Modelo de Negócios" width="800px"/>
  <p><em>Figura 1. Canvas do Modelo de Negócios.</em></p>
</div>

---

## 🎨 Design

**Paleta de Cores**  
<div align="center">
  <img src="./assets/images/paleta_cores.png" alt="Paleta de Cores do projeto" width="600px"/>
  <p><em>Figura 2. Paleta de Cores.</em></p>
</div>

**Tipografia**  
<div align="center">
  <img src="./assets/images/tipografia_opensans.png" alt="Fonte Open Sans" width="600px"/>
  <p><em>Figura 3. Fonte Open Sans.</em></p>
</div>

**Logo**  
<div align="center">
  <img src="./assets/images/agen_logo.png" alt="Logo da aplicação AGEN" width="250px"/>
  <p><em>Figura 4. Logo da aplicação AGEN.</em></p>
</div>

**Modelo de Navegação**  
<div align="center">
  <img src="./assets/images/modelo_navegacao.png" alt="Modelo de Navegação" width="800px"/>
  <p><em>Figura 5. Modelo de Navegação.</em></p>
</div>

---

## 📱 Protótipo

🔗 [Acessar Protótipo Interativo no Balsamiq](https://balsamiq.cloud/sfh5gws/pqjpwco/r46FF)  

<div align="center">
  <img src="./assets/images/prototipo_pagina_inicial.png" alt="Protótipo da Página Inicial" width="800px"/>
  <p><em>Figura 6. Protótipo da Página Inicial.</em></p>
</div>

---

## 🛠️ Tecnologias Utilizadas

<div align="center">
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
  <img src="https://img.shields.io/badge/Figma-F24E1E?style=for-the-badge&logo=figma&logoColor=white" alt="Figma">
  <img src="https://img.shields.io/badge/Balsamiq-CC0000?style=for-the-badge&logo=balsamiq&logoColor=white" alt="Balsamiq">
  <img src="https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white" alt="Git">
</div>

---

## 🚀 Aplicação

🔗 [Repositório no GitHub](https://github.com/AquilesMorato/P.I-FATEC)  

<div align="center">
  <img src="./assets/images/pagina_inicial.png" alt="Página Inicial da Aplicação" width="800px"/>
  <p><em>Figura 7. Página Inicial da Aplicação.</em></p>
</div>

---

## 👨‍💻 Autores

<div align="center">
<p>Este projeto foi desenvolvido por:</p>
<a href="https://github.com/AquilesMorato" style="margin-right: 20px;">Luca Morato</a> • 
<a href="https://github.com/AquilesMorato">Aquiles Augusto</a>
</div>

---

## 🏁 Considerações Finais

A criação do AGEN foi um exercício prático fundamental para aplicar metodologias de desenvolvimento de software aprendidas em sala.  
Os principais desafios (prazos curtos, equipe reduzida) foram superados com **flexibilidade, organização e divisão de tarefas**.  

---

## 📚 Referências

- Matteson, Steve. *Open Sans Font*. [Google Fonts](https://fonts.google.com/specimen/Open+Sans)  
- [Balsamiq](https://balsamiq.com)  
- [GitHub](https://github.com)  
- [WeHandle](https://wehandle.com.br)  
- [Trello](https://trello.com)  
- [Figma](https://figma.com)  

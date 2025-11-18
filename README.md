<div align="center">
  <img src=".github/assets/agen_logo.png" alt="Logo da aplicação AGEN" width="150px" />
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
- [🏛️ Arquitetura do Sistema (Laravel)](#-arquitetura-do-sistema-laravel)
  - [Diagrama de Casos de Uso](#diagrama-de-casos-de-uso)
  - [Diagrama de Classes](#diagrama-de-classes)
  - [Diagrama Entidade-Relacionamento (DER)](#diagrama-entidade-relacionamento-der)
- [💡 Estudo de Viabilidade](#-estudo-de-viabilidade)
- [📈 Regras de Negócio](#-regras-de-negócio)
- [🎨 Design](#-design)
- [📱 Protótipo](#-protótipo)
- [🛠️ Tecnologias Utilizadas](#-tecnologias-utilizadas)
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
3. Arquitetura do Sistema (Laravel)
4. Estudo de Viabilidade  
5. Regras de Negócio  
6. Design  
7. Protótipo  
8. Aplicação  
9. Considerações Finais  
10. Referências  

---

## 📝 Resumo da Aplicação

### 🎯 Objetivos

**Objetivo Geral** Facilitar a transferência de informações entre consultores e techleads, com:  
- Criação automática de agendas  
- Envio individual por e-mail  
- Organização inteligente de horários  

**Objetivos Específicos** - Mapear processos atuais  
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
- **RF09 – Níveis de Permissão:** - **Consultor:** acesso restrito à agenda própria e páginas informativas.  
  - **Techlead/Admin:** acesso total aos cadastros e gerenciamento de agendas.  

---

#### 🔹 Páginas Estáticas 📖
- **RF10 – Apresentação Institucional:** Páginas públicas com:  
  - Sobre a ProGmud (missão, visão, valores)  
  - Sobre o Sistema (objetivos e funcionalidades)  
  - Desenvolvedores (nome, foto, LinkedIn e GitHub)  

---

### 🔧 Requisitos Não Funcionais (RNF)

- **RNF01 – Usabilidade:** Interface simples, formulários claros e menus intuitivos.  
- **RNF02 – Desempenho:** Resposta em até **3 segundos** em condições normais de rede.  
- **RNF03 – Acessibilidade:** Seguir diretrizes da **WCAG**, com suporte a leitores de tela e navegação por teclado.  
- **RNF04 – Compatibilidade:** Responsivo e funcional em **Chrome, Firefox, Edge e Safari** (desktop e mobile).  
- **RNF05 – Segurança:** - Comunicação via **HTTPS** - Senhas com **hash** - Proteção contra **SQL Injection, XSS** e outras vulnerabilidades  

---

## 🏛️ Arquitetura do Sistema (Laravel)

Documentação da arquitetura MVC e do banco de dados desenvolvida para a versão Laravel da aplicação.

### Diagrama de Casos de Uso
O diagrama define os dois principais atores (Admin e Consultor) e suas permissões e ações exclusivas dentro do sistema, baseadas nos requisitos RF07 e RF09.

<div align="center">
  <img src=".github/assets/diagrama_caso_de_uso.png" alt="Diagrama de Casos de Uso" width="800px"/>
  <p><em>Diagrama de Casos de Uso.</em></p>
</div>

### Diagrama de Classes
Este diagrama ilustra a arquitetura MVC (Model-View-Controller) do Laravel, focando nos Models e seus relacionamentos (operações).

<div align="center">
  <img src=".github/assets/diagrama_classes.png" alt="Diagrama de Classes" width="800px"/>
  <p><em>Diagrama de Classes (UML).</em></p>
</div>

### Diagrama Entidade-Relacionamento (DER)
Gerado via "Engenharia Reversa" do banco de dados MySQL, este diagrama mostra a estrutura exata das tabelas e as chaves estrangeiras que conectam `agendas` com `users` e `empresas`.

<div align="center">
  <img src=".github/assets/diagrama_der.png" alt="Diagrama Entidade-Relacionamento (DER)" width="800px"/>
  <p><em>Diagrama Entidade-Relacionamento (DER).</em></p>
</div>

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
  <img src=".github/assets/canvas_modelo_negocios.png" alt="Canvas do Modelo de Negócios" width="800px"/>
  <p><em>Figura 1. Canvas do Modelo de Negócios.</em></p>
</div>

---

## 🎨 Design

**Paleta de Cores** <div align="center">
  <img src=".github/assets/paleta_cores.png" alt="Paleta de Cores do projeto" width="600px"/>
  <p><em>Figura 2. Paleta de Cores.</em></p>
</div>

**Tipografia** <div align="center">
  <img src=".github/assets/tipografia_opensans.png" alt="Fonte Open Sans" width="600px"/>
  <p><em>Figura 3. Fonte Open Sans.</em></p>
</div>

**Logo** <div align="center">
  <img src=".github/assets/agen_logo.png" alt="Logo da aplicação AGEN" width="250px"/>
  <p><em>Figura 4. Logo da aplicação AGEN.</em></p>
</div>

**Modelo de Navegação** <div align="center">
  <img src=".github/assets/modelo_navegacao.png" alt="Modelo de Navegação" width="800px"/>
  <p><em>Figura 5. Modelo de Navegação.</em></p>
</div>

---

## 📱 Protótipo

🔗 [Acessar Protótipo Interativo no Balsamiq](https://balsamiq.cloud/sfh5gws/pqjpwco/r46FF)  

---

## 🛠️ Tecnologias Utilizadas

<div align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
  <img src="https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white" alt="Git">
</div>

---

## 👨‍💻 Autores

<div align="center">
  <p>Este projeto foi desenvolvido por:</p>
  
  <table align="center">
    <tr>
      <td align="center">
        <a href="https://github.com/AquilesMorato">
          <img src=".github/assets/aquiles_morato.jpg" width="150px;" alt="Foto do Aquiles Augusto"/>
          <br />
          <sub><b>Aquiles Augusto</b></sub>
        </a>
      </td>
      <td align="center">
        <a href="https://github.com/Lucamorato2006">
          <img src=".github/assets/luca_morato.jpg" width="150px;" alt="Foto do Luca Morato"/>
          <br />
          <sub><b>Luca Morato</b></sub>
        </a>
      </td>
    </tr>
  </table>
</div>

---

## 🏁 Considerações Finais

A criação do AGEN foi um exercício prático fundamental para aplicar metodologias de desenvolvimento de software aprendidas em sala.  
Os principais desafios (prazos curtos, equipe reduzida) foram superados com **flexibilidade, organização e divisão de tarefas**. A migração do front-end estático para um back-end MVC completo com Laravel foi o principal foco desta segunda etapa do projeto.

---

## 📚 Referências

- Matteson, Steve. *Open Sans Font*. [Google Fonts](https://fonts.google.com/specimen/Open+Sans)  
- [Balsamiq](https://balsamiq.com)  
- [GitHub](https://github.com)  
- [WeHandle](https://wehandle.com.br)  
- [Trello](https://trello.com)  
- [Figma](https://figma.com)
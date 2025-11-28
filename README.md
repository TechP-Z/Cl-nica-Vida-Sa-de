# Clínica Vida Saúde — Sistema de Agendamento Médico

##  Visão Geral

Este projeto é um sistema em PHP + MySQL para agendamento de consultas médicas, com duas interfaces:

- **Área do Paciente** — para cadastro, login, agendamento de consultas e visualização de suas consultas.  
- **Área Administrativa (Funcionário / Clínica)** — para gerenciar médicos, especialidades, consultas de todos os pacientes, busca de pacientes, e cancelamento de consultas (com notificação para o paciente).

O sistema serve para simular o funcionamento de uma clínica médica pequena, facilitando o controle de agendamentos e permitindo que pacientes e funcionários tenham acessos com permissões distintas.

---

## Funcionalidades principais

### Área do Paciente

- Cadastro de paciente com nome, e-mail e senha.  
- Login de paciente.  
- Agendar consulta — escolher médico, data e hora.  
- Ver suas consultas agendadas.  
- Bloqueio para evitar marcar duas consultas no mesmo horário (mesmo paciente) ou duplo agendamento para um médico.  
- Receber notificação ao fazer login, caso a consulta tenha sido cancelada pela clínica.  

### Área Administrativa

- Login de funcionário (usuário administrador).  
- Cadastro de especialidades médicas.  
- Cadastro de médicos associados a uma especialidade.  
- Listagem de todos os médicos.  
- Visualização de todas as consultas agendadas (de todos os pacientes), ordenadas por data/hora.  
- Busca de pacientes por nome (pesquisa por parte do nome).  
- Cancelamento de consultas — marcando como “cancelada” e disparando notificação para o paciente.  

---

##  Tecnologias utilizadas

- **PHP** (sem PDO, usando MySQLi)  
- **MySQL** (banco de dados)  
- **HTML + CSS** (layout simples)  
- Arquitetura básica de arquivos PHP com separação entre front-end, includes, área administrativa, etc.

---

## Instalação / Como executar localmente

Siga os passos abaixo para colocar o sistema para rodar no seu computador:

```bash
# 1. Clone este repositório (ou copie os arquivos para sua pasta local)
git clone https://github.com/SEU_USUARIO/clinica-sistema.git
cd clinica-sistema

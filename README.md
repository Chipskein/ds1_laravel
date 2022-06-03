## ds1 laravel

### Run first time

            composer update 
            cp .env.example .env
            php artisan key:generate
            php artisan serve
### Run normally
            php artisan serve



Prezados, 

Desenvolver um sistema acadêmico simples, sem login:

-Realizar um cadastro simples de disciplinas, carga horária.
-Realizar cadastro de alunos, email, com matricula, nome.
-Realizar o cadastro de professores. 
-Alocar professores as suas disciplinas
-Cada aluno deve ser matriculado às disciplinas. 
-Cada disciplina terá apenas a média final e frequencia. Apresentar se o aluno foi reprovado ou aprovado, ou rep por frequencia. Não deixar matricular o aluno com carga horária maior que 50. 

Responder as perguntas: 

(i)O professor fulano ministra aulas para o aluno ciclano?
(ii) Listar disciplinas de um dado professor
(iii) listar todos os alunos de um professor
(iv) apresentar o aluno quie tirou a nota mais alta
(v) quais disciplinas de um dado aluno?

Se o aluno observou que faltou alguma inforamção, por favor, faz parte do enunciado ajustar e observar possíveis gaps no exercício. 
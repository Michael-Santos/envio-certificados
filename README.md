## Script para envio de certificados ##

----------

### Como usar ###

 1. git clone https://github.com/secot/envio-certificados.git
 2. Dentro da raiz de onde foi clonado, dar um **composer install** no terminal, para instalar as dependências.
 3. Atualizar o arquivo **users.csv** com as informações, nome e e-mail, dos participantes.
 4. Colocar os certificados dentro da pasta certificados. **Nota: este código irá procurar pelo arquivo "/Certificados/< nome da pessoa >.pdf**
 5. **Renomear** o arquivo *env-example.php* para *env.php* e atualizar as informações com o servidor de e-mail, no caso SMTP, do qual será utilizado para envio dos certificados.
 6. Pronto! =D  Só levantar o servidor php, pode ser o servidor embutido, na raiz e abrir o index.php.

----------

Em 2017, na IX edição da [SeCoT](http://secot.com.br/), foi utilizado o [Sparkpost](sparkpost.com) como serviço provedor de SMTP para envio dos certificados/QR-Codes.
